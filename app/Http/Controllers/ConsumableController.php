<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Consumable;
use App\Models\ConsumableCategory;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ConsumableController extends BaseController
{
  protected $viewPath = 'web.pages.consumable.';

  public function __construct(Consumable $consumable, ConsumableCategory $consumableCategory, Product $product)
  {
    parent::__construct();
    $this->product = $product;
    $this->consumable = $consumable;
    $this->consumableCategory = $consumableCategory;
  }

  /**
   * Page: 'Consumable listing'
   *
   * @param String $slug
   * @param ConsumableCategory $consumableCategory
   * @return \Illuminate\Http\Response
   */

  public function listing($slugProduct = NULL, Product $product, $slug = NULL, ConsumableCategory $consumableCategory)
  { 
    $productId = $product->id;
    $consumables = $this->consumable
      ->where('consumable_category_id', '=', $consumableCategory->id)
      ->where('has_variation', '=', 0)
      ->whereHas('products', function ($query) use ($productId) {
        $query->where('product_id', '=', $productId);
    })->get();

    $consumableVariants =$this->consumable
      ->with('previewImage')
      ->where('consumable_category_id', '=', $consumableCategory->id)
      ->where('has_variation', '=', 1)
      ->whereHas('products', function ($query) use ($productId) {
        $query->where('product_id', '=', $productId);
    })->get();

    $consumablesWithVariants = [];
    if ($consumableVariants)
    {
      foreach($consumableVariants as $variation)
      {
        $consumablesWithVariants['items'][] = $variation;
      }
    }

    if (isset($consumablesWithVariants['items']))
    {
      $consumablesWithVariants['items'] = collect($consumablesWithVariants['items'])->sortBy('drilling');
      $consumablesWithVariants['title_first'] = $consumablesWithVariants['items']->first()->title;
      $consumablesWithVariants['title_last'] = $consumablesWithVariants['items']->last()->title;
    }

    return view($this->viewPath . 'listing', ['consumables' => $consumables, 'consumablesWithVariants' => $consumablesWithVariants, 'category' => $consumableCategory, 'product' => $product]);
  }

  /**
   * Page: 'Consumable detail'
   *
   * @param String $slug
   * @param Consumable $consumable
   * @return \Illuminate\Http\Response
   */

  public function show($slug = NULL, Consumable $consumable)
  { 
    $consumable = $this->consumable->with('previewImage', 'category', 'publishedImages', )->findOrFail($consumable->id);
    return view($this->viewPath . 'show', 
      [
        'consumable' => $consumable,
        'api_connection' => session()->has('api_connection_data') ? session('api_connection_data') : null
      ]
    );
  }

}

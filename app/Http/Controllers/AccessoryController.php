<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Accessory;
use App\Models\AccessoryCategory;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AccessoryController extends BaseController
{
  protected $viewPath = 'web.pages.accessory.';

  public function __construct(Accessory $accessory, AccessoryCategory $accessoryCategory, Product $product)
  {
    parent::__construct();
    $this->product = $product;
    $this->accessory = $accessory;
    $this->accessoryCategory = $accessoryCategory;
  }

  /**
   * Page: 'Accessory listing'
   *
   * @param String $slug
   * @param AccessoryCategory $accessoryCategory
   * @return \Illuminate\Http\Response
   */

  public function listing($slugProduct = NULL, Product $product, $slug = NULL, AccessoryCategory $accessoryCategory)
  { 
    $productId = $product->id;
    $accessories = $this->accessory
      ->where('accessory_category_id', '=', $accessoryCategory->id)
      ->where('has_variation', '=', 0)
      ->where('publish', '=', 1)
      ->whereHas('products', function ($query) use ($productId) {
        $query->where('product_id', '=', $productId);
    })->get();

    $accessoryVariants = $this->accessory
      ->with('previewImage')
      ->where('accessory_category_id', '=', $accessoryCategory->id)
      ->where('has_variation', '=', 1)
      ->where('publish', '=', 1)
      ->whereHas('products', function ($query) use ($productId) {
        $query->where('product_id', '=', $productId);
    })->orderBy('order')->get();

    $accessoriesWithVariants = [];
    if ($accessoryVariants)
    {
      foreach($accessoryVariants as $variation)
      {
        $accessoriesWithVariants['items'][] = $variation;
      }
    }

    if (isset($accessoriesWithVariants['items']))
    {
      $accessoriesWithVariants['items'] = collect($accessoriesWithVariants['items'])->sortBy('diameter');
      $accessoriesWithVariants['title_first'] = $accessoriesWithVariants['items']->first()->title;
      $accessoriesWithVariants['title_last'] = $accessoriesWithVariants['items']->last()->title;
    }

    return view($this->viewPath . 'listing', ['accessories' => $accessories, 'accessoriesWithVariants' => $accessoriesWithVariants, 'category' => $accessoryCategory, 'product' => $product]);
  }

  /**
   * Page: 'Accessory detail'
   *
   * @param String $slug
   * @param Accessory $accessory
   * @return \Illuminate\Http\Response
   */

  public function show($slug = NULL, Accessory $accessory)
  { 
    $accessory = $this->accessory->with('previewImage', 'category', 'publishedImages', )->findOrFail($accessory->id);
    return view($this->viewPath . 'show', [
      'accessory' => $accessory,
       'api_connection' => session()->has('api_connection_data') ? session('api_connection_data') : null
      ]
    );
  }

}

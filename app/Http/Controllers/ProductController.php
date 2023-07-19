<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
  protected $viewPath = 'web.pages.product.';

  public function __construct(Product $product, ProductCategory $productCategory)
  {
    parent::__construct();
    $this->product = $product;
    $this->productCategory = $productCategory;
  }

  /**
   * Page: 'Product listing'
   *
   * @param String $slug
   * @param ProductCategory $productCategory
   * @return \Illuminate\Http\Response
   */

  public function listing($slug = NULL, ProductCategory $productCategory)
  { 
    $products = $this->product->published()->with('previewImage')->where('product_category_id', '=', $productCategory->id)->orderBy('order')->get();
    
    // Fetch additional category for "Lochsägen, Aufnahmeschaft, Zentrierbohrer" which belongs to "Stanz- und Biegewerkzeuge"
    $productCategoryHoleSaw = [];
    if ($productCategory->id == 2)
    {
      $productCategoryHoleSaw = $this->productCategory->with('products')->orderBy('order')->find(4);
    }
    return view($this->viewPath . 'listing', ['products' => $products, 'category' => $productCategory, 'productCategoryHoleSaw' => $productCategoryHoleSaw]);
  }

  /**
   * Page: 'Product detail'
   *
   * @param String $slug
   * @param Product $product
   * @return \Illuminate\Http\Response
   */

  public function show($slug = NULL, Product $product)
  { 
    $product = $this->product->with('previewImage', 'category', 'publishedImages', 'consumables.category', 'accessories.category', 'tools')->findOrFail($product->id);

    // Accessories
    $accessories = [];
    if ($product->accessories)
    {
      foreach($product->accessories as $a)
      {
        $accessories[$a->accessory_category_id][] = $a;
      }
    }

    ksort($accessories);
    $accessories = array_merge($accessories);

    // Consumables
    $consumables = [];
    if ($product->consumables)
    {
      foreach($product->consumables as $c)
      {
        $consumables[$c->consumable_category_id][] = $c;
      }
    }

    ksort($consumables);
    $consumables = array_merge($consumables);

    // Tools
    $tools = [];
    if ($product->tools)
    {
      foreach($product->tools as $c)
      {
        $tools[] = $c;
      }
    }
    return view(
      $this->viewPath . 'show',
      [
        'product' => $product, 
        'accessories' => $accessories, 
        'consumables' => $consumables, 
        'tools' => $tools,
        'api_connection' => session()->has('api_connection_data') ? session('api_connection_data') : null
      ]
    );
  }

}

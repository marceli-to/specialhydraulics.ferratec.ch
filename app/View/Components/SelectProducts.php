<?php
namespace App\View\Components;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\Component;

class SelectProducts extends Component
{

  /**
   * Name
   *
   * @var string
   */
  public $name;

  /**
   * Label
   *
   * @var string
   */
  public $label;

  /**
   * Required
   *
   * @var boolean
   */

  public $required;

  /**
   * Selected product
   *
   * @var integer
   */
  public $productId;

  /**
   * Create a new component instance.
   *
   * @param $name
   * @param $label
   * 
   * @return void
   */
  public function __construct($name, $label = 'Bitte wählen...', $required = FALSE, $productId = NULL, Product $product, ProductCategory $productCategory)
  {
    $this->product = $product;
    $this->productCategory = $productCategory;
    $this->name = $name;
    $this->label = $label;
    $this->required = $required;
    $this->productId = $productId;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    $products = $this->product->with('category')->get();
    $products_grouped = $products->groupBy('product_category_id');
    $categories = $this->productCategory->get();
    return view('web.components.form.select-products', ['products' => $products_grouped, 'categories' => $categories->toArray()]);
  }
}

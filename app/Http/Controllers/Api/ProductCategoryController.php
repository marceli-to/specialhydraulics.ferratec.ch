<?php
namespace App\Http\Controllers\Api;
use App\Models\ProductCategory;
use App\Http\Resources\DataCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
  
  /**
   * Constructor
   * 
   * @param ProductCategory $productCategory
   */

  public function __construct(ProductCategory $productCategory)
  {
    $this->productCategory = $productCategory;
  }

  /**
   * Get a list of product categories
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection($this->productCategory->get());
  }

}

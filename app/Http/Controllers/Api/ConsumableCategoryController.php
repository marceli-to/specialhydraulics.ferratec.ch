<?php
namespace App\Http\Controllers\Api;
use App\Models\ConsumableCategory;
use App\Http\Resources\DataCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumableCategoryController extends Controller
{
  
  /**
   * Constructor
   * 
   * @param ConsumableCategory $consumableCategory
   */

  public function __construct(ConsumableCategory $consumableCategory)
  {
    $this->consumableCategory = $consumableCategory;
  }

  /**
   * Get a list of product categories
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection($this->consumableCategory->get());
  }

}

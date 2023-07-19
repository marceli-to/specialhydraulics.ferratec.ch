<?php
namespace App\Http\Controllers\Api;
use App\Models\AccessoryCategory;
use App\Http\Resources\DataCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessoryCategoryController extends Controller
{
  
  /**
   * Constructor
   * 
   * @param AccessoryCategory $accessoryCategory
   */

  public function __construct(AccessoryCategory $accessoryCategory)
  {
    $this->accessoryCategory = $accessoryCategory;
  }

  /**
   * Get a list of product categories
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection($this->accessoryCategory->get());
  }

}

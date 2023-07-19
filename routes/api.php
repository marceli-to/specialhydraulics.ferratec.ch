<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
  Route::get('user', 'Api\UserController@find');

  // Upload
  Route::post('image/upload','Api\UploadController@image');
  Route::post('file/upload','Api\UploadController@file');

  // Product categories
  Route::get('product/categories', 'Api\ProductCategoryController@get');

  // Products
  Route::get('products', 'Api\ProductController@get');
  Route::get('product/{product}', 'Api\ProductController@find');
  Route::post('product', 'Api\ProductController@store');
  Route::put('product/{product}', 'Api\ProductController@update');
  Route::get('product/state/{product}', 'Api\ProductController@toggle');
  Route::post('product/order', 'Api\ProductController@order');
  Route::delete('product/{product}', 'Api\ProductController@destroy');

  // Product images
  Route::get('product/image/state/{productImage}', 'Api\ProductImageController@toggle');
  Route::put('product/image/{productImage}', 'Api\ProductImageController@coords');
  Route::post('product/image', 'Api\ProductImageController@store');
  Route::post('product/image/order', 'Api\ProductImageController@order');
  Route::delete('product/image/{productImage}', 'Api\ProductImageController@destroy');

  // Consumable categories
  Route::get('consumable/categories', 'Api\ConsumableCategoryController@get');

  // Consumables
  Route::get('consumables', 'Api\ConsumableController@get');
  Route::get('consumable/{consumable}', 'Api\ConsumableController@find');
  Route::post('consumable', 'Api\ConsumableController@store');
  Route::put('consumable/{consumable}', 'Api\ConsumableController@update');
  Route::get('consumable/state/{consumable}', 'Api\ConsumableController@toggle');
  Route::post('consumable/order', 'Api\ConsumableController@order');
  Route::delete('consumable/{consumable}', 'Api\ConsumableController@destroy');

  // Consumable images
  Route::get('consumable/image/state/{consumableImage}', 'Api\ConsumableImageController@toggle');
  Route::put('consumable/image/{consumableImage}', 'Api\ConsumableImageController@coords');
  Route::post('consumable/image', 'Api\ConsumableImageController@store');
  Route::post('consumable/image/order', 'Api\ConsumableImageController@order');
  Route::delete('consumable/image/{consumableImage}', 'Api\ConsumableImageController@destroy');

  // Accessory categories
  Route::get('accessory/categories', 'Api\AccessoryCategoryController@get');

  // Accessories
  Route::get('accessories', 'Api\AccessoryController@get');
  Route::get('accessory/{accessory}', 'Api\AccessoryController@find');
  Route::post('accessory', 'Api\AccessoryController@store');
  Route::put('accessory/{accessory}', 'Api\AccessoryController@update');
  Route::get('accessory/state/{accessory}', 'Api\AccessoryController@toggle');
  Route::post('accessory/order', 'Api\AccessoryController@order');
  Route::delete('accessory/{accessory}', 'Api\AccessoryController@destroy');

  // Accessory images
  Route::get('accessory/image/state/{accessoryImage}', 'Api\AccessoryImageController@toggle');
  Route::put('accessory/image/{accessoryImage}', 'Api\AccessoryImageController@coords');
  Route::post('accessory/image', 'Api\AccessoryImageController@store');
  Route::post('accessory/image/order', 'Api\AccessoryImageController@order');
  Route::delete('accessory/image/{accessoryImage}', 'Api\AccessoryImageController@destroy');

  // Tools
  Route::get('tools', 'Api\ToolController@get');
  Route::get('tool/{tool}', 'Api\ToolController@find');
  Route::post('tool', 'Api\ToolController@store');
  Route::put('tool/{tool}', 'Api\ToolController@update');
  Route::get('tool/state/{tool}', 'Api\ToolController@toggle');
  Route::post('tool/order', 'Api\ToolController@order');
  Route::delete('tool/{tool}', 'Api\ToolController@destroy');

  // Tool images
  Route::get('tool/image/state/{toolImage}', 'Api\ToolImageController@toggle');
  Route::put('tool/image/{toolImage}', 'Api\ToolImageController@coords');
  Route::post('tool/image', 'Api\ToolImageController@store');
  Route::post('tool/image/order', 'Api\ToolImageController@order');
  Route::delete('tool/image/{toolImage}', 'Api\ToolImageController@destroy');

});

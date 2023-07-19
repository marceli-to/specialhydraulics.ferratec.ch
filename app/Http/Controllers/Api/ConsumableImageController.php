<?php
namespace App\Http\Controllers\Api;
use App\Models\ConsumableImage;
use App\Http\Resources\DataCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumableImageController extends Controller
{
  protected $consumableImage;
  
  /**
   * Constructor
   * 
   * @param ConsumableImage $consumableImage
   */

  public function __construct(ConsumableImage $consumableImage)
  {
    $this->consumableImage = $consumableImage;
  }

  /**
   * Store a newly added Consumable image
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Store consumable image
    $consumableImage = ConsumableImage::create($request->all());
    $consumableImage->save();
    return response()->json(['consumableImageId' => $consumableImage->id]);
  }

  /**
   * Update the order of the given images
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $images = $request->get('images');
    foreach($images as $image)
    {
      $i = $this->consumableImage->find($image['id']);
      $i->order = $image['order'];

      if ($i->preview)
      {
        $i->order = -1;
      }

      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given image
   *
   * @param  ConsumableImage $consumableImage
   * @return \Illuminate\Http\Response
   */
  public function toggle(ConsumableImage $consumableImage)
  {
    $consumableImage->publish = $consumableImage->publish == 0 ? 1 : 0;
    $consumableImage->save();
    return response()->json($consumableImage->publish);
  }

  /**
   * Update the cropping coords of the specified resource.
   *
   * @param ConsumableImage $consumableImage
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function coords(ConsumableImage $consumableImage, Request $request)
  {
    $image = $this->consumableImage->findOrFail($consumableImage->id);
    $image->coords_w = round($request->input('coords_w'), 12);
    $image->coords_h = round($request->input('coords_h'), 12);
    $image->coords_x = round($request->input('coords_x'), 12);
    $image->coords_y = round($request->input('coords_y'), 12);
    $image->save();
    $this->removeCachedImage($image);
    return response()->json('successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  string $image
   * @return \Illuminate\Http\Response
   */
  
  public function destroy($image)
  {
    // Delete image from database
    $record = $this->consumableImage->where('name', '=', $image)->first();
    
    if ($record)
    {
      $record->delete();
    }

    // Delete file from storage
    $directories = Storage::allDirectories('public');
    foreach($directories as $d)
    {
      Storage::delete($d . '/'. $image);
    }
    
    return response()->json('successfully deleted');
  }

  /**
   * Remove cached version of the image
   *
   * @param ConsumableImage $consumableImage
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  private function removeCachedImage(ConsumableImage $consumableImage)
  {
    // Get an instance of the ImageCache class
    $imageCache = new \Intervention\Image\ImageCache();

    // Get a cached image from it and apply all of your templates / methods
    $image = $imageCache->make(storage_path('app/public/uploads/') . $consumableImage->name)->filter(new \App\Filters\Image\Template\Cache);

    // Remove the image from the cache by using its internal checksum
    Cache::forget($image->checksum());
  }
}

<?php
namespace App\Http\Controllers\Api;
use App\Models\AccessoryImage;
use App\Http\Resources\DataCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessoryImageController extends Controller
{
  protected $accessoryImage;
  
  /**
   * Constructor
   * 
   * @param AccessoryImage $accessoryImage
   */

  public function __construct(AccessoryImage $accessoryImage)
  {
    $this->accessoryImage = $accessoryImage;
  }

  /**
   * Store a newly added Accessory image
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Store accessory image
    $accessoryImage = AccessoryImage::create($request->all());
    $accessoryImage->save();
    return response()->json(['accessoryImageId' => $accessoryImage->id]);
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
      $i = $this->accessoryImage->find($image['id']);
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
   * @param  AccessoryImage $accessoryImage
   * @return \Illuminate\Http\Response
   */
  public function toggle(AccessoryImage $accessoryImage)
  {
    $accessoryImage->publish = $accessoryImage->publish == 0 ? 1 : 0;
    $accessoryImage->save();
    return response()->json($accessoryImage->publish);
  }

  /**
   * Update the cropping coords of the specified resource.
   *
   * @param AccessoryImage $accessoryImage
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function coords(AccessoryImage $accessoryImage, Request $request)
  {
    $image = $this->accessoryImage->findOrFail($accessoryImage->id);
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
    $record = $this->accessoryImage->where('name', '=', $image)->first();
    
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
   * @param AccessoryImage $accessoryImage
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  private function removeCachedImage(AccessoryImage $accessoryImage)
  {
    // Get an instance of the ImageCache class
    $imageCache = new \Intervention\Image\ImageCache();

    // Get a cached image from it and apply all of your templates / methods
    $image = $imageCache->make(storage_path('app/public/uploads/') . $accessoryImage->name)->filter(new \App\Filters\Image\Template\Cache);

    // Remove the image from the cache by using its internal checksum
    Cache::forget($image->checksum());
  }
}

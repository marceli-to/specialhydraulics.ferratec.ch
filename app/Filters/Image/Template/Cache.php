<?php
namespace App\Filters\Image\Template;
use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Cache implements FilterInterface
{
  protected $maxWidth;   
  protected $maxHeight;
  protected $coords;
  protected $orientation = 'landscape';

  public function __construct($maxWidth = null, $maxHeight = null, $coords = null)
  {
    $this->maxWidth  = $maxWidth ? $maxWidth : 2000;
    $this->maxHeight = $maxHeight ? $maxHeight : 1250;
    $this->coords    = $coords;
  }

  public function applyFilter(Image $image)
  {
    // Get image orientation
    $width  = $image->getWidth();
    $height = $image->getHeight();

    if ($height >= $width)
    {
      $this->orientation = 'portrait';
    }

    // Crop and resize if coords are set...
    if ($this->coords)
    {
      list($coords_w, $coords_h, $coords_x, $coords_y) = explode(',', $this->coords);
      return 
        $image->crop(floor($coords_w != 'null' ? $coords_w : 0), floor($coords_h != 'null' ? $coords_h : 0), floor($coords_x != 'null' ? $coords_x : 0), floor($coords_y != 'null' ? $coords_y : 0))
              ->resize($this->maxWidth, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
              });
    }
    else
    {
      return
        $image->fit($this->maxWidth, $this->maxHeight, function ($constraint) {
          $constraint->upsize();
      });
    }
  }
}
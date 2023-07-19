<?php
namespace App\Helpers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ImageHelper
{
  static function large($image, $caption = NULL)
  {
    $coords = '';
    if ($image->coords_w && $image->coords_h)
    {
      $coords =  floor($image->coords_w) . ',' .  floor($image->coords_h) . ',' .  floor($image->coords_x) . ',' .  floor($image->coords_y);
    }

    if ($image->orientation == 'l')
    {
      if ($coords != '')
      {
        return '<img src="/img/cache/'.$image->name.'?w=1200&h=900&c='.$coords.'"  width="1200" height="900" alt="'. $caption.'">';
      }
      return '<img src="/img/cache/'.$image->name.'"  width="1200" height="900" alt="'. $caption.'">';
    }

    return '<img src="/img/cache/'.$image->name.'?w=900&h=1200&c='.$coords.'"  width="600" height="800" alt="'. $caption.'">';
  }

  static function square($image, $caption = NULL)
  {
    $coords = '';
    if ($image->coords_w && $image->coords_h)
    {
      $coords = floor($image->coords_w) . ',' .  floor($image->coords_h) . ',' .  floor($image->coords_x) . ',' .  floor($image->coords_y);
    }
    return '<img src="/img/cache/'.$image->name.'?w=900&h=900&c='.$coords.'"  width="600" height="600" alt="'. $caption.'">';
  }

  static function thumbnail($image, $caption = NULL)
  {
    return '<img src="/img/thumbnail/'.$image->name .'"  width="600" height="600" alt="'. $caption.'">';
  }

  static function fancybox($image)
  {
    $coords = '';
    if ($image->coords_w && $image->coords_h)
    {
      $coords =  floor($image->coords_w) . ',' .  floor($image->coords_h) . ',' .  floor($image->coords_x) . ',' .  floor($image->coords_y);
    }

    if ($image->orientation == 'l')
    {
      if ($coords != '')
      {
        return '/img/cache/'.$image->name.'?w=1200&h=900&c='.$coords;
      }
      return '/img/cache/'.$image->name.'?w=1200&h=900';
    }
    else
    {
      if ($coords != '')
      {
        return '/img/cache/'.$image->name.'?w=700&h=1200&c='.$coords;
      }
      return '/img/cache/'.$image->name.'?w=700&h=1200';
    }

    return "/img/cache/".$image->name."/1200/900";
  }

  static function openGraphImage($image)
  {
    return "/img/cache/".$image->name."/1600/1000";
  }
}
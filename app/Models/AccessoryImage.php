<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class AccessoryImage extends Base
{
	protected $fillable = [
		'name',
    'caption',
		'coords_w',
    'coords_h',
    'coords_x',
    'coords_y',
    'orientation',
    'preview',
    'publish',
    'order',
    'accessory_id',
	];

  public function accessory()
  {
    return $this->belongsTo('App\Models\Accessory');
  }
}

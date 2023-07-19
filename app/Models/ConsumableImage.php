<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class ConsumableImage extends Base
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
    'consumable_id',
	];

  public function consumable()
  {
    return $this->belongsTo('App\Models\Consumable');
  }
}

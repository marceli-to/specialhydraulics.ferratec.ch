<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
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
    'product_id',
	];

  public function product()
  {
    return $this->belongsTo('App\Models\Product');
  }
}

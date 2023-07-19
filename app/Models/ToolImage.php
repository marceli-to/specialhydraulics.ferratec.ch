<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class ToolImage extends Base
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
    'tool_id',
	];

  public function tool()
  {
    return $this->belongsTo('App\Models\Tool');
  }
}

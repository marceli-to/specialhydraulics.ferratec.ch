<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class ProductTool extends Base
{
	protected $table = 'product_tool';

	protected $fillable = [
    'tool_id',
    'product_id',
  ];

	public function product()
	{
		return $this->hasOne('App\Models\Product');
  }
  
	public function tool()
	{
		return $this->hasOne('App\Models\Tool');
	}

}
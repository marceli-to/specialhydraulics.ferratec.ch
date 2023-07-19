<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class AccessoryProduct extends Base
{
	protected $table = 'accessory_product';

	protected $fillable = [
    'accessory_id',
    'product_id',
  ];

	public function product()
	{
		return $this->hasOne('App\Models\Product');
  }
  
	public function accessory()
	{
		return $this->hasOne('App\Models\Accessory');
	}

}

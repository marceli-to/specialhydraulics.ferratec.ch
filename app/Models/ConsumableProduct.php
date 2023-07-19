<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class ConsumableProduct extends Base
{
	protected $table = 'consumable_product';

	protected $fillable = [
    'consumable_id',
    'product_id',
  ];

	public function product()
	{
		return $this->hasOne('App\Models\Product');
  }
  
	public function consumable()
	{
		return $this->hasOne('App\Models\Consumable');
	}

}

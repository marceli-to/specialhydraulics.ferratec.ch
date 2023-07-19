<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AccessoryCategory extends Base
{
	use HasTranslations;

	public $translatable = [
		'title',
		'title_singular',
		'title_listing',
		'description',
		'slug'
	];

	protected $fillable = [
		'title',
		'title_singular',
		'title_listing',
		'description',
		'image',
		'slug',
		'order',
	];

	public function accessories()
	{
		return $this->hasMany('App\Models\Accessory', 'accessory_category_id', 'id');
	}
	
	// public function product()
	// {
	// 	return $this->hasOne('App\Models\AccessoryCategoryProduct', 'product_id', 'consumable_category_id');
	// }

}

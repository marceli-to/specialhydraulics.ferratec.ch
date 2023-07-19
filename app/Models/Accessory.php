<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Accessory extends Base
{
	use HasTranslations;

	public $translatable = [
		'title',
		'subtitle',
		'description',
		'link_shop',
    'link_shop_em',
    'link_shop_ferratec',
	];

	protected $fillable = [
		'article_no',
    'e_no',
		'title',
		'subtitle',
		'description',
		'diameter',
		'link_shop',
    'link_shop_em',
    'link_shop_ferratec',
		'order',
		'publish',
		'has_variation',
    'form_data',
		'accessory_category_id'
  ];
  
	public function images()
	{
		return $this->hasMany('App\Models\AccessoryImage', 'accessory_id', 'id')->orderBy('order');
	}

	public function publishedImages()
	{
		return $this->hasMany('App\Models\AccessoryImage', 'accessory_id', 'id')->where('publish', '=', 1)->where('preview', '=', 0)->orderBy('order');
	}
	
	public function previewImage()
	{
		return $this->hasOne('App\Models\AccessoryImage', 'accessory_id', 'id')->where('publish', '=', 1)->where('preview', '=', 1);
	}
	
	public function category()
	{
		return $this->hasOne('App\Models\AccessoryCategory', 'id', 'accessory_category_id');
	}

	public function products()
	{
		return $this->belongsToMany('App\Models\Product');
	}
}


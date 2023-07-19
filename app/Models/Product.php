<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Base
{
	use HasTranslations;

	public $translatable = [
		'subtitle',
		'description',
		'diameter',
		'code_youtube',
		'caption_youtube',
		'code_3d',
		'caption_3d',
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
		'code_youtube',
		'caption_youtube',
		'code_3d',
		'caption_3d',
		'link_shop',
    'link_shop_em',
    'link_shop_ferratec',
		'has_variation',
    'form_data',
		'order',
		'publish',
		'product_category_id'
  ];
  
	public function images()
	{
		return $this->hasMany('App\Models\ProductImage', 'product_id', 'id')->orderBy('order');
	}

	public function publishedImages()
	{
		return $this->hasMany('App\Models\ProductImage', 'product_id', 'id')->where('publish', '=', 1)->where('preview', '=', 0)->orderBy('order');
	}
	
	public function previewImage()
	{
		return $this->hasOne('App\Models\ProductImage', 'product_id', 'id')->where('publish', '=', 1)->where('preview', '=', 1);
	}
	
	public function category()
	{
		return $this->hasOne('App\Models\ProductCategory', 'id', 'product_category_id');
	}

	public function consumables()
	{
		return $this->belongsToMany('App\Models\Consumable');
	}

	public function accessories()
	{
		return $this->belongsToMany('App\Models\Accessory');
	}

	public function tools()
	{
		return $this->belongsToMany('App\Models\Tool');
	}

}

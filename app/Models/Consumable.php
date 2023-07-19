<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Consumable extends Base
{
	use HasTranslations;

	public $translatable = [
		'title',
		'subtitle',
		'description',
		'link_shop',
    'link_shop_em',
	];

	protected $fillable = [
		'article_no',
    'e_no',
		'title',
		'subtitle',
		'description',
		'drilling',
    'unit',
		'link_shop',
    'link_shop_em',
		'order',
		'publish',
		'has_variation',
    'form_data',
    'consumable_category_id'
  ];
  
  
	public function images()
	{
		return $this->hasMany('App\Models\ConsumableImage', 'consumable_id', 'id')->orderBy('order');
	}

	public function publishedImages()
	{
		return $this->hasMany('App\Models\ConsumableImage', 'consumable_id', 'id')->where('publish', '=', 1)->where('preview', '=', 0)->orderBy('order');
	}
	
	public function previewImage()
	{
		return $this->hasOne('App\Models\ConsumableImage', 'consumable_id', 'id')->where('publish', '=', 1)->where('preview', '=', 1);
	}
	
	public function category()
	{
		return $this->hasOne('App\Models\ConsumableCategory', 'id', 'consumable_category_id');
	}

	public function products()
	{
		return $this->belongsToMany('App\Models\Product');
	}
}


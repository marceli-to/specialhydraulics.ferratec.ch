<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tool extends Base
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
		'diameter',
		'link_shop',
    'link_shop_em',
    'form_data',
		'order',
		'publish',
  ];
  
	public function images()
	{
		return $this->hasMany('App\Models\ToolImage', 'tool_id', 'id')->orderBy('order');
	}

	public function publishedImages()
	{
		return $this->hasMany('App\Models\ToolImage', 'tool_id', 'id')->where('publish', '=', 1)->where('preview', '=', 0)->orderBy('order');
	}
	
	public function previewImage()
	{
		return $this->hasOne('App\Models\ToolImage', 'tool_id', 'id')->where('publish', '=', 1)->where('preview', '=', 1);
	}
	
	public function products()
	{
		return $this->belongsToMany('App\Models\Product');
	}
}


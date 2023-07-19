<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductCategory extends Model
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
		'parent_id'
	];

	public function products()
	{
		return $this->hasMany('App\Models\Product', 'product_category_id', 'id');
	}
}

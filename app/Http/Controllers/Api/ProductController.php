<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function __construct(Product $product, ProductImage $productImage)
  {
    $this->product       = $product;
    $this->productImage  = $productImage;
  }

  /**
   * Get a list of product
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection($this->product->orderBy('order')->get());
  }

  /**
   * Get a single product for a given product or authenticated product
   * 
   * @param Product $product
   * @return \Illuminate\Http\Response
   */
  public function find(Product $product)
  {
    $product = $this->product->with('images')->findOrFail($product->id);
    return response()->json($product);
  }

  /**
   * Store a newly created Product
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductStoreRequest $request)
  {
    // Store product
    $product = new Product([
      'article_no' => $request->input('article_no'),
      'e_no' => $request->input('e_no'),
      'title' => $request->input('title'),
      'subtitle' => [
        'de' => $request->input('subtitle.de'),
        'fr' => $request->input('subtitle.fr'),
        'it' => $request->input('subtitle.it'),
      ],
      'description' => [
        'de' => $request->input('description.de'),
        'fr' => $request->input('description.fr'),
        'it' => $request->input('description.it'),
      ],
      'diameter' => [
        'de' => $request->input('diameter.de'),
        'fr' => $request->input('diameter.fr'),
        'it' => $request->input('diameter.it'),
      ],
      'code_youtube' => [
        'de' => $request->input('code_youtube.de'),
        'fr' => $request->input('code_youtube.fr'),
        'it' => $request->input('code_youtube.it'),
      ],
      'caption_youtube' => [
        'de' => $request->input('caption_youtube.de'),
        'fr' => $request->input('caption_youtube.fr'),
        'it' => $request->input('caption_youtube.it'),
      ],
      'code_3d' => [
        'de' => $request->input('code_3d.de'),
        'fr' => $request->input('code_3d.fr'),
        'it' => $request->input('code_3d.it'),
      ],
      'caption_3d' => [
        'de' => $request->input('caption_3d.de'),
        'fr' => $request->input('caption_3d.fr'),
        'it' => $request->input('caption_3d.it'),
      ],
      'link_shop' => [
        'de' => $request->input('link_shop.de'),
        'fr' => $request->input('link_shop.fr'),
        'it' => $request->input('link_shop.it'),
      ],
      'link_shop_em' => [
        'de' => $request->input('link_shop_em.de'),
        'fr' => $request->input('link_shop_em.fr'),
        'it' => $request->input('link_shop_em.it'),
      ],
      'link_shop_ferratec' => [
        'de' => $request->input('link_shop_ferratec.de'),
        'fr' => $request->input('link_shop_ferratec.fr'),
        'it' => $request->input('link_shop_ferratec.it'),
      ],
      'product_category_id' => $request->input('product_category_id'),
      'publish' => $request->input('publish'),
    ]);
    $product->save();

    // Store images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = new ProductImage([
          'product_id'   => $product->id,
          'name'         => $i['name'],
          'caption'      => $i['caption'],
          'coords_w'     => $i['coords_w'] ? round($i['coords_w'], 12) : NULL,
          'coords_h'     => $i['coords_h'] ? round($i['coords_h'], 12) : NULL,
          'coords_x'     => $i['coords_x'] ? round($i['coords_x'], 12) : NULL,
          'coords_y'     => $i['coords_y'] ? round($i['coords_y'], 12) : NULL,
          'preview'      => $i['preview'] ? $i['preview'] : 0,
          'publish'      => $i['publish'] ? $i['publish'] : 0,
          'orientation'  => $i['orientation'] ? $i['orientation'] : NULL,
        ]);
        $image->save();
      }
    }
    return response()->json(['productId' => $product->id]);
  }

  /**
   * Update a Product for a given Product or authenticated Product
   *
   * @param Product $product
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Product $product, ProductStoreRequest $request)
  {
    // Get product
    $product = $this->product->findOrFail($product->id);
    
    // German
    $product->setTranslation('subtitle', 'de', $request->input('subtitle.de'));
    $product->setTranslation('description', 'de', $request->input('description.de'));
    $product->setTranslation('diameter', 'de', $request->input('diameter.de'));
    $product->setTranslation('code_youtube', 'de', $request->input('code_youtube.de'));
    $product->setTranslation('caption_youtube', 'de', $request->input('caption_youtube.de'));
    $product->setTranslation('code_3d', 'de', $request->input('code_3d.de'));
    $product->setTranslation('caption_3d', 'de', $request->input('caption_3d.de'));
    $product->setTranslation('link_shop', 'de', $request->input('link_shop.de'));
    $product->setTranslation('link_shop_em', 'de', $request->input('link_shop_em.de'));
    $product->setTranslation('link_shop_ferratec', 'de', $request->input('link_shop_ferratec.de'));

    // French
    $product->setTranslation('subtitle', 'fr', $request->input('subtitle.fr'));
    $product->setTranslation('description', 'fr', $request->input('description.fr'));
    $product->setTranslation('diameter', 'fr', $request->input('diameter.fr'));
    $product->setTranslation('code_youtube', 'fr', $request->input('code_youtube.fr'));
    $product->setTranslation('caption_youtube', 'fr', $request->input('caption_youtube.fr'));
    $product->setTranslation('code_3d', 'fr', $request->input('code_3d.fr'));
    $product->setTranslation('caption_3d', 'fr', $request->input('caption_3d.fr'));
    $product->setTranslation('link_shop', 'fr', $request->input('link_shop.fr'));
    $product->setTranslation('link_shop_em', 'fr', $request->input('link_shop_em.fr'));
    $product->setTranslation('link_shop_ferratec', 'fr', $request->input('link_shop_ferratec.fr'));

    // Italian
    $product->setTranslation('subtitle', 'it', $request->input('subtitle.it'));
    $product->setTranslation('description', 'it', $request->input('description.it'));
    $product->setTranslation('diameter', 'it', $request->input('diameter.it'));
    $product->setTranslation('code_youtube', 'it', $request->input('code_youtube.it'));
    $product->setTranslation('caption_youtube', 'it', $request->input('caption_youtube.it'));
    $product->setTranslation('code_3d', 'it', $request->input('code_3d.it'));
    $product->setTranslation('caption_3d', 'it', $request->input('caption_3d.it'));
    $product->setTranslation('link_shop', 'it', $request->input('link_shop.it'));
    $product->setTranslation('link_shop_em', 'it', $request->input('link_shop_em.it'));
    $product->setTranslation('link_shop_ferratec', 'it', $request->input('link_shop_ferratec.it'));

    $product->title = $request->input('title');
    $product->article_no = $request->input('article_no');
    $product->e_no = $request->input('e_no');

    $product->publish = $request->input('publish');
    $product->product_category_id = $request->input('product_category_id');
    $product->save();

    // Update or add images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = ProductImage::updateOrCreate(
          ['id' => $i['id']], 
          [
            'product_id' => $product->id,
            'name'         => $i['name'],
            'caption'      => $i['caption'],
            'coords_w'     => $i['coords_w'] ? round($i['coords_w'], 12) : NULL,
            'coords_h'     => $i['coords_h'] ? round($i['coords_h'], 12) : NULL,
            'coords_x'     => $i['coords_x'] ? round($i['coords_x'], 12) : NULL,
            'coords_y'     => $i['coords_y'] ? round($i['coords_y'], 12) : NULL,
            'preview'      => $i['preview'] ? $i['preview'] : 0,
            'publish'      => $i['publish'] ? $i['publish'] : 0,
            'orientation'  => $i['orientation'] ? $i['orientation'] : NULL,
          ]
        );
      }
    }

    return response()->json('successfully updated');
  }

  /**
   * Update the order of the given products
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function order(Request $request)
  {
    $products = $request->get('products');
    foreach($products as $product)
    {
      $p = $this->product->find($product['id']);
      $p->order = $product['order'];
      $p->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given Product
   *
   * @param  Product $product
   * @return \Illuminate\Http\Response
   */
  public function toggle(Product $product)
  {
    $product->publish = $product->publish == 0 ? 1 : 0;
    $product->save();
    return response()->json($product->publish);
  }

  /**
   * Remove a Product
   *
   * @param  Product $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $product->delete();
    return response()->json('successfully deleted');
  }
}

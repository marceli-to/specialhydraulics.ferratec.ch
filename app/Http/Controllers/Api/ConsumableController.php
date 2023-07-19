<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Consumable;
use App\Models\ConsumableProduct;
use App\Models\ConsumableImage;
use App\Http\Requests\ConsumableStoreRequest;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
  public function __construct(Consumable $consumable, ConsumableImage $consumableImage)
  {
    $this->consumable       = $consumable;
    $this->consumableImage  = $consumableImage;
  }

  /**
   * Get a list of consumable
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection($this->consumable->with('products.category')->orderBy('order')->get());
  }

  /**
   * Get a single consumable for a given consumable or authenticated consumable
   * 
   * @param Consumable $consumable
   * @return \Illuminate\Http\Response
   */
  public function find(Consumable $consumable)
  {
    $consumable = $this->consumable->with('images', 'category', 'products.category')->findOrFail($consumable->id);
    return response()->json($consumable);
  }

  /**
   * Store a newly created Consumable
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(ConsumableStoreRequest $request)
  {
    // Store consumable
    $consumable = new Consumable([
      'article_no' => $request->input('article_no'),
      'e_no' => $request->input('e_no'),
      'title' => [
        'de' => $request->input('title.de'),
        'fr' => $request->input('title.fr'),
        'it' => $request->input('title.it'),
      ],
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
      'drilling' => $request->input('drilling'),
      'consumable_category_id' => $request->input('consumable_category_id'),
      'publish' => $request->input('publish'),
    ]);
    $consumable->save();

    // Store images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = new ConsumableImage([
          'consumable_id'   => $consumable->id,
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

    // Store products
    if ($request->products)
    {
      $consumable->products()->detach();
      foreach($request->products as $product)
      { 
        $consumable_product = new ConsumableProduct([
          'product_id' => $product['id'],
          'consumable_id' => $consumable->id
        ]);
        $consumable_product->save();
      }
    }  

    return response()->json(['consumableId' => $consumable->id]);
  }

  /**
   * Update a Consumable for a given Consumable or authenticated Consumable
   *
   * @param Consumable $consumable
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Consumable $consumable, ConsumableStoreRequest $request)
  {
    // Get consumable
    $consumable = $this->consumable->findOrFail($consumable->id);
    
    // German
    $consumable->setTranslation('title', 'de', $request->input('title.de'));
    $consumable->setTranslation('subtitle', 'de', $request->input('subtitle.de'));
    $consumable->setTranslation('description', 'de', $request->input('description.de'));
    $consumable->setTranslation('link_shop', 'de', $request->input('link_shop.de'));
    $consumable->setTranslation('link_shop_em', 'de', $request->input('link_shop_em.de'));

    // French
    $consumable->setTranslation('title', 'fr', $request->input('title.fr'));
    $consumable->setTranslation('subtitle', 'fr', $request->input('subtitle.fr'));
    $consumable->setTranslation('description', 'fr', $request->input('description.fr'));
    $consumable->setTranslation('link_shop', 'fr', $request->input('link_shop.fr'));
    $consumable->setTranslation('link_shop_em', 'fr', $request->input('link_shop_em.fr'));

    // Italian
    $consumable->setTranslation('title', 'it', $request->input('title.it'));
    $consumable->setTranslation('subtitle', 'it', $request->input('subtitle.it'));
    $consumable->setTranslation('description', 'it', $request->input('description.it'));
    $consumable->setTranslation('link_shop', 'it', $request->input('link_shop.it'));
    $consumable->setTranslation('link_shop_em', 'it', $request->input('link_shop_em.it'));

    $consumable->drilling = $request->input('drilling');
    $consumable->article_no = $request->input('article_no');
    $consumable->e_no = $request->input('e_no');

    $consumable->publish = $request->input('publish');
    $consumable->consumable_category_id = $request->input('consumable_category_id');
    $consumable->save();

    // Update or add images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = ConsumableImage::updateOrCreate(
          ['id' => $i['id']], 
          [
            'consumable_id' => $consumable->id,
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

    // Update products
    if ($request->products)
    {
      $consumable->products()->detach();
      foreach($request->products as $product)
      { 
        $consumable_product = new ConsumableProduct([
          'product_id' => $product['id'],
          'consumable_id' => $consumable->id
        ]);
        $consumable_product->save();
      }
    }
    else
    {
      $consumable->products()->detach();
    }  
    

    return response()->json('successfully updated');
  }

  /**
   * Update the order of the given consumables
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function order(Request $request)
  {
    $consumables = $request->get('consumables');
    foreach($consumables as $consumable)
    {
      $p = $this->consumable->find($consumable['id']);
      $p->order = $consumable['order'];
      $p->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given Consumable
   *
   * @param  Consumable $consumable
   * @return \Illuminate\Http\Response
   */
  public function toggle(Consumable $consumable)
  {
    $consumable->publish = $consumable->publish == 0 ? 1 : 0;
    $consumable->save();
    return response()->json($consumable->publish);
  }

  /**
   * Remove a Consumable
   *
   * @param  Consumable $consumable
   * @return \Illuminate\Http\Response
   */
  public function destroy(Consumable $consumable)
  {
    $consumable->delete();
    return response()->json('successfully deleted');
  }
}

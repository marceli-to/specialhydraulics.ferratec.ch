<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Tool;
use App\Models\ProductTool;
use App\Models\ToolImage;
use App\Http\Requests\ToolStoreRequest;
use Illuminate\Http\Request;

class ToolController extends Controller
{
  public function __construct(Tool $tool, ToolImage $toolImage)
  {
    $this->tool       = $tool;
    $this->toolImage  = $toolImage;
  }

  /**
   * Get a list of tool
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection($this->tool->with('products.category')->orderBy('order')->get());
  }

  /**
   * Get a single tool for a given tool or authenticated tool
   * 
   * @param Tool $tool
   * @return \Illuminate\Http\Response
   */
  public function find(Tool $tool)
  {
    $tool = $this->tool->with('images', 'products.category')->findOrFail($tool->id);
    return response()->json($tool);
  }

  /**
   * Store a newly created Tool
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(ToolStoreRequest $request)
  {
    // Store tool
    $tool = new Tool([
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
      'publish' => $request->input('publish'),
    ]);
    $tool->save();

    // Store images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = new ToolImage([
          'tool_id'   => $tool->id,
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
      $tool->products()->detach();
      foreach($request->products as $product)
      { 
        $tool_product = new ProductTool([
          'product_id' => $product['id'],
          'tool_id' => $tool->id
        ]);
        $tool_product->save();
      }
    }  

    return response()->json(['toolId' => $tool->id]);
  }

  /**
   * Update a Tool for a given Tool or authenticated Tool
   *
   * @param Tool $tool
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Tool $tool, ToolStoreRequest $request)
  {
    // Get tool
    $tool = $this->tool->findOrFail($tool->id);
    
    // German
    $tool->setTranslation('title', 'de', $request->input('title.de'));
    $tool->setTranslation('subtitle', 'de', $request->input('subtitle.de'));
    $tool->setTranslation('description', 'de', $request->input('description.de'));
    $tool->setTranslation('link_shop', 'de', $request->input('link_shop.de'));
    $tool->setTranslation('link_shop_em', 'de', $request->input('link_shop_em.de'));

    // French
    $tool->setTranslation('title', 'fr', $request->input('title.fr'));
    $tool->setTranslation('subtitle', 'fr', $request->input('subtitle.fr'));
    $tool->setTranslation('description', 'fr', $request->input('description.fr'));
    $tool->setTranslation('link_shop', 'fr', $request->input('link_shop.fr'));
    $tool->setTranslation('link_shop_em', 'fr', $request->input('link_shop_em.fr'));

    // Italian
    $tool->setTranslation('title', 'it', $request->input('title.it'));
    $tool->setTranslation('subtitle', 'it', $request->input('subtitle.it'));
    $tool->setTranslation('description', 'it', $request->input('description.it'));
    $tool->setTranslation('link_shop', 'it', $request->input('link_shop.it'));
    $tool->setTranslation('link_shop_em', 'it', $request->input('link_shop_em.it'));

    $tool->article_no = $request->input('article_no');
    $tool->e_no = $request->input('e_no');
    $tool->publish = $request->input('publish');
    $tool->save();

    // Update or add images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = ToolImage::updateOrCreate(
          ['id' => $i['id']], 
          [
            'tool_id' => $tool->id,
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
      $tool->products()->detach();
      foreach($request->products as $product)
      { 
        $tool_product = new ProductTool([
          'product_id' => $product['id'],
          'tool_id' => $tool->id
        ]);
        $tool_product->save();
      }
    }
    else
    {
      $tool->products()->detach();
    }  
    

    return response()->json('successfully updated');
  }

  /**
   * Update the order of the given accessories
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function order(Request $request)
  {
    $accessories = $request->get('accessories');
    foreach($accessories as $tool)
    {
      $p = $this->tool->find($tool['id']);
      $p->order = $tool['order'];
      $p->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given Tool
   *
   * @param  Tool $tool
   * @return \Illuminate\Http\Response
   */
  public function toggle(Tool $tool)
  {
    $tool->publish = $tool->publish == 0 ? 1 : 0;
    $tool->save();
    return response()->json($tool->publish);
  }

  /**
   * Remove a Tool
   *
   * @param  Tool $tool
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tool $tool)
  {
    $tool->delete();
    return response()->json('successfully deleted');
  }
}

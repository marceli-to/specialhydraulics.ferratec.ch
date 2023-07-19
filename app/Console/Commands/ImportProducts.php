<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Product;

class ImportProducts extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'import:products';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Import product data data from a comma separated text file';


  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $file = storage_path('app/public/products.txt');
    $handle = fopen($file, 'r');
    if (($handle = fopen($file, 'r')) !== false)
    {
      while (($data = fgetcsv($handle)) !== false)
      {
        $accessory = Product::find($data[0]);
        $accessory->setTranslation('link_shop_ferratec', 'de', $data[1]);
        $accessory->setTranslation('link_shop_ferratec', 'fr', $data[2]);
        $accessory->setTranslation('link_shop_ferratec', 'it', $data[1]);
        $accessory->save();
      }
      fclose($handle);
    }
  }
}

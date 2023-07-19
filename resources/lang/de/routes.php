<?php

return [
  'home' => 'home',
  'products' => 'produkte/{slug}/{productCategory}',
  'product' => 'produkt/{slug}/{product}',
  'accessories' => 'zubehoer/{slugProduct}/{product}/{slug}/{accessoryCategory}',
  'accessory' => 'zubehoer-artikel/{slug}/{accessory}',
  'consumables' => 'verbrauchsmaterial/{slugProduct}/{product}/{slug}/{consumableCategory}',
  'consumable' => 'verbrauchsmaterial-artikel/{slug}/{consumable}',
  'tool' => 'werkzeug/{slug}/{tool}',
  'contact-callback' => 'kontakt/rueckruf/{slug?}/{product?}',
  'contact-callback-submit' => 'kontakt/rueckruf/senden',
  'contact-training' => 'kontakt/schulung/{slug?}/{product?}',
  'contact-training-submit' => 'kontakt/schulung/senden',
  'contact-presentation' => 'kontakt/praesentation/{slug?}/{product?}',
  'contact-presentation-submit' => 'kontakt/praesentation/senden',
  'thank-you' => 'kontakt/danke'
];
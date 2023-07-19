<?php

return [
  'home' => 'home',
  'products' => 'prodotti/{slug}/{productCategory}',
  'product' => 'prodotto/{slug}/{product}',
  'accessories' => 'accessori/{slugProduct}/{product}/{slug}/{accessoryCategory}',
  'accessory' => 'accessori-articolo/{slug}/{accessory}',
  'consumables' => 'consumabili/{slugProduct}/{product}/{slug}/{consumableCategory}',
  'consumable' => 'consumabili-articolo/{slug}/{consumable}',
  'tool' => 'utensile/{slug}/{tool}',
  'contact-callback' => 'contatto/richiamo/{slug?}/{product?}',
  'contact-callback-submit' => 'contatto/richiamo/inviare',
  'contact-training' => 'contatto/formazione/{slug?}/{product?}',
  'contact-training-submit' => 'contatto/formazione/inviare',
  'contact-presentation' => 'contatto/presentazione/{slug?}/{product?}',
  'contact-presentation-submit' => 'contatto/presentazione/inviare',
  'thank-you' => 'contatto/grazie'
];
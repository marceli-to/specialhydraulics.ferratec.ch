<?php

return [
  'home' => 'home',
  'products' => 'produits/{slug}/{productCategory}',
  'product' => 'produit/{slug}/{product}',
  'accessories' => 'accessoires/{slugProduct}/{product}/{slug}/{accessoryCategory}',
  'accessory' => 'accessoire/{slug}/{accessory}',
  'consumables' => 'consommables/{slugProduct}/{product}/{slug}/{consumableCategory}',
  'consumable' => 'consommable-article/{slug}/{consumable}',
  'tool' => 'outil/{slug}/{tool}',
  'contact-callback' => 'contacter/rappeler/{slug?}/{product?}',
  'contact-callback-submit' => 'contacter/rappeler/envoyer',
  'contact-training' => 'contacter/formation/{slug?}/{product?}',
  'contact-training-submit' => 'contacter/formation/envoyer',
  'contact-presentation' => 'kontakt/presentation/{slug?}/{product?}',
  'contact-presentation-submit' => 'kontakt/presentation/envoyer',
  'thank-you' => 'contacter/merci'
];
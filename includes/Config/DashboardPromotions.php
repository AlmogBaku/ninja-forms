<?php

return apply_filters( 'ninja-forms-promotions', array(

  /*
  |--------------------------------------------------------------------------
  | Ninja Mail
  |--------------------------------------------------------------------------
  |
  */

  // 'ninja-mail' => array(
  //   'id' => 'ninja-mail',
  //   'location' => 'dashboard'
  //   'content' => '<a href="#services"><span class="dashicons dashicons-email-alt"></span>' . __( 'Hosts are bad at sending emails. Improve the reliability of your submission emails! ', 'ninja-forms' ) . '<br /><span class="cta">' . __( 'Try our new Ninja Mail service!', 'ninja-forms' ) . '</span></a>',
  //   'script' => "
  //     setTimeout(function(){ /* Wait for services to init. */
  //       Backbone.Radio.channel( 'dashboard' ).request( 'more:service:ninja-mail' );
  //     }, 500);
  //   "
  // ),

  /*
  |--------------------------------------------------------------------------
  | Ninja Shop
  |--------------------------------------------------------------------------
  |
  */

  'ninja-shop'  => array(
    'id'        => 'ninja-shop',
    'location'  => 'dashboard',
    'type'      => 'ninja-shop',
    'content'   => '<a href="https://getninjashop.com/?utm_medium=dashboard_banner&utm_source=ninja-forms&utm_campaign=Awareness" target="_blank" style="color:#FFF !important;background:#5DA54B;"><span class="dashicons dashicons-cart"></span>' . __( 'Are you frustrated with complicated eCommerce solutions?', 'ninja-forms' ) . '<br /><span class="cta">' . __( 'Start Selling Today With Ninja Shop!', 'ninja-forms' ) . '</span></a>',
    'script'    => "",
  ),


  /*
  |--------------------------------------------------------------------------
  | Personal 20
  |--------------------------------------------------------------------------
  |
  */

  'personal-20' => array(
    'id'        => 'personal-20',
    'location'  => 'dashboard',
    'type'      => 'personal',
    'content'   => '<a href="https://ninjaforms.com/personal-membership/?utm_campaign=ninja-forms-plugin&utm_source=dashboard&utm_medium=banner-ad&utm_content=personal-20" target="_blank" class="nf-remove-promo-styling"><img src="' . Ninja_forms::$url . 'assets/img/promotions/dashboard/personal-20.svg"></a>',
    'script'    => "",
  ),

  
  /*
  |--------------------------------------------------------------------------
  | Personal 50
  |--------------------------------------------------------------------------
  |
  */

  'personal-50' => array(
    'id'        => 'personal-50',
    'location'  => 'dashboard',
    'type'      => 'personal',
    'content'   => '<a href="https://ninjaforms.com/personal-membership/?utm_campaign=ninja-forms-plugin&utm_source=dashboard&utm_medium=banner-ad&utm_content=personal-50" target="_blank" class="nf-remove-promo-styling"><img src="' . Ninja_forms::$url . 'assets/img/promotions/dashboard/personal-50.svg"></a>',
    'script'    => "",
  ),

  /*
  |--------------------------------------------------------------------------
  | Send WP
  |--------------------------------------------------------------------------
  |
  */

  'sendwp-banner' => array(
    'id'          => 'sendwp-banner',
    'location'    => 'dashboard',
    'type'        => 'sendwp',
    'content'     => '<a href="https://sendwp.com/?utm_campaign=ninja-forms-plugin&utm_source=dashboard&utm_medium=banner-ad&utm_content=new-way" target="_blank" class="nf-remove-promo-styling"><img src="' . Ninja_forms::$url . 'assets/img/promotions/dashboard/sendwp-new-way.png"></a>',
    'script'      => ""
  ),

));

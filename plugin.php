<?php

/**
 * Plugin Name: mytheme-blocks
 * Plugin URI: https://ozzygonzalez.com
 * Description: blocks
 * Author: Ozzy Gonzalez
 * Author URI: https://ozzygonzalez.com
 */

if (!defined('ABSPATH')) {
  exit;
}

function mytheme_blocks_register()
{

  wp_register_script(
    'mytheme-blocks-firstblock-editor-script',
    plugins_url('blocks/firstblock/index.js', __FILE__),
    array('wp-blocks', 'wp-i18n')
  );

  register_block_type(
    'mytheme-blocks/firstblock',
    array(
      'editor_script' => 'mytheme-blocks-firstblock-editor-script',
      // 'script'
      // 'style'
      // 'editor_style'
    )
  );
}
add_action('init', 'mytheme_blocks_register');

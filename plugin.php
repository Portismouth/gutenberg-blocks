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

function mytheme_blocks_register_block_type($blockName, $options = array())
{
  register_block_type(
    'mytheme-blocks/' . $blockName,
    array_merge(
      array(
        'editor_script' => 'mytheme-blocks-editor-script',
        'editor_style' => 'mytheme-blocks-editor-style',
        'script' => 'mytheme-blocks-script',
        'style' => 'mytheme-blocks-style'
      ),
      $options
    )
  );
}

function mytheme_blocks_register()
{

  wp_register_script(
    'mytheme-blocks-editor-script',
    plugins_url('dist/editor.js', __FILE__),
    array(
      'wp-blocks',
      'wp-i18n',
      'wp-element'
    )
  );

  wp_register_script(
    'mytheme-blocks-script',
    plugins_url('dist/script.js', __FILE__),
    array('jquery')
  );

  wp_register_style(
    'mytheme-blocks-editor-style',
    plugins_url('dist/editor.css', __FILE__),
    array('wp-edit-blocks')
  );

  wp_register_style(
    'mytheme-blocks-style',
    plugins_url('dist/style.css', __FILE__)
  );

  mytheme_blocks_register_block_type('firstblock');
  mytheme_blocks_register_block_type('secondblock');
}
add_action('init', 'mytheme_blocks_register');

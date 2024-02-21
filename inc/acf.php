<?php
function register_blocks()
{
  if (function_exists('acf_register_block')) {
    acf_register_block( array(
        'name' => 'team',
        'title' => 'Команда',
        'render_template' => 'blocks/team/template.php',
        'category' => 'formatting',
        'icon' => 'editor-ul',
        'mode' => 'edit'
    ));
  }
}
add_action('acf/init', 'register_blocks');
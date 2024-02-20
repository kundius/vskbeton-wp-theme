<?php

function views_callback()
{
  $id = intval($_POST['id']);
  $increase = intval($_POST['increase']);
  $count_key = "post_views_count";

  if (!$id) {
    echo json_encode([
      'success' => false,
    ]);

    \wp_die();
  }

  $count = get_post_meta($id, $count_key, true);

  $count = $count || 0;

  if ($increase) {
    $count = $count + 1;
    update_post_meta($id, $count_key, $count);
  }

  echo json_encode([
    'success' => true,
    'count' => $count,
  ]);

  \wp_die();
}
\add_action('wp_ajax_views', 'views_callback');
\add_action('wp_ajax_nopriv_views', 'views_callback');

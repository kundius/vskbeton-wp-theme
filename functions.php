<?php

require 'inc/post-types.php';
require 'inc/pagination.php';
require 'inc/shortcodes.php';
require 'inc/sidebars.php';
require 'inc/seo.php';
require 'inc/views.php';
require 'inc/more-articles.php';
require 'inc/more-certificates.php';
require 'inc/acf.php';

function load_template_part($template_name, $part_name = null)
{
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

// THEME
\add_theme_support('align-wide');
\add_theme_support('responsive-embeds');
\add_theme_support('editor-styles');
\add_theme_support('wp-block-styles');
\add_post_type_support('page', ['excerpt']);
add_filter('widget_text', 'do_shortcode');
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_image_size('article-medium', 600, 320, true);
add_image_size('article-large', 1200, 600, true);
register_nav_menus([
    'main' => 'Основное меню',
]);

add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
]);

// ADMIN PANEL
\add_action('admin_init', function () {
    if (isset($_GET['post'])) {
        $post_ID = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_ID = $_POST['post_ID'];
    }

    if (!isset($post_ID) || empty($post_ID)) {
        return;
    }

    // $page_template = get_post_meta($post_ID, '_wp_page_template', true);
    // if ($page_template == 'template-about.php') {
    //     remove_post_type_support('page', 'editor');
    //     remove_post_type_support('page', 'thumbnail');
    // }
    \add_shortcode('template_part', function ($atts, $content = null) {
        $tp_atts = \shortcode_atts([
            'path' => null,
        ], $atts);
        ob_start();
        \get_template_part($tp_atts['path']);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    });
});


// SVG
add_filter('wp_kses_allowed_html', function ($tags) {
    $tags['svg'] = [
        'xmlns' => [],
        'fill' => [],
        'viewbox' => [],
        'role' => [],
        'aria-hidden' => [],
        'focusable' => [],
        'class' => [],
    ];

    $tags['path'] = [
        'd' => [],
        'fill' => [],
    ];

    $tags['use'] = [
        'xmlns:xlink' => [],
        'xlink:href' => [],
    ];

    return $tags;
});


// ASSETS
add_action('wp', function () {
    $theme = wp_get_theme();

    \wp_register_style('theme-style', \get_stylesheet_uri(), [], $theme->get('Version'));
    \wp_register_script('scripts', \get_theme_file_uri('dist/scripts/bundle.js'), [], $theme->get('Version'), true);
});
add_action('wp_enqueue_scripts', function () {
    \wp_enqueue_script('scripts');
});
add_action('wp_print_styles', function () {
    \wp_enqueue_style('theme-style');
});
add_filter('stylesheet_uri', function (string $stylesheet_uri) {
    $file = 'dist/styles/bundle.css';

    if (file_exists(\get_theme_file_path($file))) {
        return \get_theme_file_uri($file);
    }
return $stylesheet_uri;
});


add_action( 'wp_enqueue_scripts', 'custom_css_add_scripts' );
function custom_css_add_scripts() {
	wp_enqueue_style( 'jquery_ui', get_stylesheet_directory_uri() . '/vendor/styles/jquery-ui.css' );
 	wp_enqueue_style( 'calc_css', get_stylesheet_directory_uri() . '/vendor/styles/calc.css' );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/vendor/scripts/jquery-2.2.4.min.js', array(), '1.0', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/vendor/scripts/jquery-ui.min.js', array(), '1.0', true );
	wp_enqueue_script( 'jquery-mask', get_template_directory_uri() . '/vendor/scripts/jquery.mask.min.js', array(), '1.0', true );
    wp_enqueue_script( 'all-js', get_template_directory_uri() . '/vendor/scripts/all.js', array(), '1.0', true );
}

add_filter('wpcf7_autop_or_not', '__return_false');

// add_action('init', function () {
//     if (!\is_admin()) {
//         \wp_deregister_script('jquery');
//         \wp_register_script('jquery', false);
//     }
// });


// AJAX
\add_action('wp_enqueue_scripts', function () {
    \wp_localize_script('scripts', 'theme_ajax', [
        'url' => \admin_url('admin-ajax.php'),
    ]);
}, 99);
// function get_attachment_callback()
// {
//     $id = intval($_POST['id']);

//     if (!$id) {
//         echo json_encode([
//             'success' => false,
//         ]);

//         \wp_die();
//     }

//     echo json_encode([
//         'success' => true,
//         'data' => [
//             'title' => \get_the_title($id),
//             'url' => \wp_get_attachment_url($id),
//             'caption' => \wp_get_attachment_caption($id),
//         ],
//     ]);

//     \wp_die();
// }
// \add_action('wp_ajax_get_attachment', 'get_attachment_callback');
// \add_action('wp_ajax_nopriv_get_attachment', 'get_attachment_callback');

add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});


// Archives.php only shows content of type 'post', but you can alter it to include custom post types.
// function namespace_add_custom_types($query)
// {
//     if (is_category()) {
//         $post_type = array(
//             'nav_menu_item',
//             'news',
//             'interview',
//             'analytics',
//             'partners',
//             'events' // 'post'
//         );
//         if (get_query_var('post_type')) {
//             $post_type = get_query_var('post_type');
//         }
//         if (isset($query->query_vars['post_type'])) {
//             $post_type = $query->query_vars['post_type'];
//         }
//         $query->set('post_type', $post_type);
//         return $query;
//     }
// }
// add_filter('pre_get_posts', 'namespace_add_custom_types');


// add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);
// function current_type_nav_class($classes, $item)
// {
//     $post_type = get_query_var('post_type');

//     if ($item->type === 'custom') {
//         if ($post_type === trim($item->url, '\/')) {
//             array_push($classes, 'current-menu-item');
//         }
//     }

//     return $classes;
// }


// add_filter('wpcf7_autop_or_not', '__return_false');

// remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );
// add_filter( 'sanitize_title', 'wpse5029_sanitize_title_with_dashes' );
// function wpse5029_sanitize_title_with_dashes($title) {
//     $title = strip_tags($title);
//     // Preserve escaped octets.
//     $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
//     // Remove percent signs that are not part of an octet.
//     $title = str_replace('%', '', $title);
//     // Restore octets.
//     $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

//     $title = remove_accents($title);
//     if (seems_utf8($title)) {
//         //if (function_exists('mb_strtolower')) {
//         //    $title = mb_strtolower($title, 'UTF-8');
//         //}
//         $title = utf8_uri_encode($title, 200);
//     }

//     //$title = strtolower($title);
//     $title = preg_replace('/&.+?;/', '', $title); // kill entities
//     $title = str_replace('.', '-', $title);
//     // Keep upper-case chars too!
//     $title = preg_replace('/[^%a-zA-Z0-9 _-]/', '', $title);
//     $title = preg_replace('/\s+/', '-', $title);
//     $title = preg_replace('|-+|', '-', $title);
//     $title = trim($title, '-');

//     return $title;
// }

add_filter('the_title', 'the_title_filter', 10, 2);

function the_title_filter($post_title, $post_id)
{
    return str_replace('\n', '<br />', $post_title);
}

add_filter('single_cat_title', 'single_cat_title_filter');

function single_cat_title_filter($term_name)
{
    return str_replace('\n', '<br />', $term_name);
}

function wf_top_line() {
	echo '<div class="uptop">
		<div class="container">
			<div class="phones">
				<a href="/kontakty" class="adrs"><span>Воронежская обл., с-з "Масловский", ул. Ленина, д.152Б</span></a>
				<a href="/kontakty" class="wrkt"><span>Пн.-Сб.: с 7:00 до 19:00 | Вс.: выходной</span></a>
				<a href="https://wa.me/+79521039869" class="wa" target="_blank">
				    <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Black" transform="translate(-700.000000, -360.000000)" fill="#ffffff">
                                <path d="M723.993033,360 C710.762252,360 700,370.765287 700,383.999801 C700,389.248451 701.692661,394.116025 704.570026,398.066947 L701.579605,406.983798 L710.804449,404.035539 C714.598605,406.546975 719.126434,408 724.006967,408 C737.237748,408 748,397.234315 748,384.000199 C748,370.765685 737.237748,360.000398 724.006967,360.000398 L723.993033,360.000398 L723.993033,360 Z M717.29285,372.190836 C716.827488,371.07628 716.474784,371.034071 715.769774,371.005401 C715.529728,370.991464 715.262214,370.977527 714.96564,370.977527 C714.04845,370.977527 713.089462,371.245514 712.511043,371.838033 C711.806033,372.557577 710.056843,374.23638 710.056843,377.679202 C710.056843,381.122023 712.567571,384.451756 712.905944,384.917648 C713.258648,385.382743 717.800808,392.55031 724.853297,395.471492 C730.368379,397.757149 732.00491,397.545307 733.260074,397.27732 C735.093658,396.882308 737.393002,395.527239 737.971421,393.891043 C738.54984,392.25405 738.54984,390.857171 738.380255,390.560912 C738.211068,390.264652 737.745308,390.095816 737.040298,389.742615 C736.335288,389.389811 732.90737,387.696673 732.25849,387.470894 C731.623543,387.231179 731.017259,387.315995 730.537963,387.99333 C729.860819,388.938653 729.198006,389.89831 728.661785,390.476494 C728.238619,390.928051 727.547144,390.984595 726.969123,390.744481 C726.193254,390.420348 724.021298,389.657798 721.340985,387.273388 C719.267356,385.42535 717.856938,383.125756 717.448104,382.434484 C717.038871,381.729275 717.405907,381.319529 717.729948,380.938852 C718.082653,380.501232 718.421026,380.191036 718.77373,379.781688 C719.126434,379.372738 719.323884,379.160897 719.549599,378.681068 C719.789645,378.215575 719.62006,377.735746 719.450874,377.382942 C719.281687,377.030139 717.871269,373.587317 717.29285,372.190836 Z" id="Whatsapp"></path>
                            </g>
                        </g>
                    </svg>
                    <span>+7 (952) 103-98-69</span>
                </a>
                <a href="tel:+74732410797" class="tel">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                        	<path d="M256,32c123.5,0,224,100.5,224,224S379.5,480,256,480S32,379.5,32,256S132.5,32,256,32 M256,0C114.625,0,0,114.625,0,256
                        		s114.625,256,256,256s256-114.625,256-256S397.375,0,256,0L256,0z M398.719,341.594l-1.438-4.375
                        		c-3.375-10.062-14.5-20.562-24.75-23.375L334.688,303.5c-10.25-2.781-24.875,0.969-32.405,8.5l-13.688,13.688
                        		c-49.75-13.469-88.781-52.5-102.219-102.25l13.688-13.688c7.5-7.5,11.25-22.125,8.469-32.406L198.219,139.5
                        		c-2.781-10.25-13.344-21.375-23.406-24.75l-4.313-1.438c-10.094-3.375-24.5,0.031-32,7.563l-20.5,20.5
                        		c-3.656,3.625-6,14.031-6,14.063c-0.688,65.063,24.813,127.719,70.813,173.75c45.875,45.875,108.313,71.345,173.156,70.781
                        		c0.344,0,11.063-2.281,14.719-5.938l20.5-20.5C398.688,366.062,402.062,351.656,398.719,341.594z" fill="#ffffff"/>
                        </g>
                        
                    </svg>
                    <span>+7 (473) 241-07-97</span>
                </a>
			</div>
		</div>
	</div>';
}
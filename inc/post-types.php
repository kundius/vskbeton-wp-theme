<?php

function register_cpts() {
	// News
	$labels0 = array(
		'name' => 'Товары',
		'singular_name' => 'Товар', // Добавить->Запись (Именительный падеж)
		'add_new' => 'Добавить товар', // в меню и на кнопке
		'add_new_item' => 'Добавить товар', // заголовок
		'edit_item' => 'Редактировать товар',
		'new_item' => 'Новый товар',
		'all_items' => 'Все товары', // подменю в админке
		'view_item' => 'Просмотреть товар',
		'search_items' => 'Поиск товаров',
		'not_found' =>  'Товаров не найдено.',
		'not_found_in_trash' => 'Товаров в корзине не найдено.',
		'menu_name' => 'Товары' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels0,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true,
		'menu_icon' => 'dashicons-text-page',
		'menu_position' => 20, // порядок в меню
		'taxonomies' => array(),
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'post-formats')
	);
	register_post_type('product', $args);
}
add_action('init', 'register_cpts');

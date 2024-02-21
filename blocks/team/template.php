<?php
$list = get_field('items');
echo '<div class="list-questions">';
foreach ($list as $item) {
	echo '<div class="list-questions__item">';
	echo '<div class="list-questions__question">' . esc_html($item['name']) . '</div>';
	echo '<div class="list-questions__answer">' . esc_html($item['job']) . '</div>';
	echo '<div class="list-questions__answer">' . esc_html($item['description']) . '</div>';
	echo '</div>';
}
echo '</div>';

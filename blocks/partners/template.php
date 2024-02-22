<?php
$items = get_field('items');
// $groups = array_chunk($items, 7);
?>
<?php if (count($items) > 0): ?>
	<div class="wp-block-partners">
		<div class="partners">
			<div class="partners__nav">
				<div class="slider-nav">
					<button class="slider-nav__prev">Назад</button>
					<button class="slider-nav__next">Пролистать вперёд</button>
				</div>
			</div>
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php foreach ($items as $item): ?>
						<div class="swiper-slide partners-slide partners-slide_<?php echo ($key % 7) ?>">
							<img class="partners-slide__image" src="<?php echo $item['image']['url'] ?>">
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
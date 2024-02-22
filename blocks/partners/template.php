<?php
$items = get_field('items');
$groups = array_chunk($items, 7);
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
					<?php foreach ($groups as $group): ?>
						<div class="swiper-slide partners-slide">
							<div class="partners-slide__grid">
								<?php foreach ($group as $item): ?>
									<div class="partners-slide__cell">
										<img class="partners-slide__image" src="<?php echo $item['image']['url'] ?>">
									</div>
								<?php endforeach ?>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<?php $items = get_field('items'); ?>
<?php if (count($items) > 0): ?>
	<div class="wp-block-team">
		<div class="team">
			<div class="team__nav">
				<div class="slider-nav">
					<button class="slider-nav__prev">Назад</button>
					<button class="slider-nav__next">Пролистать вперёд</button>
				</div>
			</div>
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php foreach ($items as $key => $item): ?>
						<div class="swiper-slide team-slide team-slide_<?php echo $key % 3 ?>">
							<div class="team-slide__wrapper">
								<div class="team-slide__image">
									<img src="<?php echo $item['image']['url'] ?>">
								</div>
								<div class="team-slide__content">
									<div class="team-slide__name">
										<?php echo $item['name'] ?>
									</div>
									<div class="team-slide__job">
										<?php echo $item['job'] ?>
									</div>
									<div class="team-slide__description">
										<?php echo $item['description'] ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
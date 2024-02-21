<?php $items = get_field('items'); ?>
ffffffffffffffffffffffff
<?php if (count($items) > 0): ?>
	<div class="team">
		<div class="team-nav">
			<button class="team-nav__prev">Назад</button>
			<button class="team-nav__next">Пролистать вперёд</button>
		</div>
		<div class="swiper">
			<div class="swiper-wrapper">
				<?php foreach ($items as $item): ?>
					<div class="swiper-slide team-slide">
						<div class="team-slide__figure">
							<img class="team-slide__image" src="<?php echo $item['image']['url'] ?>">
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
<?php endif ?>
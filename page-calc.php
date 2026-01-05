<?php
/*
Template Name: Калькулятор
*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
	<?php get_template_part("partials/head"); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div class="page">
		<?php get_template_part("partials/header"); ?>

		<main class="main">
			<div class="container">
				<div class="page-headline">
					<h1 class="page-headline__title"><?php the_title(); ?></h1>
				</div>

				<div class="calc">
					<div class="calc-block calc-main">
						<div class="calc-top">
							<div class="calc-title">Выберите параметры для расчета</div>
							<form id="#calc-form">
								<div class="calc-form-line">
									<div class="calc-form-item">
										<label class="calc-label">Тип смеси</label>
										<div class="calc-select">
											<select name="btype" class="styled" id="ui-id-1" style="display: none;">
												<option value="Не выбрано">Выбрать</option>
												<option value="b1" data-tip="b1">Бетон</option>
												<option value="b2" data-tip="p1">Пескобетон</option>
												<option value="b3" data-tip="r1">Раствор</option>
											</select>
										</div>
									</div>
									<div class="calc-form-item">
										<label class="calc-label">Марка</label>
										<div class="calc-select">
											<select name="bmarka" class="styled" id="ui-id-2" style="display: none;">
												<option value="Не выбрано">Выбрать</option>
												<option value="5400" data-tip="b1">М 100 (В 7,5) Фр. 5-20 мм</option>
												<option value="5500" data-tip="b1">М 150 (В 10) Фр. 5-20 мм</option>
												<option value="5700" data-tip="b1">М 150 (В 12,5) Фр. 5-20 мм</option>
												<option value="6000" data-tip="b1">М 200 (В 15) Фр. 5-20 мм</option>
                                                <option value="6200" data-tip="b1">М 250 (В 20) Фр. 5-20 мм</option>
                                                <option value="6500" data-tip="b1">М 300 (В 22,5) Фр. 5-20 мм</option>
                                                <option value="6700" data-tip="b1">М 350 (В 25) Фр. 5-20 мм</option>
                                                <option value="7300" data-tip="b1">М 400 (В 30) Фр. 5-20 мм</option>
                                                <option value="7500" data-tip="b1">М 450 (В 35) Фр. 5-20 мм</option>
                                                <option value="8100" data-tip="b1">М 500 (В 40) Фр. 5-20 мм</option>

                                                <option value="3700" data-tip="p1">М 100 (В 7,5)</option>
                                                <option value="4500" data-tip="p1">М 150 (В 12,5)</option>
                                                <option value="5200" data-tip="p1">М 200 (В 15)</option>
                                                <option value="5600" data-tip="p1">М 250 (В 20)</option>
                                                <option value="5900" data-tip="p1">М 300 (В 22,5)</option>

                                                <option value="4000" data-tip="r1">М 100</option>
                                                <option value="4600" data-tip="r1">М 150</option>
                                                <option value="5400" data-tip="r1">М 200</option>
                                                <option value="6000" data-tip="r1">М 250 </option>
                                                <option value="6600" data-tip="r1">М 300</option>
											</select>
										</div>
									</div>
									<div class="calc-form-item">
										<label class="calc-label">Объем, м3</label>
										<div class="calc-select">
    										<input name="bvalue" type="number" step="any" min="0,1" class="calc-input" value="0,1">
										</div>
									</div>
									<div class="calc-form-item">
										<label class="calc-label">Доставка</label>
										<div class="calc-select">
											<select name="bdeliver" class="styled" id="ui-id-3" style="display: none;">
												<option value="Не выбрано">Выбрать</option>
												<option value="0">Без доставки</option>
												<option value="600">До 10 км</option>
												<option value="700">До 15 км</option>
												<option value="800">До 20 км</option>
                                                <option value="900">До 25 км</option>
												<option value="1000">До 35 км</option>
												<option value="1400">До 50 км</option>
												<option value="1700">До 60 км</option>
                                                <option value="1900">До 70 км</option>
												<option value="2200">До 80 км</option>
												<option value="2700">До 100 км</option>
											</select>
										</div>
									</div>
								</div>
								<div class="calc-price">
									<div class="calc-price-button">
										<a href="/wp-content/uploads/2024/09/prajs-s-30.09.2024-g.pdf" class="calc-button" download>Скачать прайс-лист</a>
									</div>
									<div class="calc-price-text">
										Стоимость материала: <b class="pmat">0 рублей</b><br>
										Стоимость доставки: <b class="pdel">0 рублей</b>
									</div>
								</div>
							</form>
						</div>
						<div class="calc-total">
							Итого общая стоимость: <b>0 рублей</b>
						</div>
					</div>
					<div class="calc-block">
						<div class="calc-top">
							<div class="calc-title">Сделать заказ просто — оставьте контактный <br>номер телефона, и мы Вам перезвоним</div>
						</div>
						<div class="calc-bottom">
							<?= do_shortcode('[contact-form-7 id="1fe6012" title="Форма калькулятора"]') ?>
						</div>
					</div>
					<div class="calc-info">
						<?the_content()?>
					</div>
				</div>


			</div>
		</main>

	</div>

	<?php get_template_part("partials/footer"); ?>

    <?php wp_footer(); ?>

</body>

</html>

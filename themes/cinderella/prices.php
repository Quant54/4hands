<?php /* Template Name: prices */ ?>
<?php get_header(); ?>

	<div class="prices-mobile">
		<h1 class="prices__title">Не доступно в мобильно версии</h1>
	</div>


	<div class="prices-page">

		<div class="container">
			<div class="row row_prices_upper">
				<div class="col-md-12">

					<h1 class="prices__title">Узнайте цены на услуги в вашем городе:</h1>


				</div>


			</div>

			<div class="row row-price-cities">
				<div class="col-md-12">
					<h3>Города:</h3>
					<div class="price-items-box">

<?php
$cities = get_terms( 'city', array(
    'hide_empty' => false,
) );
foreach ($cities as $city  ) {
	?>
	<div class="price-item">
		<div data-code="715" class="pi-title pi-title-js" ><?php echo $city->name; ?></div>
	</div>
	<?php
}
?>


					</div>
				</div>
			</div>

			<div class="row row-address">
				<div class="col-md-12">

					<div class="current__city-container current__city-container_prices">
						<span class="prices__current-city"></span>
					</div>

					<div class="address_list"><div class="f-contacts">

							<div class="address_list-content">

							</div>

						</div></div>
				</div>
			</div>






		</div>

	</div>


<?php get_footer(); ?>
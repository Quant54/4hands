<?php /* Template Name: prices */ ?>
<?php get_header();

$domain_city = esc_attr( get_option( 'studios_city_options' ) );
var_dump($domain_city);

?>

    <div class="prices-page">

        <div class="container">


			<?php

			if ( ( strlen( $domain_city ) > 0 ) && ( $domain_city != 'none' ) ) {  //Если поддомен али нет

				?>


                <div class="row row_prices_upper">
                    <div class="col-md-12">

                        <h1 class="prices__title">Узнайте цены на услуги в вашем городе:</h1>


                    </div>


                </div>
                <div class="row row-address">
                    <div class="col-md-12">



                        <div class="address_list">
                            <div class="f-contacts">

                                <div class="address_list-content">
									<?php

									$args = array(
										'post_type'              => 'studio',
										'orderby'                => 'menu_order',
										'order'                  => 'ASC',
										'no_found_rows'          => false,
										'update_post_term_cache' => false,
										'posts_per_page'         => 10006,
										'paged'                  => 1,
										'tax_query'              => array(

											array(
												'taxonomy' => 'city',
												'field'    => 'slug',
												'terms'    => $domain_city,
											),
										),

									);

									$studios = new WP_Query( $args );
									while ( $studios->have_posts() ): $studios->the_post();
										$ptitle = str_replace( '&#187;', '»', get_the_title() );
										$ptitle = str_replace( '&#171;', '«', $ptitle );

									endwhile;

									?>
                                    <div class="c-center">
                                        <h3><?php echo get_term_by( 'slug', $domain_city, 'city' )->name; ?>:</h3>

                                        <div class="price-items-box">
											<?php
											$i = 1740;
											while ( $studios->have_posts() ): $studios->the_post();
												$i ++;
												?>
                                                <div class="price-item">
                                                    <div data-price="<?php echo $i; ?>"
                                                         class="pi-title2"><?php echo get_term_by( 'slug', $domain_city, 'city' )->name . ", " . get_the_title(); ?></div>
                                                </div>

												<?php

											endwhile;

											?>

                                        </div><!--class="price-items-box"-->


										<?php
										$i = 1740;
										while ( $studios->have_posts() ): $studios->the_post();
											$i ++;
											?>
                                            <div id="price_<?php echo $i; ?>" class="price_detail clearfix">
                                                <ul class="price-column">
													<?php

													$pprice  = get_post_meta( get_the_id(), 'studio_price' )[0];
													$explode_price = explode( "#", $pprice );
													foreach ( $explode_price as $item ) {
														echo "";
														if ( $item[0] == "{" ) {
															echo "<div class=\"price-item shares\"><div class=\"price_title\">" . substr( $item, 1, strlen( $item ) - 2 ) . "</div>";
														} else {
															echo do_shortcode( $item )."</div>";
														}
														echo "";
													}
													?>

                                                </ul>
                                            </div>
                                            <div class="clear"></div>
											<?php
										endwhile;
										?>


                                        <div class="c-center">
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
				<?php


			} else {
				?>

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
							foreach ( $cities as $city ) {
								?>
                                <div class="price-item">
                                    <div data-code="715" class="pi-title pi-title-js"><?php echo $city->name; ?></div>
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

                        <div class="address_list">
                            <div class="f-contacts">

                                <div class="address_list-content">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
				<?php
			} ?>


        </div>

    </div>


<?php get_footer(); ?>
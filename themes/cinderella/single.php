<?php get_header(); ?>
<!--	--><?php

	?>
<div class="text_block clearfix">
<section class="news-page">
	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<h1 class="news-page__title"> <?php  the_title();  ?></h1>
			</div>
		</div>
		<div class="row">

			<div class="col-md-6 col_news-item">
				<div class="news-item news-item_sp" style='background: url("<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"); background-size: 100%;'>
			</div>

			</div>


			<div class="col-md-6 col_news-info">
				<div class="news-page__info">
                    <?php	while ( have_posts() ) {
					the_post();
                        the_content();
					}


                   ?>
				<div class="news-page__link-container">
					<a class="news-page__arrow-btn" href="/news/"><img src="http://newoc.ru/wp-content/themes/cinderella/assets/images/tmp/news-arrow.png" alt=""></a>
					<a class="news-page__btn" href="/news/">К списку новостей</a>
				</div>
                    <div class="row">
                        <?php if ( comments_open() || get_comments_number() ) { ?>
                            <div class="stm_post_comments">
                                <?php comments_template(); ?>
                            </div>
                        <?php } ?>
                    </div>

			</div>
		</div>

	</div>
</section>
</div>
<?php get_footer(); ?>

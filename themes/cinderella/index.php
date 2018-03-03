<?php get_header(); ?>

    <div class="text_block clearfix">

    <section class="news">
        <div class="container">

            <div class="row">






                    <?php if( have_posts() ){ ?>

                                <?php

                                while ( have_posts() ) { the_post();?>
<div class="col-xs-12">
                                    <div class="news-item smallnewslogo " style=' background: url("<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"); background-size: 100%;'>


                                    </div>
    <div style="
position: relative;">
        <a class="news-item__link" href="<?php the_permalink(); ?>">
            <div class="excerpt">
                <span class="news-item__title" style="margin-left:0px; font-size:20px; text-transform: uppercase ;"> <?php the_title();  ?></span>
                <time class="news-item__date"><?php echo get_the_date( 'd' ); ?> <?php echo get_the_date( 'M' ); ?> <?php echo get_the_date( 'Y' ); ?></time>
              <?php the_excerpt(); ?>
            </div>
        </a>
    </div>
</div>
                                    <?php

                                }
                                ?>


                    <?php } ?>









            </div>

            <!-- 	<div class="row">
                        <div class="col-md-12">
                            <h3 class="services-info__title_lower">Здесь Вам всегда рады!</h3>
                            <a href="/price/" class="services-info__btn">все адреса</a>
                        </div>
                    </div>
             -->

        </div>
    </section>




</div>

<?php get_footer(); ?>
<?php 

// function add_style_and_script(){
// 	wp_enqueue_style('bootstrap-css','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
// 		wp_enqueue_style('bootstrap-css-theme','http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
// 		wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

// }

// add_action( 'wp_enqueue_scripts','add_style_and_script');

function dwwp_sample_shortcode($atts, $content=null) {
$atts = shortcode_atts(
array(
'title'=>'Default title',
'src'=>'www.google.com',
),$atts
);
print_r($atts);
print_r($content);


	return "<h1>". $atts['title']."</h1>";


}
function prefix_add_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}

add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );


function prefix_filter_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style-filter', plugins_url('css/style-filter.css', __FILE__) );
    wp_enqueue_style( 'prefix-style-filter' );
     wp_enqueue_style('jquery-ui-css','https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');

     //wp_enqueue_script( 'jquery-ui-js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.12.1', true );
    wp_enqueue_script( 'filter-js',  plugins_url('js/filter.js', __FILE__),array('jquery','jquery-ui-slider'),'0.0.1',true);
}
add_action( 'wp_enqueue_scripts', 'prefix_filter_stylesheet' );


function dwwp_show_services($atts, $content=null) {
//  return $atts['type'];
    $args = array(
        'post_type' => 'service' ,
        'orderby'=>'menu_order',
        'order'=>'ASC',
        'no_found_rows'=>false,
        'update_post_term_cache'=>false,
        'posts_per_page' => 10006,
        'paged'=>1,
        'tax_query' => array(

            array(
                'taxonomy' => 'type',
                'field'    => 'slug',
                'terms'    => $atts['type'],
            ),
        ),
    );
    $str='<section class=\"services-list\">';
  $services = new WP_Query( $args  );

    while ($services->have_posts()):  	$services->the_post();
        $str.='<div class="service-item__wrapper">
                    <div class="service-item">
                        <div class="service-item__image-container">
                        '.get_the_post_thumbnail( get_the_id(), array( 350, 350) ).'
                          
                        </div>

                        <div class="service-item__info-container">

                            <div class="service-item__info-block">
                                <a href=" '.get_post_meta(get_the_id(), 'service_link')[0].'" class="service-item__name">'.esc_html(get_the_title()).'</a>
                            </div>

                            <div class="service-item__time-block clearfix">
                           ';
                        if ($atts['time']!='no') $str.='<span class="service-item__time" > '.get_post_meta(get_the_id(), 'service_time')[0].' Минут </span >';

                              $str.='  <a href="#" class="service-item__info-icon"></a>
                            </div>

                            <div class="service-item__price-block clearfix">
                                <div class="service-item__price">от '.get_post_meta(get_the_id(), 'service_price')[0].' ₽</div>
                                <a href="#" class="service-item__link ms_booking" data-url="https://w12204.yclients.com">Записаться</a>
                            </div>
                        </div>

                        <div class="service-item__description">'.get_post_meta(get_the_id(), 'service_description')[0].'
                        </div>
                    </div>
                </div>

';

     //   $str.='<div class="imagesize">'.get_the_post_thumbnail( get_the_id(), array( 350, 350) ).'</div>';

    endwhile;
    $str.='</section>';
return $str;
}
//
//add_shortcode('house_listing_with_parameters','house_listing_with_parameters');
//add_shortcode('house_listing','dwwp_show_houses');
//add_shortcode('house_filter','dwwp_filter_houses');

add_shortcode('service_listing','dwwp_show_services');
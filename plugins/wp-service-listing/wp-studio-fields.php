<?php
function dwwp_add_custom_metabox2() {
global $pagenow, $typenow; 
if ($typenow!='studio') return;
add_meta_box(
    'dwwp_meta',
    'Параметры студии',
'dwwp_meta_callback2',
    '',
    'normal',
    'core'
);
}
function dwwp_meta_callback2(){
    global $pagenow, $typenow; 
    if ($typenow!='studio') return;
  wp_nonce_field(basename( __FILE__ ),'dwwp_studio_nonce');
  $dwwp_stored_meta=get_post_meta(get_the_ID());
      // echo "<pre>";
      // var_dump($dwwp_stored_meta);
      // echo "</pre>";
    ?>
    <div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_type" class="dwwp-row-title">Тип</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_type" id="studio_type" value="<?php if (!empty($dwwp_stored_meta['studio_type'])) echo esc_attr ( $dwwp_stored_meta['studio_type'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_address" class="dwwp-row-title">Адрес</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_address" id="studio_address" value="<?php if (!empty($dwwp_stored_meta['studio_address'])) echo esc_attr ( $dwwp_stored_meta['studio_address'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_hint" class="dwwp-row-title">Ориентир</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_hint" id="studio_hint" value="<?php if (!empty($dwwp_stored_meta['studio_hint'])) echo esc_attr ( $dwwp_stored_meta['studio_hint'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_time" class="dwwp-row-title">Время</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_time" id="studio_time" value="<?php if (!empty($dwwp_stored_meta['studio_time'])) echo esc_attr ( $dwwp_stored_meta['studio_time'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_phone" class="dwwp-row-title">Телефон</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_phone" id="studio_phone" value="<?php if (!empty($dwwp_stored_meta['studio_phone'])) echo esc_attr ( $dwwp_stored_meta['studio_phone'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_link" class="dwwp-row-title">Ссылка</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_link" id="studio_link" value="<?php if (!empty($dwwp_stored_meta['studio_link'])) echo esc_attr ( $dwwp_stored_meta['studio_link'][0]);  else  echo "#" ;?>">
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_lat" class="dwwp-row-title">Широта</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_lat" id="studio_lat" value="<?php if (!empty($dwwp_stored_meta['studio_lat'])) echo esc_attr ( $dwwp_stored_meta['studio_lat'][0]); ?>">
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_lon" class="dwwp-row-title">Долгота</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_lon" id="studio_lon" value="<?php if (!empty($dwwp_stored_meta['studio_lon'])) echo esc_attr ( $dwwp_stored_meta['studio_lon'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_addinfo" class="dwwp-row-title">Допинфо</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_addinfo" id="studio_addinfo" value="<?php if (!empty($dwwp_stored_meta['studio_addinfo'])) echo esc_attr ( $dwwp_stored_meta['studio_addinfo'][0]); ?>">
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="studio_yclient" class="dwwp-row-title">yClient ID</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="studio_yclient" id="studio_yclient" value="<?php if (!empty($dwwp_stored_meta['studio_yclient'])) echo esc_attr ( $dwwp_stored_meta['studio_yclient'][0]); ?>">
            </div>
        </div>

        <div class="meta">
            <div class="meta-th">
                <span>Описание объекта</span>
            </div>
        </div>
        <div class="meta-editor">
            <?php

            $content = trim( get_post_meta(get_the_ID(),'studio_description',true));

            ?>
            <textarea rows="10" name="studio_description" style="  border:1px solid #999999;
  width:100%;
  margin:5px 0;
  padding:3px;"><?php

                echo  trim($content );

                ?></textarea>
        </div>
        <div class="meta">
            <div class="meta-th">
                <span>Шаблон прайса</span>
            </div>
        </div>
        <div class="meta-editor">
            <?php

            $content2 = trim( get_post_meta(get_the_ID(),'studio_price',true));

            ?>
            <textarea rows="10" name="studio_price" style="  border:1px solid #999999;
  width:100%;
  margin:5px 0;
  padding:3px;"><?php

                echo  trim($content2 );

                ?></textarea>
        </div>

    </div>
<?php
};

function dwwp_meta_save2($post_id){
   // $post_id = get_the_ID();

    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce = (isset ($_POST['dwwp_studio_nonce']) && wp_verify_nonce ($_POST['dwwp_studio_nonce'],basename(__FILE__))) ? 'true': 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce){return;}

    if (isset($_POST['studio_type'])){
        update_post_meta($post_id,'studio_type',sanitize_text_field($_POST['studio_type']));
    }
    if (isset($_POST['studio_address'])){
        update_post_meta($post_id,'studio_address',sanitize_text_field($_POST['studio_address']));
    }
    if (isset($_POST['studio_time'])){
        update_post_meta($post_id,'studio_time',sanitize_text_field($_POST['studio_time']));
    }
    if (isset($_POST['studio_hint'])){
        update_post_meta($post_id,'studio_hint',sanitize_text_field($_POST['studio_hint']));
    }

    if (isset($_POST['studio_phone'])){
        update_post_meta($post_id,'studio_phone',sanitize_text_field($_POST['studio_phone']));
    }
    if (isset($_POST['studio_link'])){
        update_post_meta($post_id,'studio_link',sanitize_text_field($_POST['studio_link']));
    }
    if (isset($_POST['studio_lat'])){
        update_post_meta($post_id,'studio_lat',sanitize_text_field($_POST['studio_lat']));
    }
    if (isset($_POST['studio_lon'])){
        update_post_meta($post_id,'studio_lon',sanitize_text_field($_POST['studio_lon']));
    }
    if (isset($_POST['studio_description'])){
        update_post_meta($post_id,'studio_description',sanitize_text_field($_POST['studio_description']));
    }
    if (isset($_POST['studio_price'])){
        update_post_meta($post_id,'studio_price',sanitize_text_field($_POST['studio_price']));
    }

    if (isset($_POST['studio_addinfo'])){
        update_post_meta($post_id,'studio_addinfo',sanitize_text_field($_POST['studio_addinfo']));
    }
    if (isset($_POST['studio_yclient'])){
        update_post_meta($post_id,'studio_yclient',sanitize_text_field($_POST['studio_yclient']));
    }
}


add_action('save_post','dwwp_meta_save2');
add_action('add_meta_boxes','dwwp_add_custom_metabox2');



function dwwp_get_studios(){

    if (isset($_GET["city"])) $city=$_GET["city"];

    $args = array(
        'post_type' => 'studio' ,
        'orderby'=>'menu_order',
        'order'=>'ASC',
        'no_found_rows'=>false,
        'update_post_term_cache'=>false,
        'posts_per_page' => 10006,
        'paged'=>1,
//        'tax_query' => array(
//
//            array(
//                'taxonomy' => 'city',
//                'field'    => 'name',
//                'terms'    => $city,
//            ),
//        ),

    );

    $studios = new WP_Query( $args  );
    while ($studios->have_posts()):  	$studios->the_post();
    $ptitle = str_replace('&#187;','»',get_the_title());
    $ptitle = str_replace('&#171;','«',$ptitle);
    $st[] = array(
            'title'=>$ptitle,
            'address'=>get_post_meta(get_the_id(), 'studio_address')[0],
            'type'=>get_post_meta(get_the_id(), 'studio_type')[0],
            'time'=>get_post_meta(get_the_id(), 'studio_time')[0],
        'hint'=>get_post_meta(get_the_id(), 'studio_hint')[0],
        'phone'=>get_post_meta(get_the_id(), 'studio_phone')[0],
        'link'=>get_post_meta(get_the_id(), 'studio_link')[0],
        'lat'=>get_post_meta(get_the_id(), 'studio_lat')[0],
        'lon'=>get_post_meta(get_the_id(), 'studio_lon')[0],
        'description'=>get_post_meta(get_the_id(), 'studio_description')[0],
        'addinfo'=>get_post_meta(get_the_id(), 'studio_addinfo')[0],
        'city'=>get_the_terms(get_the_ID(), 'city')[0],
   'yclient'=>get_post_meta(get_the_ID(), 'studio_yclient')[0],
        'imgpath'=>get_the_post_thumbnail( get_the_id(), array( 280, 280) ),


    );
    endwhile;

    wp_send_json( json_encode($st));


//    ($city==="Новоси2бирск")? wp_send_json_success("Goodcity") :
   //wp_send_json(	$city);
}



function dwwp_get_studios_with_prices(){

    if (isset($_GET["city"])) $city=$_GET["city"];

    $args = array(
        'post_type' => 'studio' ,
        'orderby'=>'menu_order',
        'order'=>'ASC',
        'no_found_rows'=>false,
        'update_post_term_cache'=>false,
        'posts_per_page' => 10006,
        'paged'=>1,
        'tax_query' => array(

            array(
                'taxonomy' => 'city',
                'field'    => 'name',
                'terms'    => $city,
            ),
        ),

    );

    $studios = new WP_Query( $args  );
    while ($studios->have_posts()):     $studios->the_post();
        $ptitle = str_replace('&#187;','»',get_the_title());
        $ptitle = str_replace('&#171;','«',$ptitle);

    endwhile;

  ?>
    <div class="c-center">
        <h3>Адреса:</h3>

        <div class="price-items-box">
<?php
$i = 1740;
while ($studios->have_posts()):     $studios->the_post();
$i++;
?>
    <div class="price-item">
        <div data-price="<?php echo $i;?>" class="pi-title2 pi-title" ><?php echo $city.", ".get_post_meta(get_the_id(), 'studio_address')[0];?></div>
    </div>

    <?php

endwhile;

?>

        </div><!--class="price-items-box"-->


        <?php
        $i = 1740;
        while ($studios->have_posts()):     $studios->the_post();
            $i++;
            ?>
            <div id="price_<?php echo $i;?>" class="price_detail clearfix">
                <ul class="price-column">
                    <?php

                    $pprice =  get_post_meta(get_the_id(), 'studio_price')[0];
                    $explode_price = explode("#",$pprice);
                    foreach ($explode_price as $item) {

                        if ($item[0]=="{") echo " <div class=\"price-item shares\"><div class=\"price_title\">".substr($item,1,strlen($item)-2)."</div>";
                        else echo do_shortcode($item)."</div>";

                    }
               //     print_r (explode("#",$pprice));


                    ?>


                    <?php

              //      echo do_shortcode('[table id=1 /]');?>
                </ul>
            </div>
            <div class="clear"></div>
            <?php

        endwhile;

        ?>






        <div class="c-center">
        </div>
    </div>

    <?php
die();

//    ($city==="Новоси2бирск")? wp_send_json_success("Goodcity") :
    //wp_send_json( $city);
}

add_action('wp_ajax_get_studios','dwwp_get_studios');
add_action( 'wp_ajax_nopriv_get_studios', 'dwwp_get_studios' );

add_action('wp_ajax_get_studios_with_prices','dwwp_get_studios_with_prices');
add_action( 'wp_ajax_nopriv_get_studios_with_prices', 'dwwp_get_studios_with_prices' );
<?php
function dwwp_add_custom_metabox() {
global $pagenow, $typenow; 
if ($typenow!='service') return;
add_meta_box(
    'dwwp_meta',
    'Параметры услуг',
'dwwp_meta_callback',
    '',
    'normal',
    'core'
);
}
function dwwp_meta_callback(){
    global $pagenow, $typenow; 
    if ($typenow!='service') return;
  wp_nonce_field(basename( __FILE__ ),'dwwp_houses_nonce');
  $dwwp_stored_meta=get_post_meta(get_the_ID());
      // echo "<pre>";
      // var_dump($dwwp_stored_meta);
      // echo "</pre>";
    ?>
    <div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="service_price" class="dwwp-row-title">Цена</label>
            </div>
            <div class="meta-td">
                <input  type="text" pattern="\d*"  oninvalid="this.setCustomValidity('Введите цену в цифрах!')" name="service_price" id="service_price" value="<?php if (!empty($dwwp_stored_meta['service_price'])) echo esc_attr ( $dwwp_stored_meta['service_price'][0]); ?>">
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="service_time" class="dwwp-row-title">Количество минут</label>
            </div>
            <div class="meta-td">
                <input  type="text" pattern="\d*"  oninvalid="this.setCustomValidity('Введите минуты в цифрах!')" name="service_time" id="service_time" value="<?php if (!empty($dwwp_stored_meta['service_time'])) echo esc_attr ( $dwwp_stored_meta['service_time'][0]); ?>">
            </div>
        </div>


        <div class="meta-row">
            <div class="meta-th">
                <label for="service_link" class="dwwp-row-title">Ссылка</label>
            </div>
            <div class="meta-td">
                <input  type="text"  name="service_link" id="service_link" value="<?php if (!empty($dwwp_stored_meta['service_link'])) echo esc_attr ( $dwwp_stored_meta['service_link'][0]);  else  echo "#" ;?>">
            </div>
        </div>

        <div class="meta">
            <div class="meta-th">
                <span>Описание объекта</span>
            </div>
        </div>
        <div class="meta-editor">
            <?php

            $content = trim( get_post_meta(get_the_ID(),'service_description',true));

            ?>
            <textarea rows="10" name="service_description" style="  border:1px solid #999999;
  width:100%;
  margin:5px 0;
  padding:3px;"><?php

               echo  trim($content );

                ?></textarea>
        </div>

    </div>
<?php
};

function dwwp_meta_save($post_id){
   // $post_id = get_the_ID();

    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);

    $is_valid_nonce = (isset ($_POST['dwwp_houses_nonce']) && wp_verify_nonce ($_POST['dwwp_houses_nonce'],basename(__FILE__))) ? 'true': 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce){return;}

    if (isset($_POST['service_id'])){
        update_post_meta($post_id,'service_id',sanitize_text_field($_POST['service_id']));
    }
    if (isset($_POST['service_price'])){
        update_post_meta($post_id,'service_price',sanitize_text_field($_POST['service_price']));
    }
    if (isset($_POST['service_time'])){
        update_post_meta($post_id,'service_time',sanitize_text_field($_POST['service_time']));
    }

	if (isset($_POST['service_link'])){
		update_post_meta($post_id,'service_link',sanitize_text_field($_POST['service_link']));
	}

    if (isset($_POST['service_description'])){
        update_post_meta($post_id,'service_description',sanitize_text_field($_POST['service_description']));
    }
}


add_action('save_post','dwwp_meta_save');
add_action('add_meta_boxes','dwwp_add_custom_metabox');
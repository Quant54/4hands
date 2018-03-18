<?php
function settings_admin_studios_callback() {?>
	<div class="postbox-container" id="poststuff">
        <div class="postbox">
            <h2 class="hndle"><span> Выбрать город для поддомена:</span></h2>
            <div class="inside">
                <form method="post" action="options.php">
	                <?php settings_fields('studios_group_settings'); ?>
	                <?php do_settings_sections('studios_group_settings'); ?>

<!--                    <input type="text" name="studios_city_options" value="--><?php //echo esc_attr( get_option('studios_city_options') ); ?><!--" />-->

                <select id="mpd-new-status" name="studios_city_options" style="width:100%">


	                <?php
	                $term = get_terms(array(
		                'taxonomy' => 'city'));
	                // var_dump($term);
                    $selected = "";
                    $have_select=false;
	                foreach ($term as $item) {
		                $selected = "";

		                if ($item->slug== esc_attr( get_option('studios_city_options'))) {$selected = 'selected="selected"'; $have_select=true;}
		                var_dump($selected);
	                    echo "<option value=\"".$item->slug."\" ". $selected .">" . $item->name . "</option>";
	                }

var_dump($have_select);
	                ?>
                    <option value="none" <?php if ($have_select==false) echo 'selected="selected"';?>>---</option>



                </select>

	                <?php submit_button(); ?>
                </form>
            </div>
        </div>
   </div>
<?php
}

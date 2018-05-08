<?php global $stm_option; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="wrapper">
    <div class="content_wrapper">

        <!--  choose city popup-->

        <div class="ouibounce-modal_city">
            <div class="popup">
                <div class="city">
                    <ul class="city__list">
                        <?php
                        $term = get_terms(array(
                            'taxonomy' => 'city'));
                        // var_dump($term);
                        foreach ($term as $item) echo "<li class=\"city__item\">" . $item->name . "</li>";


                        ?>

                        <!--                <li class="city__item city__item_voroneg">-->
                        <!--                    Воронеж-->
                        <!--                </li>-->
                    </ul>
                </div>
            </div>
        </div>

        <!--  instagram popup-->

        <div class="ouibounce-modal_instagram">
            <div class="underlay"></div>
            <div class="popup-instagram">

                <a class="popup-instagram__cross clearfix" href="#" target="_blank"></a>

                <div class="popup-instagram__body">
                    <a class="popup-instagram__subscribe-btn" href="https://www.instagram.com/4hands_life">Подпишись</a>
                </div>
            </div>
        </div>


        <!--  video -->

        <div class="video-container" style="z-index: 1">
            <video class="video" muted="muted" loop>
                <source src="/wp-content/themes/cinderella/video/header-screen_4hands_5.mp4"
                        type="video/mp4" codecs="avc1.42E01E, mp4a.40.2" />
            </video>

        </div>


        <div class="header-wrapper">

            <header id="header">
                <?php if (is_top_bar()) { ?>
                    <div class="top_bar clearfix">
                        <div class="container">
                            <?php
                            if (stm_option('top_bar_wpml')) {
                                stm_wpml_lang_switcher();
                            }
                            $top_bar_info = get_top_bar_info();
                            ?>
                            <?php if (count($top_bar_info) > 1) { ?>
                                <div class="top_bar_info_switcher">
                                    <div class="active"><?php _e(esc_html($top_bar_info[1]['office'])); ?></div>
                                    <ul>
                                        <?php foreach ($top_bar_info as $key => $val) { ?>
                                            <li>
                                                <a href="#top_bar_info_<?php echo esc_attr($key); ?>"><?php _e(esc_html($val['office'])); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <?php if ($top_bar_info) {
                                foreach ($top_bar_info as $key => $val) {
                                    ?>
                                    <ul class="top_bar_info"
                                        id="top_bar_info_<?php echo esc_attr($key); ?>"
                                        <?php if ($key == 1) {
                                            echo ' style="display: block;"';
                                        } ?>>
                                        <?php if ($val['address']) { ?>
                                            <li>
                                                <i class="fa <?php echo esc_attr($val['address_icon']); ?>"></i> <?php _e(esc_html($val['address'])); ?>
                                            </li>
                                        <?php } ?>
                                        <?php if ($val['phone']) { ?>
                                            <li>
                                                <i class="fa <?php echo esc_attr($val['phone_icon']); ?>"></i> <?php _e(esc_html($val['phone'])); ?>
                                            </li>
                                        <?php } ?>
                                        <?php if ($val['hours']) { ?>
                                            <li>
                                                <i class="fa <?php echo esc_attr($val['hours_icon']); ?>"></i> <?php _e(esc_html($val['hours'])); ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            <?php } ?>
                            <?php if (stm_option('top_bar_social')) { ?>
                                <div class="top_bar_socials">
                                    <?php
                                    if (stm_option('top_bar_use_social')) {
                                        foreach ($stm_option['top_bar_use_social'] as $key =>
                                                 $val) {
                                            if (!empty($stm_option[$key]) && $val == 1) {
                                                ?>
                                                <a target="_blank" href="<?php echo esc_url($stm_option[$key]); ?>"><i
                                                            class="fa fa-<?php echo esc_attr($key); ?>"></i></a>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="header_top clearfix">
                    <div class="container">
                        <?php
                        if (stm_option('header_wpml')) {
                            stm_wpml_lang_switcher();
                        }
                        ?>
                        <?php if (stm_option('header_social')) { ?>
                            <div class="header_socials">
                                <?php
                                if (stm_option('header_use_social')) {
                                    foreach ($stm_option['header_use_social'] as $key =>
                                             $val) {
                                        if (!empty($stm_option[$key]) && $val == 1) {
                                            ?>
                                            <a target="_blank" href="<?php echo esc_url($stm_option[$key]); ?>"><i
                                                        class="fa fa-<?php echo esc_attr($key); ?>"></i></a>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        <?php } ?>
                        <?php if ($header_hours = stm_option('working_hours')) { ?>
                            <div class="icon_text clearfix">
                                <div class="icon"><i
                                            class="<?php echo esc_attr(stm_option('header_working_hours_icon')); ?>"></i>
                                </div>
                                <div class="text">
                                    <?php _e(nl2br(wp_kses_data($header_hours))); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($header_address = stm_option('header_address')) { ?>
                            <div class="icon_text clearfix">
                                <div class="icon"><i
                                            class="<?php echo esc_attr(stm_option('header_address_icon')); ?>"></i>
                                </div>
                                <div class="text">
                                    <?php _e(nl2br(wp_kses_data($header_address))); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="container-fluid container_top-nav">
                        <div class="top_nav_wrapper clearfix">

                            <div class="logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo__link"></a>
                            </div>

                            <?php
                            wp_nav_menu(array(
                                    'theme_location' =>
                                        'primary_menu',
                                    'container' => false,
                                    'menu_class' => 'main_menu_nav'
                                )
                            );
                            ?>

                            <div class="entry entry_top_nav">
                                <button class="entry__button entry__button_nav ms_booking"
                                        data-url="https://w12204.yclients.com">Записаться
                                </button>
                            </div>

                            <?php if (stm_option('header_phone')) { ?>
                                <div class="icon_text clearfix" style="position:relative;">
                                    <!--    <a  href="#" data-url="https://w12204.yclients.com" class="getorder">Записаться <br>онлайн</a> -->
                                    <div class="current-city">
                                        <p class="current-city__item">
                                                                    <?php
                                            // if( ini_get('allow_url_fopen') ) {
                                            //     die('allow_url_fopen is enabled. file_get_contents should work well');
                                            // } else {
                                            //     die('allow_url_fopen is disabled. file_get_contents would not work');
                                            // }


                                                                    $client  = @$_SERVER['HTTP_CLIENT_IP'];
                                                                    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                                                                    $remote  = @$_SERVER['REMOTE_ADDR'];

                                                                    if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
                                                                    elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
                                                                    else $ip = $remote;
                                                                    $issubdomain =false;



                                                                    $domain_city1 = esc_attr( get_option( 'studios_city_options' ) );
                                                                    if ( ( strlen( $domain_city1 ) > 0 ) && ( $domain_city1 != 'none' ) ) {
                                                                        $issubdomain = true;
                                                                     $domaincity= get_term_by( 'slug', $domain_city1, 'city' )->name; } else  { $domaincity="Новосибирск";}


                                                                    $result = file_get_contents("http://ipgeobase.ru:7020/geo?ip=" . $ip);

//                                            $xml = new SimpleXMLElement($result);
//                                            if (isset($_COOKIE["city"])) {
//                                                echo $_COOKIE["city"];
//                                            } else {
//                                              if (isset($xml->ip->city)) $mycity = $xml->ip->city;
//                                                  else $mycity =  $domaincity;
//                                                  echo $mycity;
//                                            }
                                            ?>

                                        </p>
                                        <span style="display:none;" id="plat"><?php echo $xml->ip->lat ?></span>
                                        <span style="display:none;" id="plon"><?php echo $xml->ip->lng; ?></span>
                                        <span style="display:none;" id="plat0"><?php echo $xml->ip->lat ?></span>
                                        <span style="display:none;" id="plon0"><?php echo $xml->ip->lng; ?></span>
                                    </div>

                                    <div class="location">
                                        <div class="location__icon icon showf-btn"></div>
                                    </div>
                                    <div id="isyoutown">
                                        <div id="topcorner"></div>
                                        <p> Ваш город <br><span id="curcity"><?php  echo $domaincity;?></span>?</p>
                                        <span class="choice" id="cityyes">Да</span> / <span class="choice" id="cityno">Нет</span>

                                    </div>
                                    <div class="icon_text-wrapper">
                                        <div class="icon_text-phone clearfix">
                                            <div class="icon icon_phone">
                                            </div>
                                            <div class="text">
                                                <?php if ($header_phone = stm_option('header_phone')) { ?>
                                                    <strong><?php _e(esc_html($header_phone)); ?></strong>
                                                <?php } ?>
                                                <?php if ($header_phone_label = stm_option('header_phone_label')) { ?>
                                                    <span><?php _e(esc_html($header_phone_label)); ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="social social_top">
                                            <li class="social__item"><a
                                                        class="social__link social__link_to_inst social__link_to_inst_small"
                                                        href="https://www.instagram.com/4hands_life"
                                                        target="_blank"
                                                        rel="nofollow"></a></li>

                                            <li class="social__item"><a
                                                        class="social__link social__link_to_vk social__link_to_vk_small"
                                                        href="https://vk.com/4hands_life"
                                                        target="_blank" rel="nofollow"></a>
                                            </li>

                                            <li class="social__item"><a
                                                        class="social__link social__link_to_youtube social__link_to_youtube_small"
                                                        href="https://www.youtube.com/channel/UCp8aLRP5ZDRUma8TrKjlnRw?sub_confirmation=1"
                                                        target="_blank"
                                                        rel="nofollow"></a></li>
                                        </div>
                                    </div>

                                </div>
                            <?php } ?>

                        </div>
                        <div class="top_nav_services nav-services">
                            <ul class="nav-services__list">
                                <?php
                                $tterm = get_terms(array(
                                    'taxonomy' => 'type'));
                                // var_dump($term);

                                $currentpage = trim($_SERVER[REQUEST_URI], "/");


                                foreach ($tterm as $titem) {
                                    if ($currentpage === $titem->slug) $activeclass = "nav-services__item_active"; else $activeclass = "";
                                    echo "<li class=\"nav-services__item " . $activeclass . "\"><a class=\"nav-services__link\"href=\"/services/" . $titem->slug . "/\">" . $titem->name . "</a></li>";
                                }


                                ?>

                                <!--                <li class="nav-services__item"><span class="nav-services__link"-->
                                <!--                        >Все</span></li>-->
                                <!--                <li class="nav-services__item"><a class="nav-services__link"-->
                                <!--                                                  href="/manicure/">Маникюр</a></li>-->
                                <!--                <li class="nav-services__item"><a class="nav-services__link"-->
                                <!--                                                  href="/pedicure/">Педикюр</a></li>-->
                                <!--                <li class="nav-services__item"><a class="nav-services__link"-->
                                <!--                                                  href="/coating/">Покрытие</a></li>-->
                                <!--                <li class="nav-services__item"><span class="nav-services__link"-->
                                <!--                        >Депиляция</span></li>-->
                                <!--                <li class="nav-services__item"><a class="nav-services__link"-->
                                <!--                                                  href="/men/">Мужчинам</a></li>-->
                                <!--                <li class="nav-services__item"><a class="nav-services__link"-->
                                <!--                                                  href="/kids/">Детям</a></li>-->
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="mobile_header">
                    <?php if (stm_option('header_social')) { ?>
                        <div class="header_socials">
                            <?php
                            if (stm_option('header_use_social')) {
                                foreach ($stm_option['header_use_social'] as $key =>
                                         $val) {
                                    if (!empty($stm_option[$key]) && $val == 1) {
                                        ?>
                                        <a target="_blank" href="<?php echo esc_url($stm_option[$key]); ?>"><i
                                                    class="fa fa-<?php echo esc_attr($key); ?>"></i></a>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <div class="logo_wrapper clearfix">

                        <div class="logo logo_mobile">
                            <a href="https://4hands.ru/"><img
                                        src="/wp-content/themes/cinderella/assets/images/tmp/logo_default.png"
                                        alt="4hands"></a>
                        </div>

                        <div id="menu_toggle">
                            <button></button>
                        </div>
                    </div>
                    <div class="header_info">
                        <div class="top_nav_mobile">
                            <?php
                            wp_nav_menu(array(
                                    'theme_location' =>
                                        'primary_menu',
                                    'container' => false,
                                    'menu_class' => 'main_menu_nav'
                                )
                            );
                            ?>
                        </div>
                        <div class="icon_texts clearfix">
                            <?php if ($header_phone = stm_option('header_phone')) { ?>
                                <div class="icon_text icon_text_phone-mobile clearfix">
                                    <div class="icon icon_phone icon_phone_mobile">
                                    </div>
                                    <div class="text">
                                        <?php if ($header_phone = stm_option('header_phone')) { ?>
                                            <strong><?php _e(esc_html($header_phone)); ?></strong>
                                        <?php } ?>
                                        <?php if ($header_phone_label = stm_option('header_phone_label')) { ?>
                                            <span><?php _e(esc_html($header_phone_label)); ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="location location_mobile">
                                <div class="location__icon icon showf-btn"></div>
                                <div id="isyoutown2">
                                    <div id="topcorner"></div>
                                    <p> Ваш город <br><span id="curcity">Новосибирск</span>?</p>
                                    <span class="choice" id="cityyes2">Да</span> / <span class="choice" id="cityno2">Нет</span>

                                </div>
                            </div>


                        </div>
                    </div>
                    <?php
                 if ($_COOKIE["noneedapp"] != 1) {

	                 $applink = "";
	                 $google = "https://play.google.com/store/apps/details?id=pro.applika.app.app4hands&hl=ru";
	                 $apple = "https://itunes.apple.com/ru/app/4hands-studio/id1130437261?mt=8";

	                 $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	                 $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
	                 $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
	                 $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
	                 $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
	                 $mobile = strpos($_SERVER['HTTP_USER_AGENT'],"Mobile");
	                 $symb = strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
	                 $operam = strpos($_SERVER['HTTP_USER_AGENT'],"Opera M");
	                 $htc = strpos($_SERVER['HTTP_USER_AGENT'],"HTC_");
	                 $fennec = strpos($_SERVER['HTTP_USER_AGENT'],"Fennec/");
	                 $winphone = strpos($_SERVER['HTTP_USER_AGENT'],"WindowsPhone");
	                 $wp7 = strpos($_SERVER['HTTP_USER_AGENT'],"WP7");
	                 $wp8 = strpos($_SERVER['HTTP_USER_AGENT'],"WP8");
	                 if ($ipad || $iphone ) {
		                 $applink=$apple;
	                 }
	                 if ($android) {
		                 $applink=$google;
	                 }

	                 echo '<div style="width:70px;height:30px; background-color:gray;">A:'.$android.'</div>';
	                 if ($applink != "") {

                    ?>
                    <div id="mobileapp">
                        <?php


                        ?>

                        <i  style="cursor:pointer;" id="closeapp" class=" iline fa fa-3x fa-times-circle-o" aria-hidden="true"></i>
                        <img id="applogo"  src="<?php echo get_template_directory_uri()?>/assets/images/mobileapp.jpg">
                        <p id="apptitle" ><b>Приложение 4hands для телефона </b></p>
                       <a id="appdownload"  href="<?php echo $applink?>"> Скачать</a>

                    </div>
<?php }}     ?>
                </div>

                <div class="header-content">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header-lower">
                                    <h1 class="header-lower__title">Сеть экспресс-студий маникюра и педикюра

                                        <?php

                                        if ($issubdomain){
//                                         echo   substr($_SERVER['HTTP_HOST'],0,strpos($_SERVER['HTTP_HOST'],"."));
                                       switch (substr($_SERVER['HTTP_HOST'],0,strpos($_SERVER['HTTP_HOST'],"."))) {
                                            case "msk": echo "в Москве";
                                            break;
                                            case "nsk": echo "в Новосибирске";
                                            break;
	                                       case "lipetsk": echo "в Липецке";
		                                       break;
	                                       case "spb": echo "в Санкт-Петербурге";
		                                       break;
	                                       case "brn": echo "в Барнауле";
		                                       break;
	                                       case "sochi": echo "в Сочи";
		                                       break;
                                       }
                                        }

                                        ?></h1>

                                    <h1 class="header-lower__title2">А вам это делали в четыре руки?!</h1>

                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="header-lower__benefits header-benefits clearfix">
                                <div class="col-sm-4 col-md-2">
                                    <div class="header-benefits__item header-benefits__item_01">
                                        <h3 class="header-benefits__number">63</h3>

                                        <p class="header-benefits__text">открытых <br> студии</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <div class="header-benefits__item header-benefits__item_02">
                                        <h3 class="header-benefits__number">20</h3>

                                        <p class="header-benefits__text">городов</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <div class="header-benefits__item header-benefits__item_03">
                                        <h3 class="header-benefits__number">875</h3>

                                        <p class="header-benefits__text">мастеров</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <div class="header-benefits__item">
                                        <h3 class="header-benefits__number">2</h3>

                                        <p class="header-benefits__text">учебных <br> центра</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <div class="header-benefits__item">
                                        <h3 class="header-benefits__number">9</h3>

                                        <p class="header-benefits__text">лет работы</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <div class="header-benefits__item header-benefits__item_last">
                                        <h3 class="header-benefits__number">220 млн</h3>

                                        <p class="header-benefits__text">красивых ногтей</p>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="entry entry_big">
                    <a href="#" class="entry__button entry__button_big ms_booking"
                       data-url="https://w12204.yclients.com">Записаться
                    </a>
                </div>
        </div>

        </header>
    </div>
</div>

<div id="main">

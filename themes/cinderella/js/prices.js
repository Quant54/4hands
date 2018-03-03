/**
 * Created by PK on 10.11.2017.
 */

 jQuery(document).ready(function () {

    /*    Блок Карта Slidedown*/
    //
    // var сhosenCityText,
    // apps = {},
    // cityMass = ["Новосибирск", "Москва", "Санкт-Петербург", "Сочи", "Томск", "Норильск", "Барнаул",
    //     /*   "Старый Оскол"*/, "Владивосток", "Севастополь", "Казань", "Липецк", "Ялта", "Воронеж"],
    //    pricesList = jQuery(".prices-list");
    //
    //
    //    jQuery(".city__item").bind("click", function () {
    //        сhosenCityText = jQuery(this).text();
    //        var currentCity = jQuery(".current-city__item");
    //
    //        if (!(currentCity.text())) {
    //            currentCity.append(сhosenCityText).addClass("city_animation");
    //
    //        } else if (!(currentCity.html() == сhosenCityText)) {
    //            currentCity.empty().append(сhosenCityText).removeClass("city_animation");
    //            setTimeout(function () {
    //                currentCity.addClass("city_animation");
    //            }, 1);
    //        } else {
    //
    //        }
    //    });

      /* navigator.geolocation.getCurrentPosition(
           function(position) {
               console.log('Позиция пользователя: ' +
                   position.coords.latitude + ", " + position.coords.longitude);
           }
           );*/

        /*Определение текущего города:*/

        // ymaps.ready(init);
        //
        // function init() {
        //     ymaps.geolocation.get({
        //         provider: 'yandex',
        //     }).then(function (result) {
        //
        //         var retObj = JSON.parse(localStorage.getItem("object"));
        //         if ( retObj.city) {
        //             console.log(retObj.city);
        //             jQuery(".current-city__item").html(retObj.city);
        //             /*  jQuery(".prices__current-city").html(retObj.city);*/
        //
        //         } else {
        //            currentCity = result.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AddressLine');
        //            jQuery(".current-city__item").html(currentCity);
        //            /* jQuery(".prices__current-city").html(currentCity);*/
        //
        //            var city;
        //            var obj = { city: currentCity };
        //            var sObj = JSON.stringify(obj)
        //            localStorage.setItem("object", sObj);
        //        }
        //
        //    });
        // }

        // function defineCity() {
        //     var xhr = new XMLHttpRequest();
        //     var currentCityItem = jQuery(".current-city__item").text().trim();
        // }

        /*Подгрузка контента*/

        jQuery('.pi-title').each(function (index) {
            jQuery(this).on("click",function() {
                jQuery(".address_list-content").empty();
                var ncity =  jQuery(this).text();
                console.log(ncity);
                var poffset = jQuery(".prices__current-city").offset();
                jQuery.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    type: 'GET',
                    data: {
                        action: 'get_studios_with_prices',
                        city: ncity,
                    },
                    success: function (html) {
                        jQuery(".address_list-content").append(html);
                        click2();
                    },
                    error: function (error) {
                        console.log("error");
                    }
                });
            });


        });

        /*Раскрывающаяся таблица адресов*/
function click2() {
    jQuery(".pi-title2").each(function(index) {

        jQuery(this).on("click",function() {
            var dataPrice = jQuery(this).data("price");
            if (jQuery("#price_"+ dataPrice).is(':hidden')) {
            jQuery(".price_detail").each(function(index) {
                jQuery(this).hide();
            });
            jQuery("#price_"+ dataPrice).show();
            } else {

                jQuery("#price_"+ dataPrice).hide();
            }

        });

    });

}



    });



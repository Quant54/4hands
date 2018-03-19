/**
 * Created by PK on 10.11.2017.
 */

 jQuery(document).ready(function () {
     click2();

        jQuery('.pi-title').each(function (index) {
            jQuery(this).on("click",function() {

                var ncity =  jQuery(this).text();
                // console.log(ncity);
                var poffset = jQuery(".prices__current-city").offset();
                jQuery.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    type: 'GET',
                    data: {
                        action: 'get_studios_with_prices',
                        city: ncity,
                    },
                    success: function (html) {
                        jQuery(".address_list-content").empty();
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
console.log("Wef");
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



<?php
function dwwp_register_post_type(){
$signular = 'Услуга';
$plural = 'Услуги';
$labels = array(
'name'		=>		$plural,
'signular_name'=> $signular,
'add_new'=>'Добавить',  //+
'add_new_item'=>'Добавить новую услугу',  //+
'edit'=>'Редактировать',
'edit_item'=>'Редактировать услугу',  //+
'new_item'=>'Новая услуга',
'view' => 'Показать услугу',
'view_item'=>'Показать услугу',
'search_term'=>'Поиск услуги',
'parent'=>'Родительская услуга ',
'not_found' => 'Нет услуг', //+
'not_found_in_trash' => 'Нет услуг в коризне'
);
$args =  array(
'labels'=>$labels,
'public'             => true,
'publicly_queryable'=> true,
'exclude_from_search'=>false,
'show_in_nav_menus'=>true,
'show_ui'            => true,
'show_in_menu'       => true,
'show_admin_bar'=>true,
'menu_position'=>6,
'menu_icon'=>'dashicons-visibility',
'can_export'=>true,
'delete_with_user'=>false,
'hierarchical'       => false,
'has_archive'        => true,
'query_var'          => true,
'rewrite'            => array( 'slug' => 'serivces', 'with_front'=>true,'pages'=>true,'feeds'=>true ),
'capability_type'    => 'post',
'map_meta_cap'=>true,

'supports'=>array('thumbnail',

'title'
),
);



//	'menu_position'      => 10,
//$args=  array('label'=>'Объекты', 'public' => true, );


register_post_type( 'service', $args );
}
add_action('init','dwwp_register_post_type');


function dwwp_register_taxonomy() {
$plural = 'Категории';
$singular = 'Категории';
$labels = array(
'name'              => $plural,
'singular_name'     => $singular,
'search_items'      => 'Поиск '.$singular,
'popular_items'     => 'Популярные '.$singular,
'all_items'         => 'Все '.$singular,
'parent_item'       => null,
'parent_item_colon' => null,
'edit_item'         => 'Редактировать Категорию',
'update_item'       => 'Обновить Категорию',
'add_new_item'      => 'Добавить новую Категорию',
'new_item_name'     => 'Новый имя для '.$singular,
'add_or_remove_items'=>'Добавить или удалить Категорию',
'choose_from_most_used'=>'Выберете из наиболее используемых категорий',
'not_found'         => 'Не найдены: '.$singular,
'menu_name'         => $plural,

);
$args =array(
'hierarchical'       => false,
'labels'=>$labels,
'show_ui'            => true,
'show_admin_column'     =>true,
'update_count_callback' => '_update_post_term_count',
'query_var'             =>  'true',
'rewrite'               => array('slug'=>'type')
);
register_taxonomy('type','service',$args);

}


add_action('init','dwwp_register_taxonomy');

//Studios post type

function dwwp2_register_post_type(){
    $signular = 'Студия';
    $plural = 'Студии';
    $labels = array(
        'name'		=>		$plural,
        'signular_name'=> $signular,
        'add_new'=>'Добавить',  //+
        'add_new_item'=>'Добавить новую студию',  //+
        'edit'=>'Редактировать',
        'edit_item'=>'Редактировать студию',  //+
        'new_item'=>'Новая студия',
        'view' => 'Показать студию',
        'view_item'=>'Показать студию',
        'search_term'=>'Поиск студию',
        'parent'=>'Родительская студия ',
        'not_found' => 'Нет студий', //+
        'not_found_in_trash' => 'Нет студий в коризне'
    );
    $args =  array(
        'labels'=>$labels,
        'public'             => false,
        'publicly_queryable'=> true,
        'exclude_from_search'=>true,
        'show_in_nav_menus'=>false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_admin_bar'=>true,
        'menu_position'=>6,
        'menu_icon'=>'dashicons-admin-multisite',
        'can_export'=>true,
        'delete_with_user'=>false,
        'hierarchical'       => false,
        'has_archive'        => false,
        'query_var'          => true,
        'rewrite'            =>  array( 'slug' => 'studios'),//, 'with_front'=>true,'pages'=>true,'feeds'=>true ),
        'capability_type'    => 'post',
        'map_meta_cap'=>true,

        'supports'=>array('thumbnail',

            'title'
        ),
    );



    register_post_type( 'studio', $args );
}
add_action('init','dwwp2_register_post_type');


function dwwp2_register_taxonomy() {
    $plural = 'Город';
    $singular = 'Города';
    $labels = array(
        'name'              => $plural,
        'singular_name'     => $singular,
        'search_items'      => 'Поиск '.$singular,
        'popular_items'     => 'Популярные '.$singular,
        'all_items'         => 'Все '.$singular,
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => 'Редактировать Город',
        'update_item'       => 'Обновить Город',
        'add_new_item'      => 'Добавить новый Город',
        'new_item_name'     => 'Новый имя для города',
        'add_or_remove_items'=>'Добавить или удалить Город',
        'choose_from_most_used'=>'Выберете из наиболее используемых Городов',
        'not_found'         => 'Не найдены: '.$singular,
        'menu_name'         => $plural,


    );
    $args =array(
        'hierarchical'       => false,
        'labels'=>$labels,
        'show_ui'            => true,
        'show_admin_column'     =>true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             =>  'true',
        'rewrite'               => array('slug'=>'city')
    );
    register_taxonomy('city','studio',$args);






}


add_action('init','dwwp2_register_taxonomy');

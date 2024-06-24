<?php
function cptui_register_my_cpts_cars() {

/**
 * Post Type: خودرو ها.
 */

$labels = [
    "name" => esc_html__( "خودرو ها", "ahura" ),
    "singular_name" => esc_html__( "خودرو", "ahura" ),
    "menu_name" => esc_html__( "خودرو ها", "ahura" ),
    "all_items" => esc_html__( "همه خودرو ها", "ahura" ),
    "add_new" => esc_html__( "افزودن جدید", "ahura" ),
    "add_new_item" => esc_html__( "افزودن خودرو جدید", "ahura" ),
    "edit_item" => esc_html__( "ویرایش خودرو ها", "ahura" ),
    "new_item" => esc_html__( "خودرو جدید", "ahura" ),
    "view_item" => esc_html__( "مشاهده خودرو", "ahura" ),
    "view_items" => esc_html__( "مشاهده خودرو ها", "ahura" ),
    "search_items" => esc_html__( "جستجو خودرو ها", "ahura" ),
    "not_found" => esc_html__( "هیچ خودرویی یافت نشد", "ahura" ),
    "not_found_in_trash" => esc_html__( "هیچ خودرویی در زباله دان یافت نشد", "ahura" ),
    "featured_image" => esc_html__( "تصویر شاخص خودرو", "ahura" ),
    "set_featured_image" => esc_html__( "تصویر شاخص را برای این خودرو تنظیم کنید", "ahura" ),
    "remove_featured_image" => esc_html__( "حذف تصویر شاخص", "ahura" ),
    "use_featured_image" => esc_html__( "استفاده از تصویر شاخص&#9;", "ahura" ),
    "archives" => esc_html__( "آرشیو خودرو ها", "ahura" ),
    "insert_into_item" => esc_html__( "درج در آیتم&#9;", "ahura" ),
    "uploaded_to_this_item" => esc_html__( "آپلود شده در این شرایط&#9;", "ahura" ),
    "filter_items_list" => esc_html__( "لیست فیلتر آیتم ها&#9;", "ahura" ),
    "items_list_navigation" => esc_html__( "ناوبری لیست آیتم ها&#9;", "ahura" ),
    "items_list" => esc_html__( "لیست خودرو ها", "ahura" ),
    "attributes" => esc_html__( "ویژگی های خوردو", "ahura" ),
    "name_admin_bar" => esc_html__( "خودرو ها", "ahura" ),
    "item_published" => esc_html__( "خودرو منتشر شد", "ahura" ),
    "item_published_privately" => esc_html__( "آِیتم به صورت خصوصی منتشر شده است&#9;", "ahura" ),
    "item_reverted_to_draft" => esc_html__( "آیتم به پیش نویس برگردانده شد&#9;", "ahura" ),
    "item_scheduled" => esc_html__( "آیتم ها زمانبندی شد&#9;", "ahura" ),
    "item_updated" => esc_html__( "آیتم بروزرسانی شد&#9;", "ahura" ),
];

$args = [
    "label" => esc_html__( "خودرو ها", "ahura" ),
    "labels" => $labels,
    "description" => "خودرو های شهرک اتومبیل گودرزی",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
    "has_archive" => "cars",
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => true,
    "can_export" => false,
    "rewrite" => [ "slug" => "cars", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-car",
    "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "page-attributes" ],
    "taxonomies" => [ "agencies" ],
    "show_in_graphql" => false,
];

register_post_type( "cars", $args );
}

add_action( 'init', 'cptui_register_my_cpts_cars' );


function cptui_register_my_taxes_agencies() {

/**
 * Taxonomy: نمایندگی ها.
 */

$labels = [
    "name" => esc_html__( "نمایندگی ها", "ahura" ),
    "singular_name" => esc_html__( "نماینده ", "ahura" ),
];


$args = [
    "label" => esc_html__( "نمایندگی ها", "ahura" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'agencies', 'with_front' => true,  'hierarchical' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "show_tagcloud" => false,
    "rest_base" => "agencies",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "rest_namespace" => "wp/v2",
    "show_in_quick_edit" => false,
    "sort" => false,
    "show_in_graphql" => false,
];
register_taxonomy( "agencies", [ "cars" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_agencies' );

<?php
function custom_post_type() {
    register_post_type('cars',
        array(
            'labels' => array(
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
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => '%agencies%', 'with_front' => false),
            'supports' => array('title', 'editor', 'thumbnail'),
             "menu_icon" => "dashicons-car",

        )
    );
}
add_action('init', 'custom_post_type');

function create_agency_taxonomy() {
    register_taxonomy(
        'agencies',
        'cars',
        array(
            'label' => __('نمایندگی ها'),
            'rewrite' => array('slug' => 'agencies'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_agency_taxonomy');

function custom_post_type_link($post_link, $post) {
    if (is_object($post) && $post->post_type == 'cars') {
        $terms = wp_get_object_terms($post->ID, 'agencies');
        if ($terms) {
            return str_replace('%agencies%', $terms[0]->slug, $post_link);
        }
    }
    return $post_link;
}
add_filter('post_type_link', 'custom_post_type_link', 1, 2);

function custom_rewrite_rules($rules) {
    $new_rules = array();
    $new_rules['agencies/(.+)/(.+)/?$'] = 'index.php?cars=$matches[2]';
    return $new_rules + $rules;
}
add_filter('rewrite_rules_array', 'custom_rewrite_rules');

function flush_rewrite_rules_on_activation() {
    custom_post_type();
    create_agency_taxonomy();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_rewrite_rules_on_activation');

function flush_rewrite_rules_on_deactivation() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'flush_rewrite_rules_on_deactivation');

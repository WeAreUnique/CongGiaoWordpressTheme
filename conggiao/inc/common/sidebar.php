<?php 
// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Homepage', 'conggiao'),
        'description' => __('Widget Cho Trang Chủ', 'conggiao'),
        'id' => 'widget-homepage',
        'before_widget' => '<div id="%1$s" class="%2$s widget-area widget-homepage">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Widget Archive', 'conggiao'),
        'description' => __('Widget cho Archive (Chuyên Mục, Bài theo Ngày, Từ Khóa, Tác Giả,...)', 'conggiao'),
        'id' => 'widget-archive',
        'before_widget' => '<div id="%1$s" class="%2$s widget-area widget-archive">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Widget Single', 'conggiao'),
        'description' => __('Widget cho Bài Viết/Trang', 'conggiao'),
        'id' => 'widget-single',
        'before_widget' => '<div id="%1$s" class="%2$s widget-area widget-single">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}

?>
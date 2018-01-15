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
        'before_title' => '<h3 class="widget-title title"><span>',
        'after_title' => ' </span></h3>'
    ));
    register_sidebar(array(
        'name' => __('Widget Archive', 'conggiao'),
        'description' => __('Widget cho Archive (Chuyên Mục, Bài theo Ngày, Từ Khóa, Tác Giả,...)', 'conggiao'),
        'id' => 'widget-archive',
        'before_widget' => '<div id="%1$s" class="%2$s widget-area widget-archive">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title title"><span>',
        'after_title' => ' </span></h3>'
    ));
    register_sidebar(array(
        'name' => __('Widget Single', 'conggiao'),
        'description' => __('Widget cho Bài Viết/Trang', 'conggiao'),
        'id' => 'widget-single',
        'before_widget' => '<div id="%1$s" class="%2$s widget-area widget-single">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title title"><span>',
        'after_title' => ' </span></h3>'
    ));
}

function kk_in_widget_form($t,$return,$instance){
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'sepstyle' => 'sep-style-1') );
    if ( !isset($instance['sepstyle']) )
        $instance['sepstyle'] = null;
    ?>
    <hr>
    <p><STRONG>THIẾT LẬP CHUNG CHO WIDGET</STRONG></p>
    <p>
        <label for="<?php echo $t->get_field_id('bgcolor'); ?>">Mã Hex Màu Nền (Ví Dụ: #FFFFFF):</label>
        <input class="colour-picker" type="text" name="<?php echo $t->get_field_name('bgcolor'); ?>" id="<?php echo $t->get_field_id('bgcolor'); ?>" value="<?php echo $instance['bgcolor'];?>" />
    </p>
    <p>
        <label for="<?php echo $t->get_field_id('padding'); ?>">Padding (Khoảng không nội dung):</label>
        <input type="number" name="<?php echo $t->get_field_name('padding'); ?>" id="<?php echo $t->get_field_id('padding'); ?>" value="<?php echo $instance['padding'];?>" />
    </p>
    <p>
        <label for="<?php echo $t->get_field_id('radius'); ?>">Viền Cong (Radius):</label>
        <input type="number" name="<?php echo $t->get_field_name('radius'); ?>" id="<?php echo $t->get_field_id('radius'); ?>" value="<?php echo $instance['radius'];?>" />
    </p>
    <p>
        <label for="<?php echo $t->get_field_id('sepstyle'); ?>">Mẫu Ngăn Cách Tiêu Đề:</label>
        <select id="<?php echo $t->get_field_id('sepstyle'); ?>" name="<?php echo $t->get_field_name('sepstyle'); ?>">
            <option <?php selected($instance['sepstyle'], 'sep-style-1');?> value="sep-style-1">Style 1</option>
            <option <?php selected($instance['sepstyle'], 'sep-style-2');?> value="sep-style-2">Style 2</option>
            <option <?php selected($instance['sepstyle'], 'sep-style-3');?> value="sep-style-3">Style 3</option>
            <option <?php selected($instance['sepstyle'], 'sep-style-4');?> value="sep-style-4">Style 4</option>
        </select>
    </p>
    <?php
    $retrun = null;
    return array($t,$return,$instance);
}

function kk_dynamic_sidebar_params($params){
    global $wp_registered_widgets;
    $widget_id = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    $widget_num = $widget_obj['params'][0]['number'];
    if(isset($widget_opt[$widget_num]['sepstyle']))
            $sepstyle = $widget_opt[$widget_num]['sepstyle'];
    else
        $sepstyle = '';
    $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$sepstyle.' ',  $params[0]['before_widget'], 1);

    if(isset($widget_opt[$widget_num]['padding']))
            $padding = $widget_opt[$widget_num]['padding'];
    else
        $padding = '';

    if(isset($widget_opt[$widget_num]['radius']))
            $radius = $widget_opt[$widget_num]['radius'];
    else
        $radius = '';


    if(isset($widget_opt[$widget_num]['bgcolor']))
            $bgcolor = $widget_opt[$widget_num]['bgcolor'];
    else
        $bgcolor = '';
    $params[0]['before_widget'] = preg_replace('/id=/', 'style="background-color: '.$bgcolor.'; padding: '.$padding.'px; border-radius: '.$radius.'px; " id=', $params[0]['before_widget'], 1);
    if ($sepstyle == 'sep-style-4'){
        $params[0]['before_title'] = preg_replace('/<span/', '<span style="background-color: '.$bgcolor.';" ', $params[0]['before_title'], 1);
    }
    
    return $params;
}

function kk_in_widget_form_update($instance, $new_instance, $old_instance){
    $instance['sepstyle'] = $new_instance['sepstyle'];
    $instance['bgcolor'] = $new_instance['bgcolor'];
    $instance['padding'] = $new_instance['padding'];
    $instance['radius'] = $new_instance['radius'];
    return $instance;
}

//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'kk_in_widget_form',5,3);
//Callback function for options update (priorität 5, 3 parameters)
add_filter('widget_update_callback', 'kk_in_widget_form_update',5,3);
//add class names (default priority, one parameter)
add_filter('dynamic_sidebar_params', 'kk_dynamic_sidebar_params');


?>
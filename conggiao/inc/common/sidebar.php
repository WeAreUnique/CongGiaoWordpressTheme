<?php 
// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Homepage', 'conggiao'),
        'description' => __('Widget Cho Trang Chủ', 'conggiao'),
        'id' => 'widget-homepage',
        'before_widget' => '<div id="%1$s" class="%2$s widget-area widget-single">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title title"><span>',
        'after_title' => ' </span></h3>'
    ));
    register_sidebar(array(
        'name' => __('Widget Archive', 'conggiao'),
        'description' => __('Widget cho Archive (Chuyên Mục, Bài theo Ngày, Từ Khóa, Tác Giả,...)', 'conggiao'),
        'id' => 'widget-archive',
        'before_widget' => '<div id="%1$s" class="%2$s widget-area widget-single">',
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
    $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'sepstyle' => 'sep-style-1', 'bgcolor' => '#FFFFFF', 'padding' => '0', 'radius' => '0', 'sepcolor' => '#242424', 'headingcolor' => '#242424') );
    if ( !isset($instance['sepstyle']) )
        $instance['sepstyle'] = 'sep-style-1';
    if ( !isset($instance['bgcolor']) )
        $instance['bgcolor'] = 'rgba(255, 255, 255, 0)';
    if ( !isset($instance['padding']) )
        $instance['padding'] = '0';
    if ( !isset($instance['radius']) )
        $instance['radius'] = '0';
    if ( !isset($instance['sepcolor']) )
        $instance['sepcolor'] = '#242424';
    if ( !isset($instance['headingcolor']) )
        $instance['headingcolor'] = '#242424';
    ?>
    <hr>
    <p><STRONG>THIẾT LẬP CHUNG CHO WIDGET</STRONG></p>
    <p>
        <label for="<?php echo $t->get_field_id('bgcolor'); ?>">Màu Nền Widget:</label>
        <input class="colour-picker" style="display: inline-block;" type="text" name="<?php echo $t->get_field_name('bgcolor'); ?>" id="<?php echo $t->get_field_id('bgcolor'); ?>" value="<?php echo $instance['bgcolor'];?>" />
    </p>
    <p>
        <label for="<?php echo $t->get_field_id('padding'); ?>">Padding (Khoảng không nội dung):</label>
        <input type="number" name="<?php echo $t->get_field_name('padding'); ?>" id="<?php echo $t->get_field_id('padding'); ?>" value="<?php echo $instance['padding'];?>" />
    </p>
    <p>
        <label for="<?php echo $t->get_field_id('radius'); ?>">Viền Cong (Radius):</label>
        <input type="number" name="<?php echo $t->get_field_name('radius'); ?>" id="<?php echo $t->get_field_id('radius'); ?>" value="<?php echo $instance['radius'];?>" />
    </p>
    <p class="widget-sep-style">
        <label for="<?php echo $t->get_field_id('sepstyle'); ?>">Mẫu Ngăn Cách Tiêu Đề:</label>
        <br>
        <input type="radio" name="<?php echo $t->get_field_name('sepstyle'); ?>" value="sep-style-1" <?php checked( $instance['sepstyle'], 'sep-style-1' ); ?> >
        <label class="sep-style sep-style-1" for="<?php echo $t->get_field_id('sepstyle'); ?>"></label>
        <br>
        <input type="radio" name="<?php echo $t->get_field_name('sepstyle'); ?>" value="sep-style-2" <?php checked( $instance['sepstyle'], 'sep-style-2' ); ?> >
        <label class="sep-style sep-style-2" for="<?php echo $t->get_field_id('sepstyle'); ?>"></label>
        <br>
        <input type="radio" name="<?php echo $t->get_field_name('sepstyle'); ?>" value="sep-style-3" <?php checked( $instance['sepstyle'], 'sep-style-3' ); ?> >
        <label class="sep-style sep-style-3" for="<?php echo $t->get_field_id('sepstyle'); ?>"></label>
        <br>
        <input type="radio" name="<?php echo $t->get_field_name('sepstyle'); ?>" value="sep-style-4" <?php checked( $instance['sepstyle'], 'sep-style-4' ); ?> >
        <label class="sep-style sep-style-4" for="<?php echo $t->get_field_id('sepstyle'); ?>"></label>
        <br>
    </p>
    <p>
        <label for="<?php echo $t->get_field_id('headingcolor'); ?>">Màu Chữ Tiêu Đề</label>
        <input class="colour-picker" type="text" name="<?php echo $t->get_field_name('headingcolor'); ?>" id="<?php echo $t->get_field_id('headingcolor'); ?>" value="<?php echo $instance['headingcolor'];?>" />
    </p>
    <p>
        <label for="<?php echo $t->get_field_id('sepcolor'); ?>">Màu Ngăn Cách (Nếu có)</label>
        <input class="colour-picker" type="text" name="<?php echo $t->get_field_name('sepcolor'); ?>" id="<?php echo $t->get_field_id('sepcolor'); ?>" value="<?php echo $instance['sepcolor'];?>" />
    </p>
    <?php
    $retrun = null;
    return array($t,$return,$instance);
}

function kk_dynamic_sidebar_params($params){
    global $wp_registered_widgets;
    $widget_id  = $params[0]['widget_id'];
    $widget_obj = $wp_registered_widgets[$widget_id];
    $widget_opt = get_option($widget_obj['callback'][0]->option_name);
    $widget_num = $widget_obj['params'][0]['number'];
    if(isset($widget_opt[$widget_num]['sepstyle']))
        $sepstyle = $widget_opt[$widget_num]['sepstyle'];
    else
        $sepstyle = 'sep-style-1';

    $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$sepstyle.' ',  $params[0]['before_widget'], 1);

    if(isset($widget_opt[$widget_num]['padding']))
        $padding = $widget_opt[$widget_num]['padding'];
    else
        $padding = '0';

    if(isset($widget_opt[$widget_num]['radius']))
        $radius = $widget_opt[$widget_num]['radius'];
    else
        $radius = '0';


    if(isset($widget_opt[$widget_num]['bgcolor']))
        $bgcolor = $widget_opt[$widget_num]['bgcolor'];
    else
        $bgcolor = 'rgba(255, 255, 255, 0)';

    if(isset($widget_opt[$widget_num]['sepcolor']))
        $sepcolor = $widget_opt[$widget_num]['sepcolor'];
    else
        $sepcolor = '#242424';

    if(isset($widget_opt[$widget_num]['headingcolor']))
        $headingcolor = $widget_opt[$widget_num]['headingcolor'];
    else
        $headingcolor = '#242424';
    
    $params[0]['before_widget'] = preg_replace('/id=/', 'style="background-color: '.$bgcolor.'; padding: '.$padding.'px; border-radius: '.$radius.'px; " id=', $params[0]['before_widget'], 1);
    switch ($sepstyle) {
        case 'sep-style-1':
            $params[0]['before_title'] = preg_replace('/<h3/', '<h3 style="color: '.$headingcolor.'; border-bottom: 1px solid '.$sepcolor.';" ', $params[0]['before_title'], 1);
            $params[0]['before_title'] = preg_replace('/<span/', '<span style="color: '.$headingcolor.'; padding-bottom: 6px; border-bottom: 3px solid '.$sepcolor.'" ', $params[0]['before_title'], 1);
            // $widgetID = $params[0]['widget_id'];
            // echo '<style>'
            // . '#' . $widgetID . '.sep-style-1 .widget-title:after{'
            // . 'border-bottom: 3px solid '.$sepcolor.';'
            // . '}'
            // . '#' . $widgetID . '.sep-style-1 .widget-title{'
            // . 'border-bottom: 1px solid '.$sepcolor.';'
            // . '}'
            // . '#' . $widgetID . '.sep-style-1 .widget-title span{'
            // . 'color: '.$headingcolor.';'
            // . '}'
            // . '</style>';
            break;
        case 'sep-style-2':
            $params[0]['before_title'] = preg_replace('/<h3/', '<h3 style="color: '.$headingcolor.'; border-bottom: 1px solid '.$sepcolor.'; border-left: 5px solid '.$sepcolor.';" ', $params[0]['before_title'], 1);
            break;
        case 'sep-style-3':
            $params[0]['before_title'] = preg_replace('/<span/', '<span style="color: '.$headingcolor.'" ', $params[0]['before_title'], 1);
            break;
        case 'sep-style-4':
            $params[0]['before_title'] = preg_replace('/<span/', '<span style="background-color: '.$bgcolor.'; color: '.$headingcolor.'" ', $params[0]['before_title'], 1);
            break;
        
        default:
            # code...
            break;
    }
    return $params;
}

function kk_in_widget_form_update($instance, $new_instance, $old_instance){
    $instance['sepstyle']       = $new_instance['sepstyle'];
    $instance['bgcolor']        = $new_instance['bgcolor'];
    $instance['padding']        = $new_instance['padding'];
    $instance['radius']         = $new_instance['radius'];
    $instance['sepcolor']       = $new_instance['sepcolor'];
    $instance['headingcolor']   = $new_instance['headingcolor'];
    return $instance;
}

//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'kk_in_widget_form',5,3);
//Callback function for options update (priorität 5, 3 parameters)
add_filter('widget_update_callback', 'kk_in_widget_form_update',5,3);
//add class names (default priority, one parameter)
add_filter('dynamic_sidebar_params', 'kk_dynamic_sidebar_params');


?>
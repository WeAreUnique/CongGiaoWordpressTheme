<?php 
function conggiao_get_latest_post($args, $trans){
	$latest = get_posts( $args );
	if (false === $latest){
        $latest = get_posts( $args );
        if(!is_serialized($latest)){
            $mbs = maybe_serialize($latest);
            $latest = $mbs;
        }
        set_transient( $trans , $latest, 24 * HOUR_IN_SECONDS );
        return $latest;
	}
	return maybe_unserialize($latest);
}

function conggiao_slider_post_format($post, $format){
    $title  = get_the_title($post->ID);
    $link   = get_permalink($post->ID);
    $image  = get_the_post_thumbnail_url($post->ID);
    $html   =   "<article class=post-{$post->ID}>";
        $html   .=  "<a href='{$link}'>";
            $html   .=  "<img class='slider-bg lazyload' data-src='{$image}' alt='{$title}'>";
        $html   .=  "</a>";
        $html   .=  "<div class='postmeta'><div class='postmetawrap'>";

        if ( $format['show_cats'] == 'y' ){
            $html   .=  "<div class='postcats'>";
            foreach(get_the_category($post->ID) as $category){
                $catLink = get_category_link($category->cat_ID);
                $catName = $category->cat_name;
                $html   .=  "<a href='{$catLink}'>{$catName}</a>";
            }
            $html   .=  "</div>";
        }
        if ( $format['show_title'] == 'y' ){
            $html   .=  "<h2 class='posttitle'>";
                $html   .=  "<a href='{$link}'>{$title}</a>";
            $html   .=  "</h2>";
        }
        if ( $format['show_exper'] == 'y' ){
            $html   .=  "<p class='postexcerpt'>";
                $html   .=  get_the_excerpt($post->ID);
            $html   .=  "</p>";
        }
            $html   .=  "<div class='postinfo'>";

            if ( $format['show_author']     == 'y' ){
                $html   .=  "<span class='postauthor'><i class='fas fa-user-circle'></i> ".get_the_author_posts_link()."</span>";
            }
            if ( $format['show_date']       == 'y' ){
                $html   .=  "<span class='postdate'><i class='far fa-clock'></i> ".get_the_date()."</span>";
            }
            if(function_exists('the_views')) {
                if ( $format['show_viewer']     == 'y' ){
                    $html   .=  "<span class='postviews'><i class='far fa-eye'></i> ".the_views(false)."</span>";
                }
            }
            if ( $format['show_comments']   == 'y' ){
                $comments_count = wp_count_comments($post->ID);
                $html   .=  "<span class='postcomment'><i class='far fa-comments'></i> ".$comments_count->approved."</span>";
            }

            $html   .=  "</div>";

        $html   .=  "</div></div>";
    $html   .=  "</article>";
    return $html;
}

function conggiao_homepage_section_static_format($section, $withContainer=false){
    $sectionBg = "background-color: {$section['bgcolor']}; border-radius: {$section['radius']}; padding: {$section['padding']}px;";
    $html .= "<section class='section {$section['chon']}' style='{$sectionBg}'>";
        $html .= ($withContainer == true) ? "<div class='container'>" : '';
            // Header
            $html .= ($section['tieude'] == '') ? '' : conggiao_homepage_section_header_format($section['tieude'], $section['headingcolor'], $section['mota'], $section['lienket'], $section['seperator'], $section['sepcolor'], $section['bgcolor']);
            
            // Content
            $html .= "<div class='section-content'>".$section['content']."</div>";

        $html .= ($withContainer == true) ? "</div>" : '';
    $html .= "</section>";
    return $html;
}

function conggiao_homepage_section_post_format($section, $withContainer=false){
    $sectionBg = "background-color: {$section['bgcolor']}; border-radius: {$section['radius']}; padding: {$section['padding']}px;";
    $html .= "<section class='section {$section['chon']}' style='{$sectionBg}'>";
        $html .= ($withContainer == true) ? "<div class='container'>" : '';
            //Header
            $html .= ($section['tieude'] == '') ? '' : conggiao_homepage_section_header_format($section['tieude'], $section['headingcolor'], $section['mota'], $section['lienket'], $section['seperator'], $section['sepcolor'], $section['bgcolor']);
            $html .= "<h1>Hello</h1>";
        

        $html .= ($withContainer == true) ? "</div>" : '';
    $html .= "</section>";
    return $html;
}

function conggiao_homepage_section_header_format($title, $titleColor, $des, $link, $sepStyle, $sepColor, $bgcolor){
    switch ($sepStyle) {
        case 'style-1':
            $html .= "<div class='section-header sep-{$sepStyle}' style='border-bottom: 1px solid {$sepColor};'>";
                $html .= "<div class='main-title'>";
                    $html .= "<h2 class='title is-5' style='color: $titleColor;'>";
                        $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'>{$title}</a>" : $title;
                    $html .= "</h2>";
                $html .= "</div>";
                $html .= "<div class='sep-{$sepStyle}-bottom' style='border-bottom: 3px solid {$sepColor}'><p class='title is-4' style='opacity: 0;'>{$title}</p></div>";
            $html .= "</div>";
            break;
        
        case 'style-2':
            $html .= "<div class='section-header sep-{$sepStyle}'>";
                $html .= "<div class='main-title' style='border-left: 5px solid {$sepColor}; border-bottom: 1px solid {$sepColor}'>";
                    $html .= "<h2 class='title is-5'>";
                        $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'>{$title}</a>" : $title;
                    $html .= "</h2>";
                $html .= "</div>";
            $html .= "</div>";
            break;

        case 'style-3':
            $html .= "<div class='section-header sep-{$sepStyle}'>";
                $html .= "<div class='main-title'>";
                    $html .= "<h2 class='title is-5'>";
                        $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'>{$title}</a>" : $title;
                    $html .= "</h2>";
                    $html .= "<h3 class='subtitle is-6'>{$des}</h3>";
                $html .= "</div>";
            $html .= "</div>";
            break;

        case 'style-4':
            $html .= "<div class='section-header sep-{$sepStyle}'>";
                $html .= "<div class='main-title'>";
                    $html .= "<h2 class='title is-5'>";
                        $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'><span style='background-color: {$bgcolor}'>{$title}</span></a>" : "<span style='background-color: {$bgcolor}'>{$title}</span>";
                    $html .= "</h2>";
                $html .= "</div>";
            $html .= "</div>";
            break;
        default:
            # code...
            break;
    }
    
    return $html;
}


?>
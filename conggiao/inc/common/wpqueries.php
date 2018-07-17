<?php 
function conggiao_get_posts($args, $trans){
	if ( false === ( $latest = get_transient( $trans ) ) ) {
        $latest = get_posts( $args );
        set_transient( $trans , $latest, DAY_IN_SECONDS );
        return $latest;
    }
    return $latest;
}

function conggiao_slider_post_format($post, $format){
    $title  = get_the_title($post->ID);
    $link   = get_permalink($post->ID);
    $image  = get_the_post_thumbnail_url($post->ID);
    $html   =   "<article class=post-{$post->ID}>";
        $html   .=  "<img class='slider-bg lazyload' data-src='{$image}' alt='{$title}'>";
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
                $html   .=  "<span class='postauthor'><i class='fa fa-user-circle'></i> ".get_the_author_posts_link()."</span>";
            }
            if ( $format['show_date']       == 'y' ){
                $html   .=  "<span class='postdate'><i class='fa fa-clock-o'></i> ".get_the_date('', $post->ID)."</span>";
            }
            if(function_exists('the_views')) {
                if ( $format['show_viewer']     == 'y' ){
                    $html   .=  "<span class='postviews'><i class='fa fa-eye'></i> ".intval( get_post_meta( $post->ID, 'views', true ) )." lượt xem</span>";
                }
            }
            if ( $format['show_comments']   == 'y' ){
                $comments_count = wp_count_comments($post->ID);
                $html   .=  "<span class='postcomment'><i class='fa fa-comments'></i> ".$comments_count->approved."</span>";
            }

            $html   .=  "</div>";

        $html   .=  "</div></div>";
    $html   .=  "</article>";
    return $html;
}

function conggiao_homepage_section_static_format($section, $withContainer=false){
    $sectionBg = "background-color: {$section['bgcolor']}; border-radius: {$section['radius']}px; padding: {$section['padding']}px;";
    $html = "<section class='section {$section['chon']}' style='{$sectionBg}'>";
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
    $sectionBg = "background-color: {$section['bgcolor']}; border-radius: {$section['radius']}px; padding: {$section['padding']}px;";
    $html = "<section class='section {$section['chon']}' style='{$sectionBg}'>";
        $html .= ($withContainer == true) ? "<div class='container'>" : "";
            //Header
            $mota = ( $section["mota"] != "" ) ? $section["mota"] : "";
            $html .= ($section['tieude'] == '') ? '' : conggiao_homepage_section_header_format($section['tieude'], $section['headingcolor'], $mota, $section['lienket'], $section['seperator'], $section['sepcolor'], $section['bgcolor']);
            // Content
            $contentArgs = array(
                'posts_per_page'   => $section['num_post'],
            );
            if ( $section['sortby']         == 'views' ){
                $contentArgs['orderby']     = 'meta_value_num';
                $contentArgs['meta_key']    = 'views';
                if ( !empty($section['postincats']) ){
                    $cats = implode(',', $section['postincats']);
                    $contentArgs['category'] = $cats;
                }
            }

            if ( $section['sortby']         == "date" ){
                if ( !empty($section['postincats']) ){
                    $cats = implode(',', $section['postincats']);
                    $contentArgs['category'] = $cats;
                }
            }
            $viewOptions = array(
                'show_title'    => ( $section['show_title']     == 'y' ) ? true : false,
                'show_exper'    => ( $section['show_exper']     == 'y' ) ? true : false,
                'show_cats'     => ( $section['show_cats']      == 'y' ) ? true : false,
                'show_date'     => ( $section['show_date']      == 'y' ) ? true : false,
                'show_author'   => ( $section['show_author']    == 'y' ) ? true : false,
                'show_viewer'   => ( $section['show_viewer']    == 'y' ) ? true : false,
                'show_comments' => ( $section['show_comments']  == 'y' ) ? true : false,
                'posttitlecolor'=> $section['posttitlecolor'],
                'postmetacolor' => $section['postmetacolor'],
            );

            //printArr($contentArgs, 'contentArgs');


            $trans = "trans_".vn_to_str($section['tieude'])."_".$section['style'];
            $html .= conggiao_homepage_get_posts_content_format($section['style'], $contentArgs, $viewOptions, $trans);

        $html .= ($withContainer == true) ? "</div>" : '';
    $html .= "</section>";
    return $html;
}

function conggiao_homepage_section_header_format($title, $titleColor, $des, $link, $sepStyle, $sepColor, $bgcolor){
    switch ($sepStyle) {
        case 'style-1':
            $html = "<div class='section-header sep-{$sepStyle}' style='border-bottom: 1px solid {$sepColor};'>";
                $html .= "<div class='main-title'>";
                    $html .= "<h2 class='title is-5' style='color: $titleColor;'>";
                        $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'>{$title}</a>" : $title;
                    $html .= "</h2>";
                $html .= "</div>";
                $html .= "<div class='sep-{$sepStyle}-bottom' style='border-bottom: 3px solid {$sepColor}'><p class='title is-4' style='opacity: 0;'>{$title}</p></div>";
            $html .= "</div>";
            break;
        
        case 'style-2':
            $html = "<div class='section-header sep-{$sepStyle}'>";
                $html .= "<div class='main-title' style='border-left: 5px solid {$sepColor}; border-bottom: 1px solid {$sepColor}'>";
                    $html .= "<h2 class='title is-5'>";
                        $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'>{$title}</a>" : $title;
                    $html .= "</h2>";
                $html .= "</div>";
            $html .= "</div>";
            break;

        case 'style-3':
            $html = "<div class='section-header sep-{$sepStyle}'>";
                $html .= "<div class='main-title'>";
                    $html .= "<h2 class='title is-5'>";
                        $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'>{$title}</a>" : $title;
                    $html .= "</h2>";
                    $html .= "<h3 class='subtitle is-6'>{$des}</h3>";
                $html .= "</div>";
            $html .= "</div>";
            break;

        case 'style-4':
            $html = "<div class='section-header sep-{$sepStyle}'>";
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

function conggiao_homepage_get_posts_content_format($style, $args, $viewOptions, $trans){
    $html = "";
    switch ($style) {
        case 'style-1':
            $queryPosts = conggiao_get_posts($args, $trans);
            $html .= "<div class='section-content content-{$style}'>";
            if ( empty($queryPosts) ){
                $html .= '<br/><strong>Hiện chưa có bài viết nào ở danh mục này.</strong>';
                $html .= "</div>";
                return $html;
            }
            $number = count($queryPosts);
            // printArr($args, 'args');
            $viewOptionGreate1 = $viewOptions;
            $viewOptionGreate1['show_exper'] = false;
            $viewOptionGreate1['show_cats'] = false;
            if ( $number <= 3 ){
                // Begin 0 1 2
                $html .= "<div class='columns is-gapless is-paddingless is-mobile is-multiline first-row'>";
                    // 0
                    if ( $number == 1 )
                        $html .= "<div class='column is-12-mobile is-12-tablet is-12-desktop wide-box'>";
                    else 
                        $html .= "<div class='column is-12-mobile is-8-tablet wide-box'>";
                        setup_postdata( $queryPosts[0] );
                        $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[0], $viewOptions);
                        wp_reset_postdata();
                    $html .= "</div>"; //End 0

                // 1 and 2 
                if ( $number > 2 ){
                    $html .= "<div class='column is-12-mobile is-4-tablet right-small-box'>";
                        $html .= "<div class='columns is-gapless is-multiline is-mobile'>";
                            // 1
                            $html .= "<div class='column is-6-mobile is-12-tablet small-box'>";
                                setup_postdata( $queryPosts[1] );
                                $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[1], $viewOptionGreate1);
                                wp_reset_postdata();
                            $html .= "</div>";
                            // 2 
                            $html .= "<div class='column is-6-mobile is-12-tablet small-box'>";
                                setup_postdata( $queryPosts[2] );
                                $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[2], $viewOptionGreate1);
                                wp_reset_postdata();
                            $html .= "</div>";
                        $html .= "</div>";
                    $html .= "</div>";

                } else {
                    // Only 1
                    if ( $number == 2 ){
                        $html .= "<div class='column is-12-mobile is-4-tablet right-small-box'>";
                            $html .= "<div class='columns is-gapless is-multiline is-mobile'>";
                                $html .= "<div class='column is-6-mobile is-12-tablet small-box'>";
                                    setup_postdata( $queryPosts[1] );
                                    $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[1], $viewOptionGreate1);
                                    wp_reset_postdata();
                                $html .= "</div>";
                            $html .= "</div>";
                        $html .= "</div>";
                    }   
                }
                $html .= "</div>"; //End Begin 0 1 2

            }else {
                // Begin 0 1 2
                $html .= "<div class='columns is-gapless is-paddingless is-mobile is-multiline first-row'>";
                    $html .= "<div class='column is-12-mobile is-8-tablet wide-box'>";
                        setup_postdata( $queryPosts[0] );
                        $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[0], $viewOptions);
                        wp_reset_postdata();
                    $html .= "</div>"; //End 0
                    // 1  2
                    $html .= "<div class='column is-12-mobile is-4-tablet right-small-box'>";
                        $html .= "<div class='columns is-gapless is-multiline is-mobile'>";
                            // 1
                            $html .= "<div class='column is-6-mobile is-12-tablet small-box'>";
                                setup_postdata( $queryPosts[0] );
                                $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[1], $viewOptions);
                                wp_reset_postdata();
                            $html .= "</div>";
                            // 2
                            $html .= "<div class='column is-6-mobile is-12-tablet small-box'>";
                                setup_postdata( $queryPosts[0] );
                                $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[2], $viewOptions);
                                wp_reset_postdata();
                            $html .= "</div>";
                        $html .= "</div>";
                    $html .= "</div>"; // End 1  2
                $html .= "</div>"; //End Begin 0 1 2

                // 4 ...
                $html .= "<div class='columns is-gapless is-paddingless is-mobile is-multiline other-row'>";
                for ($i=3; $i < $number; $i++) { 
                    $html .= "<div class='column is-4-mobile is-4-tablet is-4-desktop small-box'>";
                        setup_postdata( $queryPosts[$i] );
                        $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[$i], $viewOptionGreate1);
                        wp_reset_postdata();
                    $html .= "</div>";
                }
                $html .= "</div>";
            }
            $html .= "</div>"; //end section-content
            break;
        case 'style-2':
            $queryPosts = conggiao_get_posts($args, $trans);
            $html .= "<div class='section-content content-{$style}'>";
            if ( empty($queryPosts) ){
                $html .= '<br/><strong>Hiện chưa có bài viết nào ở danh mục này.</strong>';
                $html .= "</div>";
                return $html;
            }
                $html .= "<div class='columns is-variable is-1 is-mobile is-multiline'>";
                    foreach ($queryPosts as $post) {
                        setup_postdata( $post );
                        $html .= "<div class='column is-half-mobile is-half-tablet is-one-third-desktop'>";
                            $html .= conggiao_homepage_get_single_post_content_format($style, $post, $viewOptions);
                        $html .= "</div>";
                    }
                    wp_reset_postdata();
                $html .= "</div>";
            $html .= "</div>"; //end section-content
            break;
        case 'style-3':
            $queryPosts = conggiao_get_posts($args, $trans);
            $html .= "<div class='section-content content-{$style}'>";
            if ( empty($queryPosts) ){
                $html .= '<br/><strong>Hiện chưa có bài viết nào ở danh mục này.</strong>';
                $html .= "</div>";
                return $html;
            }
            $number = count($queryPosts);
            if ($number == 1){
                //Just One
                $post   = $queryPosts[0];
                setup_postdata( $post );
                $title  = get_the_title($post->ID);
                $link   = get_permalink($post->ID);
                $image  = get_the_post_thumbnail_url($post->ID);
                $html .= "<div class='columns is-variable is-1 is-mobile wide-box'>";
                    $html .= "<div class='column is-hidden-mobile is-4-tablet is-4-desktop'>";
                        $html .= "<a href='{$link}'>";
                            $html .=  "<img class='post-thumb-img lazyload' data-src='{$image}' alt='{$title}'>";
                        $html .= "</a>";
                    $html .= "</div>";
                    $html .= "<div class='column is-12-mobile is-8-tablet is-8-desktop'>";
                        $html   .=  "<div class='postmeta'><div class='postmetawrap'>";
                        if ( $viewOptions['show_cats']){
                            $html   .=  "<div class='postcats'>";
                            foreach(get_the_category($post->ID) as $category){
                                $catLink = get_category_link($category->cat_ID);
                                $catName = $category->cat_name;
                                $html   .=  "<a href='{$catLink}'>{$catName}</a>";
                            }
                            $html   .=  "</div>";
                        }
                        if ( $viewOptions['show_title'] ){
                            $html   .=  "<h2 class='posttitle'>";
                                $html   .=  "<a href='{$link}' style='color: {$viewOptions['posttitlecolor']}'>{$title}</a>";
                            $html   .=  "</h2>";
                        }
                        if ( $viewOptions['show_exper'] ){
                            $html   .=  "<p class='postexcerpt' style='color: {$viewOptions['postmetacolor']}'>";
                                $html   .=  get_the_excerpt($post->ID);
                            $html   .=  "</p>";
                        }
                            $html   .=  "<div class='postinfo'>";

                            if ( $viewOptions['show_author'] ){
                                $authorlink = get_the_author_posts_link();
                                $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$viewOptions['postmetacolor']}'>", $authorlink);
                                $html   .=  "<span class='postauthor' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-user-circle'></i> ".$result."</span>";
                            }
                            if ( $viewOptions['show_date'] ){
                                $html   .=  "<span class='postdate' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-clock-o'></i> ".get_the_date('', $post->ID)."</span>";
                            }
                            if(function_exists('the_views')) {
                                if ( $viewOptions['show_viewer']     ){
                                    $html   .=  "<span class='postviews' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-eye'></i> ".intval( get_post_meta( $post->ID, 'views', true ) )." lượt xem</span>";
                                }
                            }
                            if ( $viewOptions['show_comments'] ){
                                $comments_count = wp_count_comments($post->ID);
                                $html   .=  "<span class='postcomment' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-comments'></i> ".$comments_count->approved."</span>";
                            }

                            $html   .=  "</div>";

                        $html   .=  "</div></div>";
                    $html .= "</div>";
                $html .= "</div>";
                wp_reset_postdata();
            } else {
                //Greater than one

                //1
                $post   = $queryPosts[0];
                setup_postdata( $post );
                $title  = get_the_title($post->ID);
                $link   = get_permalink($post->ID);
                $image  = get_the_post_thumbnail_url($post->ID);
                $html .= "<div class='columns is-variable is-1 is-mobile wide-box'>";
                    $html .= "<div class='column is-hidden-mobile is-4-tablet is-4-desktop'>";
                        $html .= "<a href='{$link}'>";
                            $html .=  "<img class='post-thumb-img lazyload' data-src='{$image}' alt='{$title}'>";
                        $html .= "</a>";
                    $html .= "</div>";
                    $html .= "<div class='column is-12-mobile is-8-tablet is-8-desktop'>";
                        $html   .=  "<div class='postmeta'><div class='postmetawrap'>";
                        if ( $viewOptions['show_cats'] == 'y' ){
                            $html   .=  "<div class='postcats'>";
                            foreach(get_the_category($post->ID) as $category){
                                $catLink = get_category_link($category->cat_ID);
                                $catName = $category->cat_name;
                                $html   .=  "<a href='{$catLink}'>{$catName}</a>";
                            }
                            $html   .=  "</div>";
                        }
                        if ( $viewOptions['show_title'] == 'y' ){
                            $html   .=  "<h2 class='posttitle'>";
                                $html   .=  "<a href='{$link}' style='color: {$viewOptions['posttitlecolor']}'>{$title}</a>";
                            $html   .=  "</h2>";
                        }
                        if ( $viewOptions['show_exper'] == 'y' ){
                            $html   .=  "<p class='postexcerpt' style='color: {$viewOptions['postmetacolor']}'>";
                                $html   .=  get_the_excerpt($post->ID);
                            $html   .=  "</p>";
                        }
                            $html   .=  "<div class='postinfo'>";

                            if ( $viewOptions['show_author']     == 'y' ){
                                $authorlink = get_the_author_posts_link();
                                $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$viewOptions['postmetacolor']}'>", $authorlink);
                                $html   .=  "<span class='postauthor' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-user-circle'></i> ".$result."</span>";
                            }
                            if ( $viewOptions['show_date']       == 'y' ){
                                $html   .=  "<span class='postdate' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-clock-o'></i> ".get_the_date('', $post->ID)."</span>";
                            }
                            if(function_exists('the_views')) {
                                if ( $viewOptions['show_viewer']     == 'y' ){
                                    $html   .=  "<span class='postviews' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-eye'></i> ".intval( get_post_meta( $post->ID, 'views', true ) )." lượt xem</span>";
                                }
                            }
                            if ( $viewOptions['show_comments']   == 'y' ){
                                $comments_count = wp_count_comments($post->ID);
                                $html   .=  "<span class='postcomment' style='color: {$viewOptions['postmetacolor']}'><i class='fa fa-comments'></i> ".$comments_count->approved."</span>";
                            }

                            $html   .=  "</div>";

                        $html   .=  "</div></div>";
                    $html .= "</div>";
                $html .= "</div>";
                wp_reset_postdata();
                //1...
                $html .= "<div class='columns is-variable is-1 is-mobile is-multiline small-box'>";
                    for ($i=1; $i < $number; $i++) { 
                        setup_postdata( $queryPosts[$i] );
                        $html .= "<div class='column is-full-mobile is-half-tablet is-one-third-desktop'>";
                            $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[$i], $viewOptions);
                        $html .= "</div>";
                    }
                    wp_reset_postdata();
                $html .= "</div>";
            }
                
            $html .= "</div>"; //end section-content
            break;
        
        default:
            # code...
            break;
    }

    return $html;
}

function conggiao_homepage_get_single_post_content_format($style, $post, $format){
    $title  = get_the_title($post->ID);
    $link   = get_permalink($post->ID);
    $image  = get_the_post_thumbnail_url($post->ID);
    switch ($style) {
        case 'style-1':
            $html = "<article class='single-post {$style} post-{$post->ID}'>";
                // $html   .=  "<img class='post-thumb-img lazyload' data-src='{$image}' alt='{$title}'>";
                $html   .=  "<div class='single-post-bg' style='background-image:url({$image});'></div>";
                $html   .=  "<div class='postmeta'><div class='postmetawrap'>";

                if ( $format['show_cats']){
                    $html   .=  "<div class='postcats'>";
                    foreach(get_the_category($post->ID) as $category){
                        $catLink = get_category_link($category->cat_ID);
                        $catName = $category->cat_name;
                        $html   .=  "<a href='{$catLink}'>{$catName}</a>";
                    }
                    $html   .=  "</div>";
                }
                if ( $format['show_title']){
                    $html   .=  "<h2 class='posttitle'>";
                        $html   .=  "<a href='{$link}' style='color: {$format['posttitlecolor']}'>{$title}</a>";
                    $html   .=  "</h2>";
                }
                if ( $format['show_exper']){
                    $html   .=  "<p class='postexcerpt' style='color: {$format['postmetacolor']}'>";
                        $html   .=  get_the_excerpt($post->ID);
                    $html   .=  "</p>";
                }
                    $html   .=  "<div class='postinfo'>";

                    if ( $format['show_author']    ){
                        $authorlink = get_the_author_posts_link();
                        $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$format['postmetacolor']}'>", $authorlink);
                        $html   .=  "<span class='postauthor' style='color: {$format['postmetacolor']}'><i class='fa fa-user-circle'></i> ".$result."</span>";
                    }
                    if ( $format['show_date']      ){
                        $html   .=  "<span class='postdate' style='color: {$format['postmetacolor']}'><i class='fa fa-clock-o'></i> ".get_the_date('', $post->ID)."</span>";
                    }
                    if(function_exists('the_views')) {
                        if ( $format['show_viewer']    ){
                            $html   .=  "<span class='postviews' style='color: {$format['postmetacolor']}'><i class='fa fa-eye'></i> ".intval( get_post_meta( $post->ID, 'views', true ) )." lượt xem</span>";
                        }
                    }
                    if ( $format['show_comments']  ){
                        $comments_count = wp_count_comments($post->ID);
                        $html   .=  "<span class='postcomment' style='color: {$format['postmetacolor']}'><i class='fa fa-comments'></i> ".$comments_count->approved."</span>";
                    }

                    $html   .=  "</div>";

                $html   .=  "</div></div>";


            $html .= "</article>";
            break;
        
        case 'style-2':
            $html = "<article class='single-post {$style} post-{$post->ID}'>";
                $html   .=  "<div class='postthumb'>";
                    $html   .=  "<img class='post-thumb-img lazyload' data-src='{$image}' alt='{$title}'>";
                $html   .=  "</div>";
                $html   .=  "<div class='postmeta'><div class='postmetawrap'>";

                if ( $format['show_cats']){
                    $html   .=  "<div class='postcats'>";
                    foreach(get_the_category($post->ID) as $category){
                        $catLink = get_category_link($category->cat_ID);
                        $catName = $category->cat_name;
                        $html   .=  "<a href='{$catLink}'>{$catName}</a>";
                    }
                    $html   .=  "</div>";
                }
                if ( $format['show_title']){
                    $html   .=  "<h2 class='posttitle'>";
                        $html   .=  "<a href='{$link}' style='color: {$format['posttitlecolor']}'>{$title}</a>";
                    $html   .=  "</h2>";
                }
                if ( $format['show_exper']){
                    $html   .=  "<p class='postexcerpt' style='color: {$format['postmetacolor']}'>";
                        $html   .=  get_the_excerpt($post->ID);
                    $html   .=  "</p>";
                }
                    $html   .=  "<div class='postinfo'>";

                    if ( $format['show_author']    ){
                        $authorlink = get_the_author_posts_link();
                        $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$format['postmetacolor']}'>", $authorlink);
                        $html   .=  "<span class='postauthor' style='color: {$format['postmetacolor']}'><i class='fa fa-user-circle'></i> ".$result."</span>";
                    }
                    if ( $format['show_date']      ){
                        $html   .=  "<span class='postdate' style='color: {$format['postmetacolor']}'><i class='fa fa-clock-o'></i> ".get_the_date('', $post->ID)."</span>";
                    }
                    if(function_exists('the_views')) {
                        if ( $format['show_viewer']    ){
                            $html   .=  "<span class='postviews' style='color: {$format['postmetacolor']}'><i class='fa fa-eye'></i> ".intval( get_post_meta( $post->ID, 'views', true ) )." lượt xem</span>";
                        }
                    }
                    if ( $format['show_comments']  ){
                        $comments_count = wp_count_comments($post->ID);
                        $html   .=  "<span class='postcomment' style='color: {$format['postmetacolor']}'><i class='fa fa-comments'></i> ".$comments_count->approved."</span>";
                    }

                    $html   .=  "</div>";

                $html   .=  "</div></div>";

            $html .= "</article>";
            break;
        
        case 'style-3':
            $html = "<article class='single-post {$style} post-{$post->ID}'>";
                $html   .=  "<div class='postthumb'>";
                    $html   .=  "<img class='post-thumb-img lazyload' data-src='{$image}' alt='{$title}'>";
                $html   .=  "</div>";
                $html   .=  "<div class='postmeta'><div class='postmetawrap'>";
                if ( $format['show_cats']){
                    $html   .=  "<div class='postcats'>";
                    foreach(get_the_category($post->ID) as $category){
                        $catLink = get_category_link($category->cat_ID);
                        $catName = $category->cat_name;
                        $html   .=  "<a href='{$catLink}'>{$catName}</a>";
                    }
                    $html   .=  "</div>";
                }
                if ( $format['show_title']){
                    $html   .=  "<h2 class='posttitle'>";
                        $html   .=  "<a href='{$link}' style='color: {$format['posttitlecolor']}'>{$title}</a>";
                    $html   .=  "</h2>";
                }
                if ( $format['show_exper']){
                    $html   .=  "<p class='postexcerpt' style='color: {$format['postmetacolor']}'>";
                        $html   .=  get_the_excerpt($post->ID);
                    $html   .=  "</p>";
                }
                    $html   .=  "<div class='postinfo'>";

                    if ( $format['show_author']    ){
                        $authorlink = get_the_author_posts_link();
                        $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$format['postmetacolor']}'>", $authorlink);
                        $html   .=  "<span class='postauthor' style='color: {$format['postmetacolor']}'><i class='fa fa-user-circle'></i> ".$result."</span>";
                    }
                    if ( $format['show_date']      ){
                        $html   .=  "<span class='postdate' style='color: {$format['postmetacolor']}'><i class='fa fa-clock-o'></i> ".get_the_date('', $post->ID)."</span>";
                    }
                    if(function_exists('the_views')) {
                        if ( $format['show_viewer']    ){
                            $html   .=  "<span class='postviews' style='color: {$format['postmetacolor']}'><i class='fa fa-eye'></i> ".intval( get_post_meta( $post->ID, 'views', true ) )." lượt xem</span>";
                        }
                    }
                    if ( $format['show_comments']  ){
                        $comments_count = wp_count_comments($post->ID);
                        $html   .=  "<span class='postcomment' style='color: {$format['postmetacolor']}'><i class='fa fa-comments'></i> ".$comments_count->approved."</span>";
                    }

                    $html   .=  "</div>";

                $html   .=  "</div></div>";

            $html .= "</article>";
            break;
        

        default:
            # code...
            break;
    }
    
    return $html;
}


?>
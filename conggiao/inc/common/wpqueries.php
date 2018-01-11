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

?>
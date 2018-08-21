<?php
function conggiao_get_posts($args, $trans)
{
    if (false === ($latest = get_transient($trans))) {
        $latest = get_posts($args);
        set_transient($trans, $latest, DAY_IN_SECONDS);
        return $latest;
    }
    return $latest;
}

function conggiao_slider_post_format($post, $format)
{
    $title = get_the_title($post->ID);
    $link = get_permalink($post->ID);
    $image = get_the_post_thumbnail_url($post->ID);
    $html = "<article class=post-{$post->ID}>";
    $html .= "<img class='slider-bg lazyload' data-src='{$image}' alt='{$title}'>";
    $html .= "<div class='postmeta'><div class='postmetawrap'>";

    if ($format['show_cats'] == 'y') {
        $html .= "<div class='postcats'>";
        foreach (get_the_category($post->ID) as $category) {
            $catLink = get_category_link($category->cat_ID);
            $catName = $category->cat_name;
            $html .= "<a href='{$catLink}'>{$catName}</a>";
        }
        $html .= "</div>";
    }
    if ($format['show_title'] == 'y') {
        $html .= "<h2 class='posttitle'>";
        $html .= "<a href='{$link}'>{$title}</a>";
        $html .= "</h2>";
    }
    if ($format['show_exper'] == 'y') {
        $html .= "<p class='postexcerpt'>";
        $html .= get_the_excerpt($post->ID);
        $html .= "</p>";
    }
    $html .= "<div class='postinfo'>";

    if ($format['show_author'] == 'y') {
        $html .= "<span class='postauthor'><i class='fas fa-user-circle'></i> " . get_the_author_posts_link() . "</span>";
    }
    if ($format['show_date'] == 'y') {
        $html .= "<span class='postdate'><i class='far fa-clock'></i> " . get_the_date('', $post->ID) . "</span>";
    }
    if (function_exists('the_views')) {
        if ($format['show_viewer'] == 'y') {
            $html .= "<span class='postviews'><i class='far fa-eye'></i> " . intval(get_post_meta($post->ID, 'views', true)) . " lượt xem</span>";
        }
    }
    if ($format['show_comments'] == 'y') {
        $comments_count = wp_count_comments($post->ID);
        $html .= "<span class='postcomment'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
    }

    $html .= "</div>";

    $html .= "</div></div>";
    $html .= "</article>";
    return $html;
}

function conggiao_homepage_section_static_format($section, $withContainer = false)
{
    $sectionBg = "background-color: {$section['bgcolor']}; border-radius: {$section['radius']}px; padding: {$section['padding']}px;";
    $html = "<section class='section {$section['chon']}' style='{$sectionBg}'>";
    $html .= ($withContainer == true) ? "<div class='container'>" : '';
    // Header
    $html .= ($section['tieude'] == '') ? '' : conggiao_homepage_section_header_format($section['tieude'], $section['headingcolor'], $section['mota'], $section['lienket'], $section['seperator'], $section['sepcolor'], $section['bgcolor']);

    // Content
    $html .= "<div class='section-content'>" . $section['content'] . "</div>";

    $html .= ($withContainer == true) ? "</div>" : '';
    $html .= "</section>";
    return $html;
}

function conggiao_homepage_section_post_format($section, $withContainer = false)
{
    $sectionBg = "background-color: {$section['bgcolor']}; border-radius: {$section['radius']}px; padding: {$section['padding']}px;";
    $html = "<section class='section {$section['chon']}' style='{$sectionBg}'>";
    $html .= ($withContainer == true) ? "<div class='container'>" : "";
    //Header
    $mota = ($section["mota"] != "") ? $section["mota"] : "";
    $xemthem = ($section["xemthem"] == "y") ? $section["xemthemtext"] : "";
    $xemthemlink = ($section["xemthem"] == "y") ? $section["xemthemlink"] : "";
    $html .= ($section['tieude'] == '') ? '' : conggiao_homepage_section_header_format($section['tieude'], $section['headingcolor'], $mota, $section['lienket'], $section['seperator'], $section['sepcolor'], $section['bgcolor'], $xemthem, $xemthemlink);
    // Content
    $contentArgs = array(
        'posts_per_page' => $section['num_post'],
    );
    if ($section['sortby'] == 'views') {
        $contentArgs['orderby'] = 'meta_value_num';
        $contentArgs['meta_key'] = 'views';
        if (!empty($section['postincats'])) {
            $cats = implode(',', $section['postincats']);
            $contentArgs['category'] = $cats;
        }
    }

    if ($section['sortby'] == "date") {
        if (!empty($section['postincats'])) {
            $cats = implode(',', $section['postincats']);
            $contentArgs['category'] = $cats;
        }
    }
    $viewOptions = array(
        'show_title' => ($section['show_title'] == 'y') ? true : false,
        'show_exper' => ($section['show_exper'] == 'y') ? true : false,
        'show_cats' => ($section['show_cats'] == 'y') ? true : false,
        'show_date' => ($section['show_date'] == 'y') ? true : false,
        'show_author' => ($section['show_author'] == 'y') ? true : false,
        'show_viewer' => ($section['show_viewer'] == 'y') ? true : false,
        'show_comments' => ($section['show_comments'] == 'y') ? true : false,
        'posttitlecolor' => $section['posttitlecolor'],
        'postmetacolor' => $section['postmetacolor'],
        'cats_bgcolor' => $section['headingcolor'],
        'cats_color' => $section['bgcolor'],
    );

    //printArr($contentArgs, 'contentArgs');

    $trans = "trans_" . vn_to_str($section['tieude']) . "_" . $section['style'];
    $html .= conggiao_homepage_get_posts_content_format($section['style'], $contentArgs, $viewOptions, $trans);

    $html .= ($withContainer == true) ? "</div>" : '';
    $html .= "</section>";
    return $html;
}

function conggiao_homepage_section_header_format($title, $titleColor, $des, $link, $sepStyle, $sepColor, $bgcolor, $xemthem = '', $xemthemlink = '')
{
    switch ($sepStyle) {
        case 'style-1':
            $html = "<div class='section-header sep-{$sepStyle}' style='border-bottom: 1px solid {$sepColor};'>";
            $html .= "<div class='main-title'>";
            $html .= "<h2 class='title is-5' style='color: $titleColor;'>";
            if ($xemthem != '') {
                $html .= "<span class='xemthem'>";
                $html .= "<a href='{$xemthemlink}' title='{$title}'>{$xemthem}</a>";
                $html .= "</span>";
            }
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
            if ($xemthem != '') {
                $html .= "<span class='xemthem'>";
                $html .= "<a href='{$xemthemlink}' title='{$title}'>{$xemthem}</a>";
                $html .= "</span>";
            }
            $html .= ($link != '') ? "<a style='color: $titleColor;' href='{$link}' title='{$title}'>{$title}</a>" : $title;
            $html .= "</h2>";

            $html .= "</div>";
            $html .= "</div>";
            break;

        case 'style-3':
            $html = "<div class='section-header sep-{$sepStyle}'>";
            $html .= "<div class='main-title'>";
            $html .= "<h2 class='title is-5'>";
            if ($xemthem != '') {
                $html .= "<span class='xemthem'>";
                $html .= "<a href='{$xemthemlink}' title='{$title}'>{$xemthem}</a>";
                $html .= "</span>";
            }
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
            if ($xemthem != '') {
                $html .= "<span class='xemthem'>";
                $html .= "<a href='{$xemthemlink}' title='{$title}'>{$xemthem}</a>";
                $html .= "</span>";
            }
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

function conggiao_homepage_get_posts_content_format($style, $args, $viewOptions, $trans)
{
    $html = "";
    switch ($style) {
        case 'style-1':
            $queryPosts = conggiao_get_posts($args, $trans);
            $html .= "<div class='section-content content-{$style} is-show-tablet'>";
            if (empty($queryPosts)) {
                $html .= '<br/><strong>Hiện chưa có bài viết nào ở danh mục này.</strong>';
                $html .= "</div>";
                return $html;
            }
            $number = count($queryPosts);
            // printArr($args, 'args');
            $viewOptionGreate1 = $viewOptions;
            $viewOptionGreate1['show_exper'] = false;
            $viewOptionGreate1['show_cats'] = false;
            if ($number <= 1) {
                setup_postdata($queryPosts[0]);
                $image = get_the_post_thumbnail_url($queryPosts[0]->ID);
                $html .= '<div class="post-item post-large" style="background: url(' . $image . ');">';
                $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[0], $viewOptions);
                $html .= "</div>"; //End 0
                wp_reset_postdata();
            } else {
                $maxPost = $number > 9 ? 9 : $number;
                //O
                $image = get_the_post_thumbnail_url($queryPosts[0]->ID);
                $html .= '<div class="post-item post-large" style="background: url(' . $image . ');">';
                setup_postdata($queryPosts[0]);
                $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[0], $viewOptions);
                $html .= "</div>"; //End 0
                wp_reset_postdata();

                for ($i = 1; $i < $maxPost; $i++) {
                    $image = get_the_post_thumbnail_url($queryPosts[$i]->ID);
                    setup_postdata($queryPosts[0]);
                    $html .= '<div class="post-item post-small post-small-' . $i . '" style="background: url(' . $image . ');">';
                    $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[$i], $viewOptions);
                    $html .= "</div>"; //End 0
                    wp_reset_postdata();
                }
            }
            break;
        case 'style-2':
            $queryPosts = conggiao_get_posts($args, $trans);
            $html .= "<div class='section-content content-{$style}'>";
            if (empty($queryPosts)) {
                $html .= '<br/><strong>Hiện chưa có bài viết nào ở danh mục này.</strong>';
                $html .= "</div>";
                return $html;
            }
            $html .= "<div class='columns is-variable is-1 is-mobile is-multiline'>";
            foreach ($queryPosts as $post) {
                setup_postdata($post);
                $html .= "<div class='column is-12-mobile is-6-tablet is-4-desktop'>";
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
            if (empty($queryPosts)) {
                $html .= '<br/><strong>Hiện chưa có bài viết nào ở danh mục này.</strong>';
                $html .= "</div>";
                return $html;
            }
            $number = count($queryPosts);
            if ($number == 1) {
                //Just One
                $post = $queryPosts[0];
                setup_postdata($post);
                $title = get_the_title($post->ID);
                $link = get_permalink($post->ID);
                $image = get_the_post_thumbnail_url($post->ID);
                $html .= "<div class='columns is-variable is-1 is-mobile wide-box'>";
                $html .= "<div class='column is-4-mobile is-4-tablet is-4-desktop'>";
                $html .= "<a href='{$link}'>";
                $html .= "<img class='post-thumb-img lazyload' data-sizes='auto' data-src='{$image}' alt='{$title}'>";
                $html .= "</a>";
                $html .= "</div>";
                $html .= "<div class='column is-8-mobile is-8-tablet is-8-desktop'>";
                $html .= "<div class='postmeta'><div class='postmetawrap'>";
                if ($viewOptions['show_cats']) {
                    $html .= "<div class='postcats'>";
                    $catStyle = "style='border: none; background-color: {$viewOptions['cats_bgcolor']}; color: {$viewOptions['cats_color']};'";
                    foreach (get_the_category($post->ID) as $category) {
                        $catLink = get_category_link($category->cat_ID);
                        $catName = $category->cat_name;
                        $html .= "<a href='{$catLink}' title='{$catName}' {$catStyle}>{$catName}</a>";
                    }
                    $html .= "</div>";
                }
                if ($viewOptions['show_title']) {
                    $html .= "<h2 class='posttitle'>";
                    $html .= "<a href='{$link}' style='color: {$viewOptions['posttitlecolor']}'>{$title}</a>";
                    $html .= "</h2>";
                }
                $html .= "<p class='postexcerpt' style='color: {$viewOptions['postmetacolor']}'>";
                $html .= get_the_excerpt($post->ID);
                $html .= "</p>";
                $html .= "<div class='postinfo'>";

                if ($viewOptions['show_author']) {
                    $authorlink = get_the_author_posts_link();
                    $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$viewOptions['postmetacolor']}'>", $authorlink);
                    $html .= "<span class='postauthor' style='color: {$viewOptions['postmetacolor']}'><i class='fas fa-user-circle'></i> " . $result . "</span>";
                }
                if ($viewOptions['show_date']) {
                    $html .= "<span class='postdate' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-clock'></i> " . get_the_date('', $post->ID) . "</span>";
                }
                if (function_exists('the_views')) {
                    if ($viewOptions['show_viewer']) {
                        $html .= "<span class='postviews' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-eye'></i> " . intval(get_post_meta($post->ID, 'views', true)) . " lượt xem</span>";
                    }
                }
                if ($viewOptions['show_comments']) {
                    $comments_count = wp_count_comments($post->ID);
                    $html .= "<span class='postcomment' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
                }

                $html .= "</div>";

                $html .= "</div></div>";
                $html .= "</div>";
                $html .= "</div>";
                wp_reset_postdata();
            } else {
                //Greater than one

                //1
                $post = $queryPosts[0];
                setup_postdata($post);
                $title = get_the_title($post->ID);
                $link = get_permalink($post->ID);
                $image = get_the_post_thumbnail_url($post->ID);
                $html .= "<div class='columns is-variable is-1 is-mobile wide-box'>";
                $html .= "<div class='column is-4-mobile is-4-tablet is-4-desktop'>";
                $html .= "<a href='{$link}'>";
                $html .= "<img class='post-thumb-img lazyload' data-sizes='auto' data-src='{$image}' alt='{$title}'>";
                $html .= "</a>";
                $html .= "</div>";
                $html .= "<div class='column is-8-mobile is-8-tablet is-8-desktop'>";
                $html .= "<div class='postmeta'><div class='postmetawrap'>";
                if ($viewOptions['show_cats'] == 'y') {
                    $html .= "<div class='postcats'>";
                    $catStyle = "style='border: none; background-color: {$viewOptions['cats_bgcolor']}; color: {$viewOptions['cats_color']};'";
                    foreach (get_the_category($post->ID) as $category) {
                        $catLink = get_category_link($category->cat_ID);
                        $catName = $category->cat_name;
                        $html .= "<a href='{$catLink}' title='{$catName}' {$catStyle}>{$catName}</a>";
                    }
                    $html .= "</div>";
                }
                if ($viewOptions['show_title'] == 'y') {
                    $html .= "<h2 class='posttitle'>";
                    $html .= "<a href='{$link}' style='color: {$viewOptions['posttitlecolor']}'>{$title}</a>";
                    $html .= "</h2>";
                }
                $html .= "<p class='postexcerpt' style='color: {$viewOptions['postmetacolor']}'>";
                $html .= get_the_excerpt($post->ID);
                $html .= "</p>";
                $html .= "<div class='postinfo'>";

                if ($viewOptions['show_author'] == 'y') {
                    $authorlink = get_the_author_posts_link();
                    $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$viewOptions['postmetacolor']}'>", $authorlink);
                    $html .= "<span class='postauthor' style='color: {$viewOptions['postmetacolor']}'><i class='fas fa-user-circle'></i> " . $result . "</span>";
                }
                if ($viewOptions['show_date'] == 'y') {
                    $html .= "<span class='postdate' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-clock'></i> " . get_the_date('', $post->ID) . "</span>";
                }
                if (function_exists('the_views')) {
                    if ($viewOptions['show_viewer'] == 'y') {
                        $html .= "<span class='postviews' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-eye'></i> " . intval(get_post_meta($post->ID, 'views', true)) . " lượt xem</span>";
                    }
                }
                if ($viewOptions['show_comments'] == 'y') {
                    $comments_count = wp_count_comments($post->ID);
                    $html .= "<span class='postcomment' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
                }

                $html .= "</div>";

                $html .= "</div></div>";
                $html .= "</div>";
                $html .= "</div>";
                wp_reset_postdata();
                //1...
                $html .= "<div class='columns is-variable is-1 is-mobile is-multiline small-box'>";
                for ($i = 1; $i < $number; $i++) {
                    setup_postdata($queryPosts[$i]);
                    $html .= "<div class='column is-full-mobile is-half-tablet is-one-third-desktop'>";
                    $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[$i], $viewOptions);
                    $html .= "</div>";
                }
                wp_reset_postdata();
                $html .= "</div>";
            }

            $html .= "</div>"; //end section-content
            break;
        case 'style-4':
            $queryPosts = conggiao_get_posts($args, $trans);
            $html .= "<div class='section-content content-{$style} is-show-tablet'>";
            if (empty($queryPosts)) {
                $html .= '<br/><strong>Hiện chưa có bài viết nào ở danh mục này.</strong>';
                $html .= "</div>";
                return $html;
            }
            $number = count($queryPosts);
            // printArr($args, 'args');
            $viewOptionGreate1 = $viewOptions;
            $viewOptionGreate1['show_exper'] = false;
            $viewOptionGreate1['show_cats'] = false;
            if ($number <= 1) {
                setup_postdata($queryPosts[0]);
                $title = get_the_title($queryPosts[0]->ID);
                $link = get_permalink($queryPosts[0]->ID);
                $image = get_the_post_thumbnail_url($queryPosts[0]->ID);
                $html .= '<div class="post-item post-large" style="background: url(' . $image . ');">';
                if ($viewOptions['show_cats']) {
                    $html .= "<div class='postcats is-clearfix'>";
                    $catStyle = "style='border: none; background-color: {$viewOptions['cats_bgcolor']}; color: {$viewOptions['cats_color']};'";
                    foreach (get_the_category($post->ID) as $category) {
                        $catLink = get_category_link($category->cat_ID);
                        $catName = $category->cat_name;
                        $html .= "<a href='{$catLink}' title='{$catName}' {$catStyle}>{$catName}</a>";
                    }
                    $html .= "</div>";
                }
                $html .= "</div>";
                $html .= '<div class="post-item post-large-meta">';

                $html .= "<div class='postmeta {$style} post-{$queryPosts[0]->ID}'><div class='postmetawrap'>";
                if ($viewOptions['show_title']) {
                    $html .= "<h2 class='posttitle'>";
                    $html .= "<a href='{$link}' style='color: {$viewOptions['posttitlecolor']}'>{$title}</a>";
                    $html .= "</h2>";
                }
                if ($viewOptions['show_exper']) {
                    $html .= "<p class='postexcerpt' style='color: {$viewOptions['postmetacolor']}'>";
                    $html .= get_the_excerpt($queryPosts[0]->ID);
                    $html .= "</p>";
                }
                $html .= "<div class='postinfo'>";

                if ($viewOptions['show_author']) {
                    $authorlink = get_the_author_posts_link();
                    $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$viewOptions['postmetacolor']}'>", $authorlink);
                    $html .= "<span class='postauthor' style='color: {$viewOptions['postmetacolor']}'><i class='fas fa-user-circle'></i> " . $result . "</span>";
                }
                if ($viewOptions['show_date']) {
                    $html .= "<span class='postdate' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-clock'></i> " . get_the_date('', $queryPosts[0]->ID) . "</span>";
                }
                if (function_exists('the_views')) {
                    if ($viewOptions['show_viewer']) {
                        $html .= "<span class='postviews' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-eye'></i> " . intval(get_post_meta($queryPosts[0]->ID, 'views', true)) . " lượt xem</span>";
                    }
                }
                if ($viewOptions['show_comments']) {
                    $comments_count = wp_count_comments($queryPosts[0]->ID);
                    $html .= "<span class='postcomment' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
                }
                $html .= "</div>";
                $html .= "</div></div>";
                $html .= "</div>";
                wp_reset_postdata();
            } else {
                $maxPost = $number > 6 ? 6 : $number;
                //O
                setup_postdata($queryPosts[0]);
                $title = get_the_title($queryPosts[0]->ID);
                $link = get_permalink($queryPosts[0]->ID);
                $image = get_the_post_thumbnail_url($queryPosts[0]->ID);
                $html .= '<div class="post-item post-large" style="background: url(' . $image . ');">';
                if ($viewOptions['show_cats']) {
                    $html .= "<div class='postcats is-clearfix'>";
                    $catStyle = "style='border: none; background-color: {$viewOptions['cats_bgcolor']}; color: {$viewOptions['cats_color']};'";
                    foreach (get_the_category($post->ID) as $category) {
                        $catLink = get_category_link($category->cat_ID);
                        $catName = $category->cat_name;
                        $html .= "<a href='{$catLink}' title='{$catName}' {$catStyle}>{$catName}</a>";
                    }
                    $html .= "</div>";
                }
                $html .= "</div>";
                $html .= '<div class="post-item post-large-meta">';
                $html .= "<div class='postmeta {$style} post-{$queryPosts[0]->ID}'><div class='postmetawrap'>";
                $html .= "<div class='postinfo'>";
                if ($viewOptions['show_author']) {
                    $authorlink = get_the_author_posts_link();
                    $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$viewOptions['postmetacolor']}'>", $authorlink);
                    $html .= "<span class='postauthor' style='color: {$viewOptions['postmetacolor']}'><i class='fas fa-user-circle'></i> " . $result . "</span>";
                }
                if ($viewOptions['show_date']) {
                    $html .= "<span class='postdate' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-clock'></i> " . get_the_date('', $queryPosts[0]->ID) . "</span>";
                }
                if (function_exists('the_views')) {
                    if ($viewOptions['show_viewer']) {
                        $html .= "<span class='postviews' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-eye'></i> " . intval(get_post_meta($queryPosts[0]->ID, 'views', true)) . " lượt xem</span>";
                    }
                }
                if ($viewOptions['show_comments']) {
                    $comments_count = wp_count_comments($queryPosts[0]->ID);
                    $html .= "<span class='postcomment' style='color: {$viewOptions['postmetacolor']}'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
                }
                $html .= "</div>";
                if ($viewOptions['show_title']) {
                    $html .= "<h2 class='posttitle'>";
                    $html .= "<a href='{$link}' style='color: {$viewOptions['posttitlecolor']}'>{$title}</a>";
                    $html .= "</h2>";
                }
                if ($viewOptions['show_exper']) {
                    $html .= "<p class='postexcerpt' style='color: {$viewOptions['postmetacolor']}'>";
                    $html .= get_the_excerpt($queryPosts[0]->ID);
                    $html .= "</p>";
                }

                $html .= "</div></div>";
                $html .= "</div>";
                wp_reset_postdata();

                for ($i = 1; $i < $maxPost; $i++) {
                    setup_postdata($queryPosts[$i]);
                    $html .= '<div class="post-item post-small post-small-' . $i . ' is-clearfix">';
                    $html .= conggiao_homepage_get_single_post_content_format($style, $queryPosts[$i], $viewOptions);
                    $html .= "</div>"; //End 0
                    wp_reset_postdata();
                }
            }
            break;
        default:
            # code...
            break;
    }

    return $html;
}

function conggiao_homepage_get_single_post_content_format($style, $post, $format)
{
    $title = get_the_title($post->ID);
    $link = get_permalink($post->ID);
    $image = get_the_post_thumbnail_url($post->ID);
    switch ($style) {
        case 'style-1':
            $html .= "<div class='postmeta {$style} post-{$post->ID}'><div class='postmetawrap'>";

            if ($format['show_cats']) {
                $html .= "<div class='postcats is-clearfix'>";
                $catStyle = "style='border: none; background-color: {$format['cats_bgcolor']}; color: {$format['cats_color']};'";
                foreach (get_the_category($post->ID) as $category) {
                    $catLink = get_category_link($category->cat_ID);
                    $catName = $category->cat_name;
                    $html .= "<a href='{$catLink}' title='{$catName}' {$catStyle}>{$catName}</a>";
                }
                $html .= "</div>";
            }
            if ($format['show_title']) {
                $html .= "<h2 class='posttitle'>";
                $html .= "<a href='{$link}' style='color: {$format['posttitlecolor']}'>{$title}</a>";
                $html .= "</h2>";
            }
            if ($format['show_exper']) {
                $html .= "<p class='postexcerpt' style='color: {$format['postmetacolor']}'>";
                $html .= get_the_excerpt($post->ID);
                $html .= "</p>";
            }
            $html .= "<div class='postinfo'>";

            if ($format['show_author']) {
                $authorlink = get_the_author_posts_link();
                $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$format['postmetacolor']}'>", $authorlink);
                $html .= "<span class='postauthor' style='color: {$format['postmetacolor']}'><i class='fas fa-user-circle'></i> " . $result . "</span>";
            }
            if ($format['show_date']) {
                $html .= "<span class='postdate' style='color: {$format['postmetacolor']}'><i class='far fa-clock'></i> " . get_the_date('', $post->ID) . "</span>";
            }
            if (function_exists('the_views')) {
                if ($format['show_viewer']) {
                    $html .= "<span class='postviews' style='color: {$format['postmetacolor']}'><i class='far fa-eye'></i> " . intval(get_post_meta($post->ID, 'views', true)) . " lượt xem</span>";
                }
            }
            if ($format['show_comments']) {
                $comments_count = wp_count_comments($post->ID);
                $html .= "<span class='postcomment' style='color: {$format['postmetacolor']}'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
            }

            $html .= "</div>";

            $html .= "</div></div>";
            break;

        case 'style-2':
            $html = "<article class='single-post {$style} post-{$post->ID}'>";
            $html .= "<div class='postthumb lazyload' data-sizes='auto' data-bgset='{$image}'>";
            // $html .= "<img class='post-thumb-img lazyload' data-sizes='auto' data-parent-fit='cover' data-src='{$image}' alt='{$title}'>";
            $html .= "</div>";
            $html .= "<div class='postmeta'><div class='postmetawrap'>";

            if ($format['show_cats']) {
                $html .= "<div class='postcats'>";
                $catStyle = "style='border: none; background-color: {$format['cats_bgcolor']}; color: {$format['cats_color']};'";
                foreach (get_the_category($post->ID) as $category) {
                    $catLink = get_category_link($category->cat_ID);
                    $catName = $category->cat_name;
                    $html .= "<a href='{$catLink}' title='{$catName}' {$catStyle}>{$catName}</a>";
                }
                $html .= "</div>";
            }
            if ($format['show_title']) {
                $html .= "<h2 class='posttitle'>";
                $html .= "<a href='{$link}' style='color: {$format['posttitlecolor']}'>{$title}</a>";
                $html .= "</h2>";
            }
            if ($format['show_exper']) {
                $html .= "<p class='postexcerpt' style='color: {$format['postmetacolor']}'>";
                $html .= get_the_excerpt($post->ID);
                $html .= "</p>";
            }
            $html .= "<div class='postinfo'>";

            if ($format['show_author']) {
                $authorlink = get_the_author_posts_link();
                $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$format['postmetacolor']}'>", $authorlink);
                $html .= "<span class='postauthor' style='color: {$format['postmetacolor']}'><i class='fas fa-user-circle'></i> " . $result . "</span>";
            }
            if ($format['show_date']) {
                $html .= "<span class='postdate' style='color: {$format['postmetacolor']}'><i class='far fa-clock'></i> " . get_the_date('', $post->ID) . "</span>";
            }
            if (function_exists('the_views')) {
                if ($format['show_viewer']) {
                    $html .= "<span class='postviews' style='color: {$format['postmetacolor']}'><i class='far fa-eye'></i> " . intval(get_post_meta($post->ID, 'views', true)) . " lượt xem</span>";
                }
            }
            if ($format['show_comments']) {
                $comments_count = wp_count_comments($post->ID);
                $html .= "<span class='postcomment' style='color: {$format['postmetacolor']}'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
            }

            $html .= "</div>";

            $html .= "</div></div>";

            $html .= "</article>";
            break;

        case 'style-3':
            $html = "<article class='single-post {$style} post-{$post->ID}'>";
            $html .= "<div class='postthumb lazyload' data-sizes='auto' data-bgset='{$image}'>";
            // $html .= "<div class='postthumb'>";
            // $html .= "<img class='post-thumb-img lazyload' data-sizes='auto' data-src='{$image}' alt='{$title}'>";
            $html .= "</div>";
            $html .= "<div class='postmeta'><div class='postmetawrap'>";
            if ($format['show_cats']) {
                $html .= "<div class='postcats'>";
                $catStyle = "style='border: none; background-color: {$format['cats_bgcolor']}; color: {$format['cats_color']};'";
                foreach (get_the_category($post->ID) as $category) {
                    $catLink = get_category_link($category->cat_ID);
                    $catName = $category->cat_name;
                    $html .= "<a href='{$catLink}' title='{$catName}' {$catStyle}>{$catName}</a>";
                }
                $html .= "</div>";
            }
            if ($format['show_title']) {
                $html .= "<h2 class='posttitle'>";
                $html .= "<a href='{$link}' style='color: {$format['posttitlecolor']}'>{$title}</a>";
                $html .= "</h2>";
            }
            if ($format['show_exper']) {
                $html .= "<p class='postexcerpt' style='color: {$format['postmetacolor']}'>";
                $html .= get_the_excerpt($post->ID);
                $html .= "</p>";
            }
            $html .= "<div class='postinfo'>";

            if ($format['show_author']) {
                $authorlink = get_the_author_posts_link();
                $result = preg_replace("/(<a\b[^><]*)>/i", "$1 style='color: {$format['postmetacolor']}'>", $authorlink);
                $html .= "<span class='postauthor' style='color: {$format['postmetacolor']}'><i class='fas fa-user-circle'></i> " . $result . "</span>";
            }
            if ($format['show_date']) {
                $html .= "<span class='postdate' style='color: {$format['postmetacolor']}'><i class='far fa-clock'></i> " . get_the_date('', $post->ID) . "</span>";
            }
            if (function_exists('the_views')) {
                if ($format['show_viewer']) {
                    $html .= "<span class='postviews' style='color: {$format['postmetacolor']}'><i class='far fa-eye'></i> " . intval(get_post_meta($post->ID, 'views', true)) . " lượt xem</span>";
                }
            }
            if ($format['show_comments']) {
                $comments_count = wp_count_comments($post->ID);
                $html .= "<span class='postcomment' style='color: {$format['postmetacolor']}'><i class='far fa-comments'></i> " . $comments_count->approved . "</span>";
            }

            $html .= "</div>";

            $html .= "</div></div>";

            $html .= "</article>";
            break;
        case 'style-4':
            $html = "<div class='{$style} post-{$post->ID}'>";
            $html .= "<div class='post-left is-clearfix'>";
            $html .= "<img class='post-thumb-img lazyload' data-sizes='auto' data-src='{$image}' alt='{$title}'>";
            $html .= "</div>";
            $html .= "<div class='post-content'>";
            if ($format['show_title']) {
                $html .= "<h2 class='posttitle'>";
                $html .= "<a href='{$link}' style='color: {$format['posttitlecolor']}'>{$title}</a>";
                $html .= "</h2>";
            }
            $html .= "</div>";
            $html .= "</div>";
            break;
        default:
            # code...
            break;
    }

    return $html;
}

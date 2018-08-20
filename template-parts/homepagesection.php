<?php
$homesections = cg_home_get_section();
foreach ($homesections as $section) {
    // var_dump($section);
    $isContainer = ($homesidebar['chon'] == 'y') ? false : true;
    switch ($section['chon']) {
        case 'c_static':

            echo do_shortcode(conggiao_homepage_section_static_format($section, $isContainer));
            break;
        case 'c_post':
            echo conggiao_homepage_section_post_format($section, $isContainer);
            break;
        default:
            # code...
            break;
    }
}

<?php 
// $orig_post = $post;
// global $post;
$categories = get_the_category($post->ID);
if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 3, // Number of related posts that will be shown.
    );

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
        echo '<div id="related_posts"><h3 class="title is-4">Bài Viết Tương Tự</h3><div class="columns is-mobile is-multiline">';
        while( $my_query->have_posts() ) {
            $my_query->the_post(); ?>
            <div class="column is-6-mobile is-4-tablet is-4-desktop"> 
                <div class="post-thumb">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" title="" rel="bookmark">
                        <img class="post-thumb-img lazyload" data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title() ?>">
                    </a>
                </div>
                <?php the_title( '<h4 class="posttitle"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" style="color: #242424;">', '</a></h4>' ); ?>
               
            </div>
        <?php } echo '</div></div>';
    }
    wp_reset_query(); 
}
// $post = $orig_post;
?>
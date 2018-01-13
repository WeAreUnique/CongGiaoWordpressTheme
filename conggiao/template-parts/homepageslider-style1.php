<?php 
	
	$latestArgs = array(
        'numberposts' 	=> $homefeatured['num_post'],
    );
	$slideType = $homefeatured['slidertype'];

	if ($slideType == 'c_latest'){
		if ( !empty($homefeatured['slidercats']) ){
			$cats = implode(',', $homefeatured['slidercats']);
			$latestArgs['category'] = $cats;
		}
		$latestArgs['orderby'] = 'date';
	}

	if ($slideType == 'c_views'){
		if ( !empty($homefeatured['slidercats']) ){
			$cats = implode(',', $homefeatured['slidercats']);
			$latestArgs['category'] = $cats;
		}
		$latestArgs['orderby'] = 'meta_value_num';
        $latestArgs['meta_key'] = 'views';
	}

	if ($slideType == 'c_manual'){
		$arrIds = array();
		$arrData = $homefeatured['sliderids'];
		foreach ($arrData as $val){
			if ( !in_array($val['postsingle'][0], $arrIds) ){
			    $arrIds[] = $val['postsingle'][0]; 
			}
		}
		$latestArgs['post__in'] = $arrIds;
	}

	//printArr($latestArgs, 'latestArgs');
	$allPosts = conggiao_get_posts($latestArgs, 'tran_homepageslider1');

	$boxIds = array();
	$trans = '';
	for ($i=1; $i <= 4 ; $i++) { 
		if ($homefeatured["box{$i}_type"] == 'c_post'){
			$boxIds[] = $homefeatured["box{$i}_postId"];
			$trans .= '_'.$homefeatured["box{$i}_postId"];
		}
	}
	$boxPosts = array();
	if ( !empty( $boxIds ) ){
		$boxArgs = array(
			'numberposts' 	=> count($boxIds),
			'post__in'		=> $boxIds,
		);
		$boxPosts = conggiao_get_posts($boxArgs, "tran_homepagebox{$trans}");
	}
?>
<div class="columns is-variable is-1" id="homepage-slider1">
	<div class="column slider">
		<div class="slider1-content is-clearfix">
		<?php 
			foreach ( $allPosts as $post ) : setup_postdata( $post ); 
				echo '<div class="slider-single">';
				$postFormat = array(
					'show_title' 		=> $homefeatured['show_title'],
				    'show_exper' 		=> $homefeatured['show_exper'],
				    'show_cats' 		=> $homefeatured['show_cats'],
				    'show_date' 		=> $homefeatured['show_date'],
				    'show_author' 		=> $homefeatured['show_author'],
				    'show_viewer' 		=> $homefeatured['show_viewer'],
				    'show_comments' 	=> $homefeatured['show_comments'],
				);
				echo conggiao_slider_post_format($post, $postFormat);
				echo '</div>';
				?>
				
			<?php endforeach; wp_reset_postdata();?>
		</div>
	</div>
	<div class="column boxs">
		<div class="columns is-variable is-1 is-mobile box-wide">
			<div class="column is-half-mobile box-single">
				<?php
					if ($homefeatured["box1_type"] == 'c_html'){
						echo $homefeatured["box1_content"];
					}else{
						foreach ($boxPosts as $boxpost) {
							if ($boxpost->ID == $homefeatured["box1_postId"]){
								$boxFormatArgs = array(
									'show_title' 		=> $homefeatured['box1_show_title'],
								    'show_exper' 		=> $homefeatured['box1_show_exper'],
								    'show_cats' 		=> $homefeatured['box1_show_cats'],
								    'show_date' 		=> $homefeatured['box1_show_date'],
								    'show_author' 		=> $homefeatured['box1_show_author'],
								    'show_viewer' 		=> $homefeatured['box1_show_viewer'],
								    'show_comments' 	=> $homefeatured['box1_show_comments'],
								);
								echo conggiao_slider_post_format($boxpost, $boxFormatArgs);
								break;
							}
						}
					}
				?>
			</div>
			<div class="column is-half-mobile box-single">
				<?php
					if ($homefeatured["box2_type"] == 'c_html'){
						echo $homefeatured["box2_content"];
					}else{
						foreach ($boxPosts as $boxpost) {
							if ($boxpost->ID == $homefeatured["box2_postId"]){
								$boxFormatArgs = array(
									'show_title' 		=> $homefeatured['box2_show_title'],
								    'show_exper' 		=> $homefeatured['box2_show_exper'],
								    'show_cats' 		=> $homefeatured['box2_show_cats'],
								    'show_date' 		=> $homefeatured['box2_show_date'],
								    'show_author' 		=> $homefeatured['box2_show_author'],
								    'show_viewer' 		=> $homefeatured['box2_show_viewer'],
								    'show_comments' 	=> $homefeatured['box2_show_comments'],
								);
								echo conggiao_slider_post_format($boxpost, $boxFormatArgs);
								break;
							}
						}
					}
				?>
			</div>
		</div>
		<div class="columns is-variable is-1 is-mobile box-wide">
			<div class="column is-half-mobile box-single">
				<?php
					if ($homefeatured["box3_type"] == 'c_html'){
						echo $homefeatured["box3_content"];
					}else{
						foreach ($boxPosts as $boxpost) {
							if ($boxpost->ID == $homefeatured["box3_postId"]){
								$boxFormatArgs = array(
									'show_title' 		=> $homefeatured['box3_show_title'],
								    'show_exper' 		=> $homefeatured['box3_show_exper'],
								    'show_cats' 		=> $homefeatured['box3_show_cats'],
								    'show_date' 		=> $homefeatured['box3_show_date'],
								    'show_author' 		=> $homefeatured['box3_show_author'],
								    'show_viewer' 		=> $homefeatured['box3_show_viewer'],
								    'show_comments' 	=> $homefeatured['box3_show_comments'],
								);
								echo conggiao_slider_post_format($boxpost, $boxFormatArgs);
								break;
							}
						}
					}
				?>
			</div>
			<div class="column is-half-mobile box-single">
				<?php
					if ($homefeatured["box4_type"] == 'c_html'){
						echo $homefeatured["box4_content"];
					}else{
						foreach ($boxPosts as $boxpost) {
							if ($boxpost->ID == $homefeatured["box4_postId"]){
								$boxFormatArgs = array(
									'show_title' 		=> $homefeatured['box4_show_title'],
								    'show_exper' 		=> $homefeatured['box4_show_exper'],
								    'show_cats' 		=> $homefeatured['box4_show_cats'],
								    'show_date' 		=> $homefeatured['box4_show_date'],
								    'show_author' 		=> $homefeatured['box4_show_author'],
								    'show_viewer' 		=> $homefeatured['box4_show_viewer'],
								    'show_comments' 	=> $homefeatured['box4_show_comments'],
								);
								echo conggiao_slider_post_format($boxpost, $boxFormatArgs);
								break;
							}
						}
					}
				?>
			</div>
		</div>
	</div>
</div>

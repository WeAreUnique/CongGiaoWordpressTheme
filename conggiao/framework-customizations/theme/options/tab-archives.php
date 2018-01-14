<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
$options   = array(

	'archives'  	=> array(
	    'type' 		=> 'tab',
	    'title' 	=> __('Thiết Lập Archives', 'conggiao'),
	    'options' 	=> array(
	    	'tab_cats' 		=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Chuyên Mục', 'conggiao'),
			    'options' 	=> array(
			    	'cats_default'		=> array(
			    		'type'  => 'multi',
			    		'label' => __(false, 'conggiao'),
					    'desc'  => __(false, 'conggiao'),
					    'help'  => __('Thiết lập hiển thị cho Chuyên Mục', 'conggiao'),
					    'inner-options' => array(
					    	'sidebar'   	=> array(
		                        'type'          => 'multi-picker',
		                        'label'         => false,
		                        'desc'          => false,
		                        'show_borders'  => false,
		                        'picker'        => array(
		                            'action_show'   => array(
		                                'type'      => 'switch',
		                                'value'     => 'y',
		                                'label'     => __('Hiển thị Sidebar', 'conggiao'),
		                                'desc'      => __('Bạn có muốn hiển thị sidebar ở Chuyên Mục không?', 'conggiao'),
		                                'left-choice'   => array(
		                                    'value'     => 'n',
		                                    'label'     => __('KHÔNG', 'conggiao'),
		                                ),
		                                'right-choice'  => array(
		                                    'value'     => 'y',
		                                    'label'     => __('CÓ', 'conggiao'),
		                                ),
		                            )
		                        ),
		                        'choices'       => array(
		                            'n'         => array(),
		                            'y'         => array(
		                                'sidebar_pos'   => array(
		                                    'type'      => 'image-picker',
		                                    'label'     => '',
		                                    'value'		=> 'right',
		                                    'desc'      => 'Hiễn thị sidebar bên trái hay phải?',
		                                    'choices'   => array(
		                                        'left'  => get_template_directory_uri() .'/assets/images/layouts/left-sidebar.jpg',
		                                        'right' => get_template_directory_uri() .'/assets/images/layouts/right-sidebar.jpg',
		                                    )
		                                )
		                            )
		                        ),
		                    ),
		                    'title'     	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tiêu Đề Chuyên Mục', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tiêu Đề Chuyên Mục?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'exper'     	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'n',
		                        'label'     => __('Mô Tả Chuyên Mục', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Mô Tả Chuyên Mục (nằm dưới Tiêu Đề Chuyên Mục)?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'columns'		=> array(
		                        'type'      => 'image-picker',
		                        'label'     => 'Số Cột Chuyên Mục',
		                        'value' 	=> 'c2',
		                        'desc'      => 'Bạn muốn Chuyên Mục hiển thị bao nhiêu bài viết 1 hàng?',
		                        'choices'   => array(
		                            'c1'    => get_template_directory_uri() .'/assets/images/layouts/one-column.png',
		                            'c2'    => get_template_directory_uri() .'/assets/images/layouts/two-column.png',
		                            'c3'    => get_template_directory_uri() .'/assets/images/layouts/three-column.png',
		                            'c4'    => get_template_directory_uri() .'/assets/images/layouts/four-column.png',
		                        )
		                    ),
		                    'post_thumb'    => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Hình Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Hình Đại Diện của Bài Viết không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_title'    => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Tiêu Đề Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Tiêu Đề Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_exper'    => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'n',
		                        'label'     	=> __('Mô Tả Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Mô Tả Ngắn của Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_date'     => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Ngày/Giờ Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Ngày/Giờ bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_author'   => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tác Giả Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tác Giả bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_viewer'   => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Lượt Xem Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Lượt Xen bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_comments' => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Số Bình Luận', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Bình Luận bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_radius'   => array(
		                        'type'          => 'slider',
		                        'value'         => 0,
		                        'properties'    => array(
		                            'min'       => 0,
		                            'max'       => 20,
		                            'step'      => 1, // Set slider step. Always > 0. Could be fractional.
		                        ),
		                        'label'         => __('Viền Bo', 'conggiao'),
		                        'desc'          => __('Bạn muốn bài viết có Viền Bo Cong là bao nhiêu?', 'conggiao'),
		                    ),
					    ),
			    	),
			    ),
			),
			'tab_tags' 		=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Từ Khóa', 'conggiao'),
			    'options' 	=> array(
			    	'tags_default'		=> array(
			    		'type'  => 'multi',
			    		'label' => __(false, 'conggiao'),
					    'desc'  => __(false, 'conggiao'),
					    'help'  => __('Thiết lập hiển thị cho Từ Khóa', 'conggiao'),
					    'inner-options' => array(
					    	'sidebar'   	=> array(
		                        'type'          => 'multi-picker',
		                        'label'         => false,
		                        'desc'          => false,
		                        'show_borders'  => false,
		                        'picker'        => array(
		                            'action_show'   => array(
		                                'type'      => 'switch',
		                                'value'     => 'y',
		                                'label'     => __('Hiển thị Sidebar', 'conggiao'),
		                                'desc'      => __('Bạn có muốn hiển thị sidebar ở Từ Khóa không?', 'conggiao'),
		                                'left-choice'   => array(
		                                    'value'     => 'n',
		                                    'label'     => __('KHÔNG', 'conggiao'),
		                                ),
		                                'right-choice'  => array(
		                                    'value'     => 'y',
		                                    'label'     => __('CÓ', 'conggiao'),
		                                ),
		                            )
		                        ),
		                        'choices'       => array(
		                            'n'         => array(),
		                            'y'         => array(
		                                'sidebar_pos'   => array(
		                                    'type'      => 'image-picker',
		                                    'label'     => '',
		                                    'value'		=> 'right',
		                                    'desc'      => 'Hiễn thị sidebar bên trái hay phải?',
		                                    'choices'   => array(
		                                        'left'  => get_template_directory_uri() .'/assets/images/layouts/left-sidebar.jpg',
		                                        'right' => get_template_directory_uri() .'/assets/images/layouts/right-sidebar.jpg',
		                                    )
		                                )
		                            )
		                        ),
		                    ),
		                    'title'     	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tên Từ Khóa', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tên Từ Khóa ở trang Từ Khóa không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'exper'     	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'n',
		                        'label'     => __('Mô Tả Từ Khóa', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Mô Tả Từ Khóa (nằm dưới Tiêu Đề Từ Khóa)?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'columns'		=> array(
		                        'type'      => 'image-picker',
		                        'label'     => 'Số Cột Bài Viết',
		                        'value' 	=> 'c2',
		                        'desc'      => 'Bạn muốn Trang Từ Khóa hiển thị bao nhiêu bài viết 1 hàng?',
		                        'choices'   => array(
		                            'c1'    => get_template_directory_uri() .'/assets/images/layouts/one-column.png',
		                            'c2'    => get_template_directory_uri() .'/assets/images/layouts/two-column.png',
		                            'c3'    => get_template_directory_uri() .'/assets/images/layouts/three-column.png',
		                            'c4'    => get_template_directory_uri() .'/assets/images/layouts/four-column.png',
		                        )
		                    ),
		                    'post_thumb'   	=> array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Hình Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Hình Đại Diện của Bài Viết không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_title'   	=> array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Tiêu Đề Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Tiêu Đề Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_exper'   	=> array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'n',
		                        'label'     	=> __('Mô Tả Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Mô Tả Ngắn của Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_date'    	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Ngày/Giờ Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Ngày/Giờ bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_author'  	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tác Giả Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tác Giả bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_viewer'  	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Lượt Xem Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Lượt Xen bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_comments'	=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Số Bình Luận', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Bình Luận bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_radius'  	=> array(
		                        'type'          => 'slider',
		                        'value'         => 0,
		                        'properties'    => array(
		                            'min'       => 0,
		                            'max'       => 20,
		                            'step'      => 1, // Set slider step. Always > 0. Could be fractional.
		                        ),
		                        'label'         => __('Viền Bo', 'conggiao'),
		                        'desc'          => __('Bạn muốn bài viết có Viền Bo Cong là bao nhiêu?', 'conggiao'),
		                    ),
					    ),
					),
			    ),
			),
			'tab_author'	=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Tác Giả', 'conggiao'),
			    'options' 	=> array(
			    	'author_default'	  => array(
			    		'type'  => 'multi',
			    		'label' => __(false, 'conggiao'),
					    'desc'  => __(false, 'conggiao'),
					    'help'  => __('Thiết lập hiển thị cho Tác Giả', 'conggiao'),
					    'inner-options' => array(
					    	'sidebar'	  => array(
		                        'type'          => 'multi-picker',
		                        'label'         => false,
		                        'desc'          => false,
		                        'show_borders'  => false,
		                        'picker'        => array(
		                            'action_show'   => array(
		                                'type'      => 'switch',
		                                'value'     => 'y',
		                                'label'     => __('Hiển thị Sidebar', 'conggiao'),
		                                'desc'      => __('Bạn có muốn hiển thị sidebar ở Tác Giả không?', 'conggiao'),
		                                'left-choice'   => array(
		                                    'value'     => 'n',
		                                    'label'     => __('KHÔNG', 'conggiao'),
		                                ),
		                                'right-choice'  => array(
		                                    'value'     => 'y',
		                                    'label'     => __('CÓ', 'conggiao'),
		                                ),
		                            )
		                        ),
		                        'choices'       => array(
		                            'n'         => array(),
		                            'y'         => array(
		                                'sidebar_pos'   => array(
		                                    'type'      => 'image-picker',
		                                    'label'     => '',
		                                    'value'		=> 'right',
		                                    'desc'      => 'Hiễn thị sidebar bên trái hay phải?',
		                                    'choices'   => array(
		                                        'left'  => get_template_directory_uri() .'/assets/images/layouts/left-sidebar.jpg',
		                                        'right' => get_template_directory_uri() .'/assets/images/layouts/right-sidebar.jpg',
		                                    )
		                                )
		                            )
		                        ),
		                    ),
		                    'title'        => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tiêu Đề Chuyên Mục', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tên Tác Giả?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'exper'        => array(
		                        'type'      => 'switch',
		                        'value'     => 'n',
		                        'label'     => __('Mô Tả Chuyên Mục', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Giới Thiệu Tác Giả (nằm dưới Tên Tác Giả)?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'columns'	  => array(
		                        'type'      => 'image-picker',
		                        'label'     => 'Số Cột Bài Viết',
		                        'value' 	=> 'c2',
		                        'desc'      => 'Bạn muốn Bài Viết của Tác Giả hiển thị bao nhiêu bài viết 1 hàng?',
		                        'choices'   => array(
		                            'c1'    => get_template_directory_uri() .'/assets/images/layouts/one-column.png',
		                            'c2'    => get_template_directory_uri() .'/assets/images/layouts/two-column.png',
		                            'c3'    => get_template_directory_uri() .'/assets/images/layouts/three-column.png',
		                            'c4'    => get_template_directory_uri() .'/assets/images/layouts/four-column.png',
		                        )
		                    ),
		                    'post_thumb'    => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Hình Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Hình Đại Diện của Bài Viết không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_title'    => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Tiêu Đề Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Tiêu Đề Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_exper'    => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'n',
		                        'label'     	=> __('Mô Tả Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Mô Tả Ngắn của Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_date'     => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Ngày/Giờ Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Ngày/Giờ bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_author'   => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tác Giả Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tác Giả bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_viewer'   => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Lượt Xem Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Lượt Xen bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_comments' => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Số Bình Luận', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Bình Luận bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_radius'   => array(
		                        'type'          => 'slider',
		                        'value'         => 0,
		                        'properties'    => array(
		                            'min'       => 0,
		                            'max'       => 20,
		                            'step'      => 1, // Set slider step. Always > 0. Could be fractional.
		                        ),
		                        'label'         => __('Viền Bo', 'conggiao'),
		                        'desc'          => __('Bạn muốn bài viết có Viền Bo Cong là bao nhiêu?', 'conggiao'),
		                    ),
					    ),
					),
			    ),
			),
			'tab_other'	=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Còn Lại (Ngày, Tax)', 'conggiao'),
			    'options' 	=> array(
			    	'other_default'		=> array(
			    		'type'  => 'multi',
			    		'label' => __(false, 'conggiao'),
					    'desc'  => __(false, 'conggiao'),
					    'help'  => __('Thiết lập hiển thị cho Archives khác (Tax, Term)', 'conggiao'),
					    'inner-options' => array(
					    	'sidebar'   	 => array(
		                        'type'          => 'multi-picker',
		                        'label'         => false,
		                        'desc'          => false,
		                        'show_borders'  => false,
		                        'picker'        => array(
		                            'action_show'   => array(
		                                'type'      => 'switch',
		                                'value'     => 'y',
		                                'label'     => __('Hiển thị Sidebar', 'conggiao'),
		                                'desc'      => __('Bạn có muốn hiển thị sidebar các mục khác không?', 'conggiao'),
		                                'left-choice'   => array(
		                                    'value'     => 'n',
		                                    'label'     => __('KHÔNG', 'conggiao'),
		                                ),
		                                'right-choice'  => array(
		                                    'value'     => 'y',
		                                    'label'     => __('CÓ', 'conggiao'),
		                                ),
		                            )
		                        ),
		                        'choices'       => array(
		                            'n'         => array(),
		                            'y'         => array(
		                                'sidebar_pos'   => array(
		                                    'type'      => 'image-picker',
		                                    'label'     => '',
		                                    'value'		=> 'right',
		                                    'desc'      => 'Hiễn thị sidebar bên trái hay phải?',
		                                    'choices'   => array(
		                                        'left'  => get_template_directory_uri() .'/assets/images/layouts/left-sidebar.jpg',
		                                        'right' => get_template_directory_uri() .'/assets/images/layouts/right-sidebar.jpg',
		                                    )
		                                )
		                            )
		                        ),
		                    ),
		                    'title'     	 => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tiêu Đề', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tiêu Đề cho mục đó không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'exper'     	 => array(
		                        'type'      => 'switch',
		                        'value'     => 'n',
		                        'label'     => __('Mô Tả Chuyên Mục', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Mô Tả Mục (nằm dưới Tiêu Đề Mục)?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'columns'		 => array(
		                        'type'      => 'image-picker',
		                        'label'     => 'Số Cột Bài Viết',
		                        'value' 	=> 'c2',
		                        'desc'      => 'Bạn muốn hiển thị bao nhiêu bài viết 1 hàng?',
		                        'choices'   => array(
		                            'c1'    => get_template_directory_uri() .'/assets/images/layouts/one-column.png',
		                            'c2'    => get_template_directory_uri() .'/assets/images/layouts/two-column.png',
		                            'c3'    => get_template_directory_uri() .'/assets/images/layouts/three-column.png',
		                            'c4'    => get_template_directory_uri() .'/assets/images/layouts/four-column.png',
		                        )
		                    ),
		                    'post_thumb'   => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Hình Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Hình Đại Diện của Bài Viết không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_title'   => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Tiêu Đề Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Tiêu Đề Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_exper'   => array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'n',
		                        'label'     	=> __('Mô Tả Bài Viết', 'conggiao'),
		                        'desc'      	=> __('Bạn có muốn hiển thị Mô Tả Ngắn của Bài Viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_date'    => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Ngày/Giờ Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Ngày/Giờ bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_author'  => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Tác Giả Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Tác Giả bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_viewer'  => array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Lượt Xem Bài Viết', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Lượt Xen bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_comments'=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Số Bình Luận', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Số Bình Luận bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'post_radius'  => array(
		                        'type'          => 'slider',
		                        'value'         => 0,
		                        'properties'    => array(
		                            'min'       => 0,
		                            'max'       => 20,
		                            'step'      => 1, // Set slider step. Always > 0. Could be fractional.
		                        ),
		                        'label'         => __('Viền Bo', 'conggiao'),
		                        'desc'          => __('Bạn muốn bài viết có Viền Bo Cong là bao nhiêu?', 'conggiao'),
		                    ),
					    ),
					),
			    ),
			),
	    ),
	),

);
?>
<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
$options   = array(

	'single'  		=> array(
	    'type' 		=> 'tab',
	    'title' 	=> __('Thiết Lập Bài Viết', 'conggiao'),
	    'options' 	=> array(
	    	'tab_single' 	=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Hiển Thị Mặc Định', 'conggiao'),
			    'options' 	=> array(
			    	'single_default'		=> array(
			    		'type'  => 'multi',
			    		'label' => __(false, 'conggiao'),
					    'desc'  => __(false, 'conggiao'),
					    'help'  => __('Thiết lập hiển thị cho Bài Viết, ngoài ra bạn có thể áp dụng thay đổi thiết lập cho từng bài viết khi sửa bài viết.', 'conggiao'),
					    'inner-options' => array(
					    	'sidebar'   		=> array(
		                        'type'          => 'multi-picker',
		                        'label'         => false,
		                        'desc'          => false,
		                        'show_borders'  => false,
		                        'picker'        => array(
		                            'action_show'   => array(
		                                'type'      => 'switch',
		                                'value'     => 'y',
		                                'label'     => __('Hiển thị Sidebar', 'conggiao'),
		                                'desc'      => __('Bạn có muốn hiển thị sidebar ở bài viết không?', 'conggiao'),
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
		                    'radius'   			=> array(
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
		                    'thumb'    			=> array(
		                        'type'      	=> 'switch',
		                        'value'     	=> 'y',
		                        'label'     	=> __('Hình Đại Diện', 'conggiao'),
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
		                    'title'    			=> array(
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
		                    'meta'    			=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Hiển Thị Meta', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Ngày/Giờ, Tác Giả, Lượt Xem, Số Bình Luận bài viết?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'related' 			=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Bài Viết Tương Tự', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Bài Viết Tương Tự không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
		                    'comments' 			=> array(
		                        'type'      => 'switch',
		                        'value'     => 'y',
		                        'label'     => __('Hiển Thị Bình Luận', 'conggiao'),
		                        'desc'      => __('Bạn có muốn hiển thị Danh Sách Bình Luận bài viết không?', 'conggiao'),
		                        'left-choice'   => array(
		                            'value'     => 'n',
		                            'label'     => __('KHÔNG', 'conggiao'),
		                        ),
		                        'right-choice'  => array(
		                            'value'     => 'y',
		                            'label'     => __('CÓ', 'conggiao'),
		                        ),
		                    ),
					    ),
			    	),
			    ),
			),
	    ),
	),

);
?>
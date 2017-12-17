<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
$options   = array(

	'gen'  => array(
	    'type' 		=> 'tab',
	    'title' 	=> __('Thiết Lập Chung', 'conggiao'),
	    'options' 	=> array(
	    	'tab_appr' 		=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Màu Sắc', 'conggiao'),
			    'options' 	=> array(
			    	'gen_bg'    => array(
                        'type'              => 'multi-picker',
                        'label'             => false,
                        'desc'              => false,
                        'show_borders'      => true,
                        'picker'            => array(
                            'action_show'   => array(
                                'label'     => __( 'Màu nền hay Hình nền?', 'conggiao' ),
                                'type'      => 'radio',
                                'value'     => 'c_color',
                                'desc'      => __( 'Lựa chọn màu nền hay hình nền cho website.', 'conggiao' ),
                                'inline'    => true,
                                'choices'   => array(
                                    'c_color'    	=> __('Màu nền', 'conggiao'),
                                    'c_image'   	=> __('Hình nền', 'conggiao'),
                                ),
                            )
                        ),
                        'choices'           => array(
                            'c_color'    	=> array(
                                'color'  => array(
                                    'type'  		=> 'color-picker',
                                    'value' 		=> '#fefefe',
                                    'palettes' 		=> array( '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#009688', '#8BC34A', '#FFEB3B', '#FF9800', '#795548', '#9E9E9E', '#000000' ),
                                    'label' 		=> __('Lựa chọn màu nền', 'conggiao'),
                                    'desc'  		=> __('Lựa chọn màu nền thích hợp cho website.', 'conggiao'),
                                ),
                            ),
                            'c_image'   => array(
                                'image'            	=> array(
                                    'type'          => 'multi',
                                    'label'         => false,
                                    'desc'          => false,
                                    'inline'        => true,
                                    'inner-options' => array(
                                        'image_upload'		=> array(
                                            'type'          => 'upload',
                                            'label'         => 'Chọn Hình Nền',
                                            'desc'          => __('Lựa chọn hình để thiết lập hình nền (Nên có độ rộng hơn 1200px', 'conggiao'),
                                            'images_only'   => true,
                                            'value'         => '',
                                        ),
                                        'image_repeat'      => array(
                                            'type'          => 'select',
                                            'label'         => 'Lặp lại hình nền',
                                            'value'         => 'no-repeat',
                                            'desc'          => __('Chọn lựa cách lặp hình nền hay không', 'conggiao'),
                                            'choices'       => array(
                                                'no-repeat' => __('Không lặp', 'conggiao'),
                                                'repeat'    => __('Lặp toàn bộ', 'conggiao'),
                                                'repeat-x'  => __('Lặp theo phía ngang', 'conggiao'),
                                                'repeat-y'  => __('Lặp theo phía dọc', 'conggiao'),
                                                'inherit'   => __('Thừa kế', 'conggiao'),
                                            ),
                                        ),
                                        'image_size'        => array(
                                            'type'          => 'select',
                                            'label'         => 'Kích thước hình',
                                            'value'         => 'inherit',
                                            'desc'          => __('Kích Thước hình bạn muốn làm?', 'conggiao'),
                                            'choices'       => array(
                                                'inherit'   => __('Inherit', 'conggiao'),
                                                'cover'     => __('Cover', 'conggiao'),
                                                'contain'   => __('Contain', 'conggiao'),
                                            )
                                        ),
                                        'image_attachment'  => array(
                                            'type'          => 'select',
                                            'label'         => 'Cuộn hay Cố Định',
                                            'value'         => 'inherit',
                                            'desc'          => __('Xác định thành phần nền được <strong>cố định</strong> hoặc <strong>cuộn</strong> so với trang.', 'conggiao'),
                                            'choices'       => array(
                                                'inherit'   => __('Thừa kế', 'conggiao'),
                                                'fixed'     => __('Cố Định', 'conggiao'),
                                                'scroll'    => __('Cuộn', 'conggiao'),
                                            )
                                        ),
                                        'image_position'    => array(
                                            'type'          => 'select',
                                            'label'         => 'Vị trí hình ảnh',
                                            'value'         => 'center_center',
                                            'desc'          => __('Bạn muốn vị trí hình nằm như thế nào?', 'conggiao'),
                                            'choices'       => array(
                                                'left_top'      => __('Left Top', 'conggiao'),
                                                'left_center'   => __('Left Center', 'conggiao'),
                                                'left_bottom'   => __('Left Bottom', 'conggiao'),
                                                'center_top'    => __('Center Top', 'conggiao'),
                                                'center_center' => __('Center Center', 'conggiao'),
                                                'center_bottom' => __('Center Bottom', 'conggiao'),
                                                'right_top'     => __('Right Top', 'conggiao'),
                                                'right_center'  => __('Right Center', 'conggiao'),
                                                'right_bottom'  => __('Right Bottom', 'conggiao'),
                                            )
                                        ),
                                    )
                                )
                            )
                        ),
                    )
			    ),
			),
			'tab_header' 	=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Header (Trên Cùng)', 'conggiao'),
			    'options' 	=> array(
			        'gen_img_desktop'   => array(
                        'type'          => 'upload',
                        'label'         => 'Hình Desktop',
                        'desc'          => __('Lựa chọn hình cho Desktop có độ rộng lớn hơn 1200px (đề nghị 1920px)', 'conggiao'),
                        'images_only'   => true,
                    ),
                    'gen_img_tablet'    => array(
                        'type'          => 'upload',
                        'label'         => 'Hình Tablet',
                        'desc'          => __('Lựa chọn hình cho table có độ rộng 960px', 'conggiao'),
                        'images_only'   => true,
                    ),
                    'gen_img_mobile'    => array(
                        'type'          => 'upload',
                        'label'         => 'Hình Mobile',
                        'desc'          => __('Lựa chọn hình cho mobile có động rộng <= 768px', 'conggiao'),
                        'images_only'   => true,
                    ),
                    'gen_tieu_de'       => array(
					    'type'          => 'text',
					    'label'         => __('Tiêu đề', 'conggiao'),
					    'desc'          => __('Nhập tiêu đề của hình ảnh', 'conggiao'),
					),
					'gen_lien_ket'      => array(
					    'type'          => 'text',
					    'label'         => __('Liên Kết', 'conggiao'),
					    'desc'          => __('Nhập liên kết khi nhấn vào hình ảnh', 'conggiao'),
					),
					'gen_is_blank'		=> array(
					    'type'  		=> 'checkbox',
					    'value' 		=> false,
					    'label' 		=> __('', 'conggiao'),
					    'desc'  		=> __('', 'conggiao'),
					    'text'  		=> __('Mở <strong>Liên Kết</strong> ở cửa sổ mới?', 'conggiao'),
					)
			    ),
			),
			'tab_nav' 		=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Menu', 'conggiao'),
			    'options' 	=> array(
			        'option_id'  => array( 
			        	'type' => 'text' 
			        ),
			    ),		    
			),
            'tab_footer'    => array(
                'type'      => 'tab',
                'title'     => __('Footer (Cuối Trang)', 'conggiao'),
                'options'   => array(
                    'gen_widget'        => array(
                        'type'          => 'multi-picker',
                        'label'         => false,
                        'desc'          => false,
                        'show_borders'  => true,
                        'picker'        => array(
                            'action_show'   => array(
                                'type'      => 'switch',
                                'value'     => 'n',
                                'label'     => __('Hiển thị Widget', 'conggiao'),
                                'desc'      => __('Bạn có muốn hiển thị widget ở cuối trang không?', 'conggiao'),
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
                                'widget_setting'    => array(
                                    'type'          => 'multi',
                                    'label'         => false,
                                    'desc'          => false,
                                    'inner-options' => array(
                                        'number'    => array(
                                            'type'      => 'image-picker',
                                            'label'     => 'Số Cột Widget',
                                            'desc'      => 'Bạn muốn bao nhiêu cột widget?',
                                            'choices'   => array(
                                                'c1'    => get_template_directory_uri() .'/assets/images/layouts/one-column.png',
                                                'c2'    => get_template_directory_uri() .'/assets/images/layouts/two-column.png',
                                                'c3'    => get_template_directory_uri() .'/assets/images/layouts/three-column.png',
                                                'c4'    => get_template_directory_uri() .'/assets/images/layouts/four-column.png',
                                            )
                                        ),
                                        'bg_color'  => array(
                                            'type'  => 'rgba-color-picker',
                                            'value' => '#4f4f4f',
                                            'label' => __('Màu Nền', 'conggiao'),
                                            'desc'  => __('<strong>Màu nền</strong> mặc định cho footer widget.', 'conggiao'),
                                        ),
                                        'txt_color' => array(
                                            'type'  => 'color-picker',
                                            'value' => '#ffffff',
                                            'label' => __('Màu Chữ', 'conggiao'),
                                            'desc'  => __('<strong>Màu chữ</strong> mặc định cho footer widget.', 'conggiao'),
                                        )
                                    ),
                                ),
                            )
                        ),
                    ),
                    'gen_left_text'     => array(
                        'type'          => 'wp-editor',
                        'label'         => __('Nội Dung Bên Trái', 'conggiao'),
                        'desc'          => __('Nội dung cuối trang bên trái mà bạn muốn hiển thị (nằm dưới Widget nếu có hiển thị)', 'conggiao'),
                        'size'          => 'small', // small, large
                        'editor_height' => 100,
                        'wpautop'       => true,
                        'editor_type'   => false, // tinymce, html
                    ),
                    'gen_right_text'    => array(
                        'type'          => 'wp-editor',
                        'label'         => __('Nội Dung Bên Phải', 'conggiao'),
                        'desc'          => __('Nội dung cuối trang bên phải mà bạn muốn hiển thị (nằm dưới Widget nếu có hiển thị)', 'conggiao'),
                        'size'          => 'small', // small, large
                        'editor_height' => 100,
                        'wpautop'       => true,
                        'editor_type'   => false, // tinymce, html
                    ),
                    'gen_credit'        => array(
                        'type'          => 'checkbox',
                        'value'         => true, // checked/unchecked
                        'label'         => __('Credit?', 'conggiao'),
                        'desc'          => __('Cho hiển thị thông tin về giao diện, tác giả và liên kết tới trang hỗ trợ giao diện', 'conggiao'),
                        'text'          => __('OK, không có vấn đề gì.', 'conggiao'),
                    )
                ),
            ),
	    ),
	),
);
?>
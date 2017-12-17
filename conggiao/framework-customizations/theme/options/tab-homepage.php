<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
$options = array(
	'home' => array(
	    'type' 		=> 'tab',
	    'title' 	=> __('Thiết Lập Trang Chủ', 'conggiao'),
	    'options' 	=> array(
            'tab_basic'     => array(
                'type'      => 'tab',
                'title'     => __('Cơ Bản', 'conggiao'),
                'options'   => array(
                    'home_sidebar'      => array(
                        'type'          => 'multi-picker',
                        'label'         => false,
                        'desc'          => false,
                        'show_borders'  => false,
                        'picker'        => array(
                            'action_show'   => array(
                                'type'      => 'switch',
                                'value'     => 'n',
                                'label'     => __('Hiển thị Sidebar', 'conggiao'),
                                'desc'      => __('Bạn có muốn hiển thị sidebar ở trang chủ không? <br />Nằm bên trái hoặc phải <strong>Nội Dung</strong> nhưng nằm dưới Nổi Bật (nếu được bật)', 'conggiao'),
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
                                    'desc'      => 'Hiễn thị sidebar bên trái hay phải?',
                                    'choices'   => array(
                                        'left'  => get_template_directory_uri() .'/assets/images//layouts/left-sidebar.jpg',
                                        'right' => get_template_directory_uri() .'/assets/images//layouts/right-sidebar.jpg',
                                    )
                                )
                            )
                        ),
                    ),
                    'home_show_search'  => array(
                        'type'          => 'switch',
                        'value'         => 'n',
                        'label'         => __('Hiển thị Tìm Kiếm', 'conggiao'),
                        'desc'          => __('Bạn có muốn hiển thị thanh tìm kiếm (rộng) ở trang chủ không? (Nằm dưới Menu), nằm trên <strong>Nổi Bật</strong>', 'conggiao'),
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
            ),
	    	'tab_featured' 	=> array(
			    'type' 		=> 'tab',
			    'title' 	=> __('Nổi Bật', 'conggiao'),
			    'options' 	=> array(
			    	'home_featured'     => array(
                        'type'          => 'multi-picker',
                        'label'         => false,
                        'desc'          => false,
                        'show_borders'  => true,
                        'picker'        => array(
                            'action_show'   => array(
                                'type'      => 'switch',
                                'value'     => 'y',
                                'label'     => __('Hiển Thị Nổi Bật', 'conggiao'),
                                'desc'      => __('Bạn có muốn hiển thị <strong>Bài Viết Nổi Bật</strong> ở trang chủ không? Nằm dưới Menu(*), Thông Báo(*), Tìm Kiếm(*) <br /> <strong>(*): Nếu tính năng đó bật.</strong>', 'conggiao'),
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
                                'display_style'     => array(
                                    'type'          => 'multi-picker',
                                    'label'         => false,
                                    'desc'          => false,
                                    'show_borders'  => false,
                                    'picker'        => array(
                                        'action_show'   => array(
                                            'type'      => 'image-picker',
                                            'value'     => 's1',
                                            'label'     => __('Mẫu Hiển Thị', 'conggiao'),
                                            'desc'      => __('Lựa chọn mẫu mà bạn cảm thấy thích hợp, rà chuột (hover) vào hình để xem hình minh họa rỏ hơn.', 'conggiao'),
                                            'choices'   => array(
                                                's1'       => array(
                                                    'small'     => get_template_directory_uri() .'/assets/images/layouts/features_style1_thumb.png',
                                                    'large'     => get_template_directory_uri() .'/assets/images/layouts/features_style1.png',
                                                ),
                                                's2'       => array(
                                                    'small'     => get_template_directory_uri() .'/assets/images/layouts/features_style2_thumb.png',
                                                    'large'     => get_template_directory_uri() .'/assets/images/layouts/features_style2.png',
                                                ),
                                            ),
                                        )
                                    ),
                                    'choices'       => array(
                                        's1'        => array(
                                            'tab_slider'    => array(
                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Slider', 'conggiao'),
                                                'options'   => array(
                                                    'slider_type'   => array( 
                                                        'type'              => 'multi-picker',
                                                        'label'             => false,
                                                        'desc'              => false,
                                                        'show_borders'      => false,
                                                        'picker'            => array(
                                                            'action_show'   => array(
                                                                'label'     => __( 'Loại slider hiển thị?', 'conggiao' ),
                                                                'type'      => 'radio',
                                                                'value'     => 'c_latest',
                                                                'desc'      => __( 'Lựa chọn loại slider bạn muốn hiển thị.', 'conggiao' ),
                                                                'inline'    => true,
                                                                'choices'   => array(
                                                                    'c_latest'      => __('Bài Viết Mới', 'conggiao'),
                                                                    'c_views'       => __('Bài Viết Xem Nhiều', 'conggiao'),
                                                                    'c_manual'      => __('Tôi tự chọn bài muốn hiển thị', 'conggiao'),
                                                                ),
                                                            )
                                                        ),
                                                        'choices'           => array(
                                                            'c_latest'      => array(
                                                                'fromcat'   => array(
                                                                    'type'          => 'multi-select',
                                                                    'label'         => __('Bài từ Chuyên Mục?', 'conggiao'),
                                                                    'desc'          => __('Hiển thị bài viết <strong>Mới Nhất</strong> theo chuyên mục lựa chọn.<br />Để <strong>RỖNG</strong> thì sẻ lấy bài viết mới nhất từ tất cả chuyên mục.', 'conggiao'),
                                                                    'population'    => 'taxonomy',
                                                                    'source'        => 'category',
                                                                    'limit'         => 10,
                                                                ),
                                                            ),
                                                            'c_views'       => array(
                                                                'fromcat'           => array(
                                                                    'type'          => 'multi-select',
                                                                    'label'         => __('Bài từ Chuyên Mục?', 'conggiao'),
                                                                    'desc'          => __('Hiển thị bài viết <strong>Xem Nhiều</strong> theo chuyên mục lựa chọn.<br />Để <strong>RỖNG</strong> thì sẻ lấy bài viết mới nhất từ tất cả chuyên mục.', 'conggiao'),
                                                                    'population'    => 'taxonomy',
                                                                    'source'        => 'category',
                                                                    'limit'         => 10,
                                                                ),
                                                            ),
                                                            'c_manual'      => array(
                                                                'postsel'           => array(
                                                                    'type'          => 'addable-popup',
                                                                    'label'         => __('Bài Viết Hiển Thị', 'conggiao'),
                                                                    'desc'          => __('Bên trên là Danh Sách Bài Viết sẻ hiển thị dựa vào lựa chọn của bạn.<br />Nhấn <strong>Thêm Bài Viết Khác</strong> để thêm bài mới.<br /> <strong>LƯU Ý:</strong> Không chọn bài viết trùng lập nhé.', 'conggiao'),
                                                                    'popup-options'   => array(
                                                                        'postsingle'        => array( 
                                                                            'type'          => 'multi-select',
                                                                            'label'         => __('Lựa chọn bài viết', 'conggiao'),
                                                                            'desc'          => __('Nhập tên bài viết hoặc chọn bài viết cần hiển thị.', 'conggiao'),
                                                                            'population'    => 'posts',
                                                                            'source'        => 'post',
                                                                            'limit'         => 1,
                                                                        ),
                                                                    ),
                                                                    'template'          => 'ID Bài Viết: {{- postsingle }}', // box title
                                                                    'limit'             => 0, // limit the number of boxes that can be added
                                                                    'add-button-text'   => __('Thêm Bài Viết Khác', 'conggiao'),
                                                                    'sortable'          => true,
                                                                ),
                                                            )
                                                        ),
                                                    ),
                                                    'num_post'      => array(
                                                        'type'          => 'slider',
                                                        'value'         => 4,
                                                        'properties'    => array(
                                                            'min'       => 1,
                                                            'max'       => 10,
                                                            'step'      => 1, // Set slider step. Always > 0. Could be fractional.
                                                        ),
                                                        'label'         => __('Số Bài Viết', 'conggiao'),
                                                        'desc'          => __('Số bài viết mà bạn muốn slider hiển thị', 'conggiao'),
                                                    ),
                                                    'show_title'    => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Tiêu Đề', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Tiêu Đề Bài Viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_exper'    => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Mô Tả', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Mô Tả Ngắn (Tóm Tắt) bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_cats'     => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Chuyên Mục', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Chuyên Mục bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_date'     => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Ngày/Giờ', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Ngày/Giờ bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_author'   => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Tác Giả', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Tác Giả bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_viewer'   => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Lượt Xem', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Số Lượt Xe bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_comments' => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'n',
                                                        'label'     => __('Hiển thị Bình Luận', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Số Bình Luận bài viết ở slider không?', 'conggiao'),
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
                                            'tab_box1'      => array(

                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 1', 'conggiao'),
                                                'options'   => array(
                                                    'b1_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),

                                            ),
                                            'tab_box2'      => array(

                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 2', 'conggiao'),
                                                'options'   => array(
                                                    'b2_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),

                                            ),
                                            'tab_box3'      => array(

                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 3', 'conggiao'),
                                                'options'   => array(
                                                    'b3_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),
                                                
                                            ),
                                            'tab_box4'      => array(
                                                
                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 4', 'conggiao'),
                                                'options'   => array(
                                                    'b4_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),
                                                
                                            ),
                                        ),
                                        's2'        => array(
                                            'tab_box1'      => array(

                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 1', 'conggiao'),
                                                'options'   => array(
                                                    'b1_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),

                                            ),
                                            'tab_box2'      => array(

                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 2', 'conggiao'),
                                                'options'   => array(
                                                    'b2_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),

                                            ),
                                            'tab_box3'      => array(

                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 3', 'conggiao'),
                                                'options'   => array(
                                                    'b3_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),
                                                
                                            ),
                                            'tab_box4'      => array(
                                                
                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Box 4', 'conggiao'),
                                                'options'   => array(
                                                    'b4_content'        => array( 
                                                        'type'          => 'wp-editor',
                                                        'label'         => __('Nội Dung', 'conggiao'),
                                                        'desc'          => __('Nhập nội dung, định dạng cho Box này để hiển thị trang chủ', 'conggiao'),
                                                        'size'          => 'large', // small, large
                                                        'editor_height' => 200,
                                                        'wpautop'       => true,
                                                        'editor_type'   => false, // tinymce, html
                                                    ),
                                                ),
                                                
                                            ),
                                            'tab_slider'    => array(
                                                'type'      => 'tab',
                                                'title'     => __('Thết Lập Slider', 'conggiao'),
                                                'options'   => array(
                                                    'slider_type'   => array( 
                                                        'type'              => 'multi-picker',
                                                        'label'             => false,
                                                        'desc'              => false,
                                                        'show_borders'      => false,
                                                        'picker'            => array(
                                                            'action_show'   => array(
                                                                'label'     => __( 'Loại slider hiển thị?', 'conggiao' ),
                                                                'type'      => 'radio',
                                                                'value'     => 'c_latest',
                                                                'desc'      => __( 'Lựa chọn loại slider bạn muốn hiển thị.', 'conggiao' ),
                                                                'inline'    => true,
                                                                'choices'   => array(
                                                                    'c_latest'      => __('Bài Viết Mới', 'conggiao'),
                                                                    'c_views'       => __('Bài Viết Xem Nhiều', 'conggiao'),
                                                                    'c_manual'      => __('Tôi tự chọn bài muốn hiển thị', 'conggiao'),
                                                                ),
                                                            )
                                                        ),
                                                        'choices'           => array(
                                                            'c_latest'      => array(
                                                                'fromcat'   => array(
                                                                    'type'          => 'multi-select',
                                                                    'label'         => __('Bài từ Chuyên Mục?', 'conggiao'),
                                                                    'desc'          => __('Hiển thị bài viết <strong>Mới Nhất</strong> theo chuyên mục lựa chọn.<br />Để <strong>RỖNG</strong> thì sẻ lấy bài viết mới nhất từ tất cả chuyên mục.', 'conggiao'),
                                                                    'population'    => 'taxonomy',
                                                                    'source'        => 'category',
                                                                    'limit'         => 10,
                                                                ),
                                                            ),
                                                            'c_views'       => array(
                                                                'fromcat'           => array(
                                                                    'type'          => 'multi-select',
                                                                    'label'         => __('Bài từ Chuyên Mục?', 'conggiao'),
                                                                    'desc'          => __('Hiển thị bài viết <strong>Xem Nhiều</strong> theo chuyên mục lựa chọn.<br />Để <strong>RỖNG</strong> thì sẻ lấy bài viết mới nhất từ tất cả chuyên mục.', 'conggiao'),
                                                                    'population'    => 'taxonomy',
                                                                    'source'        => 'category',
                                                                    'limit'         => 10,
                                                                ),
                                                            ),
                                                            'c_manual'      => array(
                                                                'postsel'           => array(
                                                                    'type'          => 'addable-popup',
                                                                    'label'         => __('Bài Viết Hiển Thị', 'conggiao'),
                                                                    'desc'          => __('Bên trên là Danh Sách Bài Viết sẻ hiển thị dựa vào lựa chọn của bạn.<br />Nhấn <strong>Thêm Bài Viết Khác</strong> để thêm bài mới.<br /> <strong>LƯU Ý:</strong> Không chọn bài viết trùng lập nhé.', 'conggiao'),
                                                                    'popup-options'   => array(
                                                                        'postsingle'        => array( 
                                                                            'type'          => 'multi-select',
                                                                            'label'         => __('Lựa chọn bài viết', 'conggiao'),
                                                                            'desc'          => __('Nhập tên bài viết hoặc chọn bài viết cần hiển thị.', 'conggiao'),
                                                                            'population'    => 'posts',
                                                                            'source'        => 'post',
                                                                            'limit'         => 1,
                                                                        ),
                                                                    ),
                                                                    'template'          => 'ID Bài Viết: {{- postsingle }}', // box title
                                                                    'limit'             => 0, // limit the number of boxes that can be added
                                                                    'add-button-text'   => __('Thêm Bài Viết Khác', 'conggiao'),
                                                                    'sortable'          => true,
                                                                ),
                                                            )
                                                        ),
                                                    ),
                                                    'num_post'      => array(
                                                        'type'          => 'slider',
                                                        'value'         => 4,
                                                        'properties'    => array(
                                                            'min'       => 1,
                                                            'max'       => 10,
                                                            'step'      => 1, // Set slider step. Always > 0. Could be fractional.
                                                        ),
                                                        'label'         => __('Số Bài Viết', 'conggiao'),
                                                        'desc'          => __('Số bài viết mà bạn muốn slider hiển thị', 'conggiao'),
                                                    ),
                                                    'show_title'    => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Tiêu Đề', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Tiêu Đề Bài Viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_exper'    => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Mô Tả', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Mô Tả Ngắn (Tóm Tắt) bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_cats'     => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Chuyên Mục', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Chuyên Mục bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_date'     => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Ngày/Giờ', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Ngày/Giờ bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_author'   => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Tác Giả', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Tác Giả bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_viewer'   => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'y',
                                                        'label'     => __('Hiển thị Lượt Xem', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Số Lượt Xe bài viết ở slider không?', 'conggiao'),
                                                        'left-choice'   => array(
                                                            'value'     => 'n',
                                                            'label'     => __('KHÔNG', 'conggiao'),
                                                        ),
                                                        'right-choice'  => array(
                                                            'value'     => 'y',
                                                            'label'     => __('CÓ', 'conggiao'),
                                                        ),
                                                    ),
                                                    'show_comments' => array(
                                                        'type'      => 'switch',
                                                        'value'     => 'n',
                                                        'label'     => __('Hiển thị Bình Luận', 'conggiao'),
                                                        'desc'      => __('Bạn có muốn hiển thị Số Bình Luận bài viết ở slider không?', 'conggiao'),
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
                        ),
                    ),
			    ),
			),
            'tab_content'   => array(
                'type'      => 'tab',
                'title'     => __('Nội Dung', 'conggiao'),
                'options'   => array(
                    'home_sec_content'      => array(
                        'type'              => 'addable-popup',
                        'label'             => __('Danh Sách Mục', 'conggiao'),
                        'desc'              => __('Đây là các Mục nội dung sẻ hiển thị ở trang chủ, 1 mục sẻ hiển thị nhiều bài viết theo chuyên mục nào đó.<br />Nhấn vào <strong>Thêm Mục Mới</strong> để thêm.', 'conggiao'),
                        'template'          => ''.
                        '{{ console.log(content_type) }}'.
                        '{{ if (content_type.action_show == "c_post"){ }}'.
                            '<b>Loại: </b>Danh Sách Bài Viết<br>'.
                            '<b>Tiêu Đề: </b> {{- content_type.c_post.tieude }}<br>'.
                            '{{ if (content_type.c_post.sortby == "views"){ }}'.
                                '<b>Sắp Theo: </b>Lượt Xem<br>'.
                        '{{ } else { }}'.
                            '<b>Sắp Theo: </b>Bài Mới<br>'.
                        '{{ } } }}'.
                        '{{ if (content_type.action_show == "c_static"){ }}'.
                            '<b>Loại: </b>Nội Dung<br>'.
                            '<b>Tiêu Đề: </b> {{- content_type.c_static.tieude }}<br>'.
                        '{{ } }}'
                        ,
                        'popup-title'       => 'Danh Mục',
                        'size'              => 'large', // small, medium, large
                        'limit'             => 0, // limit the number of popup`s that can be added
                        'add-button-text'   => __('Thêm Mục Mới', 'conggiao'),
                        'sortable'          => true,
                        'popup-options'     => array(
                            'content_type'  => array(
                                'type'      => 'multi-picker',
                                'label'             => false,
                                'desc'              => false,
                                'show_borders'      => false,
                                'picker'            => array(
                                    'action_show'   => array(
                                        'label'     => __( 'Loại Nội Dung?', 'conggiao' ),
                                        'type'      => 'radio',
                                        'value'     => 'c_post',
                                        'desc'      => __( 'Lựa chọn loại nội dung mà bạn muốn hiển thị.<br><strong>Danh Sách Bài Viết</strong> là nơi hiển thị nhiều bài viết cho mục đó <br><strong>Nội Dung Tỉnh</strong> là nơi bài viết gì đó (HTML) hoặc điền shortcode, hình ảnh,...', 'conggiao' ),
                                        'inline'    => true,
                                        'choices'   => array(
                                            'c_post'      => __('Danh Sách Bài Viết', 'conggiao'),
                                            'c_static'    => __('Nội Dung Tỉnh', 'conggiao'),
                                        ),
                                    )
                                ),
                                'choices'           => array(
                                    'c_post'        => array(
                                        'tab_box1'      => array(
                                            'type'      => 'tab',
                                            'title'     => __('Thiết Lập Nội Dung', 'conggiao'),
                                            'options'   => array(
                                                'sortby'        => array(
                                                    'label'     => __( 'Hiển thị theo?', 'conggiao' ),
                                                    'type'      => 'radio',
                                                    'value'     => 'date',
                                                    'desc'      => __( 'Bài viết sẻ được sắp xếp theo?', 'conggiao' ),
                                                    'inline'    => true,
                                                    'choices'   => array(
                                                        'views' => __('Lượt Xem Nhiều', 'conggiao'),
                                                        'date'  => __('Bài Mới Nhất', 'conggiao'),
                                                    ),
                                                ),
                                                'category'          => array(
                                                    'type'          => 'multi-select',
                                                    'label'         => __('Bài từ Chuyên Mục?', 'conggiao'),
                                                    'desc'          => __('Hiển thị bài viết theo chuyên mục lựa chọn.<br />Để <strong>RỖNG</strong> thì sẻ lấy bài viết mới nhất từ tất cả chuyên mục.<br><strong>LƯU Ý:</strong> Một mục có thể lựa chọn 5 chuyên mục', 'conggiao'),
                                                    'population'    => 'taxonomy',
                                                    'source'        => 'category',
                                                    'limit'         => 5,
                                                ),
                                            ),
                                        ),
                                        'tab_box2'      => array(

                                            'type'      => 'tab',
                                            'title'     => __('Thết Lập Mẫu', 'conggiao'),
                                            'options'   => array(
                                                'style'   => array(
                                                    'type'      => 'image-picker',
                                                    'value'     => 'style-1',
                                                    'label'     => __('Mẫu Hiển Thị', 'conggiao'),
                                                    'desc'      => __('Lựa chọn mẫu mà bạn cảm thấy thích hợp, rà chuột (hover) vào hình để xem hình minh họa rỏ hơn.<br>Mình sẻ update các mẫu ở phiên bản tiếp theo.', 'conggiao'),
                                                    'choices'   => array(
                                                        'style-1'       => array(
                                                            'small'     => get_template_directory_uri() .'/assets/images/layouts/section_style1_thumb.png',
                                                            'large'     => get_template_directory_uri() .'/assets/images/layouts/section_style1.png',
                                                        ),
                                                        'style-2'       => array(
                                                            'small'     => get_template_directory_uri() .'/assets/images/layouts/section_style2_thumb.png',
                                                            'large'     => get_template_directory_uri() .'/assets/images/layouts/section_style2.png',
                                                        ),
                                                    ),
                                                ),
                                                'num_post'      => array(
                                                    'type'          => 'slider',
                                                    'value'         => 6,
                                                    'properties'    => array(
                                                        'min'       => 1,
                                                        'max'       => 20,
                                                        'step'      => 1, // Set slider step. Always > 0. Could be fractional.
                                                    ),
                                                    'label'         => __('Số Bài Viết', 'conggiao'),
                                                    'desc'          => __('Số bài viết sẻ hiển thị cho mục này <br><strong>LƯU Ý:</strong> Nếu bạn chọn Style 2 (tức là danh sách bài viết theo từng chuyên mục) thì mỗi chuyên mục sẻ hiện số bài viết mà bạn thiết lập. <br>Các style khác thì lấy đúng số bài viết theo tổng số chuyên mục.', 'conggiao'),
                                                ),
                                                'tieude'        => array(
                                                    'type'      => 'text', 
                                                    'label'     => 'Tiêu Đề',  
                                                    'desc'      => __('Tiêu đề mục mà bạn muốn hiển thị', 'conggiao'),
                                                ),
                                                'lienket'       => array(
                                                    'type'      => 'text', 
                                                    'label'     => 'Liên Kết',  
                                                    'desc'      => __('Liên kết khi nhấn vào <strong>Tiêu Đề</strong>', 'conggiao'),
                                                ),
                                                'seperator'   => array(
                                                    'type'      => 'image-picker',
                                                    'value'     => 'style-1',
                                                    'label'     => __('Mẫu Tiêu Đề', 'conggiao'),
                                                    'desc'      => __('Lựa chọn mẫu mà bạn cảm thấy thích hợp.<br><strong>LƯU Ý: </strong>Nếu bạn để rỗng <strong>Tiêu Đề</strong> thì sẻ không có mục tiêu đề<br>Mình sẻ update các mẫu ở phiên bản tiếp theo.', 'conggiao'),
                                                    'choices'   => array(
                                                        'style-1'       => get_template_directory_uri() .'/assets/images/layouts/DeviderStyle1.png',
                                                        'style-2'       => get_template_directory_uri() .'/assets/images/layouts/DeviderStyle2.png',
                                                        'style-3'       => get_template_directory_uri() .'/assets/images/layouts/DeviderStyle3.png',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'tab_box3'      => array(

                                            'type'      => 'tab',
                                            'title'     => __('Bố Cục Nội Dung', 'conggiao'),
                                            'options'   => array(
                                                'show_title'    => array(
                                                    'type'      => 'switch',
                                                    'value'     => 'y',
                                                    'label'     => __('Hiển thị Tiêu Đề', 'conggiao'),
                                                    'desc'      => __('Bạn có muốn hiển thị Tiêu Đề Bài Viết?', 'conggiao'),
                                                    'left-choice'   => array(
                                                        'value'     => 'n',
                                                        'label'     => __('KHÔNG', 'conggiao'),
                                                    ),
                                                    'right-choice'  => array(
                                                        'value'     => 'y',
                                                        'label'     => __('CÓ', 'conggiao'),
                                                    ),
                                                ),
                                                'show_exper'    => array(
                                                    'type'      => 'switch',
                                                    'value'     => 'n',
                                                    'label'     => __('Hiển thị Mô Tả', 'conggiao'),
                                                    'desc'      => __('Bạn có muốn hiển thị Mô Tả Ngắn (Tóm Tắt) bài viết?', 'conggiao'),
                                                    'left-choice'   => array(
                                                        'value'     => 'n',
                                                        'label'     => __('KHÔNG', 'conggiao'),
                                                    ),
                                                    'right-choice'  => array(
                                                        'value'     => 'y',
                                                        'label'     => __('CÓ', 'conggiao'),
                                                    ),
                                                ),
                                                'show_cats'     => array(
                                                    'type'      => 'switch',
                                                    'value'     => 'n',
                                                    'label'     => __('Hiển thị Chuyên Mục', 'conggiao'),
                                                    'desc'      => __('Bạn có muốn hiển thị Chuyên Mục bài viết?', 'conggiao'),
                                                    'left-choice'   => array(
                                                        'value'     => 'n',
                                                        'label'     => __('KHÔNG', 'conggiao'),
                                                    ),
                                                    'right-choice'  => array(
                                                        'value'     => 'y',
                                                        'label'     => __('CÓ', 'conggiao'),
                                                    ),
                                                ),
                                                'show_date'     => array(
                                                    'type'      => 'switch',
                                                    'value'     => 'y',
                                                    'label'     => __('Hiển thị Ngày/Giờ', 'conggiao'),
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
                                                'show_author'   => array(
                                                    'type'      => 'switch',
                                                    'value'     => 'y',
                                                    'label'     => __('Hiển thị Tác Giả', 'conggiao'),
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
                                                'show_viewer'   => array(
                                                    'type'      => 'switch',
                                                    'value'     => 'y',
                                                    'label'     => __('Hiển thị Lượt Xem', 'conggiao'),
                                                    'desc'      => __('Bạn có muốn hiển thị Số Lượt Xe bài viết?', 'conggiao'),
                                                    'left-choice'   => array(
                                                        'value'     => 'n',
                                                        'label'     => __('KHÔNG', 'conggiao'),
                                                    ),
                                                    'right-choice'  => array(
                                                        'value'     => 'y',
                                                        'label'     => __('CÓ', 'conggiao'),
                                                    ),
                                                ),
                                                'show_comments' => array(
                                                    'type'      => 'switch',
                                                    'value'     => 'y',
                                                    'label'     => __('Hiển thị Bình Luận', 'conggiao'),
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
                                            ),
                                        ),
                                        'tab_box4'      => array(

                                            'type'      => 'tab',
                                            'title'     => __('Thết Lập Màu Sắc', 'conggiao'),
                                            'options'   => array(
                                                'bgcolor'           => array(
                                                    'type'          => 'rgba-color-picker',
                                                    'value'         => 'rgba(255,255,255,0)',
                                                    'label'         => __('Màu Nền', 'conggiao'),
                                                    'desc'          => __('Màu Nền cho mục mà bạn muốn hiển thị', 'conggiao'),
                                                ),
                                                'headingcolor'      => array(
                                                    'type'          => 'color-picker',
                                                    'value'         => '#000000',
                                                    'label'         => __('Màu Chữ Tiêu Đều', 'conggiao'),
                                                    'desc'          => __('Màu Chữ Tiêu Đề sẻ hiển thị cho mục mà bạn muốn hiển thị', 'conggiao'),
                                                ),
                                                'sepcolor'          => array(
                                                    'type'          => 'color-picker',
                                                    'value'         => '#000000',
                                                    'label'         => __('Màu Nền Phân Cách', 'conggiao'),
                                                    'desc'          => __('Màu Nền Phân Cách cho Tiêu Đề (Nếu không phải là hình) thì có thể thay đổi.', 'conggiao'),
                                                ),
                                                'posttitlecolor'    => array(
                                                    'type'          => 'color-picker',
                                                    'value'         => '#3B3B3B',
                                                    'label'         => __('Màu Tiêu Đề Bài Viết', 'conggiao'),
                                                    'desc'          => __('Màu Chữ Tiêu Đề Bài Viết sẻ hiển thị cho mục mà bạn muốn hiển thị', 'conggiao'),
                                                ),
                                                'postmetacolor'     => array(
                                                    'type'          => 'color-picker',
                                                    'value'         => '#A7A7A7',
                                                    'label'         => __('Màu Ngày/Tác Giả', 'conggiao'),
                                                    'desc'          => __('Màu Sắc cho Ngày Giờ, Tác Giả, Bình Luận, Lượt Xem', 'conggiao'),
                                                ),
                                                'radius'            => array(
                                                    'type'          => 'slider',
                                                    'value'         => 0,
                                                    'properties'    => array(
                                                        'min'       => 0,
                                                        'max'       => 20,
                                                        'step'      => 1, // Set slider step. Always > 0. Could be fractional.
                                                    ),
                                                    'label'         => __('Viền Bo', 'conggiao'),
                                                    'desc'          => __('Đây là Border-Radius (viền bo cong)', 'conggiao'),
                                                ),
                                            ),
                                        ),
                                        
                                    ),
                                    'c_static'      => array(
                                        'tab_box1'      => array(
                                            'type'      => 'tab',
                                            'title'     => __('Thiết Lập Nội Dung', 'conggiao'),
                                            'options'   => array(
                                                'content'           => array( 
                                                    'type'          => 'wp-editor',
                                                    'label'         => __('Nội Dung', 'conggiao'),
                                                    'desc'          => __('Nhập nội dung mà bạn muốn hiển thị', 'conggiao'),
                                                    'size'          => 'large', // small, large
                                                    'editor_height' => 200,
                                                    'wpautop'       => true,
                                                    'editor_type'   => false, // tinymce, html
                                                ),
                                            ),
                                        ),
                                        'tab_box2'      => array(
                                            'type'      => 'tab',
                                            'title'     => __('Thết Lập Mẫu', 'conggiao'),
                                            'options'   => array(
                                                'tieude'        => array(
                                                    'type'      => 'text', 
                                                    'label'     => 'Tiêu Đề',  
                                                    'desc'      => __('Tiêu đề mục mà bạn muốn hiển thị', 'conggiao'),
                                                ),
                                                'lienket'       => array(
                                                    'type'      => 'text', 
                                                    'label'     => 'Liên Kết',  
                                                    'desc'      => __('Liên kết khi nhấn vào <strong>Tiêu Đề</strong>', 'conggiao'),
                                                ),
                                                'seperator'   => array(
                                                    'type'      => 'image-picker',
                                                    'value'     => 'style-1',
                                                    'label'     => __('Mẫu Tiêu Đề', 'conggiao'),
                                                    'desc'      => __('Lựa chọn mẫu mà bạn cảm thấy thích hợp.<br><strong>LƯU Ý: </strong>Nếu bạn để rỗng <strong>Tiêu Đề</strong> thì sẻ không có mục tiêu đề<br>Mình sẻ update các mẫu ở phiên bản tiếp theo.', 'conggiao'),
                                                    'choices'   => array(
                                                        'style-1'       => get_template_directory_uri() .'/assets/images/layouts/DeviderStyle1.png',
                                                        'style-2'       => get_template_directory_uri() .'/assets/images/layouts/DeviderStyle2.png',
                                                        'style-3'       => get_template_directory_uri() .'/assets/images/layouts/DeviderStyle3.png',
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'tab_box3'      => array(
                                            'type'      => 'tab',
                                            'title'     => __('Thết Lập Màu Sắc', 'conggiao'),
                                            'options'   => array(
                                                'bgcolor'           => array(
                                                    'type'          => 'rgba-color-picker',
                                                    'value'         => 'rgba(255,255,255,0)',
                                                    'label'         => __('Màu Nền', 'conggiao'),
                                                    'desc'          => __('Màu Nền cho mục mà bạn muốn hiển thị', 'conggiao'),
                                                ),
                                                'headingcolor'      => array(
                                                    'type'          => 'color-picker',
                                                    'value'         => '#000000',
                                                    'label'         => __('Màu Chữ Tiêu Đều', 'conggiao'),
                                                    'desc'          => __('Màu Chữ Tiêu Đề sẻ hiển thị cho mục mà bạn muốn hiển thị', 'conggiao'),
                                                ),
                                                'sepcolor'          => array(
                                                    'type'          => 'color-picker',
                                                    'value'         => '#000000',
                                                    'label'         => __('Màu Nền Phân Cách', 'conggiao'),
                                                    'desc'          => __('Màu Nền Phân Cách cho Tiêu Đề (Nếu không phải là hình) thì có thể thay đổi.', 'conggiao'),
                                                ),
                                                'radius'            => array(
                                                    'type'          => 'slider',
                                                    'value'         => 0,
                                                    'properties'    => array(
                                                        'min'       => 0,
                                                        'max'       => 20,
                                                        'step'      => 1, // Set slider step. Always > 0. Could be fractional.
                                                    ),
                                                    'label'         => __('Viền Bo', 'conggiao'),
                                                    'desc'          => __('Đây là Border-Radius (viền bo cong)', 'conggiao'),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),             
                        ),
                    )
                ),          
            ),
	    ),
	),

);
?>
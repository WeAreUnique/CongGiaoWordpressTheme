<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
$options   = array(

	'notice'  => array(
	    'type' 		=> 'tab',
	    'title' 	=> __('Thông Báo', 'conggiao'),
	    'options' 	=> array(
	    	'tab_notifications' 	=> array(
			    'type' 		=> 'multi',
			    'label' 	=> false,
                'label'     => false,
			    'inner-options' 	=> array(
                    'notifications'         => array(
                        'type'              => 'addable-popup',
                        'label'             => __('Danh Sách Thông Báo', 'conggiao'),
                        'template'          => '{{ console.log() }}'
                        .'● Hiển Thị ở: <strong>'
                        .'{{ for (var don in displayon) { }}'

                            .'{{ if (don == "homepage") { }}'
                                .'{{- "Trang Chủ | " }}'
                            .'{{ } }}'
                            .'{{ if (don == "single") { }}'
                                .'{{- "Bài Viết | " }}'
                            .'{{ } }}'
                            .'{{ if (don == "chuyenmuc") { }}'
                                .'{{- "Chuyên Mục | " }}'
                            .'{{ } }}'
                            .'{{ if (don == "page") { }}'
                                .'{{- "Trang" }}'
                            .'{{ } }}'

                        .'{{ } }}'
                        .'</strong><br>'
                        .'● Hiển thị <strong>TỪ</strong>: {{- displaytime["from"] }} <strong>ĐẾN</strong>: {{- displaytime["to"] }}<br>'
                        .'● Hiển thị icon thông báo: <strong>{{- shownoticeicon }}</strong><br>'
                        .'● Loại Thông Báo: <strong>{{- type }}</strong>'
                        ,
                        'size'              => 'medium',
                        'add-button-text'   => __('Thêm Thông Báo', 'conggiao'),
                        'sortable'          => true,
                        'popup-options'     => array(
                            'noidung'       => array(
                                'type'      => 'wp-editor',
                                'label'     => __('Nội Dung Hiển Thị', 'conggiao'),
                                'size'      => 'small',
                                'desc'      => __('Nhập nội dung thông báo mà bạn muốn hiển thị.', 'conggiao'),
                            ),
                            'displayon'     => array(
                                'type'      => 'checkboxes',
                                'label'     => __('Hiển thị ở ?', 'conggiao'),
                                'desc'      => false,
                                'choices'   => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
                                    'homepage'      => __('Trang Chủ', 'conggiao'),
                                    'single'        => __('Bài Viết', 'conggiao'),
                                    'chuyenmuc'     => __('Chuyên Mục', 'conggiao'),
                                    'page'          => __('Trang', 'conggiao'),
                                ),
                            ),
                            'displaytime'   => array(
                                'type'      => 'datetime-range',
                                'label'     => __('Hiển thị từ ngày', 'conggiao'),
                                'desc'      => __('Bạn muốn hiển thị thông báo vào Ngày giờ nào.', 'conggiao'),
                                'datetime-pickers'      => array(
                                    'from'              => array(
                                        'format'        => 'Y/m/d H:i', // Format datetime.
                                        'maxDate'       => '2050/04/04',  // By default there is not maximum date , set a date in the datetime format.
                                        'minDate'       => '2018/04/04',  // By default minimum date will be current day, set a date in the datetime format.
                                        'timepicker'    => true,   // Show timepicker.
                                        'datepicker'    => true,   // Show datepicker.
                                        'step'          => 5
                                    ),
                                    'to'                => array(
                                        'format'        => 'Y/m/d H:i', // Format datetime.
                                        'maxDate'       => '2050/04/04',  // By default there is not maximum date , set a date in the datetime format.
                                        'minDate'       => '2018/04/04',  // By default minimum date will be current day, set a date in the datetime format.
                                        'timepicker'    => true,   // Show timepicker.
                                        'datepicker'    => true,   // Show datepicker.
                                        'step'          => 5
                                    ),  
                                ),
                            ),
                            'type'        => array(
                                'type'          => 'select',
                                'value'         => 'is-white',
                                'label'         => __('Loại Thông Báo', 'conggiao'),
                                'desc'          => __('Bạn muốn hiển thị thông báo dạng nào?.', 'conggiao'),
                                'choices'    => array(
                                    'is-white'      => __('Bình Thường (white)', 'conggiao'),
                                    'is-primary'    => __('Primary', 'conggiao'),
                                    'is-link'       => __('Link', 'conggiao'),
                                    'is-info'       => __('Info', 'conggiao'),
                                    'is-success'    => __('Success', 'conggiao'),
                                    'is-warning'    => __('Warning', 'conggiao'),
                                    'is-danger'     => __('Danger', 'conggiao'),
                                ),
                            ),
                            'shownoticeicon'     => array(
                                'type'          => 'switch',
                                'value'         => 'true',
                                'label'         => __('Biểu Tượng Thông Báo', 'conggiao'),
                                'desc'          => __('Bạn muốn hiển thị Biểu Tượng Thông Báo không?.', 'conggiao'),
                                'left-choice'   => array(
                                    'value'     => 'false',
                                    'label'     => __('KHÔNG', 'conggiao'),
                                ),
                                'right-choice'  => array(
                                    'value'     => 'true',
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
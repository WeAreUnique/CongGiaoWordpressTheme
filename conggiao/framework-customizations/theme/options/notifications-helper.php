<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}
function conggiao_notifi_gets_all(){
    $res = array();

    $opt = conggiao_get_option_setting('tab_notifications/notifications');
    foreach ($opt as $data) {
        $today = current_time( 'Y/m/d H:i');
        $date1 = date_format( date_create( $data['displaytime']['from'] ), 'Y/m/d H:i' ) ;
        $date2 = date_format( date_create( $data['displaytime']['to'] ), 'Y/m/d H:i' ) ;
        if ( isBetweenDates($today, $date1, $date2) ){
            $res[] = $data;
        }
    }
    return $res;
}

function conggiao_notifi_gets_current(){
    $res = array();
    $opt = conggiao_get_option_setting('tab_notifications/notifications');

    // printArr( $opt, 'opt');
    //Homepage
    if ( is_front_page() ){
        foreach ($opt as $notice) {
            if ( array_key_exists('homepage', $notice['displayon'] )) {
                $today = current_time( 'Y/m/d H:i');
                $date1 = date_format( date_create( $notice['displaytime']['from'] ), 'Y/m/d H:i' ) ;
                $date2 = date_format( date_create( $notice['displaytime']['to'] ), 'Y/m/d H:i' ) ;
                if ( isBetweenDates($today, $date1, $date2) ){
                    $res[] = $notice;
                }

            }
        }
    }
    // Page
    if ( is_page() && !is_page_template() ){
        foreach ($opt as $notice) {
            if ( array_key_exists('page', $notice['displayon'] )) {
                $today = current_time( 'Y/m/d H:i');
                $date1 = date_format( date_create( $notice['displaytime']['from'] ), 'Y/m/d H:i' ) ;
                $date2 = date_format( date_create( $notice['displaytime']['to'] ), 'Y/m/d H:i' ) ;
                if ( isBetweenDates($today, $date1, $date2) ){
                    $res[] = $notice;
                }

            }
        }
    }
    // Category
    if ( is_archive() ){
        foreach ($opt as $notice) {
            if ( array_key_exists('chuyenmuc', $notice['displayon'] )) {
                $today = current_time( 'Y/m/d H:i');
                $date1 = date_format( date_create( $notice['displaytime']['from'] ), 'Y/m/d H:i' ) ;
                $date2 = date_format( date_create( $notice['displaytime']['to'] ), 'Y/m/d H:i' ) ;
                if ( isBetweenDates($today, $date1, $date2) ){
                    $res[] = $notice;
                }

            }
        }
    }

    // Category
    if ( is_single() ){
        foreach ($opt as $notice) {
            if ( array_key_exists('single', $notice['displayon'] )) {
                $today = current_time( 'Y/m/d H:i');
                $date1 = date_format( date_create( $notice['displaytime']['from'] ), 'Y/m/d H:i' ) ;
                $date2 = date_format( date_create( $notice['displaytime']['to'] ), 'Y/m/d H:i' ) ;
                if ( isBetweenDates($today, $date1, $date2) ){
                    $res[] = $notice;
                }

            }
        }
    }

    return $res;
}
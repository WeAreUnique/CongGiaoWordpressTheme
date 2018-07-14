<?php

list( $display_version ) = explode( '-', get_bloginfo( 'version' ) );
$url_install_plugin = is_multisite() ? network_admin_url( 'plugin-install.php?s=brizy&tab=search&type=term' ) : admin_url( 'plugin-install.php?s=brizy&tab=search&type=term' );
?>
	<style>
		.about-wrap .feature-section .fw-brz {
			text-align: center;
			margin-top: 30px;
		}
		.fw-brz__btn-install {
			color: #fff;
			font-size: 15px;
			line-height: 1;
			background-color: #d62c64;
			box-shadow: 0px 2px 0px 0px #981e46;
			padding: 11px 27px 12px;
			border: 1px solid #d62c64;
			border-bottom: 0;
			border-radius: 3px;
			text-shadow: none;
			height: auto;
			text-decoration: none;
			transition: all 200ms linear;
		}
		.fw-brz__btn-install:hover {
			background-color: #141923;
			color: #fff;
			border-color: #141923;
			box-shadow: 0px 2px 0px 0px #141923;
		}
		.fw-btn-install-border {
			color: #d62c64;
			font-size: 18px;
			font-weight: bold;
			border: 3px solid #d62c64;
			text-decoration: none;
			padding: 11px 27px 12px;
			margin-top: 45px;
			display: inline-block;
			transition: all 200ms linear;
		}
		.fw-btn-install-border:hover {
			background-color: #141923;
			color: #fff;
			border-color: #141923;
		}
		.section-item .fw-brz-title-feature {
			font-size: 18px;
		}
		.section-item .inline-svg img {
			width: 300px;
			height: 200px;
		}
	</style>
<?php
return;

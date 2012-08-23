<?php

/* Styled login screen */
add_action( 'login_head', 'founders_login_css', 99999 );

function founders_login_css() { 
	?>
	
	<style type="text/css">
	body {
		background: #F1F1F1 url('http://atfounders.com/wp-content/themes/p2-for-founders/i/login-bg.jpeg') no-repeat top center !important;
	}
	
	#login {
		padding-top: 60px !important;
	}
	
	html {
		background: #e6e6e6;
	}
	
	#loginform {
		margin-bottom: 21px;
	}
	
	p#nav,
	p#backtoblog { 
		background: #fff;
		border: 1px solid #eee;
		margin-left: 8px !important;
		padding: 15px !important;
	}
	
	p#nav { 
		border-bottom: 0 !important;
		margin-bottom: -2px !important;
		padding-bottom: 2px !important;
		-moz-box-shadow: rgba(200, 200, 200, 0.7) 0px 4px 10px -1px;
		-webkit-box-shadow: rgba(200, 200, 200, 0.7) 0px 4px 10px -1px;
		box-shadow: rgba(200, 200, 200, 0.7) 0px 4px 10px -1px;
	}
	
	.login p#backtoblog {
		border-top: 0 !important;
		margin-bottom: 21px !important;
		padding-top: 5px !important;
	}
	
	.login p#backtoblog a {
		color: #999 !important;
		font-size: 9px !important;
	}
	
	#login {
		padding-bottom: 42px;
	}
	</style>
	
	<?php
}


if (class_exists('MultiPostThumbnails')) {

	new MultiPostThumbnails(
	
		array(
		
			'label' => 'Smaller Badge Image',
			'id' => 'simplebadges-smaller',
			'post_type' => 'simplebadges_badge'
		)
	
	);
	
}


function founders_p2_query() {

	global $founders_query;
	
	$querystr = "
		select wp_posts.*, max(comment_date) as comment_date
		from $wpdb->posts wp_posts
		right join $wpdb->comments
		on id = comment_post_id
		group by ID 
		order by comment_date desc
		limit 10
	";
	
	$founders_query = $wpdb->get_results( $querystr, OBJECT );

}



?>
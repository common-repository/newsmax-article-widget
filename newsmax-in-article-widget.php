<?php

	/**
	 * @package Newsmax_Article_Widget
	 * @version 1.1
	 */
	/*
	Plugin Name: Newsmax Instream Ads
	Description: InStream Ad implementation made-easy for publishers.
	Author: Newsmax Media
	Version: 1.1
	Author URI: https://www.newsmaxfeednetwork.com/
	*/



	function newsmax_auto_detect_ad_template($client_id, $template, $cloudflare_async){
		return "<div id='NmWg$client_id'></div>
		        <script data-cfasync='$cloudflare_async' type='text/javascript' src ='https://s.newsmaxfeednetwork.com/static/js/connectV5.js'></script>
		        <script type='text/javascript'>
					   (function(){
			             var selector = document.getElementById('NmWg$client_id').parentNode;
			             selector = selector.className? '.'+selector.className:'' || selector.id? '#'+selector.id:'';
			             NM.init({widgetId: '$client_id', template: '$template', articleSelector: selector});
					   })();
		        </script>";
	}

	function newsmax_standard_ad_template($client_id, $template, $article_selector, $cloudflare_async){
		return "<div id='NmWg$client_id'></div>
		        <script data-cfasync='$cloudflare_async' type='text/javascript' src ='https://s.newsmaxfeednetwork.com/static/js/connectV5.js'></script>
		        <script type='text/javascript'>
							 NM.init({widgetId: '$client_id', template: '$template', articleSelector: '$article_selector'});
		        </script>";
	}

	function newsmax_article_ad_injector($content) {
		 $client_id = get_option('newsmax_nm_client_id');
		 $template = get_option('newsmax_nm_template');
		 $article_selector = get_option('newsmax_nm_article_selector') ? get_option('newsmax_nm_article_selector') : 'auto-detect';
		 $cloudflare_async = get_option('newsmax_nm_cloudflare_async') ? 'true' : 'false';

		 if($article_selector=='auto-detect'){
			 return $content.newsmax_auto_detect_ad_template($client_id, $template, $cloudflare_async);
		 }else{
			 return $content.newsmax_standard_ad_template($client_id, $template, $article_selector, $cloudflare_async);
		 }
	}

	function newsmax_plugin_options(){
		  include('newsmax-in-article-widget-options-template.php');
	}

	function newsmax_register_settings() {
		  register_setting('newsmax-settings-group', 'newsmax_nm_client_id');
			register_setting('newsmax-settings-group', 'newsmax_nm_article_selector');
		  register_setting('newsmax-settings-group', 'newsmax_nm_template');
		  register_setting('newsmax-settings-group', 'newsmax_nm_cloudflare_async');
	}

	function newsmax_article_ad_menu(){
		  add_options_page('Newsmax Article Widget Options', 'Newsmax Instream Ads', 'manage_options', 'newsmax-plugin-menu', 'newsmax_plugin_options');
		  add_action('admin_init', 'newsmax_register_settings');
	}

	function newsmax_start_on_single_posts_only($query) {
		 if( $query->is_main_query()
			&& $query->is_singular()
			&& ! $query->get( 'post_type' )
			&& ! $query->is_attachment()
		  ){
			  add_action('the_content', 'newsmax_article_ad_injector');
		  }
	}
	add_action( 'pre_get_posts', 'newsmax_start_on_single_posts_only' ) ;
	add_action('admin_menu','newsmax_article_ad_menu');

?>

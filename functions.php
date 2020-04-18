<?php
	
	//META TITLE AND DESCRIPTION
	function set_meta(){
		global $meta;
		$meta->generate_seo_meta();
	}
	remove_action( 'wp_head', '_wp_render_title_tag', 1 );

	//GSC CODE
	function set_gsc_code(){
		global $meta; 
		$meta->gsc_code();
	}	
	
	//JSON CODE
	function set_json_code(){
		global $meta;
		$meta->json_code();
	}
	
	//NOINDEX CODE
	function set_noindex(){
		global $meta;
		$meta->generate_noindex();
	}

	function the_content_edit_str( $content ){
		global $meta;
		return str_replace($meta->the_content_co_str(),$meta->the_content_na_str(),$content);
	}
	
	function the_content_edit_preg( $content ){
		global $meta;
		return preg_replace('@'.$meta->the_content_co_preg().'@Usmi',$meta->the_content_na_preg(),$content);
	}


	
?>
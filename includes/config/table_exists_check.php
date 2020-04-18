<?php 
$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD , DB_NAME);
$q = "SHOW TABLES LIKE 'seo_plug_meta_table'";
$zapytanie = mysqli_query($connection, $q); 
$num = mysqli_num_rows($zapytanie);
if ($num == 0){	
define('table_not_created','');
function check_if_table_exists(){
	global $wpdb;

		$meta_table = "CREATE TABLE seo_plug_meta_table (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				seo_plug_page_link VARCHAR(30) NOT NULL,
				seo_plug_title VARCHAR(300) NOT NULL,
				seo_plug_description VARCHAR(300) NOT NULL
				)";

		$gsc_table = "CREATE TABLE seo_plug_gsc_table (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				seo_plug_gsc_code VARCHAR(300) NOT NULL
				)";
				
		$json_table = "CREATE TABLE seo_plug_json_table (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				seo_plug_json_code VARCHAR(1000) NOT NULL
				)";	
				
		$noindex_table = "CREATE TABLE seo_plug_noindex_table (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				seo_plug_noindex_link VARCHAR(500) NOT NULL
				)";
				
		$options_table = "CREATE TABLE seo_plug_options_table (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				seo_plug_brand VARCHAR(300) NOT NULL
				)";	

		$the_content_table = "CREATE TABLE seo_plug_the_content_edit (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				seo_plug_brand VARCHAR(300) NOT NULL
				co VARCHAR(1000) NOT NULL,
				na VARCHAR(1000) NOT NULL,
				type INT(6) NOT NULL
				)";

		$redirect_table = "CREATE TABLE seo_plug_redirect_table (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				redirect_url VARCHAR(300) NOT NULL,
				destination_url VARCHAR(300) NOT NULL
				)";					

		$tables = [$meta_table, $gsc_table, $json_table, $noindex_table, $options_table, $the_content_table, $redirect_table];		

		foreach ($tables as $sql){
			$wpdb->query($sql);
		}
	}
check_if_table_exists();		
}

	$results = $wpdb->get_results( "SELECT * FROM seo_plug_meta_table" );
	$results_gsc = $wpdb->get_results( "SELECT * FROM seo_plug_gsc_table" );
	$results_json = $wpdb->get_results( "SELECT * FROM seo_plug_json_table" );
	$results_noindex = $wpdb->get_results( "SELECT * FROM seo_plug_noindex_table" );
	$results_options = $wpdb->get_results( "SELECT seo_plug_brand FROM seo_plug_options_table" );
	$results_the_content = $wpdb->get_results( "SELECT * FROM seo_plug_the_content_edit" );
	$results_the_content_preg = $wpdb->get_results( "SELECT * FROM seo_plug_the_content_edit WHERE type=2" );
 
?>
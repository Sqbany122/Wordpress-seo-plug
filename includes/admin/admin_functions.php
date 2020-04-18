<?php

// DODAWANIE META TITLE I DESC DO BAZY
function add_meta_to_database(){
global $wpdb;
global $results_options;
$page_url = $_POST['page_link'];
$title = $_POST['page_title'];
$desc = $_POST['page_description'];
$brand = $_POST['brand'];
	if (!empty($page_url) && !empty($title) && !empty($desc)){
		$wpdb->query("INSERT INTO seo_plug_meta_table (id, seo_plug_page_link, seo_plug_title, seo_plug_description) VALUES ('', '$page_url', '$title', '$desc')");
	}
	
	if (empty($results_options)){
		$wpdb->query("INSERT INTO seo_plug_options_table (id, seo_plug_brand) VALUES ('','$brand')");
	}elseif(!empty($results_options)){
		$wpdb->query("UPDATE seo_plug_options_table SET seo_plug_brand='$brand'");
	}
}

function delete_meta_from_database(){
	global $wpdb;
	global $results;
	foreach($results as $row_delete){
		$id = $row_delete->id;
	}
	$wpdb->query("DELETE FROM seo_plug_meta_table WHERE id='$id'");
}	

if (isset($_POST['save_meta'])){
	add_meta_to_database();
}

if (isset($_POST['delete_meta'])){
	delete_meta_from_database();
}

// DODAWANIE DO BAZY KODU GSC
function add_gsc_code(){
	global $wpdb;
	$gsc_code = $_POST['gsc_code'];
		$wpdb->query("INSERT INTO seo_plug_gsc_table (id, seo_plug_gsc_code) VALUES ('', '$gsc_code')");
}

function update_gsc_code(){
	global $wpdb;
	$gsc_code = $_POST['gsc_code'];
		$wpdb->query("UPDATE seo_plug_gsc_table SET seo_plug_gsc_code='$gsc_code'");
}

if (isset($_POST['save_gsc']) && empty($results_gsc)){
	add_gsc_code();
}elseif (isset($_POST['save_gsc']) && !empty($results_gsc)){
	update_gsc_code();
}

// DODAWANIE KODU JSON DO BAZY
function add_json_code(){
	global $wpdb;
	$json_code = $_POST['json_code'];
		$wpdb->query("INSERT INTO seo_plug_json_table (id, seo_plug_json_code) VALUES ('', '$json_code')");
}

function update_json_code(){
	global $wpdb;
	$json_code = $_POST['json_code'];
		$wpdb->query("UPDATE seo_plug_json_table SET seo_plug_json_code='$json_code'");
}

if (isset($_POST['save_json']) && empty($results_json)){
	add_json_code();
}elseif (isset($_POST['save_json']) && !empty($results_json)){
	update_json_code();
}

// DODAWANIE NOINDEX DO BAZY
function add_noindex_to_database(){
	global $wpdb;
	$page_url = $_POST['noindex_link'];
		$wpdb->query("INSERT INTO seo_plug_noindex_table (id, seo_plug_noindex_link) VALUES ('', '$page_url')");	
}

function delete_noindex_from_database(){
	global $wpdb;
	global $results_noindex;
	foreach($results_noindex as $row_delete){
		$id = $row_delete->id;
	}
	$wpdb->query("DELETE FROM seo_plug_noindex_table WHERE id='$id'");
}

if (isset($_POST['save_noindex'])){
	add_noindex_to_database();
}

if (isset($_POST['delete_noindex'])){
	delete_noindex_from_database();
}

// USUWANIE PLIKU ADMINER.PHP
if(isset($_POST['delete_adminer'])){
	unlink("/wptest/wp-content/plugins/seo_plug/includes/adminer/adminer.php");
}

// MODYFIKACJA THE_CONTENT
function add_replace_in_content(){
	global $wpdb;
	$co_str = $_POST['the_content_co_str'];
	$na_str = $_POST['the_content_na_str'];

	$co_preg = $_POST['the_content_co_preg'];
	$na_preg = $_POST['the_content_na_preg'];

	if (!empty($co_str) && empty($co_preg))
		$wpdb->query("INSERT INTO seo_plug_the_content_edit (id, co, na, type) VALUES ('','$co_str','$na_str','1')");
	elseif (empty($co_str) && !empty($co_preg)){
		$wpdb->query("INSERT INTO seo_plug_the_content_edit (id, co, na, type) VALUES ('','$co_preg','$na_preg','2')");
	}
}

function delete_replace_in_content(){
	global $wpdb;
	global $results_the_content;
	foreach($results_the_content as $row_the_content){
		$id = $row_the_content->id;
	}
	$wpdb->query("DELETE FROM seo_plug_the_content_edit WHERE id='$id'");
}

if (isset($_POST['save_the_content'])){
	add_replace_in_content();
}

if (isset($_POST['delete_the_content'])){
	delete_replace_in_content();
}


?>
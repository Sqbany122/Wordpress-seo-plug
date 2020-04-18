<?php

	class Meta{

		public $seo_link;
		public $brand;
		public $seo_title;
		public $seo_desc;
		public $seo_robots;
		public $gsc_code;
		public $json_code;
		public $the_content_co;
		public $the_content_na;
	
		//FUNKCJA GENERUJĄCA META TITLE I DESC 
		public function generate_seo_meta($print=TRUE){

		global $wpdb;
		global $results_options;
		$uri = $_SERVER['REQUEST_URI'];
		$results = $wpdb->get_results( "SELECT * FROM seo_plug_meta_table WHERE seo_plug_page_link='$uri'" );

		foreach ($results as $row){
			if ($_SERVER['REQUEST_URI'] == $row->seo_plug_page_link){
				$this->seo_link = $row->seo_plug_page_link;
				$this->seo_title = $row->seo_plug_title;
				$this->seo_desc = $row->seo_plug_description;
			}
		}
		foreach ($results_options as $row_brand){
			if (!empty($row_brand->seo_plug_brand)){
				$this->brand = $row_brand->seo_plug_brand;
			}
		}
		 
		if ($_SERVER['REQUEST_URI'] != $this->seo_link){
			$this->seo_title = get_the_title();
		}

			$seo_meta = "";

			$seo_meta .= "<title>".$this->seo_title." - ".$this->brand."</title>\r\n";
			$seo_meta .= "<meta name='description' content='".$this->seo_desc."' />\r\n"; 

			if ($print) 
				echo $seo_meta;			
       		else 
       			return $seo_meta;

		}
		
		// FUNKCJA WYŚWIETLAJĄCA KOD GSC
		public function gsc_code($print=TRUE){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_gsc_table" );
			
			foreach ($results as $row){
				$this->gsc_code = $row->seo_plug_gsc_code;
			}

			$gsc_code = "";
			$gsc_code .= "<meta name='google-site-verification' content='".$this->gsc_code."' />\r\n";

			if($print) 
				echo $gsc_code;
       		else 
       			return $gsc_code;
		}
		
		// FUNKCJA WYŚWIETLAJĄCA KOD JSON
		public function json_code($print=TRUE){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_json_table" );
			
			foreach ($results as $row){
				$this->json_code = $row->seo_plug_json_code;
			}
			
			$json_code = "";
			$json_code .= $this->json_code."\r\n";
			
			if($print) 
				echo $json_code;
       		else 
       			return $json_code;
		}
		
		// FUNKCJA WYŚWIETLAJĄCA NOINDEX
		public function generate_noindex($print=TRUE){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_noindex_table" );
			
			foreach ($results as $row){
				if ($_SERVER['REQUEST_URI'] == $row->seo_plug_noindex_link){
					$this->seo_robots = $row->seo_plug_noindex_link;
				}
			}

			$seo_robots = "";
			$seo_robots .= "<meta name='robots' content='noindex, follow' />\r\n";
				

			if ($print && $_SERVER['REQUEST_URI'] == $this->seo_robots) 
				echo $seo_robots;
       		else 
       			return $seo_robots;
			
		}

		// THE_CONTENT STR_REPLACE
		public function the_content_co_str($print=TRUE){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_the_content_edit WHERE type='1'" );

			foreach ($results as $row){
				$this->the_content_co = $row->co;
			}

			$the_content = "";
			$the_content .= $this->the_content_co;


       		return $the_content;

		}

		public function the_content_na_str($print=TRUE){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_the_content_edit WHERE type='1'" );

			foreach ($results as $row){
				$this->the_content_na = $row->na;
			}

			$the_content = "";
			$the_content .= $this->the_content_na;


       		return $the_content;

		}

		// THE_CONTENT PREG_REPLACE
		public function the_content_co_preg($print=TRUE){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_the_content_edit WHERE type=2" );

			foreach ($results as $row){
				$this->the_content_co = $row->co;
			}

			$the_content = "";
			$the_content .= $this->the_content_co;


       		return $the_content;

		}

		public function the_content_na_preg($print=TRUE){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_the_content_edit WHERE type=2" );

			foreach ($results as $row){
				$this->the_content_na = $row->na;
			}

			$the_content = "";
			$the_content .= $this->the_content_na;


       		return $the_content;

		}
		
	}


?>
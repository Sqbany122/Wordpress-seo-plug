<?php 

	class Redirect{

		public $redirect_url;
		public $destination_url;

		public function set_redirect(){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM seo_plug_redirect_table" );

			foreach($results as $row){
				$this->redirect_url = $row['redirect_url'];
				$this->destination_url = $row['destination_url'];
			}

			function redirect_url(){
				if ($_SERVER['REQUEST_URI'] == '/wptest/sssssssss/'){
					wp_redirect( "http://xn--obaben-2db.eu/wptest/", 301 );
					exit();
				}
			}

			add_action( 'template_redirect', 'redirect_url', 1, 1 );

		}

	}


?>
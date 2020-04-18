<?php 
require_once('style_admin.php');

    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }

function  seo_plug_test(){
		add_menu_page( 'SeoPlug', 'SeoPlug', 'administrator', 'seo_plug', 'seo_plug', '', 7 );
	}
	
	// DODANIE WTYCZKI DO MENU W WORDPRESIE I JEJ WYGLĄD
	function seo_plug(){
		global $protocol;
		global $wpdb;
		global $row_gsc;
		global $results;
		global $results_gsc;
		global $results_json;
		global $results_noindex;
		global $results_options;
		global $results_the_content;
		$data_base_seo = '<h2>Dane do bazy:</h2><h3>HOST: <span>'.$wpdb->dbhost.'</span></h3><h3>DB_USER: <span>'.$wpdb->dbuser.'</span></h3><h3>PASSWORD: <span>'.$wpdb->dbpassword.'</span></h3><h3>DB_NAME: <span>'.$wpdb->dbname.'</span></h3><br/>';
		?>

		<h1 class="plugin_h1">SeoPlug - make WordPress great again</h1>
		<div class="plugin_main_box">
				<form method="post" name="form" onkeydown="return event.key != 'Enter';">
				<div class="adminer_box">
					<h2>Adminer:</h2>
					<a class="adminer-btn" href="<?php echo $protocol . "://" . $_SERVER['HTTP_HOST']; ?>/wptest/wp-content/plugins/seo_plug/includes/adminer/unzip.php" target="_blank">Dodaj adminera</a>
					<?php 
						if (file_exists('../wp-content/plugins/seo_plug/includes/adminer/adminer.php')){
							echo '<input class="adminer-btn-input-delete" type="submit" name="delete_adminer" value="Usuń adminera" />';
						}else{
							echo '<input disabled class="adminer-btn-input" type="submit" name="delete_adminer" value="Usuń adminera" />';
						}
					?>
					<a class="adminer-btn" href="<?php echo $protocol . "://" . $_SERVER['HTTP_HOST']; ?>/wptest/wp-content/plugins/seo_plug/includes/adminer/adminer.php" target="_blank">Otwórz adminera</a>
					<p>Pamiętaj aby zawsze usuwać plik adminer.php</p>
				</div>
				<div style="clear:both"></div>
			<div class="plugin_page_box">
			<h2>Ustaw meta title, description i robots dla poszczegolnych podstron:</h2>
			<?php 
				foreach ($results_options as $row_options){
					$brand = $row_options->seo_plug_brand;
				}
			?>
			<h3>Na początek wybierz brand: <input class="brand_input" type="text" name="brand" placeholder="brand" value="<?php echo $brand; ?>"/></h3>
			
				<?php
				$i = 1;
				foreach ($results as $row){
					echo '<span class="number">'.$i++.'.</span>
								<input class="plugin_page_input" type="text" placeholder="link podstrony" value="'.$row->seo_plug_page_link.'"/>
								<input class="plugin_page_input" type="text" placeholder="tytuł podstrony" value="'.$row->seo_plug_title.'"/>
								<input class="plugin_page_input" type="text" placeholder="opis podstrony" value="'.$row->seo_plug_description.'"/>
								<button name="delete_meta">X</button><br/>';		
				}
				?>
				
				<input class="plugin_page_input" type="text" name="page_link" placeholder="link podstrony" />
				<input class="plugin_page_input" type="text" name="page_title" placeholder="tytuł podstrony" />
				<input class="plugin_page_input" type="text" name="page_description" placeholder="opis podstrony" /><br/>
				<input class="plugin_save_button" type="submit" name="save_meta" value="Zapisz" />
			</div>
			
			<div class="gsc_box">
				<h2>Dodaj kod GSC:</h2>
				<?php 
					foreach ($results_gsc as $row_gsc){
						$gsc_code = $row_gsc->seo_plug_gsc_code;
					}
				?>
			
				<input class="plugin_page_input" type="text" name="gsc_code" placeholder="Wklej tutaj jedynie sam kod weryfikacyjny (bez całego tagu)" value="<?php echo $gsc_code; ?>"/><button name="delete_gsc">X</button><br>
				<input class="plugin_save_button" type="submit" name="save_gsc" value="Zapisz" />
			</div>
				
			<div class="json_box">
				<h2>Dodaj kod JSON:</h2>
				<?php 
					foreach ($results_json as $row_json){
						$json_code = $row_json->seo_plug_json_code;
					}
				?>
				<textarea id="plugin_json_code" name="json_code"><?php echo $json_code; ?></textarea>
				<br><input class="plugin_save_button" type="submit" name="save_json" value="Zapisz" />
			</div>
			
			<div class="robots_box">
			<h2>Dodaj (noindex) na wybrane adresy:</h2>
				<?php
				$i = 1;
				foreach ($results_noindex as $row){
					echo '<span class="number">'.$i++.'.</span>
							<input class="plugin_page_input" type="text" name="noindex_link" placeholder="link podstrony" value="'.$row->seo_plug_noindex_link.'"/>
							<button name="delete_noindex">X</button><br/>';		
				}
				?>
				<input class="plugin_page_input" type="text" name="noindex_link" placeholder="link podstrony" /><br/>
				<input class="plugin_save_button" type="submit" name="save_noindex" value="Zapisz" />
			</div>

			<div class="robots_box">
				<h2>Podmiana zawartości strony w zmiennej (the_content):</h2>
				<h3>str_replace:</h3>
				<?php
					foreach ($results_the_content as $row_the_content){

						if ($row_the_content->type == '1'){
							$the_content_co = $row_the_content->co;
							$the_content_na = $row_the_content->na;
						}else{
							$the_content_co = '';
							$the_content_na = '';
						}
						
						if (!empty($the_content_co))
							echo '<input class="plugin_page_input" type="text" placeholder="link podstrony" value="'.$the_content_co.'"/>
								<input class="plugin_page_input" type="text" placeholder="tytuł podstrony" value="'.$the_content_na.'"/>
								<button name="delete_the_content">X</button><br/>';	
					}
				?>
				<input class="plugin_page_input" type="text" name="the_content_co_str" placeholder="link podstrony" />
				<input class="plugin_page_input" type="text" name="the_content_na_str" placeholder="tytuł podstrony" />
				<div style="clear:both"></div>

				<h3>preg_replace:</h3>
				<?php
					foreach ($results_the_content as $row_the_content){
						if ($row_the_content->type == '2'){
							$the_content_co = $row_the_content->co;
							$the_content_na = $row_the_content->na;
						}else{
							$the_content_co = '';
							$the_content_na = '';
						}

						if (!empty($the_content_co))
							echo '<input class="plugin_page_input" type="text" placeholder="link podstrony" value="'.$the_content_co.'"/>
								<input class="plugin_page_input" type="text" placeholder="tytuł podstrony" value="'.$the_content_na.'"/>
								<button name="delete_the_content">X</button><br/>';	
					}
				?>
				<input class="plugin_page_input" type="text" name="the_content_co_preg" placeholder="link podstrony" />
				<input class="plugin_page_input" type="text" name="the_content_na_preg" placeholder="tytuł podstrony" />
				<div style="clear:both"></div>
				<input class="plugin_save_button" type="submit" name="save_the_content" value="Zapisz" />

			</div>
			</form>
		</div>		
		<?php
		}		
		add_action( 'admin_menu', 'seo_plug_test' );


?>
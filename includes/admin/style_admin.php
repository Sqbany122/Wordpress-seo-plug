<?php 

function add_new_css(){
	echo '<style>
	.plugin_h1{
	padding: 0;
	margin: 30px 0;
	font-size: 32px;
}

.data_btn{
	color: black;
	border: solid 1px #7e8993;
	padding: 9.5px;
	border-radius: 5px;
	vertical-align: top;
	cursor: pointer;
}

.database{
	color: black;
	width: 250px;
	border: solid 1px #7e8993;
	padding: 5px !important;
	border-radius: 5px;
}

.adminer-btn-input{
	color: black;
	border: solid 1px #7e8993;
	padding: 9px;
	border-radius: 5px;
	cursor: pointer;
}

.adminer-btn-input-delete{
	color: red;
	border: solid 1px red;
	padding: 9px;
	border-radius: 5px;
	cursor: pointer;
}

.adminer-btn, .adminer-btn:hover{
	text-decoration: none;
	color: black;
	border: solid 1px #7e8993;
	padding: 10px;
	border-radius: 5px;
	cursor: pointer;
}

.plugin_main_box{
	padding: 30px 10px 10px 0px;
}

.db_box{
	width: 100%;
}

.database_box,.adminer_box{
	width: 30%;
	height: 230px;
	float:left;
	border: solid 1px;
	padding-left: 20px;
	border-radius: 10px;
	margin-bottom: 10px;
	margin-right: 10px;
}

.database_box h3{
	margin-left: 2px;
}

.database_box h3 span{
	color: red;
}

.database_box p, .adminer_box p {
	color: red;
	margin-left: 2px;
	opacity: 0.9;
}

.plugin_page_box, .robots_box, .gsc_box, .json_box{
	border: solid 1px;
	padding-left: 20px;
	border-radius: 10px;
	margin-bottom: 10px;
}

.plugin_main_box h2{
	font-size: 28px;
}

.brand_input{
	width: 300px;
}

.plugin_page_input{
	width: 350px;
	height: 40px;
	margin-top: 5px;
}

.number{
	display: inline-block;
	width: 30px;
	font-size: 18px;
	font-weight: 600;
}

.plugin_page_box > button, .gsc_box button, .robots_box button{
	width: 40px;
	height: 40px;
	vertical-align: top;
	margin-top: 5px;
	color: #32373c;
	border-radius: 5px;
	padding: 0;
	border: 1px solid #7e8993;
	background-color: #fff;
	font-size: 29px;
	font-weight: bold;
}

.plugin_page_select{
	width: 120px;
	min-height: 40px !important; 
	vertical-align: top !important;
	padding: 9px !important;
}

#plugin_json_code{
	width: 400px;
	min-height: 400px;
}

.plugin_save_button{
	margin-top: 20px;
	margin-bottom: 30px;
	width: 90px !important;
	height: 40px;

	
}</style>';

}


add_action( 'admin_head', 'add_new_css' );
?>
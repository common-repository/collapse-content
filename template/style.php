<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
#wpsm_accordion_<?php echo $post_id; ?> .wpsm_panel-heading{
padding:0px !important;
}
#wpsm_accordion_<?php echo $post_id; ?> .wpsm_panel-title {
margin:0px !important; 
text-transform:none !important;
line-height: 1 !important;
background:transparent !important;
}
#wpsm_accordion_<?php echo $post_id; ?> .wpsm_panel-title a{
text-decoration:none;
color:<?php echo $acc_title_icon_clr; ?> !important;
font-size:<?php echo $title_size; ?>px !important;
display:block;
padding:0px;
font-family: <?php echo $font_family; ?> !important;
padding-top: 10px;
padding-bottom: 10px;
<?php if($enable_ac_border=="yes"){ ?>
border-bottom:1px solid  <?php echo $acc_title_icon_clr; ?> !important;
<?php } ?>

}
#wpsm_accordion_<?php echo $post_id; ?> .wpsm_panel-title a:hover,#wpsm_accordion_<?php echo $post_id; ?> .wpsm_panel-title a:visited, #wpsm_accordion_<?php echo $post_id; ?> .wpsm_panel-title a:focus {
	color:<?php echo $acc_title_icon_clr; ?> !important;
}
#wpsm_accordion_<?php echo $post_id; ?> .acc-a{
	color: <?php echo $acc_title_icon_clr; ?> !important;
	background-color:transparent !important;
	border: 0px !important;
}
#wpsm_accordion_<?php echo $post_id; ?> .wpsm_panel-default > .wpsm_panel-heading{
	color: <?php echo $acc_title_icon_clr; ?> !important;
	background-color: transparent;
	border:0px  !important;
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
}

#wpsm_accordion_<?php echo $post_id; ?> {
	margin-bottom: 20px;
	overflow: hidden;
	float: left;
	width: 100%;
	display: block;
}
#wpsm_accordion_<?php echo $post_id; ?> .ac_title_class{
	display: inline-block;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 13px;
    padding-right: 10px;
    border: 0px solid #ddd;
	font-size:<?php echo $title_size; ?>px !important;
font-family: '<?php echo $font_family; ?>' !important;
	line-height:1.4 !important

}
#wpsm_accordion_<?php echo $post_id; ?>  .wpsm_panel {
	overflow:hidden;
	-webkit-box-shadow: 0 0px 0px rgba(0, 0, 0, .05);
	box-shadow: 0 0px 0px rgba(0, 0, 0, .05);
	
	border:0px !important;
	border-radius: 0px;
	background:transparent !important;
	
}

#wpsm_accordion_<?php echo $post_id; ?>  .wpsm_panel-body{

color:<?php echo $acc_desc_font_clr; ?> !important;

font-size:<?php echo $des_size; ?>px !important;
font-family: '<?php echo $font_family; ?>' !important;
overflow: hidden;

border: 0px solid #ddd !important;

border-top:0px !important;
line-height:1.4 !important;
}

#wpsm_accordion_<?php echo $post_id; ?> .ac_open_cl_icon{
	
	color: <?php echo $acc_title_icon_clr; ?>;
	float:<?php echo $acc_op_cl_align; ?> !important;
     padding-top: 5px; 
     padding-bottom: 5px; 
	 padding-left:10px;
	 padding-right:10px;
    line-height: 1.0;
    font-size:<?php echo $title_size; ?>px !important;
text-align: center !important;
     width: 32px !important;
    display: inline-block;
	-webkit-transition: all ease 0.8s;
    -moz-transition: all ease 0.8s;
    transition: all ease 0.8s;
	
	
}
#wpsm_accordion_<?php echo $post_id; ?> .ac_open_cl_number{
 width: 25px !important;
    display: inline-block;
	 margin-left:10px;
	 text-align: center !important;
	 font-size:<?php echo $title_size; ?>px !important;

}
<?php echo $custom_css; ?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Chillitalk | Cheap international call made easy</title>
    <meta name="description" content="Chillitalk is the low-cost way to call abroad. No SIM change, no PIN, no long 
    numbers. Just ch eap international calls from your mobile or landline." />
    <meta name="keywords" content="calling cards, call india, call pakistan, Chillitalk, Chillitalk, srilanka, 
    bangladesh, cheap international calls, cheap calling card" />
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8" />
    
    <!--STYLESHEET-->
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/colorbox.css" rel="stylesheet" type="text/css">
    <!--JS-->

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.colorbox-min.js" type="text/javascript"></script>
    <script>
		$(document).ready(function() {
           	$(".popup-link").colorbox({inline:true, 
									   width:"80%", 
									   height:"70%", 
									   open:true,
									   onClosed:function(){ window.location.href = "<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/invite_friends/" } 
									   }
									  ); 
        });
	</script>  


		<style>
#colorbox
{
left: 200px !important;
margin-top: 100px;
}
    </style>
	
  
</head>
<body>
<a href=".maincomon" class="popup-link"></a>
 <!--main logo section  start here-->
        <div class="maincomon">
            <section class="bgmobile">
                <div class="greenblean">
                    <h1 id="h1">
                        Compose Invitation Success</h1>
                </div>
                <p class="rightcunt2">
                <div class="span12" style="padding:20px;margin-left:20px">
                   <h3><?php echo $this->session->userdata('info_invitation'); ?></h3> 
                </div>
                </p>
                    
                <div class="secbutton commfrt">
                    <div class="signup green">
                        <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard">Go to My Account </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </body>
</html>
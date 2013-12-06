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
           	$(".mainpopup").colorbox({inline:true, 
									   width:"80%", 
									   height:"20%", 
									   open:true,
									   onClosed:function(){ window.location.href = "<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/" } 
									   }
									  ); 
        });
	</script>  


	
	
  
</head>
<body>
<a href=".maincomon" class="mainpopup"></a>
<!--main logo section  start here-->
        <div class="maincomon">
            <section class="bgmobile">
                <div class="greenblean redgb">
                    <h1 id="h1">
                        Your transaction has been declined </h1>
                </div>
                <p class="rightcunt2">
                    Please verify your card details and try again. Alternatively, you can try using
                    a different credit card.
                </p>
                <p class="rightcunt2">
                	<strong>Reference : <?php echo $this->session->userdata('ref_code_saver'); ?></strong>
                </p>
                
                <div class="secbutton commfrt">
                    <div class="signup green">
                        <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard">Go to My Account </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <a class="toplink" style="display: block;"></a>
  <script type="text/javascript">
$( ".leftmyaccount" ).css({ min-height: "780px" });
</script>
</body>
</html>
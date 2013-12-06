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
<a class="popup-link" href="#popup"></a>

<div id="popup">
<section class="bgmobile">
    <div class="greenblean greengb">
        <h1 id="h1">Compose Invitation</h1>
    </div>
    
    <form class="form-horizontal" name="frmstep" method="post" action="<?php echo base_url(); ?>myaccount/invite_friends/step2">
        <div class="control-group">
            <strong class="control-label" for="inputEmail">Message</strong>
            <div class="controls">
                <textarea name="compose_invitation" rows="10" required><?php echo $this->session->userdata('email_content'); ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <strong class="control-label" for="inputPassword">We will add this</strong>
            <div class="controls">
                <?php echo $this->session->userdata('default_content'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                <div class="secbutton commfrt">
                    
                    <div class="signup green">
                        <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/invite_friends">Cancel</a>
                    </div>
                    
                    <div class="signup red">
                        <button type="submit">Send</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
      
</section>
</div>
</body>
</html>
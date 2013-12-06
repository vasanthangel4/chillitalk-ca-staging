<?php 
  
  require_once('application/libraries/Session.php');
  //require_once('application/core/MY_Lang.php');
  //require_once('system/core/URI.php');
  $user = new CI_Session();
  //$uri = new CI_URI();  
  //$lang = new MY_Lang();
  
  $username = $user->userdata('username');
  $firstname = $user->userdata('firstname');
  
  
  //echo $uri->uri_string;
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1, maximum-scale=1" />
    <title>Chillitalk | Cheap international call made easy</title>
    <meta name="description" content="Chillitalk is the low-cost way to call abroad. No SIM change, no PIN, no long 
    numbers. Just ch eap international calls from your mobile or landline." />
    <meta name="keywords" content="calling cards, call india, call pakistan, Chillitalk, Chillitalk, srilanka, 
    bangladesh, cheap international calls, cheap calling card" />
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8" />
    
    <!--STYLESHEET-->
    <link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/bootstrap-responsive.min.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/bootstrap.min.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <?php if(is_front_page()) { ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/facelift.css" rel="stylesheet" type="text/css">
	<?php } ?>
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
    <!--JS-->

    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
     <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/Jscript1.js"></script>
          <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/Jscript2.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/backtotop.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.imageradio.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/SpryMenuBar.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.imageradio.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/countries-2.0-min.js"></script>
  
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function () { $('#radios1').imageradio({ hidden: false }); $('#radios2').imageradio(); $('#radios3').imageradio(); });
    </script>


	
    <?php wp_head(); ?>
	
  
  </head>
  <body>
  
  <!--main content start here-->
    <div id="maincontent">
        <header class="maincomon">
            <div class="flgbttn spanc1">
            	
                <?php if($firstname != '') { ?>
                
            	<div class="leftcom csname">
                    Welcome <?php echo $firstname; ?>
                </div>
                
				<?php } ?>
                
                
			<!--	<button type="submit">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/UK.gif" alt="Chillitalk UK" /></button>
                <span>UK English </span>
                <div class="arrow">
                </div>-->
                <script type="text/javascript">
                $('#pic-changer').change(function(){ //if the select value gets changed
   var imageSource = $(this).find(':selected').data('picture'); //get the data from data-picture attribute
   if(imageSource){ //if it has data
      $('#image-location').hmtl('<img src="'+imageSource+'">'); // insert image in div image-location
   } else {
      $('#image-location').hmtl(''); //remove content from div image-location, thus removing the image
   }
})
                
                </script>
                <select class="leftcom slectdt">
                <option class="uk" value="UK">   UK </option>
                <option class="uk" value="SE"> Sweden </option>
                <option class="uk" value="Fr"> France </option>
                <option class="uk" value="DK"> Denmark </option>
                <option class="uk" value="Dutch">  Dutch </option>
                <option class="uk" value="Lithunia">  Lithunia </option>   
                <option class="uk" value="Chinese">  Chinese </option>  
                <option class="uk" value="Hungary">  Hungary </option> 
                <option class="uk" value="German">  German </option> 
                </select>
                
       
                  
               <?php if($firstname != '') { ?>
                
                <a href="<?php echo site_url(); ?>/myaccount/dashboard/logout" onClick="return confirm('Are you sure want to logout ?')" class="leftcom underline">Log Out</a>
                
               <?php } ?>
               
                
                  <section class="topupns"><a href="<?php echo site_url(); ?>/myaccount/top_up/"> <?=lang('header.Topup'); ?></a> </section>
               <section id="loginimg">    
               <?php if($username == '') { ?>
                    <a href="<?php echo site_url(); ?>/login_member/"  title="login with your Chillitalk account">
                        
                        <?=lang('header.login'); ?>
                    </a>   
               <ul>
                <li class="none">
                	<a href="<?php echo site_url(); ?>/sign_up/" title="signup" class="none">
                    	
                            <?=lang('header.signup'); ?>
                    </a>
                </li>
                
                <?php }else{ ?>
                
                <li>
                    <a href="<?php echo site_url(); ?>/myaccount/" title="my account">
                       
                         <?=lang('header.myaccount'); ?>
                    </a>   
                </li>
                
                  
                <?php } ?>
                  </ul>
                </section>
            </div>
        </header>
        
        <?php if(is_front_page()) { ?>
        <!--nav section  start here-->
        <nav class="maincomon">
            <ul class="nav rightcom">
                <li><a href="<?php echo site_url(); ?>/rates/" title="rates">
                         <?=lang('header.rates'); ?></a></li>
                <li><a href="<?php echo site_url(); ?>/application/" title="apps">  <?=lang('header.apps'); ?></a>
                    <ul class="childNav">
                        <li><a href="app_success.htm">App Success</a></li>
                        <li><a href="android_success.htm">Android Success</a></li>
                    </ul>
                </li>
                 <li><a href="<?php echo site_url(); ?>/bundles/" title="bundles"><?=lang('header.bundles'); ?></a> </li>
                <li><a href="<?php echo site_url(); ?>/support/" title="support"><?=lang('header.support'); ?></a> </li>
                <li><a href="<?php echo site_url(); ?>/index.php/features/" title="features"><?=lang('header.features'); ?></a> </li>
              
                         
                  <li><a href="<?php echo site_url(); ?>/index.php/earn-money/"><?=lang('header.earn'); ?> </a> </li>
                <?php if($username == '') { ?>
                <li class="login none">
                    <a href="<?php echo site_url(); ?>/login_member/" class="none" title="login with your Chillitalk account">
                        
                        <?=lang('header.login'); ?>
                    </a>   
                </li>
                <li id="signupimg" style="margin-top:-2px !important;float:left !important;display:inline !important;">
                	<a href="<?php echo site_url(); ?>/sign_up/" title="signup">
                    	
                           <?=lang('header.signup'); ?>
                    </a>
                </li>
                
                <?php }else{ ?>
                
                <li class="none">
                    <a href="<?php echo site_url(); ?>/myaccount/" title="my account" class="none">
                     
                           <?=lang('header.myaccount'); ?>
                    </a>   
                </li>
                
                <?php } ?>
                
            </ul>
        </nav>
        <a class="toplink" style="display: block;"></a>
        
		<!--main logo section  start here-->
        <header class="maincomon mainlogo leftcom">
         <a href="#"> <img src="<?php echo get_template_directory_uri(); ?>/img/world.jpg" alt="Chillitalk" /></a>
          <div class="mainlogo1 leftcom">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Chillitalk" />
            <h1>  <?=lang('home.first'); ?></h1>
          </div>
        </header>
        <!--main logo section  end here-->
    	<?php }else{ ?>
		
        <!--nav section  start here-->
          <nav class="maincomon">
            <a href="<?php echo site_url(); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/img/innerlogo.png" alt="ChilliTalk Logo" />
            </a>
            <ul class="nav rightcom">
                <li><a href="<?php echo site_url(); ?>/rates/" title="rates">   <?=lang('header.rates'); ?></a></li>
                <li><a href="<?php echo site_url(); ?>/application/" title="apps"> <?=lang('header.apps'); ?></a>
                    <ul class="childNav">
                        <li><a href="app_success.htm">App Success</a></li>
                        <li><a href="android_success.htm">Android Success</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url(); ?>/bundles" title="bundles"> <?=lang('header.bundles'); ?></a> </li>
                <li><a href="<?php echo site_url(); ?>/support/" title="support"><?=lang('header.support'); ?></a> </li>
                <li><a href="<?php echo site_url(); ?>/index.php/features/" title="features"><?=lang('header.features'); ?></a> </li>
                  <li><a href="<?php echo site_url(); ?>/index.php/earn-money/"><?=lang('header.earn'); ?></a> </li>
                
                <?php if($username == '') { ?>
                <li class="login none">
                    <a href="<?php echo site_url(); ?>/login_member/" class="none" title="login with your Chillitalk account">
                       <?=lang('header.login'); ?> 
                    </a>   
                </li>
                <li id="signupimg" style="margin-top:-2px !important;float:left !important;display:inline !important;"> 
                	<a href="<?php echo site_url(); ?>/sign_up/" title="signup">
                
                      <?=lang('header.signup'); ?> 
                    </a>
                </li>
                
                <?php }else{ ?>
                
               
                <li class="none">
                    <a href="<?php echo site_url(); ?>/myaccount/" title="my account" class="none">
                       
                          <?=lang('header.myaccount'); ?> 
                    </a>   
                </li>
                
                <?php } ?>
               
            </ul>
            
           
          </nav>
          <!--nav section  end here-->
        
        <?php } ?>
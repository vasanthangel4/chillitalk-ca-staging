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
    
    <!--STYLESHEET-->
    <link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/bootstrap-responsive.min.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/bootstrap.min.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/dt_css.css" rel="stylesheet" type="text/css">


    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
    
    <!--JS-->
    
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/backtotop.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/Jscript1.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/leftmenue.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/countries-2.0-min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.colorbox.js" type="text/javascript"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/dt_js.js"></script>


	
    <?php wp_head(); ?>

  
  </head>
  <body>
  
  <!--main content start here-->
    <div id="maincontent">
        <header class="maincomon">
            <div class="flgbttn spanc1">
            	
            	<div class="leftcom csname">
                    Welcome <?php echo $this->session->userdata('firstname'); ?>
                </div>
                
                <!--<button type="submit">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/UK.gif" alt="Chillitalk UK" /></button>
                <span>UK English </span>
                <div class="arrow">
                </div>-->
                
                <select class="leftcom slectdt" onChange="window.location.href='<?php echo base_url(); ?>'+$(this).val()+'<?php echo substr($this->uri->uri_string(),2); ?>'">
    
    <?php if($this->uri->segment('1') == 'en') { ?>
    <option class="uk" value="en" selected>English</option>
    <?php }else{ ?>
    <option class="uk" value="en">English</option>
    <?php } ?>
    
    <!--<?php if($this->uri->segment('1') == 'fr') { ?>
    <option class="uk" value="fr" selected>French</option>
    <?php }else{ ?>
    <option class="uk" value="fr" >French</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'de') { ?>
    <option class="uk" value="de" selected>German</option>
    <?php }else{ ?>
    <option class="uk" value="de">German</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'se') { ?>
    <option class="uk" value="se" selected>Swedish</option>
    <?php }else{ ?>
    <option class="uk" value="se">Swedish</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'dk') { ?>
    <option class="uk" value="dk" selected>Danish</option>
    <?php }else{ ?>
    <option class="uk" value="dk">Danish</option>
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'pl') { ?>
    <option class="uk" value="pl" selected>Polish</option>  
    <?php }else{ ?>
    <option class="uk" value="pl">Polish</option>  
    <?php } ?> 
    
	<?php if($this->uri->segment('1') == 'nl') { ?>
    <option class="uk" value="nl" selected>Dutch</option>  
    <?php }else{ ?>
    <option class="uk" value="nl">Dutch</option>  
    <?php } ?>
    
	<?php if($this->uri->segment('1') == 'fi') { ?>
    <option class="uk" value="fi" selected>Finnish</option>
    <?php }else{ ?>
    <option class="uk" value="fi">Finnish</option>
    <?php } ?> -->
    </select>
    
                <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard/logout" onClick="return confirm('Are you sure want to logout ?')" class="leftcom underline">Log Out</a>


                
            </div>
        </header>
        
        <?php if(is_front_page()) { ?>
        <!--nav section  start here-->
        <nav class="maincomon">
            <ul class="nav rightcom">
            <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/features/" title="features">features</a> </li>

                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/rates/" title="rates">rates</a></li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps/" title="apps">apps</a>
                   
                </li>
                  <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/bundles/" title="bundles">bundles</a> </li>
               
                                 <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/" title="support">support</a> </li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/">top up</a> </li>
                
                <?php if($this->session->userdata('username') == '') { ?>
                <li class="loginbg" class="none">
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/" class="none" title="login with your Chillitalk account">
                        login
                    </a>   
                </li>
              <li id="signupimg">
                	<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up" title="signup">
                    	
                    </a>
                </li>
                
                <?php }else{ ?>
                
                <li>
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard" title="my account">
                        My Account
                    </a>   
                </li>
                
                <?php } ?>
                
                
                
              
            </ul>
        </nav>
        <a class="toplink" style="display: block;"></a>
        
		<!--main logo section  start here-->
        <header class="maincomon mainlogo leftcom">
          <img src="<?php echo get_template_directory_uri(); ?>/img/world.jpg" alt="Chillitalk" />
          <div class="mainlogo1 leftcom">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Chillitalk" />
            <h1>cheap international<br /> calls made easy</h1>
          </div>
        </header>
        <!--main logo section  end here-->
    	<?php }else{ ?>
		
        <!--nav section  start here-->
          <nav class="maincomon">
            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/img/innerlogo.png" alt="ChilliTalk Logo" />
            </a>
            <ul class="nav rightcom">
            <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/features/" title="features">features</a> </li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/rates/" title="rates">rates</a></li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps/" title="apps">apps</a>
                    <ul class="childNav">
                        <li><a href="app_success.htm">App Success</a></li>
                        <li><a href="android_success.htm">Android Success</a></li>
                    </ul>
                </li>
                  <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/bundles/" title="bundles">bundles</a> </li>
                
                
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/" title="support">support</a> </li>
                <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/">top up</a> </li>
                
                <?php if($this->session->userdata('username') == '') { ?>
                
                <li class="login">
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/" title="login with your chillitalk account">
                        login
                    </a>   
                </li>
                <li  id="signupimg">
                	<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up" title="signup">
                    	
                    </a>
                </li>
                
                <?php }else{ ?>
                
                <li>
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard" title="my account">
                        My Account
                    </a>   
                </li>
                
                <?php } ?>
               
            </ul>
            
           
          </nav>
          <!--nav section  end here-->
        
        <?php } ?>
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
									   height:"100px", 
									   open:true,
									   onClosed:function(){ window.location.href = "<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/setting/" } 
									   }
									  ); 
        });
	</script>  


	
	
  
</head>
<body>
<a href=".maincomon" class="mainpopup"></a>
 
        <div class="maincomon">
        <form name="fm" method="post" action="<?php echo current_url(); ?>">
            <section class="bgmobile">
                
                <p class="rightcunt2">
                    <div class="callhiswid clearall">
                            <p>
                           The auto top-up was activated on :
                            </p>
                            <p>
                            <strong><?php echo strftime('%d/%m/%Y %H:%M:%S', strtotime($topup->LastUpdate)); ?></strong>
                            </p>
                            <br/>
                            <br/>
                            <p>
                            Minimum Amount :
                            </p>
                            <p>
                             <?php echo $this->session->userdata('currency_symbol_web').' '.$topup->MinLevelID; ?>
                            </p>
                            
                            <br/>
                            <br/>
                            <p>
                           	Auto Top-up Amount :
                            </p>
                            <p>
                            <?php echo $this->session->userdata('currency_symbol_web').' '.$topup->TopupAmt; ?>
                            </p>
                            
                        </div>
                       
                        
                </p>
                
                
                <div class="secbutton commfrt">
                <p><strong>Are you sure want to deactive ?</strong></p>
                    <div class="signup red">
                        <button type="submit" name="submit">Yes </button>
                    </div>
                    
                     <div class="signup green">
                        <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/setting">No </a>
                    </div>
                </div>
            </section>
             </form>
        </div>
       
    </div>
    
</body>
</html>
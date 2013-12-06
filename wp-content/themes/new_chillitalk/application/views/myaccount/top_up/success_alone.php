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
									   height:"10%", 
									   open:true,
									   onClosed:function(){ window.location.href = "<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/" } 
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
                <div class="greenblean">
                    <h1 id="h1">
                        Your transaction has been successfully completed</h1>
                </div>
                <p class="rightcunt2">
                    &nbsp;&nbsp;<h2 style="margin-left:20px;">Details</h2>
                    
                    <table class="table table-hover" style="margin-left:38px">
                    	<tr>
                        	<th style="text-align:left">Ref Code</th>
                            <td><?php echo $this->session->userdata('ref_code_card1'); ?></td>
                        </tr>
                    	<tr>
                        	<th style="text-align:left">Amount of credit</th>
                            <td><?php echo $this->session->userdata('amount_card1'); ?></td>
                        </tr>
                        <tr>
                        	<th style="text-align:left">Previous Balance</th>
                            <td><?php echo $this->session->userdata('prev_bal_card1'); ?></td>
                        </tr>
                        <tr>
                        	<th style="text-align:left">Current Balance</th>
                            <td><?php echo $this->session->userdata('total_bal'); ?></td>
                        </tr>
                    </table>
                    
                    <br/>
                    <br/>
                    <strong>
                    <div class="span12" style="padding:20px;margin-left:20px">
                    Thank you! Your payment has been successful.
                    <br/>
					Please allow up to 15 minutes for your payment to appear in your account.
					</div>
                    </strong>
                </p>
                    
                <div class="secbutton commfrt">
                    <div class="signup green">
                        <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/welcome">OK</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <style type="text/css">
.topupns a {
    background-image: url(  "http://mundio-test.azurewebsites.net/wp-content/themes/new_chillitalk/img/topupnew.png") !important;
    height: 30px !important;
    line-height: 26px;
    margin-top: -5px;
    text-indent: -18px !important;
    width: 102px !important;
}

</style>
</body>
</html>
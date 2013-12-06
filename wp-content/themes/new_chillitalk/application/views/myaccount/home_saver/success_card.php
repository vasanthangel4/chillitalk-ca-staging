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
                <div class="greenblean">
                    <h1 id="h1">
                        Your transaction has been successfully completed</h1>
                </div>
                <p class="rightcunt2">
                
                 <div class="span12" style="padding:20px;margin-left:20px">
                     <strong>Thank you for using Chillitalk. Your destination number will be checked by destination 
                     Operator for a maximum of 3 days. If after 3 days your Home Saver is not activated yet, we will 
                     refund your Credit
					 </strong>       
					</div>
					<div class="clearfix"></div>
                    
                <table class="table" style="margin-left:38px">
                 <tr>
                        	<th style="text-align:left">Destnation number  </th>
                            <td>:</td>
                            <td><?php echo $this->session->userdata('destination_number'); ?></td>
                        </tr>
                    

                        <tr>
                        	<th style="text-align:left">Main Number</th>
                            <td>:</td>
                            <td><?php echo $this->session->userdata('main_number'); ?></td>
                        </tr>
                        <tr>
                        	<th style="text-align:left">Account Number1</th>
                            <td>:</td>
                            <td><?php echo $this->session->userdata('add_number1'); ?></td>
                        </tr>
                          <tr>
                        	<th style="text-align:left">Account Number2</th>
                            <td>:</td>
                            <td><?php echo $this->session->userdata('add_number2'); ?></td>
                        </tr>
                          <tr>
                        	<th style="text-align:left">Account Number3</th>
                            <td>:</td>
                            <td><?php echo $this->session->userdata('add_number3'); ?></td>
                        </tr>
                          <tr>
                        	<th style="text-align:left">Home Saver</th>
                            <td>:</td>
                            <td> <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('home_saver'); ?></td>
                        </tr>
                        <tr>
                        	<th style="text-align:left">Additional Numbers</th>
                            <td>:</td>
                            <td> <?php echo $this->session->userdata('add_number'); ?></td>
                        </tr>
                              <tr>
                        	<th style="text-align:left">Promo code Discount</th>
                            <td>:</td>
                            <td> <?php echo $this->session->userdata('promo_code_discount'); ?></td>
                        </tr>
                           <tr>
                        	<th style="text-align:left">Total </th>
                            <td>:</td>
                            <td> <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('total'); ?></td>
                        </tr>

                    </table>
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
$( ".leftmyaccount" ).css({ min-height: "760px" });
</script>
</body>
</html>
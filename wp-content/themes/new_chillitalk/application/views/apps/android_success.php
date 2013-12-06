<!--main logo section  start here-->
   <div class="tetxvbox">
    <section class="earnm">
      <h1 class="tsddefe2">Get started with Chillitalk</h1>
       
    </section>
    
    <section class="apps earnm">
    	<h3>1. Choose your device</h3>
        <form method="POST">
        	<div id="radios1">
            	<input type="radio" disabled="disabled" id="tim1" value="landline" name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg',checked:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile_select.jpg',hover:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile_select.jpg',disabled:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg' }"  />
                 
                  <input type="radio" id="tim3" onclick="toggle('hide');" value="android" name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/android.png',checked:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',hover:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/android.png'}" checked="checked" />
                 
                  <input type="radio" id="tim2" onclick="toggle('hide');" value="iPhone & iPad" name="group1" disabled="disabled" class="{src:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png', checked:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png', hover:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png', disabled:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png'}" />
                 
                
                 
                 <input type="radio" id="tim4" disabled="disabled" onclick="toggle('hide');" value="PC" name="group1" disabled="disabled" class="{src:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',checked:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',hover:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png'}" />
              </div>
        </form>
              <a class="toplink" style="display: block;"></a>
              <br/>
              <br/><br/><br/><br/><br/><br/>
              
              
              
              <div id="iphone-android">
              
           
                  
              <article class="earnm">
                <div class="greenblean">
                 <h1 id="h1">
Thank you for Signing Up to ChilliTalk!</h1>

<ul>
<p style="margin: 20px 0px 10px -20px; padding: 0px; text-indent: 0px; font-size: 14px;" class="leftcom">An SMS has
been sent to your phone with a <b>download link</b> and your <b>Chillitalk PIN</b>.</p>
<br><br>
<li><span>   Click on the App Store badge below to download the app. We’ve
also sent you a link via SMS. </span></li>
<li><span>
<a class="underline" href="https://play.google.com/store/apps/details?id=com.mundio.chillitalk&hl=en_GB"> 
Install the application</a> and use your <a href="#">Chillitalk
PIN</a> to   <a href="http://chillitalk.co.uk/en/login_member/">log in</a>.<br><br>
<span style="margin-left:-20px;">(If you don’t receive a PIN to your phone, follow the instructions in the application
to request a new ChilliTalk PIN) </span></span> </li>
</ul>
                </div>
              </article>
              
              </div>
          </section>
          
          <a href="https://play.google.com/store/apps/details?id=com.mundio.chillitalk&hl=en_GB" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/img/Chillitalk_web_android.png" class="imgappstore" alt="Chillitalk web app store" />

        </a>

      </div>
  </div>
   </div>
  <script type="text/javascript">
	$(document).ready(function() {
        //$('#iphone-android').hide();
		
		$('#tim1').on('change', function() {
			location.href = "<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/"
			
		});
		
		
		
		$('#tim3').on('change', function() {
			$('#frm-mobile-landline').hide('slow');
			$('#iphone-android').show('slow');
			$('#device').val('android');
		});
		
    });
  </script>

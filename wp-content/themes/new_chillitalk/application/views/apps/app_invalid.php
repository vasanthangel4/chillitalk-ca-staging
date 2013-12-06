    
<!--main logo section  start here-->
           	<div id="tetxvbox">
    <section class="earnm">
        <h1 class="tsddefe2">
Get started with Chillitalk
</h3>
       
    </section>
   
    <section class="apps earnm">
    	<h3>1. Choose your device</h3>
        <form method="POST">
        	<div id="radios1">
            	<input type="radio" id="tim1" value="landline" name="group1" title="landline" 
                class="{src:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg',
                checked:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile_select.jpg',
                hover:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile_select.jpg',
                disabled:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg' }" />
                 
                 
                <input type="radio" id="tim2" onclick="toggle('hide');" value="android" title="android" 
                name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/android.png',
                checked:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',
                hover:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',
                disabled:'<?php echo get_template_directory_uri(); ?>/img/android.png'}"
                <?php if($this->session->userdata('device') == 'android') { ?>  checked="checked" <?php } ?> />
                 
                <input type="radio" id="tim3" onclick="toggle('hide');" value="iPhone" name="group1"  
                class="{src:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png',
                checked:'<?php echo get_template_directory_uri(); ?>/img/iphone_select.png',
                hover:'<?php echo get_template_directory_uri(); ?>/img/iphone_select.png',
                disabled:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png'}"   
                title="iPhone" 
                <?php if($this->session->userdata('device') == 'iphone') { ?>  checked="checked" <?php } ?> />

                 
                <input type="radio" id="tim4" onclick="toggle('hide');" value="PC" name="group1" 
                class="{src:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',
                checked:'<?php echo get_template_directory_uri(); ?>/img/PC_select.png',
                hover:'<?php echo get_template_directory_uri(); ?>/img/PC_select.png',
                disabled:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png'}" />
            </div>
        </form>
              <a class="toplink" style="display: block;"></a>
              <br/>
              <br/><br/><br/><br/><br/><br/>
              
              
              
              <div id="iphone-android">
              
              <h3 id="store">2.	Enter your phone number and we will send you a text message containing your Login details and a link to the Google Play Store</h3>
                  
                  
                  
                  <?php if($this->session->userdata('signup_failed')) { ?>
                  
                  	<div class="alert alert-danger">
                    	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->userdata('signup_failed'); ?>
                    </div>
                  <?php } ?>
                  
              <section>
              	  
                  
                  <div class="appbgcl">
                  
                  <form name="frm-signup-mobile" id="frm-signup-mobile" 
                  method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps/invalid">
                     
                      <div>
                          <label>Your Phone Number</label>
                          <input type="text" class="<?php echo $this->config->item('small_flag'); ?>" value="+<?php echo $this->config->item('prefix_phone_web'); ?>" name="UK" readonly="readonly">
                          <?php if(form_error('phone_number')) { ?>
                          
                          <input type="text" name="phone_number" style="color:red;border-color:red" required="required" pattern="[0-9]+" />
                          
                          <input type="hidden" name="device" id="device"/>
                          <?php echo form_error('phone_number','<span style="color:red">','</span>'); ?>
                          
						  <?php }else{ ?>
                          
                          <input type="text" name="phone_number" required="required" pattern="[0-9]+" />
                          <input type="hidden" name="device" id="device" value="android"/>
                          
						  <?php } ?>
                          
                          
                      </div>
                      <label></label>
                     
                      <button type="submit" class="signupimg leftcaed">sign-up</button>
                     </form> 
                  </div>
                  
              </section>
             
                       

              </div>
              
              <div id="iphone">
              
              <h3 id="store">2.	Enter your phone number and we will send you a text message containing your Login details and a link to the App Store</h3>
                  
                  
                  
                  <?php if($this->session->userdata('signup_failed')) { ?>
                  
                  	<div class="alert alert-danger">
                    	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->userdata('signup_failed'); ?>
                    </div>
                  <?php } ?>
                  
              <section>
              	  
                  
                  <div class="appbgcl">
                  
                  <form name="frm-signup-mobile" id="frm-signup-mobile" 
                  method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps/invalid">
                     
                      <div>
                          <label>Your Phone Number</label>
                          <input type="text" class="<?php echo $this->config->item('small_flag'); ?>" value="+<?php echo $this->config->item('prefix_phone_web'); ?>" name="UK" readonly="readonly">
                          <?php if(form_error('phone_number')) { ?>
                          
                          <input type="text" name="phone_number" style="color:red;border-color:red" required="required" pattern="[0-9]+" />
                          
                          <input type="hidden" name="device" id="device"/>
                          <?php echo form_error('phone_number','<span style="color:red">','</span>'); ?>
                          
						  <?php }else{ ?>
                          
                          <input type="text" name="phone_number" required="required" pattern="[0-9]+" />
                          <input type="hidden" name="device" id="device" value="iphone"/>
                          
						  <?php } ?>
                          
                          
                      </div>
                      <label></label>
                     
                      <button type="submit" class="signupimg leftcaed">sign-up</button>
                     </form> 
                  </div>
                  
              </section>
             
                        

              </div>
          </section>
      </div>
  </div> </div>
  
  <script type="text/javascript">
	$(document).ready(function() {
        $('#iphone-android').hide();
		
		$('#tim1').on('change', function() {
			location.href = "<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/"
			
		});
		
		<?php if($this->session->userdata('device') == 'android') { ?>
			$('#frm-mobile-landline').hide('slow');
			$('#iphone-android').show('slow');
			$('#iphone').hide('slow');
			$('#device').val('android');
			$('#store').text('2.	Enter your phone number and we will send you a text message containing your Login details and a link to the Google Play Store');
		<?php }else{ ?>
			$('#frm-mobile-landline').hide('slow');
			$('#iphone-android').hide('slow');
			$('#iphone').show('slow');
			$('#device').val('android');
			$('#store').text('2.	Enter your phone number and we will send you a text message containing your Login details and a link to the App Store');
		<?php } ?>
		
		$('#tim2').on('change', function() {
			$('#frm-mobile-landline').hide('slow');
			$('#iphone-android').show('slow');
			$('#iphone').hide('slow');
			$('#device').val('android');
			$('#store').text('2.	Enter your phone number and we will send you a text message containing your Login details and a link to the Google Play Store');
		});
		
		$('#tim3').on('change', function() {
			$('#frm-mobile-landline').hide('slow');
			$('#iphone-android').hide('slow');
			$('#iphone').show('slow');
			$('#device').val('android');
			$('#store').text('2.	Enter your phone number and we will send you a text message containing your Login details and a link to the App Store');

				
		});
		
		$('#tim4').on('change', function() {
			$('#landline').hide('slow');
			$('#iphone-android').hide('slow');
			$('#img_landline').attr('src','<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg');
			$('#img_android').attr('src','<?php echo get_template_directory_uri(); ?>/img/android.png');
		});
		
    });
  </script>
    <style type="text/css">
#tim1 + img {
    margin: 0 33px 0 0;
}
</style>

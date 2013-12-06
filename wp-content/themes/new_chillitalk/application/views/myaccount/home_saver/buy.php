<div class="rightcunt">

  <h1>Home Saver Bundles </h1>
  
  <?php if(validation_errors()) { ?>
    
  	<div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo validation_errors(); ?>.
    </div>
  <?php } ?>
  
  <?php if($this->session->flashdata('failed')) { ?>
    
  	<div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $this->session->flashdata('failed'); ?>.
    </div>
  <?php } ?>
  
  <form name="frm_bundles" id="frm_bundles" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/buy" method="post" autocomplete="off">   
  
  <div class="cssaver1 leftcom">
  
      <div class="cssaver1 leftcom">
          <label>Destination mobile number*<span>(the international number you wish to call)</span></label>
          <input type="text" name="destination_number" class="leftcom" required="required" pattern="[0-9]+" value="<?php echo set_value('destination_number'); ?>">
      </div>
      
      <div class="cssaver1 leftcom">
          <label>Confirm destination number*</label>
          <input type="text" name="confirm_destination_number" class="leftcom" required="required" pattern="[0-9]+" value="<?php echo set_value('confirm_destination_number'); ?>">
      </div>
      
      <div class="cssaver1 leftcom">
          <label>Your main mobile number*</label>
          <input type="text" name="mobile_number" class="leftcom" required="required" pattern="[0-9]+" value="<?php echo set_value('mobile_number'); ?>" >
      </div>
      
      <div class="cssaver1 leftcom">
          <h4><b>Add additional <?php echo $this->session->userdata('country_code2_web'); ?> numbers to share your Home Saver
          <br/>(you can register up to 3 mobile and one landline number)</b> 
          </h4>
      </div>
      
      <div class="cssaver1 leftcom">
       
          <select name="add_number" id="add_number" style="margin-left:30px; float:left; width:250px"> 
          	<option value="null">Select an option</option>
            <option value="1" <?php echo set_select('add_number','1'); ?>>1 Additional Number - <?php echo $this->session->userdata('currency_symbol_web'); ?>5/month</option>
            <option value="2" <?php echo set_select('add_number','2'); ?>>2 Additional Number - <?php echo $this->session->userdata('currency_symbol_web'); ?>10/month</option>
            <option value="3" <?php echo set_select('add_number','3'); ?>>3 Additional Number - <?php echo $this->session->userdata('currency_symbol_web'); ?>15/month</option>
          </select>
        
      </div>
      
      <div class="cssaver1 leftcom" id="field_add_number">
      <br/>
      <br/>
      </div>
      <div class="clearfix"></div>
      <div class="cssaver1 leftcom">
          <h4 class="leftcom"><b>
          Details of the mobile number holder you wish to call</b></h4>
          <br/> <br/>
      </div>
      
      <div class="cssaver1 leftcom">
          <label>First Name* </label>
          <input type="text" name="first_name" class="leftcom" required="required" value="<?php echo set_value('first_name'); ?>">
      </div>
      
      <div class="cssaver1 leftcom">
          <label>Last Name*</label>
         
          <input type="text" name="last_name" class="leftcom" required="required" value="<?php echo set_value('last_name'); ?>">
      </div>
      
      <div class="cssaver1 leftcom">
          <label>Postcode*</label>
          <input type="text" name="postcode" class="leftcom" required="required" value="<?php echo set_value('postcode'); ?>">
      </div>
      
      <div class="cssaver1 leftcom">
          <label> Street* </label>
          <input type="text" name="street" class="leftcom" value="<?php echo set_value('street'); ?>" required="required" >
      </div>
      
      <div class="cssaver1 leftcom">
          <label> Town* </label>
          <input type="text" name="town" class="leftcom" value="<?php echo set_value('town'); ?>" required="required" >
      </div>
      
      <div class="cssaver1 leftcom">
          <label>Country  </label>
          <?php if($this->session->userdata('bundles') != '') { ?>
          <label> <?php echo $this->session->userdata('bundles'); ?> </label>
          <?php }else{ ?>
          <label>  </label>
          <?php } ?>
      </div>
      
      <div class="cssaver1 leftcom">
          <label id="txt1color">Promo Code  </label>
          <input type="text" name="promo_code" class="leftcom" value="<?php echo set_value('promo_code'); ?>">
          <input type="hidden" name="payment" id="payment" />
          <input type="hidden" name="step" id="step" />
      </div>
      
      <div class="cssaver1 leftcom">
          <div class="signup" style="margin-top:20px;margin-left:20px"> 
            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles">Back</a>   
          </div>
          
          <div class="login">
              <button id="card" type="submit">Pay with card</button>
          </div>
          
          <div class="login">
              <button id="credit" type="submit">Pay with credit</button>
          </div>
          
      </div>
      
  </div> 
  </form>
  
      </div>
      </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		
		
		$('#card').click(function() {
			$('#payment').val('card');
			$('#step').val('102');
		});
		
		$('#credit').click(function() {
			$('#payment').val('credit');
			$('#step').val('112');
		});
        
		$('#add_number').change(function() {
			if($('#add_number').val() == '1') {
				
				$('#field_add_number').find('.label_add').remove();
				$('#field_add_number').find('.leftcom').remove();
				
				$('#field_add_number').append('<label class="label_add"><span>additional number 1 :</span></label><input type="text" name="add_number1" class="leftcom">');
				
			}else if($('#add_number').val() == '2') {
				
				$('#field_add_number').find('.label_add').remove();
				$('#field_add_number').find('.leftcom').remove();
				
				$('#field_add_number').append('<label class="label_add"><span>additional number 1 :</span></label><input type="text" name="add_number1" class="leftcom">');
				$('#field_add_number').append('<label class="label_add"><span>additional number 2 :</span></label><input type="text" name="add_number2" class="leftcom">');
				
			}else if($('#add_number').val() == '3') {
				
				$('#field_add_number').find('.label_add').remove();
				$('#field_add_number').find('.leftcom').remove();
				
				$('#field_add_number').append('<label class="label_add"><span>additional number 1 :</span></label><input type="text" name="add_number1" class="leftcom">');
				$('#field_add_number').append('<label class="label_add"><span>additional number 2 :</span></label><input type="text" name="add_number2" class="leftcom">');
				$('#field_add_number').append('<label class="label_add"><span>additional number 3 :</span></label><input type="text" name="add_number3" class="leftcom">');
				
			}else{
				
				$('#field_add_number').find('.label_add').remove();
				$('#field_add_number').find('.leftcom').remove();
			}
		});
		
    });
</script>
   
  <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "760px" });
</script>
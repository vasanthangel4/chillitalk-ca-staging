

<div class="rightcunt">
                <h1>
                    Payment Details</h1>
                <h3>
                Purchase Summary
                  </h3>
                  <?php if(validation_errors()) { ?>
                	<div class="clearfix"></div>
                	<div class="alert alert-danger">
                    	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo validation_errors(); ?>.
                    </div>
                <?php } ?>
                
                <?php if($this->session->flashdata('success')) { ?>
                	<div class="alert alert-success">
                    	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>
                
                <?php if($this->session->flashdata('failed')){ ?>
                	<div class="alert alert-danger">
                    	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('failed'); ?>
                    </div>
                <?php } ?>
                    
                                    <table class="table1">
                                    <tbody>
                                    
                        <tr height="10px">
                        	<th></th>
                            <td></td>
                        </tr>            
                                    
                    	<tr>
                        	<th>Destination number : </th>
                            <td><?php echo $this->session->userdata('destination_number'); ?></td>
                        </tr>
                    

                        <tr>
                        	<th>Main Number: </th>
                            <td><?php echo $this->session->userdata('main_number'); ?></td>
                        </tr>
                        <tr>
                        	<th>Account Number1 :</th>
                            <td><?php echo $this->session->userdata('add_number1'); ?></td>
                        </tr>
                          <tr>
                        	<th>Account Number2 :</th>
                            <td><?php echo $this->session->userdata('add_number2'); ?></td>
                        </tr>
                          <tr>
                        	<th>Account Number3 :</th>
                            <td><?php echo $this->session->userdata('add_number3'); ?></td>
                        </tr>
                          <tr>
                        	<th>Home Saver:</th>
                            <td> <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('home_saver'); ?></td>
                        </tr>
                        <tr>
                        	<th>Additional Numbers:</th>
                            <td><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('add_number'); ?></td>
                        </tr>
                              <tr>
                        	<th>Promo code Discount:</th>
                            <td><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('promo_code_discount'); ?></td>
                        </tr>
                           <tr>
                        	<th>Total </th>
                            <td> <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('total'); ?></td>
                        </tr>
                             <tr height="10px">
                        	<th></th>
                            <td></td>
                        </tr>  
                        </tbody>
                    </table>
                    
                    
                    
                    <?php if($this->session->userdata('cvv') != '') { ?>
                    
                    	<div id="existing_card">
                
                        <div class="bgmobile1">
                            <form name="frm2" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/existing_card">
                            
                    
                    <div class="rightcunt">
                        <p class="commfrt">
                         <?php echo lang('add.turnontxt'); ?> 
                        
                        </p>
                    </div>
                    <hr>
                    
                    <div class="rightcunt">
                   
                          <h3><input type="radio" name="btn_existing_card2" id="btn_existing_card2" checked="checked" /> 
                          	Use Existing Credit Card Details
                          </h3>
                        
                    </div>
                   
                    <div class="rightcunt">
                        <label class="leftcom">
                       Credit Card Number        </label>
                       
                       XXXX XXXX XXXX <?php echo substr($this->session->userdata('cvv'),2,4); ?>
                    </div>
                    <div class="rightcunt">
                        <label class="leftcom">
                                 CVV    </label>
                        <div class="leftcom">
							                           
                            <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv2" required="required">
                        </div>
                    </div>
                    
                    
                    <div class="rightcunt">
                   
                          <label>  <?php echo lang('add.Total'); ?>   </label>
                        <label style="text-align:center !important;">
                            <input type="hidden" name="total_topup2" />
                            <div id="text_topup2"></div></label>
                    </div>
                    
                   
                    <div class="secbutton commfrt">
                        <p>
                         <?php echo lang('add.Terms'); ?>
                             <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/" target="_blank" class="underline"> <?php echo lang('add.Termssv'); ?></a>
                            <br>
                            <br>
                        </p>

                        <div class="login">
                            <button type="submit">Buy Home Saver</button>
                        </div>
                    </div>
                            <hr />
                            <div class="rightcunt">
                           
                                  <h3><input type="radio" name="btn_new_card2" id="btn_new_card2" /> 
                                    Use New Credit Card
                                  </h3>
                                
                            </div>
                            
                            
                            </form>
                        </div>
                        
                        </div>
                        
                        <!-- -----------------------------------        New Card   --------------------------------------- -->
                        <div id="new_card">
                        
                        <div class="bgmobile1">
                        
                        <h3><input type="radio" name="btn_existing_card" id="btn_existing_card" /> 
                          	Use Existing Credit Card Details
                          </h3>
                          
                <h3><input type="radio" name="btn_new_card" id="btn_new_card" checked="checked" /> 
                  Use New Credit Card
                </h3>
                
                        <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/card">
                       
                        
                        <div class="rightcunt">
                            <label class="leftcom">
                                Cardholder First name</label>
                            <input type="text" class="insvalue leftcom" name="first_name"  required="required" value="<?php echo set_value('first_name'); ?>" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="Chillitalk Visa" class="imgvisa leftcom" />
                        </div>
                        
                        <div class="rightcunt">
                            <label class="leftcom">
                                Cardholder Last name</label>
                            <input type="text" class="insvalue leftcom" name="last_name"  required="required" value="<?php echo set_value('last_name'); ?>" />
                        </div>
                        
                        <div class="rightcunt">
                            <label class="leftcom">
                                Credit card number</label>
                            <input type="text" class="insvalue  leftcom" placeholder="XXXX XXXX XXXX XXXX" value="<?php echo set_value('password'); ?>" name="credit_card_number" required="required">
                        </div>
                        <div class="rightcunt">
                            <label class="leftcom">
                                Expiration and CVV</label>
                            <div class="leftcom">
                                <input type="text" class="smtxtbx" value="<?php echo set_value('month'); ?>" placeholder="Month (mm)" name="month" required="required" pattern="[0-9]{2}" min="1" max="12">
                                <input type="text" class="smtxtbx" value="<?php echo set_value('year'); ?>" placeholder="Year" name="year" required="required" pattern="[0-9]+" min="2009" max="<?php echo date('Y'); ?>">
                                <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv" required="required">
                            </div>
                        </div>
                        <hr>
                        <div class="rightcunt">
                            <label>
                                Billing phone number</label>
                            <input type="text" class="largbox" placeholder="Enter phone number (include country code)" name="billing_phone" value="<?php echo set_value('billing_phone'); ?>" required="required" pattern="[0-9]+">
                        </div>
                        
                        <div class="rightcunt">
                            <label>Country</label>
                            <select name="country" id="country" onChange="print_state('state',this.selectedIndex);">
                                
                            </select>
                        </div>
                        <div class="rightcunt">
                            <label>
                                Billing address</label>
                            <textarea placeholder="Enter Address" class="largbox" name="address" required="required"><?php echo set_value('address'); ?></textarea>
                            <br/>   <br/>
                        </div>
                     
                        <div class="rightcunt">
                            
                            <label>City</label>
                            <input type="text" placeholder="Enter City.." name="city" value="<?php echo set_value('city'); ?>" required="required">
                        </div>
                        <div class="rightcunt">
                            <label>State and Zipcode</label>
                            <select title="Select state" id="state" name="state" required>
                            </select>
                            <script type="text/javascript">print_country("country");</script>
                            <script type="text/javascript">date_populate("date", "month", "year");</script>
                           
                            
                            <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Enter Zip.." class="smtxtbx" style="margin-top:10px;">
                        </div>
                        <hr>
                        <div class="rightcunt">
                            <label>
                                Total</label>
                            <label style="text-align:center !important;">
                                <input type="hidden" name="total_topup" />
                                <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('total'); ?></label>
                        </div>
                        <!--<div class="rightcunt">
                       
                              <label>Captcha</label>
                              <label>
                                <?php echo $captcha;?>
                              </label>
                              <?php if($this->session->flashdata('captcha_error') != '') { ?>
                                  <label></label>
                                  <label>
                                      <span style="color:red">
                                        <?php echo $this->session->flashdata('captcha_error'); ?>
                                      </span>
                                  </label>
                              <?php } ?>
                        </div>-->
                       
                        <div class="secbutton commfrt">
                            <p>
                                *By proceeding, you are agreeing to Chillitalk’s <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/" target="_blank" class="underline">Terms
                                    & Conditions</a>
                                <br>
                                <br>
                            </p>
                            <div class="login">
                                <button type="submit">Buy Home Saver</button>
                            </div>
                        </div>
                        </form>
                    </div>
                        </div>
                    
                    <?php }else{ ?>
                    
                        <div class="bgmobile1">
                        <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/card">
                       
                        
                        <div class="rightcunt">
                            <label class="leftcom">
                                Cardholder First name</label>
                            <input type="text" class="insvalue leftcom" name="first_name"  required="required" value="<?php echo set_value('first_name'); ?>" />
                            <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="Chillitalk Visa" class="imgvisa leftcom" />
                        </div>
                        
                        <div class="rightcunt">
                            <label class="leftcom">
                                Cardholder Last name</label>
                            <input type="text" class="insvalue leftcom" name="last_name"  required="required" value="<?php echo set_value('last_name'); ?>" />
                        </div>
                        
                        <div class="rightcunt">
                            <label class="leftcom">
                                Credit card number</label>
                            <input type="text" class="insvalue  leftcom" placeholder="XXXX XXXX XXXX XXXX" value="<?php echo set_value('password'); ?>" name="credit_card_number" required="required">
                        </div>
                        <div class="rightcunt">
                            <label class="leftcom">
                                Expiration and CVV</label>
                            <div class="leftcom">
                                <input type="text" class="smtxtbx" value="<?php echo set_value('month'); ?>" placeholder="Month (mm)" name="month" required="required" pattern="[0-9]{2}" min="1" max="12">
                                <input type="text" class="smtxtbx" value="<?php echo set_value('year'); ?>" placeholder="Year" name="year" required="required" pattern="[0-9]+" min="2009" max="<?php echo date('Y'); ?>">
                                <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv" required="required">
                            </div>
                        </div>
                        <hr>
                        <div class="rightcunt">
                            <label>
                                Billing phone number</label>
                            <input type="text" class="largbox" placeholder="Enter phone number (include country code)" name="billing_phone" value="<?php echo set_value('billing_phone'); ?>" required="required" pattern="[0-9]+">
                        </div>
                        
                        <div class="rightcunt">
                            <label>Country</label>
                            <select name="country" id="country" onChange="print_state('state',this.selectedIndex);">
                                
                            </select>
                        </div>
                        <div class="rightcunt">
                            <label>
                                Billing address</label>
                            <textarea placeholder="Enter Address" class="largbox" name="address" required="required"><?php echo set_value('address'); ?></textarea>
                            <br/>   <br/>
                        </div>
                     
                        <div class="rightcunt">
                            
                            <label>City</label>
                            <input type="text" placeholder="Enter City.." name="city" value="<?php echo set_value('city'); ?>" required="required">
                        </div>
                        <div class="rightcunt">
                            <label>State and Zipcode</label>
                            <select title="Select state" id="state" name="state" required>
                            </select>
                            <script type="text/javascript">print_country("country");</script>
                            <script type="text/javascript">date_populate("date", "month", "year");</script>
                           
                            
                            <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Enter Zip.." class="smtxtbx" style="margin-top:10px;">
                        </div>
                        <hr>
                        <div class="rightcunt">
                            <label>
                                Total</label>
                            <label style="text-align:center !important;">
                                <input type="hidden" name="total_topup" />
                                <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('total'); ?></label>
                        </div>
                        <!--<div class="rightcunt">
                       
                              <label>Captcha</label>
                              <label>
                                <?php echo $captcha;?>
                              </label>
                              <?php if($this->session->flashdata('captcha_error') != '') { ?>
                                  <label></label>
                                  <label>
                                      <span style="color:red">
                                        <?php echo $this->session->flashdata('captcha_error'); ?>
                                      </span>
                                  </label>
                              <?php } ?>
                        </div>-->
                       
                        <div class="secbutton commfrt">
                            <p>
                                *By proceeding, you are agreeing to Chillitalk’s <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/" target="_blank" class="underline">Terms
                                    & Conditions</a>
                                <br>
                                <br>
                            </p>
                            <div class="login">
                                <button type="submit">Buy Home Saver</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    <?php } ?>
                
            </div>
    </div>
   
</div>

<script type="text/javascript">
	$(document).ready(function() {
		
		$('#new_card').hide();
		
		$('#btn_new_card2').click(function(){
			$('#new_card').show();
			$('#existing_card').hide();
			$('#btn_existing_card').removeAttr('checked','checked');
		});
		
		$('#btn_existing_card').click(function(){
			$('#new_card').hide();
			$('#existing_card').show();
			$('#btn_new_card2').removeAttr('checked','checked');
		});
		
		

	});
</script>
  
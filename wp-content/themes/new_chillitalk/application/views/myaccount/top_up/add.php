<!--  right content-->
<?php
	function cmp($a, $b)
	{
		return strcmp($a->Name, $b->Name);
	}
	
	usort($country->List, "cmp");
	?>
  <script type="text/javascript" src='http://code.jquery.com/jquery-1.7.1.min.js'>
  </script>
      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/js_vdf_2012.js"></script>
      <link href="<?php echo get_template_directory_uri(); ?>/css/css_style2012.css" rel="stylesheet" type="text/css" />
<?php if($this->session->userdata('cvv') != '') { ?>
	
    <div class="rightcunt">
                <h1>
                  <?php echo lang('add.first'); ?> </h1>
                <h3>
                    <?php echo lang('add.second'); ?>  </h3>
                    
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
                
                <div id="existing_card">
                
                
                <div class="bgmobile1">
                    <form name="frm2" method="post" action="<?php echo base_url(); ?>en/myaccount/top_up/existing_creditcard">
                    <h3>     <?php echo lang('add.Addcredit'); ?></h3>
                 
                <div class="rightcunt2 rightcom"><p class="rightcom txtright34"> <span class="red">*</span> Required fields  </p> </div>
                 
                    <div class="rightcunt">
                        <label>
                          <?php echo lang('add.CreditAmount'); ?>   </label>
                        <select name="amount2" id="amount2" required>
                        	<option value="">    <?php echo lang('add.Selectamount'); ?> </option>
                            <?php foreach($amount->List as $val) { ?>
                            <option value="<?php echo $val->Amount; ?>" <?php echo set_select('amount', $val->Amount); ?> ><?php echo $this->config->item('currency_symbol_web'); ?> <?php echo $val->Amount; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="rightcunt">
                        <label>
                      
                             <?php echo lang('add.Aotopup'); ?>
                        </label>
                        
                        <p>
                          <label>
                            <input type="radio" name="auto_recharge2" value="true" <?php echo set_radio('auto_recharge2', 'true'); ?> id="auto_charge_0"  />
                               <?php echo lang('add.On'); ?></label>
                          <br />
                          <label>
                            <input type="radio" name="auto_recharge2" <?php echo set_radio('auto_recharge2', 'false'); ?> value="false" id="auto_charge_1" checked="checked" />
                          <?php echo lang('add.Off'); ?>   </label>
                          <br />
                        </p>
                        
						
                    </div>
                    
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
                       <?php echo lang('add.Creditcardnumber'); ?>        </label>
                       
                       XXXX XXXX XXXX <?php echo substr($this->session->userdata('cvv'),2,4); ?>
                    </div>
                    <div class="rightcunt">
                        <label class="leftcom">
                                Card verification code  <span class='red spar'>*</span> </label>
                        <div class="leftcom">
							                           
                  
                            
                               <div   id="vasanth" class="formRow js">    
                                 <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv2" required="required">
                          <span style="display:none;" class="helpText">
                                                             </span>
                                                           
         
                                                       
                       <div class="helpTextOff">
                        <span class="icon">What is this?</span>
                                     </div>    </div>
                            
                            
                        </div>
                    </div>
                    <hr>
                    
                    <div class="rightcunt none">
                   
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
                            <button type="submit">purchase credit</button>
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
                    <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard#new_card">
                    <h3>     <?php echo lang('add.Addcredit'); ?></h3>
                    <div class="rightcunt2 rightcom"><p class="rightcom txtright34"> <span class="red">*</span> Required fields  </p> </div>
                    <div class="rightcunt">
                        <label>
                          <?php echo lang('add.CreditAmount'); ?>   </label>
                        <select name="amount" id="amount" required>
                        	<option value="">    <?php echo lang('add.Selectamount'); ?> </option>
                            <?php foreach($amount->List as $val) { ?>
                            <option value="<?php echo $val->Amount; ?>" <?php echo set_select('amount', $val->Amount); ?> ><?php echo $this->config->item('currency_symbol_web'); ?> <?php echo $val->Amount; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="rightcunt">
                        <label>
                      
                             <?php echo lang('add.Aotopup'); ?>
                        </label>
                        
                        <p>
                          <label>
                            <input type="radio" name="auto_recharge" value="true" <?php echo set_radio('auto_recharge', 'true'); ?> id="auto_charge_0"  />
                               <?php echo lang('add.On'); ?></label>
                          <br />
                          <label>
                            <input type="radio" name="auto_recharge" <?php echo set_radio('auto_recharge', 'false'); ?> value="false" id="auto_charge_1" checked="checked" />
                          <?php echo lang('add.Off'); ?>   </label>
                          <br />
                        </p>
                        
						
                    </div>
                    <div class="rightcunt">
                        <p class="commfrt">
                         <?php echo lang('add.turnontxt'); ?> 
                        
                        </p>
                    </div>
                    <hr>
                    <div class="rightcunt">
                        <label class="leftcom">
                           
                             <?php echo lang('add.CardholderFirstname'); ?>   
                            
                            </label>
                        <input type="text" class="insvalue leftcom" name="first_name"  required="required" value="<?php echo set_value('first_name'); ?>" />
                      <!--  <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="Chillitalk Visa" class="imgvisa leftcom" />-->
                       <span  class="bltxttop"> As printed on your card  </span>
                    </div>
                    
                 <!--   <div class="rightcunt">
                        <label class="leftcom">
                            <?php echo lang('add.CardholderLastname'); ?>      </label>
                        <input type="text" class="insvalue leftcom" name="last_name"  required="required" value="<?php echo set_value('last_name'); ?>" />
                    </div>-->
                    
                    <div class="rightcunt">
                        <label class="leftcom">
                       <?php echo lang('add.Creditcardnumber'); ?>        </label>
                        <input type="text" class="insvalue  leftcom" placeholder="XXXX XXXX XXXX XXXX" value="<?php echo set_value('credit_card_number'); ?>" name="credit_card_number" required="required" pattern="[0-9]{13,16}">
                    </div>
                    <div class="rightcunt">
                        <label class="leftcom">
                                 <?php echo lang('add.ExpirationandCVV'); ?>    </label>
                        <div class="leftcom">
                             <!-- <input type="text" class="smtxtbx" value="<?php echo set_value('month'); ?>" placeholder="Month (mm)" name="month" required="required" pattern="[0-9]{2}" min="1" max="12">
                            <input type="text" class="smtxtbx" value="<?php echo set_value('year'); ?>" 
                            placeholder="Year" name="year" required="required" pattern="[0-9]+" min="2009" 
                            max="<?php echo date('Y'); ?>">-->
                            <select name="month" class="smtxtbx" required>
                            <option value="">
                            MM
                            </option>
                            <?php for($i=1;$i<=12;$i++) { ?>
                            	<?php if(strlen($i) == 1) { ?>
                                <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            <?php } ?>
                             
                            </select>
                            
                            <select name="year" class="smtxtbx" required>
                             <option value="">
                             YYYY
                             </option>
                             <?php for($j=2013;$j<=2020;$j++) { ?>
                                <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                            <?php } ?>
                            </select>
                              </div>  </div>
                            <hr>
                        <div class="rightcunt">
                        <label class="leftcom">Card verification code <span class="red spar">*</span></label>    
                               <div   id="vasanth" class="formRow js">    
                             <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv" required="required" pattern="[0-9]{3}">
                          <span style="display:none;" class="helpText">
                                                             </span>
                                                           
         
                                                       
                       <div class="helpTextOff">
                     <span class="icon">What is this?</span>
                                     </div>
                            </div>
                        
                            
                      
                    </div>
                    <hr>
                 <!--   <div class="rightcunt">
                        <label>
                           <?php echo lang('add.Billing'); ?>   </label>
                        <input type="text" class="largbox" placeholder="Enter phone number (include country code)" name="billing_phone" value="<?php echo set_value('billing_phone'); ?>" required="required" pattern="[0-9]+">
                    </div>-->
                    
             
                    <div class="rightcunt">
                        <label>
                          <?php echo lang('add.Billinga'); ?>     </label>
                        <textarea placeholder="Enter Address" class="largbox" name="address" required="required"><?php echo set_value('address'); ?></textarea><span class="bltxttop"> Exactly as on Credit <br/>card statement </span>
                        <br/>   <br/>
                    </div>
                  <div class="rightcunt">
                        <label class="leftcom" style="margin-top:10px;"><?php echo lang('add.State'); ?> </label>
                       <!-- <select title="Select state" id="state" name="state" required>
                        </select>-->
                       <!-- 
                        <script type="text/javascript">date_populate("date", "month", "year");</script>-->
                        
                        
                        
                        <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Enter Postcode/Zip"  style="margin-top:10px;" required="required">
                    </div>
                       <div class="rightcunt none">
                         <label  class="leftcom" style="margin-top:5px;">   State  </label>
                         <input type="text" placeholder="Enter State (Optional)"  />
                     </div>
                     
                    <div class="rightcunt">
                        
                        <label>   <?php echo lang('add.City'); ?>  </label>
                        <input type="text" placeholder="Enter City.." name="city" value="<?php echo set_value('city'); ?>" required="required">
                    </div>
                   
                   
                    <div class="rightcunt">
         	  <label><?php echo lang('add.Country'); ?></label>
              <select name="country" id="country">
              	
                <?php foreach($country->List as $val) { ?>
                	<?php if($this->config->item('country_name_web') == $val->Name) { ?>
                	<option value="<?php echo $val->Name; ?>" selected="selected"><?php echo $val->Name; ?></option>
                    <?php }else{ ?>
                	<option value="<?php echo $val->Name; ?>"><?php echo $val->Name; ?></option>
                    <?php } ?>
                <?php } ?>
                
              
              </select>
          </div>
          
                    
                    
                    <div class="rightcunt none">
                   
                          <label>  <?php echo lang('add.Total'); ?>   </label>
                        <label style="text-align:center !important;">
                            <input type="hidden" name="total_topup" />
                            <div id="text_topup"></div></label>
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
                         <?php echo lang('add.Terms'); ?>
                             <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/" target="_blank" class="underline"> <?php echo lang('add.Termssv'); ?></a>
                            <br>
                            <br>
                        </p>
                        <div class="login">
                            <button type="submit">purchase credit</button>
                        </div>
                    </div>
                    </form>
                </div>
                
                </div>
                
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->

    </div>


<?php }else{ ?>

	<div class="rightcunt">
                <h1>
                  <?php echo lang('add.first'); ?> </h1>
                <h3>
                    <?php echo lang('add.second'); ?>  </h3>
                    
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
                
                <div class="bgmobile1">
                    <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard/">
                    <h3>     <?php echo lang('add.Addcredit'); ?></h3>
                    <div class="rightcunt2 rightcom"><p class="rightcom txtright34"> <span class="red">*</span> Required fields  </p> </div>
                    <div class="rightcunt">
                        <label>
                          <?php echo lang('add.CreditAmount'); ?>   </label>
                        <select name="amount" id="amount" required>
                        	<option value="">    <?php echo lang('add.Selectamount'); ?> </option>
                            <?php foreach($amount->List as $val) { ?>
                            <option value="<?php echo $val->Amount; ?>" <?php echo set_select('amount', $val->Amount); ?> ><?php echo $this->config->item('currency_symbol_web'); ?> <?php echo $val->Amount; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="rightcunt">
                        <label>
                      
                             <?php echo lang('add.Aotopup'); ?>
                        </label>
                        
                        <p>
                          <label>
                            <input type="radio" name="auto_recharge" value="true" <?php echo set_radio('auto_recharge', 'true'); ?> id="auto_charge_0"  />
                               <?php echo lang('add.On'); ?></label>
                          <br />
                          <label>
                            <input type="radio" name="auto_recharge" <?php echo set_radio('auto_recharge', 'false'); ?> value="false" id="auto_charge_1" checked="checked" />
                          <?php echo lang('add.Off'); ?>   </label>
                          <br />
                        </p>
                        
						
                    </div>
                    <div class="rightcunt">
                        <p class="commfrt">
                         <?php echo lang('add.turnontxt'); ?> 
                        
                        </p>
                    </div>
                    <hr>
                    
                         <div class="rightcunt">
                        <label class="leftcom">
                           
                             <?php echo lang('add.CardholderFirstname'); ?>   
                            
                            </label>
                        <input type="text" class="insvalue leftcom" name="first_name"  required="required" value="<?php echo set_value('first_name'); ?>" />
                      <!--  <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="Chillitalk Visa" class="imgvisa leftcom" />-->
                       <span  class="bltxttop"> As printed on your card  </span>
                    </div>
                    
                 <!--   <div class="rightcunt">
                        <label class="leftcom">
                            <?php echo lang('add.CardholderLastname'); ?>      </label>
                        <input type="text" class="insvalue leftcom" name="last_name"  required="required" value="<?php echo set_value('last_name'); ?>" />
                    </div>-->
                    
                    <div class="rightcunt">
                        <label class="leftcom">
                       <?php echo lang('add.Creditcardnumber'); ?>        </label>
                        <input type="text" class="insvalue  leftcom" placeholder="XXXX XXXX XXXX XXXX" value="<?php echo set_value('credit_card_number'); ?>" name="credit_card_number" required="required" pattern="[0-9]{13,16}">
                    </div>
                    <div class="rightcunt">
                        <label class="leftcom">
                                 <?php echo lang('add.ExpirationandCVV'); ?>    </label>
                        <div class="leftcom">
                            <!-- <input type="text" class="smtxtbx" value="<?php echo set_value('month'); ?>" placeholder="Month (mm)" name="month" required="required" pattern="[0-9]{2}" min="1" max="12">
                            <input type="text" class="smtxtbx" value="<?php echo set_value('year'); ?>" 
                            placeholder="Year" name="year" required="required" pattern="[0-9]+" min="2009" 
                            max="<?php echo date('Y'); ?>">-->
                            <select name="month" class="smtxtbx" required>
                            <option value="">
                            MM
                            </option>
                            <?php for($i=1;$i<=12;$i++) { ?>
                            	<?php if(strlen($i) == 1) { ?>
                                <option value="<?php echo '0'.$i; ?>"><?php echo '0'.$i; ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            <?php } ?>
                             
                            </select>
                            
                            <select name="year" class="smtxtbx" required>
                             <option value="">
                             YYYY
                             </option>
                             <?php for($j=2013;$j<=2020;$j++) { ?>
                                <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                            <?php } ?>
                            </select>
                            
                            
                              </div>  </div>
                            
                        <div class="rightcunt">
                        <label class="leftcom">Card verification code <span class="red spar">*</span>   </label>    
                               <div   id="vasanth" class="formRow js">    
                             <input type="text" class="smtxtbx" value="<?php echo set_value('cvv'); ?>" placeholder="CVV" name="cvv" required="required" pattern="[0-9]{3}">
                          <span style="display:none;" class="helpText">
                                                             </span>
                                                           
         
                                                       
                       <div class="helpTextOff">
                     <span class="icon">What is this?</span>
                                     </div>
                            </div>
                            
                            
                      
                    </div>
                    <hr>
                 <!--   <div class="rightcunt">
                        <label>
                           <?php echo lang('add.Billing'); ?>   </label>
                        <input type="text" class="largbox" placeholder="Enter phone number (include country code)" name="billing_phone" value="<?php echo set_value('billing_phone'); ?>" required="required" pattern="[0-9]+">
                    </div>-->
                    
             
                    <div class="rightcunt">
                        <label>
                          <?php echo lang('add.Billinga'); ?>     </label>
                        <textarea placeholder="Enter Address" class="largbox" name="address" required="required"><?php echo set_value('address'); ?></textarea><span class="bltxttop"> Exactly as on Credit <br/>card statement </span>
                        <br/>   <br/>
                    </div>
                  <div class="rightcunt">
                        <label><?php echo lang('add.State'); ?> </label>
                       <!-- <select title="Select state" id="state" name="state" required>
                        </select>-->
                        
                        <!--<script type="text/javascript">date_populate("date", "month", "year");</script>-->
                        
                        
                        
                        <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" placeholder="Enter Postcode/Zip"  style="margin-top:10px;" required="required">
                    </div>
                       <!--<div class="rightcunt">
                         <label>   State  </label>
                         <input type="text" placeholder="Enter State (Optional)"  />
                     </div>-->
                       <hr>
                    <div class="rightcunt">
                        
                        <label>   <?php echo lang('add.City'); ?>  </label>
                        <input type="text" placeholder="Enter City.." name="city" value="<?php echo set_value('city'); ?>" required="required">
                    </div>
                   
                    <hr>
                    <div class="rightcunt">
         	  <label><?php echo lang('add.Country'); ?></label>
              <select name="country" id="country">
              	
                <?php foreach($country->List as $val) { ?>
                	<?php if($this->config->item('country_name_web') == $val->Name) { ?>
                	<option value="<?php echo $val->Name; ?>" selected="selected"><?php echo $val->Name; ?></option>
                    <?php }else{ ?>
                	<option value="<?php echo $val->Name; ?>"><?php echo $val->Name; ?></option>
                    <?php } ?>
                <?php } ?>
                
              
              </select>
          </div>
          
                    <hr>
                    <div class="rightcunt none">
                   
                          <label>  <?php echo lang('add.Total'); ?>   </label>
                        <label style="text-align:center !important;">
                            <input type="hidden" name="total_topup" />
                            <div id="text_topup"></div></label>
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
                         <?php echo lang('add.Terms'); ?>
                             <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/" target="_blank" class="underline"> <?php echo lang('add.Termssv'); ?></a>
                            <br>
                            <br>
                        </p>
                        <div class="login">
                            <button type="submit">purchase credit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->

    </div>

<?php } ?>

                  
            
    
<script type="text/javascript">
	$(document).ready(function() {
		
		if(window.location.href == '<?php echo base_url().$this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard#new_card') {
			$('#existing_card').hide();
			$('#new_card').show();
		}else{
			$('#new_card').hide();
		}
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
		
		$('#text_topup').text('<?php echo $this->config->item('currency_symbol_web'); ?> 0');
		
		$('#amount').change(function(){
			$('#text_topup').text('<?php echo $this->config->item('currency_symbol_web'); ?> '+$('#amount').val());
		})

		$('#text_topup2').text('<?php echo $this->config->item('currency_symbol_web'); ?> 0');
		
		$('#amount2').change(function(){
			$('#text_topup2').text('<?php echo $this->config->item('currency_symbol_web'); ?> '+$('#amount2').val());
		})
		$( ".leftmyaccount" ).css({height: "1314px" });

	});
</script>

<?php if($this->lang->lang() == 'fr') { ?>

<style type="text/css"> .appbgcl label, label {
    width: 265px !important;
	font-size:16px !important;
}
</style>   

<?php }else{ ?>  

<style type="text/css"> .appbgcl label, label {
    width: 247px !important;
}
</style>   

<?php } ?> 

<style type="text/css">
.topupse a {
    background-color: #6EA600;
    color: #FFFFFF !important;
}.recaptchatable #recaptcha_response_field
{
margin:10px 0 0 !important;

}
.recaptcha_input_area
{
    height: 57px !important;
    
    margin-right: auto !important;
}

</style>



<div class="rightcunt" style="margin-left:130px">
                <h1>
                    Step 3 - Payment Details</h1>
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
                    
                    <hr/>
                <div class="bgmobile1">
                    <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/step3">
                   
                    
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
    </div>
   
</div>
  
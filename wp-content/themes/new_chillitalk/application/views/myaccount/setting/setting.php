<!--  right content-->
            <div class="rightcunt">
                <h1>
                    Settings</h1>
                <article class="rightcunt">
                    <section class="leftsetting sebd">
                        <h3>
                            Personal details</h3>
                        <form name="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/setting/change_personal_info" >   
                        <label>
                            First name</label>
                        <input type="text" name="first_name" value="<?php echo $row->FirstName; ?>" class="leftcom" />
                      
                        <label>
                            Last name</label>
                        <input type="text" name="last_name" value="<?php echo $row->Surname; ?>" class="leftcom"  />
                        <label>
                            Email
                        </label>
                        <input type="text" name="email_address" value="<?php echo $row->Email; ?>" class="leftcom"  />
                        <!--<label>
                            Language</label>
                        <input type="text" class="leftcom"  value="English" />-->
                      <!--  <label>
                            Time zone</label>
                        <input type="text" class="leftcom"  value="(GMT) Greenwich Mean.." />-->
                        <div class="login">
                            <button type="submit" title="Add Credit">Save Changes</button>
                        </div>
                        </form>
                    </section>
                    <section class="leftsetting">
                        <h3>
                            Change Password</h3>
                        
                        <?php if(validation_errors()) { ?>
                        
                        <div class="alert alert-danger">
                        	<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php } ?>
                            
                        <form name="frm-password" id="frm-password" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/setting/change_password">
                        <label>
                            Old Password</label>
                        <input type="password" class="leftcom" name="current_password"  />
                        <label>
                            New Password</label>
                        <input type="password" class="leftcom" name="new_password"  />
                        <label>
                            Confirm
                        </label>
                        <input type="password" class="leftcom" name="confirm_password"/>
                        <div class="login">
                            <button type="submit">Save Changes</button>
                        </div>
                        </form>
                    </section>
                </article>
                <section class="leftsetting nnbrd">
                    <label>
                        &nbsp;
                    </label>
                    <label>
                        &nbsp;
                    </label>
                    <h3>
                        Auto Top Up
                    </h3>
                    
                    
                    <?php if($topup->SubscriptionId == '') { ?>
                    
                        <div style="height:50px;">
                            <p>
                            You currently do not have a credit card saved to your account
                            </p>
                            <br/>
                            <p>
                            The auto top-up is not activated
                            </p>
                        </div>
                        
                    <?php }elseif($topup->status == '0'){ ?>
                    
                    	<label style="width:100px !important">
                        	Status :
                        </label>
                        <select style="width: 147px  !important;" name="status" id="status">
                        	<option value="1">Active</option>
                            <option value="0" selected="selected">Inactive</option>
                        </select>
                        
                        
                        
                        <div class="clearfix"></div>
                        
                        
                        <div id="off">
                        <div class="callhiswid clearall">
                        <form name="form" method="post" action="#">
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
                            <select name="min_amount">
                            <?php for($i=1;$i<=10;$i++){ ?>
                            	<option value="<?php echo $i; ?>"> <?php echo $this->session->userdata('currency_symbol_web').' '.$i; ?></option>
                                
                            <?php } ?>
                            </select>
                            </p>
                            
                            <br/>
                            <br/>
                            <p>
                           	Auto Top-up Amount :
                            </p>
                            <p>
                            <select name="topup_amount">
                            	<?php for($i=1;$i<=10;$i++){ ?>
                            	<option value="<?php echo $i; ?>">  <?php echo $this->session->userdata('currency_symbol_web').' '.$i; ?></option>
                                
                            <?php } ?>
                            </select>
                            </p>
                           
                       <div class="signup blue" style="height: 31px;margin-top:0;"><button type="button" class="loginsd1"  id="cancel">Cancel</button></div>
                            
                      
                   <div class="login loginsd2"><button type="submit" title="Add Credit" class="loginsd" style="border:none; margin:0px;">Save Changes</button></div>       
                      
                      
                        	
                        </form>
                        </div>
                        </div>
                    
                    <?php }elseif($topup->status == '1'){ ?>
                    	
                        <label style="width:100px !important">
                        	Status :
                        </label>
                        <select style="width: 147px  !important;" name="status" id="status">
                        
                        	<option value="1" selected="selected">Active</option>
                            <option value="0">Inactive</option>
                       
                            
                        </select>
                        
                        
                        
                        <div class="clearfix"></div>
                        
                        <div id="on">
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
                        </div>
                        
                        <div id="off">
                        <div class="callhiswid clearall">
                        <form name="form" method="post" action="#">
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
                            <select name="min_amount">
                            <?php for($i=1;$i<=10;$i++){ ?>
								<?php if($topup->MinLevelID == $i) { ?>
                                    <option value="<?php echo $i; ?>" selected="selected"> <?php echo $this->session->userdata('currency_symbol_web').' '.$i; ?></option>
                                <?php }else{ ?>
                                	<option value="<?php echo $i; ?>"> <?php echo $this->session->userdata('currency_symbol_web').' '.$i; ?></option>
                                <?php } ?>
                            <?php } ?>
                            </select>
                            </p>
                            
                            <br/>
                            <br/>
                            <p>
                           	Auto Top-up Amount :
                            </p>
                            <p>
                            <select name="topup_amount">
                            	<?php for($i=1;$i<=10;$i++){ ?>
                            	<?php if($topup->TopupAmt == $i) { ?>
                                    <option value="<?php echo $i; ?>" selected="selected"> <?php echo $this->session->userdata('currency_symbol_web').' '.$i; ?></option>
                                <?php }else{ ?>
                                	<option value="<?php echo $i; ?>"> <?php echo $this->session->userdata('currency_symbol_web').' '.$i; ?></option>
                                <?php } ?>
                                
                            <?php } ?>
                            </select>
                            </p>
                            
                            
                             <div class="signup blue" style="height: 31px;margin-top:0;"><button type="button" class="loginsd1"  id="cancel">Cancel</button></div>
                            
                             
                             <div class="login loginsd2"><button type="submit"  class="loginsd" title="Add Credit" >Save Changes</button></div>
                            
                        	
                        </form>
                        </div>
                    	</div>
                    <?php } ?>
                    
                  <div class="login" style="margin: 0px  0px 0px 35px !important;float:left !important; display:inline;">
                        <button type="button" class="loginsd" id="modify">Modify Auto Top Up</button>
                        
                        </div>
                   
                </section>
               
            
        </div>
         </div>
    </div>
     
    <a class="toplink" style="display: block;"></a>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
            $('#off').hide();
			
			$('#modify').click(function() {
				$('#off').show();
				$('#on').hide();
			});
			
			$('#cancel').click(function() {
				
				$('#off').hide();
				$('#on').show();
				
				window.location.href = '<?php echo current_url(); ?>';
			});
			
			$('#status').change(function() {
				
				if($('#status').val() == '0'){
					window.location.href = '<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/setting/inactive_autotopup';
				}
				
				if($('#status').val() == '1'){
					$('#off').show();
					$('#modify').hide();
					$('#status').attr('disabled','disabled');
				}
			});
        });
	</script>
    <script type="text/javascript">
        function hideshow(which) {
            if (!document.getElementById)
                return
            if (which.style.display == "block")
                which.style.display = "none"
            else
                which.style.display = "block"
        }
    </script>
    
    <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "708px" });
</script>
      

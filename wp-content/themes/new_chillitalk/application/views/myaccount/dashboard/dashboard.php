<div class="rightcunt">
    <h1 style="border-bottom:none;">My Account</h1>
    <p style="font-weight:normal;" class="rightcunt">
My Account allows you to: top up, view your balance, call history, registered numbers and more...</p>
    <hr>
    <div class="clearfix"></div>
    <h3>Bonuses and Bundles</h3>
  
    <section class="myaccount_table">
        <div>Name</div>
        <div>Balance</div>
        <div>Renewal/Expiry Date</div>
        <div>Subscription Period</div>
        <div>Type</div>
    </section>
    
    <?php if($bonus->List == array()) { ?>
    
    	<section class="myaccount_table mytd bdlewidth">
        	 <div>-</div>
       
       
        	 <div>-</div>
        
        	 <div>-</div>
        
        	 <div>-</div>
        
        	 <div>-</div>
                
    	</section>
    
    <?php }else{ ?>
    	<?php $lim1 = 0; ?>
    	<?php foreach($bonus->List as $bonus) { ?>
    	<section class="myaccount_table mytd bdlewidth">
    	<?php if($bonus->Bonus == '') { ?>
        	 <div>-</div>
        <?php }else{ ?>
        	 <div><?php echo $bonus->Bonus; ?></div>
        <?php } ?>
       
        <?php if($bonus->Balance == '') { ?>
        	 <div>-</div>
        <?php }else{ ?>
        	 <div><?php echo $bonus->Balance; ?></div>
        <?php } ?>
        
        <?php if($bonus->ExpDate == '') { ?>
        	 <div>-</div>
        <?php }else{ ?>
        	 <div><?php echo $bonus->ExpDate; ?></div>
        <?php } ?>
        
        <?php if($bonus->SubsPeriod == '') { ?>
        	 <div>-</div>
        <?php }else{ ?>
        	 <div><?php echo $bonus->SubsPeriod; ?></div>
        <?php } ?>
        
        <?php if($bonus->SubsType == '') { ?>
        	 <div>-</div>
        <?php }else{ ?>
        	 <div><?php echo $bonus->SubsType; ?></div>
        <?php } ?>
                
    	</section>
        
        <?php $lim1++; ?>
        
        <?php if($lim1 == 5) { break; } ?> 
    	<?php } ?>
        
    <?php } ?>
    
    
        
	
	
    <div class="clearfix"></div>
    <div class="login">
    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/" title="Buy bundle">Buy bundle</a></div>
    <hr />
    
    
    <div class="myacc_small">
        <h3>Recently Added Contacts</h3>
        <section class="myaccount_table myacc_small">
            <div>Name</div>
            <div>Local Number</div>
            <div>Number</div>
            <div style="display:none !important">SMS</div> 
        </section>
        
        

        <?php if($local_number->List == array()) { ?>
        	 <section class="myaccount_table mytd myacc_small">
                  <div>
                      -
                  </div>
            
                  <div>
                      -
                  </div>
               
                  <div>
                      -
                  </div>
               </section>
           
        <?php }else{ ?>
        
        	<?php $lim2 = 0; ?>
            
            <?php foreach($local_number->List as $local) { ?>
            	
                <section class="myaccount_table mytd myacc_small">
        
			   <?php if($local->ContactName == '') { ?>
                  <div>
                      -
                  </div>
               <?php }else{ ?>
                  <div>
                      <?php echo $local->ContactName; ?>
                  </div>
               <?php } ?>
               
               <?php if($local->LocalNo == '') { ?>
                  <div>
                      -
                  </div>
               <?php }else{ ?>
                  <div>
                      <?php echo $local->LocalNo; ?>
                  </div>
               <?php } ?>
               
               <?php if($local->DestNo == '') { ?>
                 <div> - </div>
               <?php }else{ ?>
                  <div>
                      <?php echo $local->DestNo; ?>
                  </div>
               <?php } ?>
               
                  <div style="display:none !important">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/message.png" alt="Chillitalk Message" />
                  </div>
              </section>
              
              <?php $lim2++; ?>
        
        	<?php if($lim2 == 5) { break; } ?> 
              
                
            <?php } ?>
            
        <?php } ?>
       
        
       
        
        
        
        <div class="signup blue">
            <a title="Show more" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/local_number">Show more</a>
        </div>
        <div class="login">
            <a title="Add Credit" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/local_number/add"> <span>+</span> &nbsp;Add</a>
        </div>
    </div>
    
    <div class="myacc_smalltd">
        <h3>
           Registered Numbers
        </h3>
        <section class="myaccount_table  myacc_smalltd">
            <div>
                Number
            </div>
            <div>
                Country
            </div>
        </section>
        
        <?php if($registered == array()) { ?>
        
        	<section class="myaccount_table mytd myacc_smalltd">
                  <div>
                      -
                  </div>
              
                  <div>
                      -
                  </div>
          	</section>
            
        <?php }else{ ?>
        	<?php $lim3 = 0; ?>
        	<?php foreach($registered as $reg) { ?>
        	<section class="myaccount_table mytd myacc_smalltd">
              <?php if($reg->Cli == '') { ?>
                  <div>
                      -
                  </div>
              <?php }else{ ?>
              	  <div>
                      <?php echo $reg->Cli; ?>
                  </div>
              <?php } ?>
              
              <?php if($reg->Country == '') { ?>
                  <div>
                      -
                  </div>
              <?php }else{ ?>
              	  <div>
                      <?php echo $reg->Country; ?>
                  </div>
              <?php } ?>
          	</section>
            <?php $lim3++; ?>
        
        	<?php if($lim3 == 5) { break; } ?> 
            
        	<?php } ?>
        
        <?php } ?>
        
        
        
        
        
        
        <div class="signup blue">
            <a title="Show more" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/registered_number/">Show more</a>
        </div>
        
        <div class="login">
            <a title="Add Credit" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/registered_number/add"> 
            <span>+</span> &nbsp;Add
            </a>
        </div>
        
    </div>
                <hr />
                <div class="rightcunt">
        <h3>Call History</h3>
        <table class="table table-hover table-bordered">
        
        <thead>
         <th>
        <img src="<?php echo get_template_directory_uri(); ?>/img/ring.jpg" alt="Chillitalk Call" />
      </th>
         <th>
                Date </th>
                <th>
                Time </th>
            <th>
                From </th>
            <th>
               To </th>
            <th>
                Duration</th>
            <th>
              Amount 
            </th>
            <th id="rtxt">
                Balance</th>
        </thead>
        
        <?php if($call_history == array()) { ?>
        
        	
                <td>-</td>
            
                <td>-</td>
    
                <td>-</td>
            
                <td>-</td>
            
                <td>-</td>
            
                <td>-</td>
            
                <td>-</td>
        	
        
        <?php }else{ ?>
        	<?php $lim4 = 0; ?>
        	<?php foreach($call_history as $call) { ?>
            
            <tr>
        	
        
			
                <td>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/chilli.png" alt="Chillitalk Call" />
                </td>
            
            
            <?php if($call->CallDate == '') { ?>
                <td>-</td>
            <?php }else{ ?>
                <td><?php echo strftime('%d/%m/%Y', strtotime($call->CallDate)); ?> </td>
            <?php } ?>
            
            <?php if($call->CallDate == '') { ?>
                <td>-</td>
            <?php }else{ ?>
                <td><?php echo strftime('%H:%M:%S', strtotime($call->CallDate)); ?> </td>
            <?php } ?>
            
            <?php if($call->Ani == '') { ?>
                <td>-</td>
            <?php }else{ ?>
                <td><?php echo $call->Ani; ?>  </td>
            <?php } ?>
            
            <?php if($call->DialedNum == '') { ?>
                <td>-</td>
            <?php }else{ ?>
                <td><?php echo $call->DialedNum; ?></td>
            <?php } ?>
            
            <?php if($call->TalkTimeHHmmss == '') { ?>
                <td>-</td>
            <?php }else{ ?>
                 <td><?php echo strftime('%H:%M:%S', strtotime($call->TalkTimeHHmmss)); ?> </td>
            <?php } ?>
            
            <?php if($call->TalkCharge == '') { ?>
                <td>-</td>
            <?php }else{ ?>
                  <td> <?php echo $this->session->userdata('currency_symbol_web').' '.$call->TalkCharge; ?></td>
            <?php } ?>
            
            <?php if($call->Balance == '') { ?>
                <td>-</td>
            <?php }else{ ?>
                   <td id="rtxt1"><span class="bold">
                 <?php echo $this->session->userdata('currency_symbol_web').' '.$call->Balance; ?></span></td>
            <?php } ?>
            
            
            <?php $lim4++; ?>
        
        	<?php if($lim4 == 5) { break; } ?>
            
            <?php } ?>
        	 
          </tr>  
        	
        <?php } ?>
        </table>
        
      
           
        <div class="signup blue">
            <a title="Show more" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/call_charge">Show more</a>
        </div>
        
    </div>
    <hr />
                <div class="rightcunt">
                    <h3>
                        Charge History</h3>
                    <section class="myaccount_table">
                        <div>
                            Order ID</div>
                        <div>
                            Order date(ET)</div>
                        <div>
                            Amount</div>
                        <div>
                            card Number
                        </div>
                        <div id="tdlast1">
                            Status</div>
                    </section>
                    
                    
                    <?php if($top_up->List == array()) { ?>
                    
                    	<section class="myaccount_table mytd">
                    
                        	<div>-</div>
                        
                        	<div>-</div>
                        
                        	<div>-</div>
                        
                        	<div>-</div>
                        
                        	<div>-</div>
                        
                    	</section>
                    
                    <?php }else{ ?>
                    	
                        <?php $lim5 = 0; ?>
                        
                        <?php foreach($top_up->List as $top) { ?>
                        
                        	<section class="myaccount_table mytd">
                    
								<?php if($top->OrderId == '') { ?>
                                    <div>-</div>
                                <?php }else{ ?>
                                    <div><?php echo $top->OrderId; ?></div>
                                <?php } ?>
                                
                                <?php if($top->OrderDate == '') { ?>
                                    <div>-</div>
                                <?php }else{ ?>
                                    <div><?php echo $top->OrderDate; ?></div>
                                <?php } ?>
                                
                                <?php if($top->Amount == '') { ?>
                                    <div>-</div>
                                <?php }else{ ?>
                                    <div><?php echo str_replace($this->session->userdata('currency_web'),$this->session->userdata('currency_symbol_web'),$top->Amount); ?></div>
                                <?php } ?>
                                
                                <?php if($top->CardNo == '') { ?>
                                    <div>-</div>
                                <?php }else{ ?>
                                    <div><?php echo $top->CardNo; ?></div>
                                <?php } ?>
                                
                                <?php if($top->TopupStatus == '') { ?>
                                    <div>-</div>
                                <?php }else{ ?>
                                    <div  id="tdlast"><?php echo $top->TopupStatus; ?></div>
                                <?php } ?>
                                
                            </section>
                        
                        <?php } ?>
                    
                    	<?php $lim5++; ?>
                        
                        <?php if($lim5 == '5') { break; } ?>
                    <?php } ?>
                    
                   
                    <div class="signup blue">
                        <a title="Show more" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/call_charge">Show more</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->
    </div>
  
   <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "1450px" });
</script>

<!--  right content-->
            <div class="rightcunt">
                <h1>
                    Call & Charge History</h1>
                <div class="callhiswid clearall">
                    <div>
                        <h5>
                            Card on File</h5>
                        <?php if($balance->Last6digitsCC == '') { ?>
                        <span>- </span><span>-</span>
                        <?php }else{ ?>
                        <span>VISA </span>
                        <span><?php echo $balance->expirydatemonth; ?>/<?php echo $balance->expirydateyear; ?></span>
                        <span>XXXX XXXX XXXX <?php echo substr($balance->Last6digitsCC,2,4); ?></span>
                        <?php } ?>
                    </div>
                    <div>
                        <h5>
                            Available Credit
                        </h5>
                        <p>
                            Credit
                        </p>
                        <span><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo round($balance->MasterBal, 0); ?></span>
                        <br />
                        <p>
                            Bonus Credit
                        </p>
                        <span><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo round($balance->PkgBal,0); ?></span>
                        <br />
                        <p class="bold">
                            Total Balance
                        </p>
                        <span class="bold"><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo round($balance->TotalBal,0); ?></span>
                    </div>
                    <div>
                        <h5>
                            Home Saver Bundles</h5>
                        <p>
                            No Home Saver Bundles currently in &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this account
                        </p>
                    </div>
                </div>
                <div class="rightcunt">                	
                    <h3>
                        Charge History
                    </h3>
                 <!--   <div class="rightlink">
                        <a href="" class="underline">View all</a>  <a href=""  class="underline">Print all</a>
                    </div>-->
                    <div class="rightcunt">
	                	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="chargeHistoryTable">
				            <thead>
				                <tr>
				                    <th>
				                        Order ID
				                    </th>
				                    <th>
				                        Order date(ET)
				                    </th>
				                    <th>
				                        Amount
				                    </th>
				                    <th>
				                        Card Number
				                    </th>
				                    <th>
				                    	Status
				                    </th>
				                </tr>
				            </thead>
				            <tbody>
				            	<?php foreach($topup->List as $val) { ?>
		                          <tr class="odd gradeX">
		                              <td>
		                                  <?php echo $val->OrderId; ?></td>
		                              <td>
		                                  <?php echo strftime('%d/%m/%Y', strtotime($val->OrderDate)); ?></td>
		                              <td>
		                                  <?php 
		                                  if($val->Amount == ''){
		                                  	echo str_replace($this->session->userdata('currency_web'),$this->session->userdata('currency_symbol_web'),0);
		                                  }else{
		                                  	echo str_replace($this->session->userdata('currency_web'),$this->session->userdata('currency_symbol_web'),$val->Amount); 
		                                  }
		                                  	
		                                  ?>
		                              </td>
		                              <td>
		                                  <?php echo $val->CardNo; ?>
		                              </td>
		                              <td>
		                                  <?php echo $val->TopupStatus; ?>
		                              </td>
		                          </tr>
	                          <?php } ?>
	                		</tbody>
	                	</table>	
	                	<div class="rightcom rightlink1" style="margin-bottom: 15px">
                           <a href="<?php echo base_url().$this->session->userdata('lang'); ?>/myaccount/call_charge/charge/<?php echo $month_charge - 1; ?>/<?php echo $year_charge; ?>">
                           < Previous month
                           </a>
                           |
                           <strong><?php echo $month_charge_name; ?></strong>
                           |
                           <a href="<?php echo base_url().$this->session->userdata('lang'); ?>/myaccount/call_charge/charge/<?php echo $month_charge + 1; ?>/<?php echo $year_charge; ?>">Next month ></a>
                            <a href="#">Go to date </a> 
                            <input type="text" placeholder="04/2013" class="accdtd" id="txt_charge_hist" />  
                            <a href="#" id="go_charge_hist">Go</a>
                        </div>
                	</div>
                </div>
                <hr/>
                <div class="rightcunt">
                	
                    <h3>
                        Call History
                    </h3>
                   <!-- <div class="rightlink">
                        <a href="" class="underline">View all</a>  <a href=""  class="underline">Print all</a>
                    </div>-->
                    <div class="rightcunt">
                    	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered pddinbg" id="callHistoryTable" >
                        	<thead>
				                <tr>
				                    <th>
				                        <img src="<?php echo get_template_directory_uri(); ?>/img/ring.jpg" alt="Chillitalk Call" />
				                    </th>
				                    <th>
				                        Date
				                    </th>
                                    <th>
				                        Time
				                    </th>
				                    <th>
				                        From
				                    </th>
				                    <th>
				                        To
				                    </th>
				                    <th>
				                    	Duration
				                    </th>
				                    <th>
				                    	Amount
				                    </th>
				                    <th>
				                    	Balance
				                    </th>
				                </tr>
				            </thead>
				            <tbody>
                        
                        	<?php foreach($call as $val) { ?>
		                    <tr class="odd gradeX">
			                    <td>
			                    	<img src="<?php echo get_template_directory_uri(); ?>/img/chilli.png" alt="Chillitalk Call" />
			                  	</td>
			                  	<td>
				                    <?php if($val->CallDate == '') { 
				                    	echo '-';
				                    }else{ 
				                    	echo strftime('%d/%m/%Y', strtotime($val->CallDate));
				                    } ?>
			                    </td>
                                <td>
				                    <?php if($val->CallDate == '') { 
				                    	echo '-';
				                    }else{ 
				                    	echo strftime('%H:%M:%S', strtotime($val->CallDate));
				                    } ?>
			                    </td>
		                        <td><?php echo $val->Ani; ?> </td>
		                        <td><?php echo $val->DialedNum; ?>  </td>
		                        <td><?php echo strftime('%H:%M:%S', strtotime($val->TalkTimeHHmmss)); ?> </td>
		                        <td> <?php echo $this->session->userdata('currency_symbol_web').' '.$val->TalkCharge; ?></td>
		                        <td> <span class="bold"><?php echo $this->session->userdata('currency_symbol_web').' '.$val->Balance; ?></span></td>
		                    </tr>
                    		<?php } ?>
                    	</tbody>
                	</table>
                       
                        <div class="rightcom rightlink1" style="margin-bottom: 15px">
                           <a href="<?php echo base_url().$this->session->userdata('lang'); ?>/myaccount/call_charge/call/<?php echo $month_call - 1; ?>/<?php echo $year_call; ?>">
                           < Previous month
                           </a>
                           |
                           <strong><?php echo $month_call_name; ?></strong>
                           |
                           <a href="<?php echo base_url().$this->session->userdata('lang'); ?>/myaccount/call_charge/call/<?php echo $month_call + 1; ?>/<?php echo $year_call; ?>">Next month ></a>
                            <a href="#">Go to date </a> 
                            <input type="text" placeholder="04/2013" class="accdtd" id="txt_call_hist" />  
                            <a href="#" id="go_call_hist">Go</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->
    </div>
    <script type="text/javascript">
	
	$(document).ready(function() {
		$('#go_call_hist').hide();
		$('#go_charge_hist').hide();
		
		$('#txt_call_hist').datepicker({
			format: "mm/yyyy",
			minViewMode: 1,
			autoclose: true
		});
		
		$('#txt_charge_hist').datepicker({
			format: "mm/yyyy",
			minViewMode: 1,
			autoclose: true
		});
		
		$('#txt_call_hist').change(function(){
			$('#go_call_hist').show();
		});
		
		$('#go_call_hist').click(function(){
			window.location.href = '<?php echo base_url().$this->session->userdata('lang'); ?>/myaccount/call_charge/call/'+$('#txt_call_hist').val().replace(/^0+/, '');
		});
		
		$('#txt_charge_hist').change(function(){
			$('#go_charge_hist').show();
		});
		
		$('#go_charge_hist').click(function(){
			window.location.href = '<?php echo base_url().$this->session->userdata('lang'); ?>/myaccount/call_charge/charge/'+$('#txt_charge_hist').val().replace(/^0+/, '');
		});
				
		$( ".leftmyaccount" ).css({ height: "1270px" });
    });
	</script>

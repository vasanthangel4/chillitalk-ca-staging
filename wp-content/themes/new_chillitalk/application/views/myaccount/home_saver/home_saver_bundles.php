<!--  right content-->
<a class="toplink" style="display: block;"></a>
            <div class="rightcunt">
                <h1>
                    Home Saver Bundles</h1>
                   
                <h3 style="margin-bottom:-13px;">
                    My Subscriptions</h3>
                
                
                <div class="rightcunt">
                   
                    
                    <?php if($this->session->flashdata('success')) { ?>
                    	<div class="alert alert-success">
                        	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    
                    <table class="table table-striped table-bordered table-hover" id="bundles">
                    <thead>
                      <tr>
                      	  <th>Country</th>
                          <th>Status</th>
                          <th>Destination Number</th>
                          <th>Remaining Minutes</th>
                          <th>Activation Date</th>
                          <th>End/Renewal Date</th>
                          <th>Action</th>
                      </tr>
                   	</thead>
                      <tbody>
                      <?php foreach($result->List as $val) { ?>
                      	<tr>
                          <td><?php echo $val->PkgName; ?></td>
                          <td><?php echo $val->Status_Information; ?></td>
                          <td><?php echo $val->DestNo; ?></td>
                          <td><?php echo $val->RemainingMin; ?></td>
                          <td><?php echo $val->ActivDate; ?></td>
                          <td><?php echo $val->EndDate; ?></td>
                          <?php if($val->Status_Information == 'Active' || $val->Status_Information == 'Pending') { ?>
                          	<td><div class="login"><a href="">Cancel</a></div></td>
                          <?php }else{ ?>
                          	<td><div class="login"><a href="">Reactive</a></div></td>
                          <?php } ?>
                          
                      	</tr>
                      <?php } ?>
                      
                      </tbody>
                    
                    </table>
               </div>
               <h3 style="margin-bottom:-13px;">
                    Allocated Numbers</h3>
                
               
                <div class="rightcunt">
                   
                    
                    <?php if($this->session->flashdata('success')) { ?>
                    	<div class="alert alert-success">
                        	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    
                    <table class="table table-striped table-bordered table-hover" id="bundles2">
                      <thead>
                        <tr>
                            <th>Number</th>
                            <th>Status</th>
                            <th>Activation Date</th>
                            <th>End/Renewal Date</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($result->ListAllocated as $val1) { ?>
                      	<tr>
                          <td><?php echo $val1->Main_Number; ?></td>
                          <td><?php echo $val1->Allocated_Number_Status; ?></td>
                          <td><?php echo $val1->ActiveDate; ?></td>
                          <td><?php echo $val1->EndDate; ?></td>
                          <td><div class="login"><a href="">Cancel</a></div></td>
                      	</tr>
                      <?php } ?>
                      
                      </tbody>
                    
                    </table>
                  
                    
                   </div> 
                    <hr />
                    
                    <h3>Other Available Subscriptions</h3>
                    
                    <p class="rightcunt2">
                   Chillitalk offers a Home Saver Bundle for <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/sri_lanka/" class="ttxtblue">Sri Lanka</a>                     
                 so you can call your loved ones as often as you need without worrying about the cost.
                    </p>
                    <div class="clearfix">&nbsp;</div>
                     <div class="row">
                     	<div >
                        	<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/home_saver_bundles/sri_lanka/">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/bundle_sri_lanka.jpg" />
                            </a>
                        </div>
                        
                    
                     </div>
                </div>
            </div>
        </div>
        
        <!--footer section  start here-->
    </div>
	  <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "1109px" });
</script>

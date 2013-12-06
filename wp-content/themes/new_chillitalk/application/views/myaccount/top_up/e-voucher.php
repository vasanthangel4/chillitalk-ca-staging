            <div class="rightcunt">
                <h1>
                    Add Credit to your Account</h1>
             
                  <h3>
                   Top Up using E-Voucher</h3> 
                   <div class="rightcunt">
        
                </div>    
             
              <?php if(validation_errors()) { ?>
              <div class="rightcunt">
              <div class="alert alert-danger">
              	<button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo validation_errors(); ?>
              </div>
              </div>
              <?php } ?>
              
              <?php if($this->session->flashdata('voucher_success')) { ?>
              <div class="rightcunt">
              <div class="alert alert-success">
              	<button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('voucher_success'); ?>
              </div>
              </div>
              <?php } ?>
              
              <?php if($this->session->flashdata('voucher_failed')) { ?>
              <div class="rightcunt">
              <div class="alert alert-danger">
              	<button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('voucher_failed'); ?>
              </div>
              </div>
              <?php }?>
              
              <form name="frmvoucher" id="voucher" method="post">
         		<div class="rightcunt addsdrs">
                  <label class="leftcom tsrt" >
                    Enter your E-Voucher PIN*</label>
                  <input type="text" name="code_voucher" value="" required="required" >
                </div>
                <div class="rightcomtxt">
                	<div class="signup">
            			<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/" style="font-size:12px;">Back</a>
        			</div>
                 	<div class="login">
            			<button type="submit" title="Add Credit">Proceed</button>
        			</div>    
                 </div>
               </form>
                 <hr/>  
                             </div>    
          
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->
<style type="text/css">
.topupns a {
    border:1px solid #6ea600 !important;
	}

</style>
    </div>
 <script type="text/javascript">
$( ".leftmyaccount" ).css({height: "1100px" });
</script>
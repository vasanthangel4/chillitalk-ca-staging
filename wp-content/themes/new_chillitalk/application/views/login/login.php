<div class="maincomon logincoom">
            <div class="commfrt">
                <h3>
                 <?php echo lang('Log.home'); ?>
                
              </h3>
                <p>
                  <?php echo lang('Log.hometxs'); ?>
                  <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up" class="underline"> <?php echo lang('Log.hometxs1'); ?></a>
                  <?php echo lang('Log.hometxs2'); ?>
                  
                 
                </p>
                <?php if(validation_errors()) { ?>
                	<div class="clearfix"></div>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo validation_errors(); ?>.
                    </div>
                <?php } ?>
                
                <?php if($this->session->userdata('logout_success')) { ?>
                	<div class="clearfix"></div>
                    <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->userdata('logout_success'); ?>
                    </div>
                <?php } ?>
                    
                <?php if($this->session->userdata('login_failed')) { ?>
                	<div class="clearfix"></div>
                    <div class="alert alert-danger">
                    
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->userdata('login_failed'); ?>
                        
                    </div>
                <?php } ?>
     
                <section>
                <form name="frmlogin" id="frmlogin" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/">
                     <div class="divcen leftcom">   <label>
                                  <?php echo lang('Log.hometxs3'); ?>
                     
                    </label>
                    <input type="text" required="required" name="username">
                       </div>
                   <div class="divcen leftcom">    <label></label>  <label></label>   </div>
                    
                    <div class="divcen leftcom label1"> 
                    <label>
                        <?php echo lang('Log.hometxs4'); ?>
                    </label>
                    <input type="password" required="required" name="password"/>
                    </div>
                         <div class="divcen leftcom"> 
                     
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/forgot_password" class="lintxt underline">   <?php echo lang('Log.hometxs5'); ?></a>
                       <label>
                    </label>
                    <div class="clearfix"></div>
                     <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_access_code" class="lintxt underline">Login using your Account Access Code</a>
                       <label>
                    </label>
                     </div>
                         <div class="divcen leftcom"> 
                           <label>
                    </label>
                      <input type="checkbox" id="commcheck" class="leftcom" />
                    <label for="commcheck"> <?php echo lang('Log.hometxs6'); ?></label>
                     </div>
                   <div class="divcen leftcom cssls"> 
                    <label>
                    </label>
                    
                
                        <button type="submit" class="loginimg"><?php echo lang('Log.hometxs7'); ?></button>
                    </div>
                    <div class="clearall">
                        &nbsp;
                    </div>
                </form>
                </section>
            </div>
            <div class="commfrt2 none">
                <h3>
                    easy money
                </h3>
                <p>
                    earn yourself some easy money by making life easier for your friends. refer a friend
                    to Chillitalk and get up to 5 calling credit straight to your Chillitalk account.
                    start earning now by sharing the benefits.
                    <br />
                    <br />
                </p>
                <div class="signup leftcom">
                    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/earn_free_credit/">start earning now</a></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function() {
        window.Pace.start();
    });
	</script>
<style type="text/css">
.topupns + #loginbg a {
    background-image: url("http://chillitalk.co.uk/wp-content/themes/chillitalk/img/topupnew.png") !important;
	width:102px !important;
 
	
}
.logine a {
    background-image: url("http://chillitalk.co.uk/wp-content/themes/chillitalk/img/loginin.jpg") !important;
    background-repeat: no-repeat;
    color: #FFFFFF !important;
}

</style>

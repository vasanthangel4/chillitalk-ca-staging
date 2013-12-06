
<div class="maincomon logincoom">
            <div class="commfrt">
                <h3>
                    Forget your Password?
                </h3>
                <p>
                    Enter your Chilli Talk login email or mobile number below.<br />
                    If you use your login email, put <a href="mailto:support@chillitalk.com?subject=Forget my chillitalk account Password">
                        support@chillitalk.com</a> on your safe list to ensure delivery.
                </p>
                <section>
                
                <?php if($this->session->userdata('success_forgot')) { ?>
                <div class="clearfix"></div>
                <div class="alert alert-success">
                	<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->userdata('success_forgot'); ?>.
                </div>
                <?php } ?>
                
                <?php if($this->session->userdata('failed_forgot')) { ?>
                <div class="clearfix"></div>
                <div class="alert alert-danger">
                	<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->userdata('failed_forgot'); ?>.
                </div>
                <?php } ?>
                
                
                <form action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/forgot_password" method="post" autocomplete="on">
   
                    <input type="text" name="forgot" class="searchinput leftcom" required="required" />

                        <div class="signup">
                        <button type="submit">
                        	Send Password
                           </button>
                        
                    	</div>
                   </form>
                    <div class="clearall">
                        &nbsp; &nbsp; &nbsp;<br/><br/>
                    </div>
                </section>
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->
    </div>
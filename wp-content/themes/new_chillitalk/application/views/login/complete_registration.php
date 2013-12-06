<!--main logo section  start here-->
        <div class="maincomon logincoom clearall">
            <h1 class="h1left">
                Please complete your profile to continue
            </h1>
            <p>
                Enter your name and email address below in order to complete your registration
            </p>
           
            
            <div class="commfrt">
            <form name="frmreg" id="frmreg" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/login_member/complete_registration">
                <section>
                    <label>
                        Your phone number</label>
                    <label><?php echo $this->session->userdata('email'); ?></label>
                    <label>
                        Country</label>
                    <label><?php echo $this->config->item('country_name_web'); ?> </label>
                    <label>
                        First name
                    </label>
                    <input type="text" name="first_name" required />
                    <label>
                        Last name
                    </label>
                    <input type="text" name="last_name" required />
                    <label>
                        Email
                    </label>
                    <input type="email" name="email_address" required />
                    <label>
                    </label>
                    <label></label>
                    <div class="login">
                   
                        <button type="submit">Continue</button>
                    </div>
                    <div class="clearall">
                        &nbsp;
                    </div>
                </section>
            </form>
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->
    </div>


<!--main logo section  start here-->
        <div class="maincomon">
            <section class="bgmobile">
                <div class="bgmobile1 padg">
                    <h3>
                        <span>Dial</span> <?php echo $this->session->userdata('local_no'); ?> <span>to reach</span> <?php echo $this->session->userdata('dest_name'); ?>
                    </h3>
                    <p>
                    Well done! You have created your first Local Number! Save this number in your phone’s contact list.
                    
                    To call  <b> <?php echo $this->session->userdata('dest_name'); ?></b>  dial <b> <?php echo $this->session->userdata('local_no'); ?> </b> from your registered phone to call at Chillitalk’s low rate.
                    
                      <br />         <br />
                            
                    </p>
                    
              <!--      <p>
                    To call <?php echo $this->session->userdata('dest_name'); ?> dial 
					<?php echo $this->session->userdata('dest_no'); ?>
                    from your registered phone to call at Chillitalk's low rate</p>-->
                    <div class="flagcommon">
                        <img src="<?php echo $this->config->item('big_flag'); ?>" alt="Chillitalk country" />
                        <span>Current time in Capital
                            <br />
                            
							12:22 PM </span>
                    </div>
                    <div class="flagcommon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpg" alt="Chillitalk country" />
                        <p>Just <b><?php echo $this->session->userdata('rates'); ?> </b></p>
                    </div>
                    <div class="flagcommon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/sign_up_flags/<?php echo $this->session->userdata('country'); ?>.png" alt="Chillitalk country" />
                        <span>Current time in Capital
                            <br />
                            07:22 Am </span>
                    </div>
                    <hr />
                    <h3>
                       We are almost finished!


                    </h3>
                  
                    <div class="secbutton">
                        <div class="signup blue">
                            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/step4/">Finish   </a>
                        </div>
                        <div class="signup green">
                            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard_alone/">add credit </a>
                        </div>
                    </div>
                </div>
                <div class="frcrditm">
                    <h3>
                        Free credit
                    </h3>
                    <p>
                        We added 0.25p to your account,<br /> now you can start making free calls
                    </p>
                    <div class="ramycount"><h1><?php echo $this->config->item('currency_symbol_web'); ?>0.25 </h1></div>
                </div>
                <div class="commfrt4">
                    <h3>
                       Local Numbers
                    </h3>
                    <p align="justify">
                      We’ll create a Local Number for every international contact you add. Simply save the Local Number in your phone book or view online and call the number to connect to your contact without running up an expensive bill.               
                    </p>
           
        </div> </section>
    </div>
    </div>
    <a class="toplink" style="display: block;"></a>
    
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
                        <span>Current time in Cappital
                            <br />
                            
							12:22 PM </span>
                    </div>
                    <div class="flagcommon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpg" alt="Chillitalk country" />
                        <p>Just <b><?php echo $this->session->userdata('rates'); ?> </b></p>
                    </div>
                    <div class="flagcommon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/sign_up_flags/<?php echo $this->session->userdata('country'); ?>.png" alt="Chillitalk country" />
                        <span>Current time in Cappital
                            <br />
                            07:22 Am </span>
                    </div>
                    <hr />
                    <h3>Welcome to Chillitalk</h3>
                    <p>
                       Welcome to your account. Here you can top-up your credit, view your contacts, see your call history & billing information, and edit your personal details. 


                    </p>
                  
                    <div class="secbutton">
                        <div class="signup blue">
                            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard">go straight to My Account  </a>
                        </div>
                       
                    
                        
                    </div>
                </div>
                <div class="frcrditm">
                    <h3>
                        Free credit
                    </h3>
                    <p>
                        We added $0.40 to your account,<br /> now you can start making free calls
                    </p>
                    <div class="ramycount"><h1><?php echo $this->config->item('currency_symbol_web'); ?>0.40 </h1></div>
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

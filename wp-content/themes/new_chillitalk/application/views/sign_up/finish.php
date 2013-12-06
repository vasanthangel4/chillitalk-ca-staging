<!--main logo section  start here-->
        <div class="maincomon">
            <section class="bgmobile">
                <div class="bgmobile1 padg">
                    <h1>
                       Make your<br/> free call now
                    </h1>
                    <p class="leftcom" style="width:600px;font-weight:bold !important;"> 
                   Your registered phone number <span class="red"><?php echo $this->session->userdata('phone_no'); ?></span>
            <br/><br/>
                            
                    </p>
                    <h3>
                      Dial <span class="red"><?php echo $this->session->userdata('local_no'); ?></span> to reach <?php echo $this->session->userdata('dest_name'); ?>
                    </h3>
              
                    <div class="flagcommon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/sign_up_flags/<?php echo $this->session->userdata('country_flag'); ?>.png" alt="Chillitalk country" />
                        
                    </div>
                    <div class="flagcommon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.jpg" alt="Chillitalk country" />
                        <p>Just <b><?php echo $this->session->userdata('rates'); ?> </b></p>
                    </div>
                    <div class="flagcommon">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/sign_up_flags/<?php echo $this->session->userdata('country'); ?>.png" alt="Chillitalk country" />
                        
                    </div>
                    <hr />
                    <p>
                     Well done! You have created your first Local Number! Save this number in your phone's contact list.
<br/>
To call Enter dial <strong><span class="red"><?php echo $this->session->userdata('local_no'); ?></span></strong>  from your registered phone to talk at Chillitalk's low rate


                    </p>
                  
                    <div class="secbutton">
                        <div class="signup blue">
                            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/step4/">Finish   </a>
                        </div>
                        <div class="signup green">
                            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard_alone/">add credit </a>
                        </div>
                    </div>
                </div>
                  <div class="frcrditm cstdssd">
                    <h3 id="txctswdw">
                       Your credit
                       <br/>
                      <span class="green1"> $0.40 </span>
                    </h3>
                     <h4 class="red red1"> Free credit</h4>
                    <p>
                        We added <b>$0.40</b> to your account, so<br>  you can start making calls straight away
                    </p>
                
                </div>
              </section>
    </div>
    </div>
    <a class="toplink" style="display: block;"></a>
    <style>
	
.cstdssd {
    background-color: #FFFFFF !important;
    background-image: url("img/savemoney.png");
    background-position: 189px 9px;

    background-repeat: no-repeat;
    border: 1px solid #666666;
    margin-left: 0px;
    outline: 0 none;
    padding: 0px 27px 12px 37px;
    width: 264px;
}
	</style>

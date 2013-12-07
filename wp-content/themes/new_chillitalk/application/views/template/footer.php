  <!--footer section  start here-->
                <footer>
            <section class="padfo">
               <?php echo lang('footer.first'); ?>
                <section class="sec2 leftcom">
                    <h4>
                        <?php echo lang('footer.second'); ?>  </h4>
                    <ul class="footer">
                        <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps" title="iPhone app">iPhone</a> </li>
                        <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps" title="Android">Android</a> </li>
                        
                    </ul>
                     <a href="https://itunes.apple.com/WebObjects/MZStore.woa/wa/viewSoftware?id=756702258&mt=8" target="_blank">  
                       
                <img src="<?php echo get_template_directory_uri(); ?>/img/app_store.png" alt="Chillitalk Android" /></a>
                
                 <a href="https://play.google.com/store/apps/details?id=com.mundio.chillitalk&hl=en_GB"  target="_blank"> 
               
                       
                <img style="margin-top:0px;" src="<?php echo get_template_directory_uri(); ?>/img/google_app.jpg" alt="Chillitalk Android" /></a>
                
                
                </section>
                <section class="sec2 leftcom">
                    <h4> <?php echo lang('footer.four'); ?></h4>
                    <ul class="footer">

                        <li class="none"><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/apps">Android</a> </li>
                                                 <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/chillitalk_access_number/">Access Numbers</a> </li>
                        <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/earn_money/">Earn Free Credit</a> </li>
                        <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/rates"><?php echo lang('footer.Rates'); ?></a> </li>
                        <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up">Top-up</a> </li>
                        <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/"><?php echo lang('footer.Support'); ?> </a> </li>
                        <li class="none"><a href="#"><?php echo lang('footer.Loyalty'); ?>  </a> </li>
                    </ul>
                </section>
                <section class="sec3 leftcom">
                    <ul class="footer1">
                        <!--<li><a href="#"><?php echo lang('footer.About'); ?> </a> </li>-->
                        <li class="none"><a href="#"><?php echo lang('footer.Find'); ?> </a>  </li>
                        <li class="none"><a href="#"><?php echo lang('footer.security'); ?></a>  </li>
                        <li>
                       <a href="#"> <?php echo lang('footer.Privacy'); ?></a> </li>
                        <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/terms_condition/"><?php echo lang('footer.Terms'); ?></a> </li>
                          <li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/about_us">About Us</a> </li>
                    </ul>
                </section>
                <div class="clearfix"></div>
                <section class="sec4">
                    <h5 style="display:none !important;">
                        Follow us on <a href="#"
                            target="_blank" class="fb" title="Facebook">Facebook</a> and <a href="https://twitter.com/ChilliTalk"
                                target="_blank" class="tw" title="Twitter">Twitter<img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png"
                                    alt="twitter" /></a> @chillitalk
                    </h5>
                    <h4>
                        © 2013 Chillitalk</h4>
                </section>
            </section>
        </footer>
 

<?php wp_footer(); ?>

<script type="text/javascript">
    var Comm100API = Comm100API || new Object;
    Comm100API.chat_buttons = Comm100API.chat_buttons || [];
    var comm100_chatButton = new Object;
    comm100_chatButton.code_plan = 13;
    comm100_chatButton.div_id = 'comm100-button-13';
    Comm100API.chat_buttons.push(comm100_chatButton);
    Comm100API.site_id = 181012;
    Comm100API.main_code_plan = 13;
    var comm100_lc = document.createElement('script');
    comm100_lc.type = 'text/javascript';
    comm100_lc.async = true;
    comm100_lc.src = 'https://chatserver.comm100.com/livechat.ashx?siteId=' + Comm100API.site_id;
    var comm100_s = document.getElementsByTagName('script')[0];
    comm100_s.parentNode.insertBefore(comm100_lc, comm100_s);
</script>

</body>
</html>

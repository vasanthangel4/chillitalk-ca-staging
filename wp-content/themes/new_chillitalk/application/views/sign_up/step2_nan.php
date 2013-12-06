<div class="maincomon">
  <section class="bgmobile padg1">
    <div class="bgmobile1 padg" id="payGContent-1">
      <h1>Make your<br>free call now</h1>
      <h4>Download one of our apps to start using Chillitalk </h4>
      
      <div id="radios1">
          <a href="https://play.google.com/store/apps/details?id=com.mundio.chillitalk&hl=en_GB" target="_blank">
          <input type="radio" title="android" class="{src:'<?php echo get_template_directory_uri(); ?>/img/android.png', 
          checked:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',
          hover:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',
          disabled:'<?php echo get_template_directory_uri(); ?>/img/android.png'}"
          name="group1" value="android" onclick="toggle('hide');" id="tim2" >
          </a>
          
          <input type="radio" title="iPhone" class="{src:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png',
          checked:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png',
          hover:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png',
          disabled:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png'}" 
          name="group1" value="iPhone &amp; iPad" onclick="toggle('hide');" id="tim3">
          
          <input type="radio" title="PC" class="{src:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',
          checked:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',
          hover:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',
          disabled:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png'}" 
          name="group1" value="PC" onclick="toggle('hide');" id="tim4">
      </div>
    
    
      <div class="secbutton">
      
        <div class="signup blue">
            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/dashboard/">Finish   </a>
        </div>
        <div class="signup green">
            <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/add_creditcard_alone/">add credit </a>
        </div>
        
      </div>  
      
    </div>
  
  
  
  
  
  
    <div class="frcrditm cstdssd">
      <h3 id="txctswdw">Your credit<br/>
        <span class="green1"> $0.40 </span>
      </h3>
      <h4 class="red red1"> Free credit</h4>
      <p>
        We added <b>$0.40</b> to your account, so<br>  you can start making calls straight away
      </p>
    </div>
  
  
  </section>
  <a class="toplink" style="display: block;"></a>
</div>
</div>
<style type="text/css">
#radios1 {
    margin: 12px 0 15px -15px !important;
}
.cstdssd
{
margin-top:27px !important;
}
</style>

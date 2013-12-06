<div class="maincomon strtat">



<h1 class="maincomon">Our App </h1>
<h2 class="maincomon ctsd">How would you like to use Chillitalk?</h2>
<div class="ctsd1">
<div id="radios1">
    <a id="link">
            	<input type="radio" id="tim1" value="landline" name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg',checked:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg',hover:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile_select.jpg',disabled:'<?php echo get_template_directory_uri(); ?>/img/landlineandmobile.jpg' }"   title="landline" />
                </a>
                
                 <a id="link1">
                 <input type="radio" id="tim3" onclick="toggle('hide');" value="android" name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/android.png',checked:'<?php echo get_template_directory_uri(); ?>/img/android.png',hover:'<?php echo get_template_directory_uri(); ?>/img/android_select.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/android.png'}"  title="android" />
                   </a>
                    <a id="link2">
                  <input type="radio" id="tim2" onclick="toggle('hide');" value="iPhone & iPad" name="group1"  class="{src:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png',checked:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png',hover:'<?php echo get_template_directory_uri(); ?>/img/iphone_select.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/iphone2.png'}"  title="iPhone" />
               </a>  
                 <a id="link3">
                 <input type="radio" id="tim4" onclick="toggle('hide');" value="PC" name="group1" class="{src:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',checked:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png',hover:'<?php echo get_template_directory_uri(); ?>/img/PC_select.png',disabled:'<?php echo get_template_directory_uri(); ?>/img/PC-diselect.png'}"   title="PC" />
                 </a>  
              </div>


</div>
 <div class="maincomon">
   <?php echo lang('app.Androidtxts3'); ?>
    <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/" 
    title="download the App" class="tryus  leftcom">Sign up now! First call free</a>
      <?php echo lang('app.Androidtxts4'); ?>
   
  
 </div>
  <div class="maincomon">
 <?php echo lang('app.Android'); ?>
 <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/#android"
 title="download the App" class="tryus  leftcom"><?php echo lang('app.download'); ?></a>
  <?php echo lang('app.Androidtxts'); ?>
 </div>
 
<?php echo lang('app.first'); ?> 

   <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up#iphone" 
 title="download the App" class="tryus  leftcom"><?php echo lang('app.download'); ?></a>
 
<?php echo lang('app.second'); ?> 
 
 
 <br/><br/>
</p>

  <div class="maincomon">
  <?php echo lang('app.Androidtxts1'); ?>
   <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/sign_up/" 
   title="download the App" class="tryus12 leftcom"><!--<?php echo lang('app.download'); ?>--></a>
   
    <?php echo lang('app.Androidtxts2'); ?>
   
   
 </div>

  
 
 
 
 
</div>
    
            </div>
      </div>
      <a class="toplink" style="display: block;"></a>
      

<script type="text/javascript">
	  
	  function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

$("#link").click(function() {
   scrollToAnchor('id3');
});
	
</script> 
<script type="text/javascript">
	  
	  function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

$("#link1").click(function() {
   scrollToAnchor('id2');
});
	
</script> 
<script type="text/javascript">
	  
	  function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

$("#link2").click(function() {
   scrollToAnchor('id1');
});
	
</script> 
<script type="text/javascript">
	  
	  function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

$("#link3").click(function() {
   scrollToAnchor('id0');
});
	
</script> 
<style>
#radios1 {
    margin: -14px 0 16px 100px;
}
</style>

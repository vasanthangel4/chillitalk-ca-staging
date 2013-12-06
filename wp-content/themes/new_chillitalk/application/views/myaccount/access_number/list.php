<div class="rightcunt">
    <?php
	function cmp($a, $b)
	{
		return strcmp($a->CountryName, $b->CountryName);
	}
	
	usort($result->CountryList, "cmp");
	?>

    <h1><?php echo lang('access.first'); ?> </h1>
        <div class="cssaver1 leftcom">
			<?php echo lang('access.second'); ?> 
            
                <div class="cssaver1 leftcom selt1">
                <form>
                    <select id="country_access">
                    	<option value="">Select Country</option>
						<?php foreach($result->CountryList as $val) { ?>
                        
							<?php if($this->session->userdata('country2_sidebar') == $val->CountryCode2) { ?>
                                <option value="<?php echo $val->CountryCode2; ?>" selected="selected">
                                    <?php echo $val->CountryName; ?>
                                </option>
                            <?php }else{ ?>
                                <option value="<?php echo $val->CountryCode2; ?>">
                                    <?php echo $val->CountryName; ?>
                                </option>
                            <?php } ?>
                        
                        
                        <?php } ?>
                        
                    </select>
                    
                    <select id="state_access">
                    	<option value="">Select State</option>
                    </select>
                    
                    <select id="city_access">
                    	
                    </select>
                    
                    <select id="city_access2">
                    	
                    </select>
                    
                </form>    
                	<br/><br/>
                    <div class="accessntxt">
                    	<div id="data-result">
                        	
                            
                        
                        </div>
                    </div>
                    </div>
                </div>
                
            
            
            </div>
        </div>
    </div>

      <!--footer section  start here-->
     
<script type="text/javascript">

$('#state_access').hide();
$('#city_access').hide();
$('#city_access2').hide();



$('#country_access').change(function(ev) {
	ev.preventDefault();
	
	 $.post("<?php echo base_url();?>en/myaccount/access_number/get_access_number/"+$('#country_access').val(),{},
	 function(obj){
	     //alert(obj);
		 
		 
		 if(obj == "") {
			 $('#city_access2').hide();
			 $('#result_access').hide();
			 $('#city_access').hide();
			 $('#state_access').hide();
			 
			 $.post("<?php echo base_url();?>en/myaccount/access_number/get_detail/"+$('#country_access').val(),{},
			  function(obj){
			 	$('#data-result').html('<h3>Access Number</h3><div class="clearfix"></div>'+obj);
			  }
			 );
			  	
		 }else if(obj.substring(0,4) == 'city'){
			 $('#city_access2').hide();
			 $('#city_access').show();
			 $('#city_access').html('<option value="">Select City</option>'+obj);
			 $('#state_access').hide();	
			 $.post("<?php echo base_url();?>en/myaccount/access_number/get_detail/"+$('#country_access').val(),{},
			  function(obj){
				$('#data-result').html('<h3>Access Number</h3><h3>City</h3><div class="clearfix"></div>'+obj);
			  });

		 }else if(obj.substring(0,4) == 'prov') {
			 
			 //alert(obj);
			 
			 $('#state_access').show();
			 $('#state_access').html('<option value="">Select State</option>'+obj);
			 $('#city_access').hide();
			 $('#city_access2').show();
			 $('#city_access2').html('<option value="">Select City</option>'+obj);
			 
			 $.post("<?php echo base_url();?>en/myaccount/access_number/get_detail/"+$('#country_access').val(),{},
			  function(obj){
				$('#data-result').html('<h3>Access Number</h3><h3>State</h3><h3>City</h3>'+obj);
			  });
		 }
		 
		   		
	 });
	
});

$('#city_access').change(function() {
	$.post("<?php echo base_url();?>en/myaccount/access_number/get_city/"+$('#country_access').val()+"/"+$('#city_access').val(),
	{},
	function(obj){
		  $('#data-result').html(obj);
		});
	
});

$('#city_access2').change(function() {
	$.post("<?php echo base_url();?>en/myaccount/access_number/get_city2/"+$('#country_access').val()+"/"+$('#city_access2').val(),
	{},
	function(obj){
		//alert(obj);
		  $('#data-result').html(obj);
		});
	
});

$('#state_access').change(function() {
	$.post("<?php echo base_url();?>en/myaccount/access_number/get_state/"+$('#country_access').val()+"/"+$('#state_access').val(),
	{},
	function(obj){
		
		  $.post("<?php echo base_url();?>en/myaccount/access_number/get_city_by_state/"+$('#country_access').val()+"/"+$('#state_access').val(),
			{},
			function(obj){
				  
				  $('#city_access2').html('<option value="">Select City</option>'+obj);
		  });
		  
		  $('#data-result').html(obj);
		});
	
});

$( ".leftmyaccount" ).css({height: "980px" });
</script>

<style type="text/css">
.accessntxt h3
{
    width: 230px !important;
}
.accessntxt 
{
width:896px !important;
}

</style>

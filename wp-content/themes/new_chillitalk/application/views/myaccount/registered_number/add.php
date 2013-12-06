<!--  right content-->
            <div class="rightcunt">
                <h1>
                    Registered Numbers</h1>
                <h3>
                    Register a Number</h3>
                <div class="regspg">
                <form name="frm" id="frm" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/registered_number/add/">
                    <div>
                    	
                        <label>
                            Country</label>
                        <br />
                        <br />
                        <select name="country" class="bold">
                            <option><?php echo $this->session->userdata('country_name_web'); ?>(+<?php echo $this->session->userdata('prefix_phone_web'); ?>)</option>
                        </select>
                    </div>
                      <div>
                        <label>
                         </label>
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>

                         <div>
                        <label>
                           Description</label>
                        <br />
                        <br />
                        <input type="text" name="nickname" required placeholder="Name this Number..." />
                    </div>
                        <div>
                        <label>
                           Number</label>
                        <br />
                        <br />
                            <input type="text" name="number" required class="bold" placeholder="+<?php echo $this->session->userdata('prefix_phone_web'); ?>" />
                    </div>
                    
                </div>
                  <div class="login">
                        <button type="submit">Save Number</button>
                    </div>
                    </form>
                <hr />
                <div class="rightcunt">
                    <h3>
                        Manage Registered Numbers</h3>
                   <!-- <div class="rightlink">
                        <a href="" class="underline">View all</a>  <a href="" class="underline">Print all</a>
                    </div>-->
                    <table class="table table-striped table-bordered table-hover" id="registered">
                    <thead>
                      <tr>
                          <th>Description</th>
                          <th>Country</th>
                          <th>Number</th>
                          <th>Options</th>
                      </tr>
                   	</thead>
                    <tbody>
                      
                      <?php foreach($result as $val) { ?>
                      
                      <tr class="records">
                          <td class="row_nickname"><?php echo $val->NickName; ?></td>
                          <input type="hidden" name="hidden_name" class="row_hidden_name"  value="<?php echo $val->NickName; ?>" />
                          <td class="row_country"><?php echo $val->Country; ?></td>
                          <td class="row_number"><?php echo $val->Cli; ?></td>
                          <input type="hidden" name="hidden_number" class="row_hidden_number" value="<?php echo $val->Cli; ?>" />
                          
                          <td class="row_options"><a href="#" class="underline row_edit">Edit</a> / 
                            <a href="<?php echo base_url(); ?>myaccount/registered_number/delete/<?php echo $val->Cli; ?>" onclick="return confirm('Are you sure you want to remove the number?')" class="underline row_delete">Delete</a>
                            <a href="#" class="underline row_cancel" style="display:none">cancel</a>
                            </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    
                    </table>
                    
                  
                    
                    <div class="login">
                        <a href="<?php echo base_url(); ?>myaccount/registered_number/add/" title="Add Number">
                        	Add Number
                        </a>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <a class="toplink" style="display: block;"></a>
        <!--footer section  start here-->
    </div>
<script type="text/javascript">
		$(document).ready(function() {
			
			$('.row_cancel').live('click', function(e) {
				
				if(e.type == 'click') {
					$(this).parents('.records').find('.row_nickname').text($(this).parents('.records').
					find('.row_hidden_name').val());
					
					$(this).parents('.records').find('.row_country').text($(this).parents('.records').
					find('.row_country').find('.input_country').val());
					
					$(this).parents('.records').find('.row_number').text($(this).parents('.records').
					find('.row_hidden_number').val());
					
					
					
					$(this).parents('.records').find('.row_edit').
					html('<a href="#" class="underline row_edit">Edit</a>');
					
					$(this).parents('.records').find('.row_delete').show();
					$(this).parents('.records').find('.row_cancel').hide();
				}
			});
			
            $('.row_edit').live('click', function(ev) {
				if (ev.type == 'click') {	
					$(this).parents('.records').find('.row_nickname').
					html('<input style="width:120px" class="input_nickname" type="text" value="'+$(this).parents('.records').find('.row_hidden_name').val()+'" />');
					$(this).parents('.records').find('.row_country').
					html('<select name="country" style="width:150px" class="input_country"><option value="'+$(this).parents('.records').find('.row_country').text()+'">'+$(this).parents('.records').find('.row_country').text()+'</option></select>');
					$(this).parents('.records').find('.row_number').
					html('<input type="text" class="input_number" style="width:120px" value="'+$(this).parents('.records').find('.row_hidden_number').val()+'" />');
					
					$(this).parents('.records').find('.row_edit').
					html('<a href="<?php echo base_url(); ?>myaccount/registered_number/update/'+$(this).parents('.records').find('.row_hidden_number').val()+'/'+$(this).parents('.records').find('.row_nickname').val()+'/'+$(this).parents('.records').find('.input_number').val()+'" class="underline">update</a>');
					
					$(this).parents('.records').find('.row_delete').hide();
					$(this).parents('.records').find('.row_cancel').show();
					$('.input_nickname').focus();
				}
				
			});
			
			$('.input_nickname').live('keyup', function(e) {
				if(e.type == 'keyup') {
					$(this).parents('.records').find('.row_edit').
					html('<a href="<?php echo base_url(); ?>myaccount/registered_number/update/'+$(this).parents('.records').find('.row_hidden_number').val()+'/'+$(this).parents('.records').find('.input_nickname').val()+'/'+$(this).parents('.records').find('.input_number').val()+'" class="underline">update</a>');
					
				}
			});
			
			$('.input_number').live('keyup', function(e) {
				if(e.type == 'keyup') {
					$(this).parents('.records').find('.row_edit').
					html('<a href="<?php echo base_url(); ?>myaccount/registered_number/update/'+$(this).parents('.records').find('.row_hidden_number').val()+'/'+$(this).parents('.records').find('.input_nickname').val()+'/'+$(this).parents('.records').find('.input_number').val()+'" class="underline">update</a>');
					
				}
			});
			
			
        });
	</script>
      <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "990px" });
</script>
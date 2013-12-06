<div class="span8">
    	<div class="title-grey">
        <?php echo $title; ?>
        </div>
        
        <div class="isi">
        
        <?php if(validation_errors()) { ?>
        	<div class="alert alert-danger">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
        
        <?php if($this->session->flashdata('success')) { ?>
        	<div class="alert alert-success">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        
        <form name="frmemail" id="frmemail" action="<?php echo base_url(); ?>myaccount/change_email" method="post" autocomplete="off">
        <table class="table table-hover">
        <tr>
        	<th>Current Email Address</th>
            <td>:</td>
            <td><input type="email" name="current_email_address" id="current_email_address" required /></td>
        </tr>
        <tr>
        	<th>New Email Address</th>
            <td>:</td>
            <td><input type="email" name="new_email_address" id="new_email_address" required /></td>
        </tr>
        <tr>
        	<th>Confirm Email Address</th>
            <td>:</td>
            <td><input type="email" name="confirm_email_address" id="confirm_email_address" required /></td>
        </tr>
 
        </table>
        
       
        <p align="right">
<!--        <a href="<?php echo base_url(); ?>myaccount" class="btn btn-inverse"><i class="icon-mail-reply"></i> Back</a>
-->        <button type="submit" name="submit" id="submit" class="btn btn-danger"><i class="icon-save"></i> Save</button>
        </p>
        </form>
        
        <div class="clear"></div>
   </div>
   
   <div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo get_template_directory_uri(); ?>/img/spinner.gif" alt="Loading"/>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#submit').click(function() {
		if($('#current_email_address').val() != "" && $('#new_email_address').val() != "" && $('#confirm_email_address').val() != "") {
			$('#spinner').show();
		}
    });
});
</script>
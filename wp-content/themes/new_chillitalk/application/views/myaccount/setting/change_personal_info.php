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
        
        <form name="edit_personal_info" id="edit_personal_info" method="post" autocomplete="off"
        action="<?php echo base_url(); ?>myaccount/change_personal_info/" >
        <table class="table table-hover">
        <tr>
        	<th>Title</th>
            <td>:</td>
            <td>
            	<select name="title" id="title" required class="input-small">
                	<?php if($row->Title == 'Mr.') { ?>
                        <option value="Mr." selected="selected">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                    <?php }elseif($row->Title == 'Mrs.'){ ?>
                    	<option value="Mr.">Mr.</option>
                        <option value="Mrs." selected="selected">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                    <?php }else{ ?>
                     	<option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms." selected="selected">Ms.</option>
                    <?php } ?>
                	
                </select>
            </td>
        </tr>
        <tr>
        	<th>First Name</th>
            <td>:</td>
            <td><input type="text" name="first_name" id="first_name" required value="<?php echo $row->FirstName; ?>"/></td>
        </tr>
        <tr>
        	<th>Surname</th>
            <td>:</td>
            <td>
            <input type="text" name="surname" id="surname" required value="<?php echo $row->Surname; ?>"/>
            </td>
        </tr>
        
        <tr>
        	<th>House / Flat no.</th>
            <td>:</td>
            <td>
            <input type="text" name="addr1" id="addr1" required value="<?php echo $row->Addr1; ?>" />
            </td>
        </tr>
        <tr>
        	<th>Street</th>
            <td>:</td>
            <td>
            <input type="text" name="addr2" id="addr2" required value="<?php echo $row->Addr2; ?>"/>
            </td>
        </tr>
        <tr>
        	<th>Town</th>
            <td>:</td>
            <td>
            <input type="text" name="city" id="city" required value="<?php echo $row->City; ?>"/>
            </td>
        </tr>
        <tr>
        	<th>Postcode</th>
            <td>:</td>
            <td>
            <input type="text" name="postcode" id="postcode" value="<?php echo $row->PostCode; ?>" required class="input-small" />
            </td>
        </tr>
        <tr>
        	<th>Country</th>
            <td>:</td>
            <td>
            <select name="country" id="country">
            	<option value="<?php echo $row->Country; ?>"><?php echo $row->Country; ?></option>
            </select>
            </td>
        </tr>
        </table>
        
       
        <p align="right">
        <a href="<?php echo base_url(); ?>myaccount/personal_info/" class="btn btn-inverse"><i class="icon-mail-reply"></i> Back</a>
        <button type="submit" name="submit" id="submit" class="btn btn-danger"><i class="icon-save"></i> Save</button>
        </p>
        
        </form>
        
   </div>
   
   <div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo get_template_directory_uri(); ?>/img/spinner.gif" alt="Loading"/>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#submit').click(function() {
		if($('#title').val() != "" && $('#firstname').val() != "" && $('#surname').val() != "" && $('#addr1').val() != "" &&
		$('#addr2').val() != "" && $('#city').val() != "" && $('#postcode').val() != "" && $('#country').val() != "") {
			$('#spinner').show();
		}
    });
});
</script>
  
<div class="span8">
    	<div class="title-grey">
        Your Details
        </div>
        
        <div class="isi">
        
        <?php if($this->session->flashdata('success')) { ?>
        	<div class="alert alert-success">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        
        <table class="table table-hover">
        <tr>
        	<th>Title</th>
            <td>:</td>
            <td><?php echo $row->Title; ?></td>
        </tr>
        <tr>
        	<th>First Name</th>
            <td>:</td>
            <td><?php echo $row->FirstName; ?></td>
        </tr>
        <tr>
        	<th>Surname</th>
            <td>:</td>
            <td><?php echo $row->Surname; ?></td>
        </tr>
        
        <tr>
        	<th>House / Flat no.</th>
            <td>:</td>
            <td><?php echo $row->Addr1; ?></td>
        </tr>
        <tr>
        	<th>Street</th>
            <td>:</td>
            <td><?php echo $row->Addr2; ?></td>
        </tr>
        <tr>
        	<th>Town</th>
            <td>:</td>
            <td><?php echo $row->City; ?></td>
        </tr>
        <tr>
        	<th>Postcode</th>
            <td>:</td>
            <td><?php echo $row->PostCode; ?></td>
        </tr>
        <tr>
        	<th>Country</th>
            <td>:</td>
            <td><?php echo $row->Country; ?></td>
        </tr>
        </table>
        
       
        <p align="right">
<!--        <a href="<?php echo base_url(); ?>myaccount" class="btn btn-inverse"><i class="icon-mail-reply"></i> Back</a>
-->        <a href="<?php echo base_url(); ?>myaccount/change_personal_info/" class="btn btn-danger"><i class="icon-edit"></i> Edit</a>
        </p>
        
        
        
   </div>
   
   <br/ >
    	<div class="title-grey">
        Email
        </div>
        
        <div class="isi">
        
        <table class="table table-hover">
        <tr>
        	<th>Email</th>
            <td>:</td>
            <td><?php echo $row->Email; ?></td>
        </tr>
 
        </table>
        
       
        <p align="right">
<!--        <a href="<?php echo base_url(); ?>myaccount" class="btn btn-inverse"><i class="icon-mail-reply"></i> Back</a>
-->        <a href="<?php echo base_url(); ?>myaccount/change_email/" class="btn btn-danger"><i class="icon-edit"></i> Edit</a>
        </p>
        
        
        <div class="clear"></div>
   </div>
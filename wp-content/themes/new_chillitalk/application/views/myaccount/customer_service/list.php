<!--  right content-->
<div class="rightcunt">                 
<h1  class="rightcunt2">
Contact Customer Service </h1>


<p class="rightcunt2" style="width:780px;">

 
If you have problems or difficulties, visit our FAQs page
<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/" class='ttxtblue'>
HERE</a>. <br><br>
If you still cannot find what you are looking of for, please send us a message in the box below.<br/><br>
•	Select the subject of your problem<br/><br/>
•	Describe the problem<br/><br/>
•	Submit your enquiry<br/>



<br/><br/>
</p>

<?php if($this->session->flashdata('success_send')) { ?>
<div class="clearfix"></div>
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('success_send'); ?>.
</div>

<?php } ?>
<br/><br/><br/><br/>
<form name="frmcs" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/customer_service/">
<b  class="leftcom">Subject: &nbsp;&nbsp;&nbsp;</b>

<select class="leftcom" name="subject">
<option value="My Account">My Account</option>
<option value="Top Up">Top Up</option>
<option value="Call Quality">Call Quality</option>
<option value="Mobile Apps">Mobile Apps</option>
<option value="Other">Other</option>
</select>
<br/><br/><br/><br/>
<textarea class="textard" name="problem" placeholder="Tell us your problem" required></textarea>

<div class="login">
            <button type="submit" class="list-group-item" id="blur" >Submit</button>
        </div>
       </form>
        
        
        
      
        
        
        
        
        
        </div>  
         
         
        </div>   </div>  
         
         
 

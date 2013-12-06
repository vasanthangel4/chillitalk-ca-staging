<div class="maincomon suprt">
<section>
       <ul class="nav1">
       <li class="highactive"><a title="contact" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang');?>/support/">Contact Us  </a></li>
        <li><a title="Joining Chillitalk" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/joining_chillitalk">Getting Started</a> </li>
          <li><a title="The App" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/The_App">Using the App</a></li>
                 <li><a title="Local Numbers" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/Using_chillitalk">Using Local Numbers</a></li>
         <li><a title="Access Numbers" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/why_chillitalk">Using Access Numbers</a></li>
             <li><a title="Topping up" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/topping_up">Topping-Up</a></li>
                       <li><a title="Chillitalk Rates" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/chillitalk_rates">Chillitalk Rates</a></li>
        <li><a title="Troubleshooting" href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/Troubleshooting">Troubleshooting</a></li>
      
         </ul>
</section>     
<section> 
<?php echo lang('contact.txtcomon'); ?>
    </section>    
       <section> 
        <!--   <?php echo lang('contact.txtcomon1'); ?>-->
        <h3>Email our Customer Service</h3>
        
        <?php if($this->session->flashdata('success_send')) { ?>
        	<div class="alert alert-success">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
            	<?php echo $this->session->flashdata('success_send'); ?>
            </div>
        
        <?php } ?>
        <?php if(validation_errors()) { ?>
        	<div class="alert alert-danger">
            	<button type="button" class="close" data-dismiss="alert">&times;</button>
            	<?php echo validation_errors(); ?>
            </div>
        
        <?php } ?>
        <form name="frmcontact" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support">
        
        <div>
            <label>Existing Chillitalk Customer </label>  
            <span class="suprstrte">Yes <input type="radio" name="existing" value="true" id="existing_0" required="required" style="margin-left:15px" /></span> 
            <span class="suprstrte">No <input type="radio" name="existing" value="false" id="existing_1" required="required" style="margin-left:15px" /></span>
        </div>
          
         <div>
         	<input type="text" placeholder="First Name" name="first_name" required="required"/> 
         </div>
         
         <div>
       		<input type="text" placeholder="Last Name" name="last_name" required="required" /> 
         </div>
         
         <div>
      		<input type="email" placeholder="Email" name="email_address"/> 
         </div>
         
         <div>
         	<input type="text" placeholder="Chillitalk/Contact Number" name="contact_number" required="required" /> 
         </div>
              
         <div>
 			<input type="text" placeholder="Subject" name="subject" required="required" /> 
         </div>
         
         <div>
         	<textarea placeholder="Message" name="message" required="required"></textarea>
         </div>
            
         <div>
			<button class="loginimg contxtr" type="submit"><?php echo lang('contact.submit'); ?> </button>
         </div>
         </form>
            <p> We will get back to you within 24 hours </p>
         
    </section>    
    
    
    
    
    
    
    </div>  
    
    
    
    
    </div>


	  <!--footer section  start here-->
      
   
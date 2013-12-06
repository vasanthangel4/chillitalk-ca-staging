<div class="rightcunt">

  <!--<div id="footer">
  
      <div id="nav">
          <ul><a href="#">Invite your friends </a></ul>
          <ul><a href="#">Follow Up</a></ul>
      </div>
  </div>-->
  
  
  <!--<div class="parent">-->
  
  <div class="a"> 
      <!--<div class="buuts">Invite your friends</div>-->
     
      <h1 class="rightcunt2">Spread Chillitalk and earn FREE credit!</h1>
      <p class="rightcunt2">
          
        Bring a friend to Chillitalk and earn  $4 each time. Invite friends to <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/support/joining_chillitalk" class='ttxtblue'>join 
        Chillitalk</a> or using the Chillitalk App <br/>and we will send them an email on your behalf to 
        join Chillitalk. Once they join and top-up<br/> their account, you will 
        receive a $4 credit bonus. You can do this as many times as you like. 
        
        <br/>  <br/>
     
     
      •	Invite your friends to join Chillitalk HERE   <br/>  <br/>
•	Your friend joins Chillitalk using your REFERRAL CODE, gets a top-up and makes a call   <br/>  <br/>
•	You earn FREE credit

     </p>
       
       
      <h3 class="rightcunt2">Invite Friends By Entering Their Email Address</h3>
      <p class="rightcunt2">
        Separate addresses with comma
      </p>
      
      <?php if(validation_errors()) { ?>
      	<div class="clearfix"></div>
      	<div class="rightcunt2">
        
        
        <div class="alert alert-error">
        	<button type="button" class="close" data-dismiss="alert">&times;</button>
        	<?php echo validation_errors(); ?>.
        </div>
        </div>
      <?php } ?>
      
      <?php if($this->session->flashdata('failed_invite')) { ?>
      	<div class="clearfix"></div>
      	<div class="rightcunt2">
        
        
        <div class="alert alert-error">
        	<button type="button" class="close" data-dismiss="alert">&times;</button>
        	<?php echo $this->session->flashdata('failed_invite'); ?>.
        </div>
        </div>
      <?php } ?>
      
      <form name="frminvite" id="frminvite" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/invite_friends">
          <textarea class="textard" name="invite" required="required" placeholder=" Invite your friends by entering their email. Separate each name with a comma like this: j.ran@gmail.com,p.rhani@hotmail.co.uk,johnsmith@btworld.com"></textarea>
          
          <div class="login">
            <button type="submit" class="list-group-item" id="blur" >Compose Invite</button>
          </div>
      </form>
  <!--</div>  -->
  
  
  <!--<div class="b"> 
  <div class="buuts">Follow Up </div>
  
  <h1  class="rightcunt2">
  Share Chillitalk and Get  £4 Free Credit!</h1>
  <p class="rightcunt2">
  <br/>
  <strong>
  Remember, your friend has to sign up  using your referral code, then make a payment, in order<br/> for you to recieve a bonus!
  </strong>
  </p>
  
  <h3 class="rightcunt">
  Your Tell Friends Bonus
  </h3>
  
  <p class="rightcunt2">
  <strong>
  Bonus earned: 0 
  </strong>
  <br/><br/>
  </p>
  <div class="rightcunt txtscllo">
  <a href="#">Select all</a> | <a href="#">Select none</a>
  </div>        
  
  <div class="rightcunt">
  <div role="grid" class="dataTables_wrapper form-inline" id="chargeHistoryTable_wrapper"><table cellspacing="0" cellpadding="0" border="0" id="chargeHistoryTable" class="table table-striped table-bordered dataTable" aria-describedby="chargeHistoryTable_info">
  <thead>
      <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="chargeHistoryTable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="
              Order ID
          : activate to sort column descending">
             Email
          </th><th class="sorting" role="columnheader" tabindex="0" aria-controls="chargeHistoryTable" rowspan="1" colspan="1" style="width: 200px;" aria-label="
              Card Number
          : activate to sort column ascending">
              Last Updated
          </th><th class="sorting" role="columnheader" tabindex="0" aria-controls="chargeHistoryTable" rowspan="1" colspan="1" style="width: 200px;" aria-label="
              Status
          : activate to sort column ascending">
              Status
          </th>
          
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="chargeHistoryTable" rowspan="1" colspan="1" style="width: 200px;" aria-label="
              Status
          : activate to sort column ascending">&nbsp;
          
          </th>
          
          </tr>
  </thead>
  
 
  
  
  
  <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd gradeX">
   <?php foreach($result_list->List as $val) { ?>
        <tr>  
            <td class="  sorting_1">
              <?php echo $val->invitee; ?></td>
            <td class=" ">
               <?php echo strftime('%d/%m/%Y', strtotime($val->last_update_string)); ?></td>
            <td class=" ">
            <?php if($val->last_status == 'Signed Up') { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/favorites.png" />   Signed Up
              
            <?php }elseif($val->last_status == 'Invitation Sent') { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/message.png" />   Invitation Sent
            <?php }elseif($val->last_status == 'Bonus Added') { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/favorites.png" />   Bonus Added
            <?php }elseif($val->last_status == 'Bonus Declined') { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/favorites.png" />  Bonus Declined
            <?php } ?>	          
            </td>
            <td class=" "> </td>
           
        </tr>
       <?php } ?>
        </tbody>
   </table></div>	
  
  <div class="rightcunt txtscllo">
  <a href="#">Select all</a> | <a href="#">Select none</a>
  </div>  
  
  <p>
  <br/>
  <img src="<?php echo get_template_directory_uri(); ?>/img/favorites.png" />&nbsp;
  The friend you invited signed up and made a payment and you got your bonus! </p>
  
  
  
  </div>       
  -->
  
  <!--
  <tr class="odd gradeX even">
      <td class="  sorting_1">
        <input type="checkbox"   group="a" /  />  &nbsp;   canchian@outlook.com</td>
      <td class=" ">
          10/14/2013</td>
      <td class=" ">
          <img src="<?php echo get_template_directory_uri(); ?>/img/message.png" />   Invitation sent	                       </td>
      <td class=" ">
                                                      </td>
    
  </tr> 
  <tr class="odd gradeX even">
      <td class="  sorting_1">
        <input type="checkbox"   group="a" /  />  &nbsp;   canchian@vectone.com</td>
      <td class=" ">
          10/14/2013</td>
      <td class=" ">
          <img src="<?php echo get_template_directory_uri(); ?>/img/message.png" />   Invitation sent	                       </td>
      <td class=" ">
                                                      </td>
    
  </tr>
  <tr class="odd gradeX even">
      <td class="  sorting_1">
        <input type="checkbox"  group="a" />  &nbsp;  </td>
      <td class=" ">
          10/14/2013</td>
      <td class=" ">
 <img src="<?php echo get_template_directory_uri(); ?>/img/favorites.png" />                                    signed up                         </td>
      <td class=" ">
                                                      </td>
    
  </tr>
  
  -->
  
  
  </div>  
  
  
  </div>   </div>  
  
  
  </div>
  
  
  <div id="step2">
  
  </div>

</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  
  
  
  $('.parent .a').show();
  $('.parent .b').hide();
  $('#nav a').click(function() {
	  console.log($(this).index('a'));
	  var $div = $('.parent > div').eq($(this).index('#nav a'));
	  $div.show();
	  $('.parent > div').not($div).hide();
  
  });
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.colorbox({html:"<h1>Welcome</h1>"});
});
$(".leftmyaccount").css({height: "700px" });
</script>

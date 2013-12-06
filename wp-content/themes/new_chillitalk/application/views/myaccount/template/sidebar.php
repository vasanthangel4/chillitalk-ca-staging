<?php $lang = $this->session->userdata('lang'); ?> 
<div class="maincomon logincoom clearall">
<!--  menue left-->
<nav class="leftmyaccount">
    <section class="accover">
        <div>
            Available credit <span> <?php echo $this->session->userdata('currency_symbol_web'); ?>
			<?php echo round($this->session->userdata('total_bal'), 2); ?> 
            </span>
        </div>
        <div class="login">
            <a title="Chillitalk Top-Up your account" href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/top_up/">Top-Up</a>
        </div>
    </section>
    <ul class="navleft">
          <li> <a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/dashboard" title="Account Overview">Account Overview</a><ul class="childNav">
         <li><a href="/myaccount"></a>  </li>
          </ul>
        </li>
        <li><a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/local_number/" title="Local Numbers">Local Numbers</a>
        <ul class="childNav">
         <li><a href="/en/myaccount/local_number"></a>  </li>
          <li><a href="/fr/myaccount/local_number"></a>  </li>
          </ul>
        </li>
        <li><a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/registered_number/" title="Registered Numbers">Registered Numbers</a>
         <ul class="childNav">
          <li><a href="/myaccount/registered_number"></a>  </li>
          </ul>
        
        </li>
        <li> <a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/call_charge/" title="Call & Charge Histor">Call & Charge History</a>
         <ul class="childNav">
          <li><a href="/myaccount/call_charge"></a>  </li>
           
          </ul>
         </li>
           <li> <a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/home_saver_bundles" title="Home Saver Bundles">Home Saver Bundles</a>
         <ul class="childNav">
          <li><a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/home_saver_bundles"></a>  </li>
          </ul>
         </li>
         
         
               <li> <a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/access_number" title="Access Numbers">Access Numbers</a>
         <ul class="childNav">
          <li><a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/access_number"></a>  </li>
          </ul>
         </li>
      
        <li><a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/invite_friends/" title="Invite Friends ">Invite Friends </a>
         <ul class="childNav">
       <li><a href="<?php echo $lang; ?>/myaccount/invite_friends/list"></a>  </li>
 
          </ul>
      </li>
      
 <li><a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/customer_service"> Customer Service</a>  </li>
      <li><a href="<?php echo base_url(); ?><?php echo $lang; ?>/myaccount/setting/" title="Settings">Settings </a>
         <ul class="childNav">
       <li><a href="myaccount/setting/"></a>  </li>
          </ul>
    </ul>
    <p class="clearall">
        &nbsp;&nbsp;</p>
    <section class="accover">
      <div>
           Country<br/>
            <p>
               <?php echo $this->config->item('country_name_web'); ?>
            </p>
        </div>
          
        <div>
            Access Number<br/>
            <p>
               <!-- <?php echo $this->session->userdata('access_no'); ?>-->
                02071799999
                
            </p>
        </div>
        <div>
            PIN Code<br />
            <p>
                <?php echo $this->session->userdata('account_id'); ?><?php echo $this->session->userdata('sec_id'); ?>
            </p>
        </div>
        
    </section>
</nav>

<!--  right content-->

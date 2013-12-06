
<div class="rightcunt">
                <h1>
                    Payment Details</h1>
                <h3>
                Purchase Summary
                  </h3>
                    
                                
                                    <table class="table1">
                                    <tbody>
                                    
                        <tr height="10px">
                        	<th></th>
                            <td></td>
                        </tr>            
                                    
                    	<tr>
                        	<th>Destnation number : </th>
                            <td><?php echo $this->session->userdata('destination_number'); ?></td>
                        </tr>
                    

                        <tr>
                        	<th>Main Number: </th>
                            <td><?php echo $this->session->userdata('main_number'); ?></td>
                        </tr>
                        <tr>
                        	<th>Account Number1 :</th>
                            <td><?php echo $this->session->userdata('add_number1'); ?></td>
                        </tr>
                          <tr>
                        	<th>Account Number2 :</th>
                            <td><?php echo $this->session->userdata('add_number2'); ?></td>
                        </tr>
                          <tr>
                        	<th>Account Number3 :</th>
                            <td><?php echo $this->session->userdata('add_number3'); ?></td>
                        </tr>
                          <tr>
                        	<th>Home Saver:</th>
                            <td> <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('home_saver'); ?></td>
                        </tr>
                        <tr>
                        	<th>Additional Numbers:</th>
                            <td><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('add_number'); ?></td>
                        </tr>
                              <tr>
                        	<th>Promo code Discount:</th>
                            <td><?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('promo_code_discount'); ?></td>
                        </tr>
                           <tr>
                        	<th>Total </th>
                            <td> <?php echo $this->session->userdata('currency_symbol_web'); ?> <?php echo $this->session->userdata('total'); ?></td>
                        </tr>
                             <tr height="10px">
                        	<th></th>
                            <td></td>
                        </tr>  
                        </tbody>
                    </table>
                                 <div class="cssaver1 leftcom">
                                <div class="signupimg back leftcom" style=" margin-left:28px !important;">        
            <a  class="leftcom" href=""> 
                      
                        </a> </div>
                        <form name="frm-credit" method="post" action="<?php echo base_url(); ?>myaccount/home_saver_bundles/credit">
                        <input type="hidden" name="total" value="<?php echo $this->session->userdata('total'); ?>" />
                         <div class="login">
                            <button title="Pay with credit" type="submit">Purchase</button>
                        </div>
                        </form>
    </div>    </div>
    </div>
      <script type="text/javascript">
$( ".leftmyaccount" ).css({ height: "760px" });
</script>
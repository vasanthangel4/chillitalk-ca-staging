<form id="form3DSecure1" method="post" action="<?php echo $this->session->userdata('acs_url_card1'); ?>">
    <input type="hidden" name="PaReq" id="PaReq" value="<?php echo $this->session->userdata('pareq_card1'); ?>" />
    <input type="hidden" name="TermUrl" id="TermUrl" value="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/process_credit_card_alone" />
    <input type="hidden" name="MD" id="MD" value="<?php echo $this->session->userdata('ref_code_card1'); ?>" />
    <input type="submit" id="formButton" style="visibility:hidden" />
</form>


<script language="javascript">
     document.getElementById("formButton").click();
</script>

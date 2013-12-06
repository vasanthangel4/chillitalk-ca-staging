<form id="form3DSecures" method="post" action="<?php echo $this->session->userdata('acs_url_saver'); ?>">
    <input type="hidden" name="PaReq" id="PaReq" value="<?php echo $this->session->userdata('pareq_saver'); ?>" />
    <input type="hidden" name="TermUrl" id="TermUrl" value="<?php echo base_url(); ?>myaccount/home_saver_bundles/process_credit_card" />
    <input type="hidden" name="MD" id="MD" value="<?php echo $this->session->userdata('ref_code_saver'); ?>" />
    <input type="submit" id="formButton" style="visibility:hidden" />
</form>


<script language="javascript">
     document.getElementById("formButton").click();
</script>

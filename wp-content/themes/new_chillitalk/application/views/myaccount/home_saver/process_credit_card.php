<form id="form_process_credit_card" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/top_up/process_credit_card">
    
    <input type="hidden" name="ref_code" id="ref_code" value="<?php echo $this->session->userdata('ref_code'); ?>" />
    <input type="submit" id="formButton" style="visibility:hidden" />
</form>


<script language="javascript">
     document.getElementById("formButton").click();
</script>

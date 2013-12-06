<form id="form_process" method="post" action="<?php echo base_url(); ?><?php echo $this->session->userdata('lang'); ?>/myaccount/invite_friends/process_step2">
    
    <input type="hidden" name="ref_code" id="ref_code" value="<?php echo $this->session->userdata('ref_code'); ?>" />
    <input type="submit" id="formButton" style="visibility:hidden" />
</form>

<script language="javascript">
     document.getElementById("formButton").click();
</script>

<script>
function xyz_em_verify_fields(){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var address = document.subscription.xyz_em_email.value;
    if(reg.test(address) == false) {
        alert('<?php _e( 'Please check whether the email is correct.', 'newsletter-manager' ); ?>');
        return false;
    }else{
        //document.subscription.submit();
        return true;
    }
}
</script>
<style>
#tdTop{
	border-top:none;
}
</style>
<form method="POST" name="subscription" action="<?php echo get_site_url()."/index.php?wp_nlm=subscription";?>">
    <h2><?php echo esc_html(get_option('xyz_em_widgetName'))?></h2>
    <p>Sign up to our newsletter and receive regular updates and articles directly to your inbox!  </p>
    <input type="text" class="form-control input_text" id="exampleInputName3" placeholder="Your E-mail Address here" name="xyz_em_email">
    <input name="htmlSubmit" id="submit_em" class="button_sub" type="submit" value="<?php _e( 'Subscribe', 'newsletter-manager' ); ?>" onclick="javascript: if(!xyz_em_verify_fields()) return false; "  />
</form>

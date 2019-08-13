<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" class="login100-form validate-form" id="login_form_id">
					<span class="login100-form-logo">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="someone@domain.com">
						<span class="focus-input100"></span>
					</div>

				<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="password">
						<span class="focus-input100"></span>
					</div>


						<div class="Troubles">
							<p class="click"> Troubles logging in? <a href="#">Click here</a></p>
						</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="login-btn">
							Login
						</button>
					</div>
					<span id="error_msg"></span>
					<div class="text-center p-t-90">
				
					<p>By clicking the Login button you agree
					to the  <a href="#" class="footer-links">terms and condition</a> and are the 
					age of 18or older. <a href="#" class="footer-link"> Forget password</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<script type="text/javascript">
    $(document).ready(function(){
    	$("#login-btn").click(function(e){
    		e.preventDefault();
			var url = '<?php echo base_url(); ?>';
			var reg = $('#login_form_id').serialize();
			$.ajax({
				type: 'POST',
				data: reg,
				dataType: 'json',
				url: url + 'user/ajaxLogin',
				success: function($resp2){
					if($resp2.error == true){
						$("#error_msg").html($resp2.messsage);
					}else if($resp2.error == false){
						$("#error_msg").html($resp2.messsage);
						setTimeout(function(){ window.location.href = "<?=base_url();?>home"; }, 2000);
					}else{
						$("#error_msg").hide();
					}
				}
			});
        });
    });
</script>    
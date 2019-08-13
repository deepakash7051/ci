<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="limiter">
		<div class="container-login100">
			<div class="login100-more"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form method="post" class="login100-form validate-form" id="regForm">
					<span class="login100-form-title p-b-59">
						REGISTER
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="John Doe">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="someone@domin.com">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="iamawesome">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="password here">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="repeatpass" placeholder="same password here">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="signup-btn">
						Resgister
							</button>
							<span id="error_msg"></span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<script type="text/javascript">
$(document).ready(function(){
		$("#signup-btn").click(function(e){
			e.preventDefault();
			var url = '<?php echo base_url(); ?>';
			var reg = $('#regForm').serialize();
			$.ajax({
				type: 'POST',
				data: reg,
				dataType: 'json',
				url: url + 'user/ajaxSignup',
				success: function($resp2){
					if($resp2.error==true){
						$("#error_msg").text($resp2.message);
	                   }else if( $resp2.error==false ){
	                	   $("#error_msg").text($resp2.message);
	                	   setTimeout(function(){ window.location.href = "<?=base_url();?>login"; }, 2000);
		               }
					$resp = JSON.stringify($resp2);
					$data = JSON.parse($resp);
                   	$("#error_msg").html($data.messsage);
                   	$("#error_msg").find("p").hide();
                   if($data.messsage){
                	   $("#error_msg").find("p:first-child").show();
                    }else{
                       $("#error_msg").find("p:first-child").hide();
                   }
				}		
			});
		});
	});	
</script>
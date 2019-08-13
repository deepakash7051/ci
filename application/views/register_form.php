<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Ajax Signup with Validation</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.0.min.js"></script>
	
</head>
<body>
<div class="container">
	<h1 class="page-header text-center"></h1>
	<div class="row">
		<div class="col-sm-4">
			<div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Register
		            </h3>
		        </div>
		    	<div class="panel-body">
		        	<form id="regForm" method="post">
		            	<fieldset>
		            		<div class="form-group">
		                    	<input class="form-control" placeholder="Full Name" type="text" name="name">
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Email" type="text" name="email">
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Profile Name" type="text" name="username">
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Password" type="password" name="password">
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Confirm Password" type="password" name="confPass">
		                	</div>
		                	<button type="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button>
		            	</fieldset>
		        	</form>
		    	</div>
		    </div>
		    <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
				<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
				<span id="message"></span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
 
		$('#regForm').submit(function(e){
			e.preventDefault();
			var url = '<?php echo base_url(); ?>';
			var reg = $('#regForm').serialize();
			$.ajax({
				type: 'POST',
				data: reg,
				dataType: 'json',
				url: url + 'user/register',
				success:function(response){
					$('#message').html(response.message);
					if(response.error){
						$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
					}
					else{
						$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
						$('#regForm')[0].reset();
					}
				}
			});
		});
 
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
 
	});
</script>
</body>
</html>
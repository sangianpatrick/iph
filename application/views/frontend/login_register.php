<?php $this->load->view('frontend/head');?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form id="login_form">
							<input type="email" id="login_email" name="login_email" placeholder="Email Address" required/>
							<input type="password" id="login_password" name="login_password" placeholder="Password" required/>
						</form>
						<button class="btn btn-primary" onclick="login();">Login</button>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form id="registration_form">
							<input type="text" id="full_name" name="fullname" placeholder="Full Name" required/>
							<input type="email" id="email_address" name="email_address" placeholder="Email Address" required/>
							<input type="password" id="password" name="password" placeholder="Password" required/>
							<input type="number" id="phone_number" name="phone_number" placeholder="Phone Number" required/>
							<input type="number" id="postal_code" name="postal_code" placeholder="Postal Code" required/>
							<input type="text" id="address" name="address" placeholder="Address" required/>
						</form>
						<button class="btn btn-primary" onclick="register();">Signup</button>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<?php $this->load->view('frontend/foot');?>

<script type="text/javascript">
	function register(){
		$.ajax({
            url : "<?php echo site_url('customer/registration_process')?>",
            type: "POST",
            data: $('#registration_form').serialize(),
            dataType: 'json',
                success:function(data){
                    if(data.status){
                    	$('#registration_form')[0].reset();
                    	alert('Thank you for being a member of our site. Please, log in for looking our awesome product.');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown){
                	alert('error');
                }
        });
	}

	function login(){
		if ($('#login_form > #login_email').val()==''&&$('#login_form > #login_password').val()=='') {
			alert("You must complete the login form");
		}else{
			$.ajax({
            url : "<?php echo site_url('customer/login_process')?>",
            type: "POST",
            data: $('#login_form').serialize(),
            dataType: 'json',
                success:function(data){
                    if(data['c_log_stts']=='1'){
                    	window.location.href = "<?php echo base_url();?>";
                    }else if(data['c_log_stts']=='0'){
                    	$('#login_form')[0].reset();
                    	alert("Wrong email or password. Please, try again.");
                    }else{
                    	$('#login_form')[0].reset();
                    	alert("Undefine Access");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown){
                	alert('error');
                }
        		});
		};
	}
</script>

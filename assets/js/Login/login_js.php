<script type="text/javascript">
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-signin-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					},
					user_type: {
						validators: {
							notEmpty: {
								message: 'User Type is required'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        $('#kt_login_signin_submit').on('click', function (e) {
        	e.preventDefault();
            validation.validate().then(function(status) {
            	if(status == 'Valid'){
		           var email = $('input[type=email]').val();
		            var password = $('input[type=password]').val();
		            var user_type = $('#user_type').val();
		            $.ajax({
		            	url: "Login_Controller/select_data",
		            	type: 'POST',
		            	dataType: 'json',
		            	data: {email:email,password:password,user_type:user_type},
		            	success: function(response) {
		            		if (response.success) {
			                    Swal.fire({
					               	text: response.message,
					               	icon: "success",
					               	showConfirmButton: false,
					               	timer: 3000
					         	});
					         	setTimeout(
					         	  function() 
					         	  {
					         	    window.location.href = "dashboard";                            
					         	  }, 1000);
		            		}
		            		else{
		            			Swal.fire({
					               	text: response.message,
					               	icon: "error",
					               	showConfirmButton: false,
					               	timer: 3000
					         	});
		            		}
		            	}
		            });
		        }
            });            
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});
</script>
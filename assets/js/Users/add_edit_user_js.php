<script type="text/javascript">
var add_edit_user_form;
var User = function () {
	// Private functions
	var addEditUser = function() {
		add_edit_user_form = FormValidation.formValidation(
			document.getElementById('add_edit_user_form'),
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					},

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
					},

					flat_no: {
						validators: {
							notEmpty: {
								message: 'Flat No is required'
							}
						}
					},

					mobile: {
						validators: {
							notEmpty: {
								message: 'Mobile number is required'
							}
						}
					},
				},

				plugins: { //Learn more: https://formvalidation.io/guide/plugins
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap(),
					// Validate fields when clicking the Submit button
					submitbtn: new FormValidation.plugins.SubmitButton(),
					// Validate fields when clicking the Update button
					updatebtn: new FormValidation.plugins.SubmitButton()
				}
			}
		);
	};
	return {
		// public functions
		init: function() {
			addEditUser();
		}
	};
}();

jQuery(document).ready(function() {
	User.init();
	$('#submitbtn').on('click', function(e) {
		e.preventDefault();
		add_edit_user_form.validate().then(function (state) {
			if (state == "Valid") {
				var form_data = $('#add_edit_user_form').serialize();
				$.ajax({
					url: "<?php echo site_url('User_Controller/add_edit_user'); ?>",
					type: 'POST',
					dataType: 'JSON',
					data: form_data,					
					success: function (response) {
						if (response.success) {
		                    Swal.fire({
				               	text: response.message,
				               	icon: "success",
				               	showConfirmButton: false,
				               	timer: 2000
				         	});
				         	setTimeout(
				         	  function() 
				         	  {
				         	    window.location.href = "<?php echo base_url('users'); ?>";
				         	  }, 1000);
						}else{
							Swal.fire({
				               	text: response.message,
				               	icon: "error",
				               	showConfirmButton: false,
				               	timer: 2000
				         	});
						}
					}
				});
			}
		});
	});
});
</script>
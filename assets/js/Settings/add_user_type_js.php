<script type="text/javascript">
var add_user_type_form;
var UserType = function () {
	// Private functions
	var addusertype = function() {
		add_user_type_form = FormValidation.formValidation(
			document.getElementById('add_user_type_form'),
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					}
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
			addusertype();
		}
	};
}();

jQuery(document).ready(function() {
	UserType.init();
	$('#submitbtn').on('click', function(e) {
		e.preventDefault();
		add_user_type_form.validate().then(function (state) {
			if (state == "Valid") {
				var form_data = $('#add_user_type_form').serialize();
				$.ajax({
					url: "<?php echo site_url('Settings_Controller/add_edit_user_type'); ?>",
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
				         	    window.location.href = "<?php echo base_url('user-types'); ?>";
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
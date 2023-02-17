<script type="text/javascript">
var add_option_form;
var Option = function () {
	// Private functions
	var addoption = function() {
		add_option_form = FormValidation.formValidation(
			document.getElementById('add_option_form'),
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					},

					photo: {
						validators: {
							notEmpty: {
								message: 'This field is required'
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
			addoption();
		}
	};
}();

jQuery(document).ready(function() {
	Option.init();
	$('#submitbtn').on('click', function(e) {
		e.preventDefault();
		add_option_form.validate().then(function (state) {
			if (state == "Valid") {
				var form_data = $('#add_option_form').serialize();
				$.ajax({
					url: "<?php echo site_url('Option_Controller/add_edit_option'); ?>",
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
				         	    window.location.href = "<?php echo base_url('option'); ?>";
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
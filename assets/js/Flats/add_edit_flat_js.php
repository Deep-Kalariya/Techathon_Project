<script type="text/javascript">
var add_flat_form;
var Flat = function () {
	// Private functions
	var addflat = function() {
		add_flat_form = FormValidation.formValidation(
			document.getElementById('add_flat_form'),
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					},
					mobile: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							},
							emailAddress: {
								message: 'Email is not valid'
							}
						}
					},
					flat_no: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					},
					no_of_year: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					},
					no_of_person: {
						validators: {
							notEmpty: {
								message: 'This field is required'
							}
						}
					},
					owner_business: {
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
			addflat();
		}
	};
}();

jQuery(document).ready(function() {
	Flat.init();
	$('#submitbtn').on('click', function(e) {
		e.preventDefault();
		add_flat_form.validate().then(function (state) {
			if (state == "Valid") {
				var form_data = new FormData($('#add_flat_form')[0]);
				$.ajax({
					url: "<?php echo site_url('Flat_Controller/add_edit_flat'); ?>",
					type: 'POST',
					dataType: 'JSON',
					data: form_data,
					contentType: false,
					cache: false,
					processData: false,					
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
				         	    window.location.href = "<?php echo base_url('flats'); ?>";
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
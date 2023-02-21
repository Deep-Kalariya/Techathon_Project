<script type="text/javascript">
var add_visitor_form;
var Visitor = function () {
	// Private functions
	var addvisitor = function() {
		add_visitor_form = FormValidation.formValidation(
			document.getElementById('add_visitor_form'),
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
			addvisitor();
		}
	};
}();

jQuery(document).ready(function() {
	Visitor.init();
	$('#submitbtn').on('click', function(e) {
		e.preventDefault();
		add_visitor_form.validate().then(function (state) {
			if (state == "Valid") {
				var form_data = new FormData($('#add_visitor_form')[0]);
				$.ajax({
					url: "<?php echo site_url('Visitor_Controller/add_edit_visitor'); ?>",
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
				         	    window.location.href = "<?php echo base_url('visitors'); ?>";
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
<script type="text/javascript">
var table;
var Button = function() {

	var user_type_table = function() {

		// begin first table
		table = $('#List_of_UserType').DataTable({
			responsive: true,
            dom: `<'row'<'col-sm-4 text-left'f>>
            <'row'<'col-sm-12'tr>>
            <'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_pager'lp>>`,
			// buttons: [
            //     {
            //         extend: 'copyHtml5',
            //         // exportOptions: {
            //         //     columns: [1, 2, 3, 4, 5, 6, 7]
            //         // }
            //     },
            //     {
            //         extend: 'print',
            //         // exportOptions: {
            //         //     columns: [1, 2, 3, 4, 5, 6, 7]
            //         // }
            //     },
            //     {
            //         extend: 'excelHtml5',
            //         // exportOptions: {
            //         //     columns: [1, 2, 3, 4, 5, 6, 7]
            //         // }
            //     },
            //     {
            //         extend: 'csvHtml5',
            //         // exportOptions: {
            //         //     columns: [1, 2, 3, 4, 5, 6, 7]
            //         // }
            //     },
            //     {
            //         extend: 'pdfHtml5',
            //         // exportOptions: {
            //         //     columns: [1, 2, 3, 4, 5, 6, 7]
            //         // }
            //     },
			// ],  
            processing: true,
            serverSide: true,
            serverMethod: 'post',
			ajax: {
				url: "user-types/list",
			},
            columns: [
                { data: 'Id' },
                { data: 'Name' },
                { data: 'Create Date' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    width:'50px',
                    title: 'Actions',
                    render: function(data, type, full, meta){
                        var html ='<a onClick="Button.deleteUserType(' + data + ')" title="Delete User Type" class="btn btn-icon btn-sm btn-light-danger mr-2"><i class="flaticon2-trash"></i></a>';
                        // html = html + '<a title="Edit User" href="home/edit/' + data + '" class="btn btn-icon btn-sm btn-light-primary mr-2"><i class="flaticon2-edit"></i></a>';
                        return html;
                    },
                },
                {
                    targets: 1,
                    width:'50px',
                    title: 'Name',
                    orderable: true,
                    // render: function (data, type, full, meta) {
                    //     return '<a class="nav-link" href="user/details/' + full.Id + '" style="cursor: pointer;">' + data + '</a>';
                    // },
                },
                {
                    targets: 2,
                    width:'50px',
                    title: 'Create Date',
                    orderable: true,
                },
            ],
		});

	};

    var deleteUserType = function(id) {
        var id = id;
        Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this user type?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "Settings_Controller/delete_user_type",
                        type: 'POST',
                        dataType: 'JSON',
                        data: { id:id },
                        success: function (response) {
                            if (response.success == true) {
                                Swal.fire({
                                    text: response.message,
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('#List_of_UserType').DataTable().ajax.reload();
                            }
                            else{
                                Swal.fire({
                                    text: response.message,
                                    icon: "error",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });
                }
            });
    };

	return {

		//main function to initiate the module
		init: function() {
			user_type_table();
		},
        deleteUserType: function(id) {
            deleteUserType(id);  
        },
	};
}();
jQuery(document).ready(function() {
	Button.init();
});
</script>
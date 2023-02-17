<script type="text/javascript">
var table;
var Button = function() {

	var users_table = function() {

		// begin first table
		table = $('#List_of_Users').DataTable({
			responsive: true,
            dom: `<'row'<'col-sm-4 text-left'f><'col-sm-8 text-md-right text-center'B>>
            <'row'<'col-sm-12'tr>>
            <'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6 dataTables_pager'lp>>`,
			buttons: [
                {
                    extend: 'copyHtml5',
                    // exportOptions: {
                    //     columns: [1, 2, 3, 4, 5, 6, 7]
                    // }
                },
                {
                    extend: 'print',
                    // exportOptions: {
                    //     columns: [1, 2, 3, 4, 5, 6, 7]
                    // }
                },
                {
                    extend: 'excelHtml5',
                    // exportOptions: {
                    //     columns: [1, 2, 3, 4, 5, 6, 7]
                    // }
                },
                {
                    extend: 'csvHtml5',
                    // exportOptions: {
                    //     columns: [1, 2, 3, 4, 5, 6, 7]
                    // }
                },
                {
                    extend: 'pdfHtml5',
                    // exportOptions: {
                    //     columns: [1, 2, 3, 4, 5, 6, 7]
                    // }
                },
			],  
            processing: true,
            serverSide: true,
            serverMethod: 'post',
			ajax: {
				url: "users/list",
			},
            columns: [
                { data: 'Name' },
                { data: 'Mobile' },
                { data: 'Email' },
                { data: 'Flate Id' },
                { data: 'Working Time' },
                { data: 'Shift' },
                { data: 'Create Date' },
                { data: 'Login Date' },
                { data: 'User Type' },
                { data: 'Id' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    width:'50px',
                    title: 'Name',
                    orderable: true
                },
                {
                    targets: 1,
                    width: '20px',
                    title: 'Mobile',
                    orderable: false,
                },
                {
                    targets: 2,
                    width: '40px',
                    title: 'Email',
                    orderable: false,
                },
                {
                    targets: 3,
                    // width: '10px',
                    title: 'Flat No',
                    orderable: false,
                },
                {
                    targets: 4,
                    // width: '100px',
                    title: 'Working Time',
                    orderable: false,
                },
                {
                    targets: 5,
                    // width: '100px',
                    title: 'Shift',
                    orderable: false,
                },
                {
                    targets: 6,
                    width:'50px',
                    title: 'Create Date',
                    orderable: true,
                },
                {
                    targets: 7,
                    width:'50px',
                    title: 'Login Date',
                    orderable: false,
                },
                {
                    targets: 8,
                    width:'50px',
                    title: 'User Type',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return '<span class="label label-lg font-weight-bold label-light-success label-inline">' + data + '</span>';
                    }
                },
                {
                    targets: 9,
                    orderable: false,
                    width:'100px',
                    title: 'Actions',
                    render: function(data, type, full, meta){
                        // var html = '<a onClick="Button.deleteUser(' + data + ')" title="Delete User" class="btn btn-icon btn-sm btn-light-primary mr-2"><i class="flaticon2-trash"></i></a>\
                        var html = '<div class="dropdown dropdown-inline">\
                                <button class="btn btn-icon btn-sm btn-light-primary mr-2" data-toggle="dropdown">\
                                    <i class="flaticon-more"></i>\
                                </button>\
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                    <ul class="nav nav-hoverable flex-column">\
                                        <li class="nav-item">\
                                        <a onClick="Button.deleteUser(' + data + ')" title="Delete User" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Delete</span></a>\
                                        </li>\
                                        <li class="nav-item">\
                                        <a href="users/edit/' + data + '" title="Edit User" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Edit</span></a>\
                                        </li>\
                                    </ul>\
                                </div>';
                        // var html ='<a onClick="Button.deleteUser(' + data + ')" title="Delete User" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Delete User</span>';
                        // html = html + '<a title="Edit User" href="users/edit/' + data + '" class="btn btn-icon btn-sm btn-light-primary mr-2"><i class="flaticon2-edit"></i></a>';
                        return html;
                    },
                },
            ],
		});

	};

    var deleteUsers = function(id) {
        var id = id;
        Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this option?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "option/delete",
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
                                $('#List_of_Options').DataTable().ajax.reload();
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
			users_table();
		},
        deleteUsers: function(id) {
            deleteUsers(id);  
        },
	};
}();
jQuery(document).ready(function() {
	Button.init();
});
</script>
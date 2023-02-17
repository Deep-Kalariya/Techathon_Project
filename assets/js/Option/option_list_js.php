<script type="text/javascript">
var table;
var Button = function() {

	var option_table = function() {

		// begin first table
		table = $('#List_of_Options').DataTable({
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
				url: "option/list",
			},
            columns: [
                { data: 'Name' },
                { data: 'Photo' },
                { data: 'Create Date' },
                { data: 'Id' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    width:'50px',
                    title: 'Name',
                    orderable: true,
                    // render: function (data, type, full, meta) {
                    //     return '<a class="nav-link" href="user/details/' + full.Id + '" style="cursor: pointer;">' + data + '</a>';
                    // },
                },
                {
                    targets: 1,
                    width: '100px',
                    title: 'Photo',
                    orderable: true,
                    render: function (data, type, full, meta) {
                        return '<img class="img-fluid" src="'+base_url('upload/'+data)+'" />';
                    }
                },
                {
                    targets: 2,
                    width:'50px',
                    title: 'Create Date',
                    orderable: true,
                },
                {
                    targets: 3,
                    orderable: false,
                    width:'100px',
                    title: 'Actions',
                    render: function(data, type, full, meta){
                        // var html = '<a onClick="Button.deleteUser(' + data + ')" title="Delete User" class="btn btn-icon btn-sm btn-light-primary mr-2"><i class="flaticon2-trash"></i></a>\
                        var html ='<a onClick="Button.deleteOption(' + data + ')" title="Delete Option" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Delete</span>';
                        // html = html + '<a title="Edit User" href="home/edit/' + data + '" class="btn btn-icon btn-sm btn-light-primary mr-2"><i class="flaticon2-edit"></i></a>';
                        return html;
                    },
                },
            ],
		});

	};

    var deleteOption = function(id) {
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
			option_table();
		},
        deleteOption: function(id) {
            deleteOption(id);  
        },
	};
}();
jQuery(document).ready(function() {
	Button.init();
});
</script>
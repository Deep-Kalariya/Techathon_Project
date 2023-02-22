<script type="text/javascript">
var table;
var Button = function() {

	var flat_table = function() {

		// begin first table
		table = $('#List_of_Flats').DataTable({
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
				url: "flats/list",
			},
            columns: [
                { data: 'Flat No' },
                { data: 'Name' },
                { data: 'Mobile' },
                { data: 'Email' },
                { data: 'No of Person' },
                { data: 'No of Year To Stay' },
                { data: 'Owner Business' },
                { data: 'Created Date' },
                { data: 'Id' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    title: 'Flat No',
                    orderable: false
                },
                {
                    targets: 1,
                    title: 'Name',
                    orderable: true,
                },
                {
                    targets: 2,
                    title: 'Mobile',
                    orderable: false,
                },
                {
                    targets: 3,
                    title: 'Email',
                    orderable: false,
                },
                {
                    targets: 4,
                    title: 'No of Person',
                    orderable: false,
                },
                {
                    targets: 5,
                    width: '100px',
                    title: 'No of Year To Stay',
                    orderable: false,
                },
                {
                    targets: 6,
                    title: 'Business',
                    orderable: false,
                },
                {
                    targets: 7,
                    width: '100px',
                    title: 'Created Date',
                    orderable: true,
                },
                {
                    targets: 8,
                    orderable: false,
                    title: 'Actions',
                    render: function(data, type, full, meta){
                        var html ='<div class="dropdown dropdown-inline">\
                                <button class="btn btn-icon btn-sm btn-light-primary mr-2" data-toggle="dropdown">\
                                    <i class="flaticon-more"></i>\
                                </button>\
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                    <ul class="nav nav-hoverable flex-column">\
                                        <li class="nav-item">\
                                        <a onClick="Button.deleteFlat(' + data + ')" title="Delete Flat" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Delete</span></a>\
                                        </li>\
                                        <li class="nav-item">\
                                        <a href="flats/edit/' + data + '" title="Edit Flat" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Edit</span></a>\
                                        </li>\
                                    </ul>\
                                </div>';
                        return html;
                    },
                },
            ],
		});

	};

    var deleteFlat = function(id) {
        var id = id;
        Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this flat?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "flats/delete",
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
                                $('#List_of_Flats').DataTable().ajax.reload();
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
			flat_table();
		},
        deleteFlat: function(id) {
            deleteFlat(id);  
        },
	};
}();
jQuery(document).ready(function() {
	Button.init();
});
</script>
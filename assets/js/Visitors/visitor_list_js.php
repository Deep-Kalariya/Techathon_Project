<script type="text/javascript">
var table;
var Button = function() {

	var visitor_table = function() {

		// begin first table
		table = $('#List_of_Visitors').DataTable({
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
				url: "visitors/list",
			},
            columns: [
                { data: 'Visitor Name' },
                { data: 'Whom To Meet' },
                { data: 'No of Visitor' },
                { data: 'Purpose' },
                { data: 'Photo' },
                { data: 'Entry Time' },
                { data: 'Visited Date' },
                { data: 'Id' }
            ],
            columnDefs: [
                {
                    targets: 0,
                    title: 'Visitor Name',
                    orderable: true
                },
                {
                    targets: 1,
                    title: 'Whom To Meet',
                    orderable: false,
                },
                {
                    targets: 2,
                    title: 'No of Visitor',
                    orderable: false,
                },
                {
                    targets: 3,
                    title: 'Purpose',
                    orderable: false,
                },
                {
                    targets: 4,
                    title: 'Photo',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return '<img class="img-fluid" src="<?= base_url('assets/upload/'); ?>'+ data +'" />';
                    }
                },
                {
                    targets: 5,
                    title: 'Entry Time',
                    orderable: false,
                },
                {
                    targets: 6,
                    title: 'Visited Date',
                    orderable: true,
                },
                {
                    targets: 7,
                    orderable: false,
                    width:'100px',
                    title: 'Actions',
                    render: function(data, type, full, meta){
                        var html ='<div class="dropdown dropdown-inline">\
                                <button class="btn btn-icon btn-sm btn-light-primary mr-2" data-toggle="dropdown">\
                                    <i class="flaticon-more"></i>\
                                </button>\
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
                                    <ul class="nav nav-hoverable flex-column">\
                                        <li class="nav-item">\
                                        <a onClick="Button.deleteVisitor(' + data + ')" title="Delete Visitor" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Delete</span></a>\
                                        </li>\
                                        <li class="nav-item">\
                                        <a href="visitor/edit/' + data + '" title="Edit Visitor" class="nav-link" style="cursor: pointer;"><span class="nav-text text-center">Edit</span></a>\
                                        </li>\
                                    </ul>\
                                </div>';
                        return html;
                    },
                },
            ],
		});

	};

    var deleteVisitor = function(id) {
        var id = id;
        Swal.fire({
                title: "Are you sure?",
                text: "You want to delete this visitor?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "visitor/delete",
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
                                $('#List_of_Visitors').DataTable().ajax.reload();
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
			visitor_table();
		},
        deleteVisitor: function(id) {
            deleteVisitor(id);  
        },
	};
}();
jQuery(document).ready(function() {
	Button.init();
});
</script>
var TableManaged = function () {

    var initTable1 = function () {

        var table = $('#view_admin_1');
        
        // begin first table
        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },

            // Or you can use remote translation file
//            "language": {
//               url: 'http://localhost/resource4u.biz/jvg_nurseshop/siteadmin/table_managed.json'
//            },

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            "dom": "<'row'<'col-md-12 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-4 col-sm-12'i><'col-md-8 col-sm-12'p>>",

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

            "columns": [{
                "orderable": true
            }, {
                "orderable": true
            }, {
                "orderable": false
            }],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,            
            "pagingType": "bootstrap_full_number",
            
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }],
            "order": [
                
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#sample_1_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                    $(this).parents('tr').addClass("active");
                } else {
                    $(this).attr("checked", false);
                    $(this).parents('tr').removeClass("active");
                }
            });
            jQuery.uniform.update(set);
        });

        table.on('change', 'tbody tr .checkboxes', function () {
            $(this).parents('tr').toggleClass("active");
        });

        tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        $("#view_admin_1_filter").find('input[type=search]').parent().hide();
        $("#view_admin_1_length").find('select[name=view_admin_1_length]').parent().hide();
        
        $("#nameFilter").keyup(function(){
           searchFiletr();
        });
        
        $("#removeFilter").click(function(){
            $(this).closest("#view_admin_1_length").find("input[type=text], select").val("");
            searchFiletr();
        });
        function searchFiletr(){
             var search_text = '';
            
            if($("#nameFilter").val()!=''){
                search_text +=$("#nameFilter").val();
            }
            
            
            $("#view_admin_1_filter").find('input[type=search]').val(search_text);
            $("#view_admin_1_filter").find('input[type=search]').trigger('keyup');
        }
        $( "#view_invoice_1" ).wrap( "<div class='table-scrollable'></div>" );
    }


    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            initTable1();
        }

    };

}();
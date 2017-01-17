var UINestable = function () {

    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            //output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            $.ajax({
                type: "POST",
                cache: false,
                url: full_url+'/messages/updateTemplateOrder',
                data: {data:window.JSON.stringify(list.nestable('serialize'))},
                dataType: "json",
                beforeSend: function() {
                    //form.children().last().children('input[type="submit"]').hide();
                    //form.children().last().children('img').fadeIn();
                },
                success: function(res) {
                    
                },
                error: function(xhr, ajaxOptions, thrownError) {
                   // App.showError('Critical error');
                }
            });
            console.log(window.JSON.stringify(list.nestable('serialize')));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };


    return {
        //main function to initiate the module
        init: function () {

            // activate Nestable for list 1
//            $('#nestable_list_1').nestable({
//                group: 1
//            })
//                .on('change', updateOutput);
        $('#nestable_list_3').nestable()
                .on('change', updateOutput);

            // activate Nestable for list 2
//            $('#nestable_list_2').nestable({
//                group: 1
//            })
//                .on('change', updateOutput);

            // output initial serialised data
            //updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));
//            updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));
                //updateOutput($('#nestable_list_3').data('output', $('#nestable_list_3_output')));

//            $('#nestable_list_menu').on('click', function (e) {
//                var target = $(e.target),
//                    action = target.data('action');
//                if (action === 'expand-all') {
//                    $('.dd').nestable('expandAll');
//                }
//                if (action === 'collapse-all') {
//                    $('.dd').nestable('collapseAll');
//                }
//            });
//
//            $('#nestable_list_3').nestable();

        }

    };

}();
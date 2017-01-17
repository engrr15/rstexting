/**
 Core script to handle the entire theme and core functions
 **/
var Cms = function() {
    
    
    return {
//main function to initiate the theme
        init: function() {
           
        },
        CKupdate: function() {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
            CKEDITOR.instances[instance].setData('');
        }
    };
}();
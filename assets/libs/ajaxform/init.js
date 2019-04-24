if(typeof(AjaxForm) === 'undefined') {
    var AjaxForm = {};
    AjaxForm.initialize = function(config){
        window.addEventListener('load', function(){
            AjaxForm.initialize(config);
        });
    };
}
if(typeof(pdoPage) === 'undefined') {
    var pdoPage = {callbacks: {}, keys: {}, configs: {}};
    pdoPage.initialize = function(config){
        window.addEventListener('load', function(){
            pdoPage.initialize(config);
        });
    };
}
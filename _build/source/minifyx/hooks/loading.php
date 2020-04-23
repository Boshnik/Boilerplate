<?php
$style = '<style>body.loading{opacity:0}</style>';
$script = "<script>
            function removeLoading(){
                var loading = document.querySelector('body.loading');
                if(loading) {
                    loading.classList.remove('loading')
                }
            }
            window.addEventListener('load',removeLoading);
        </script>";
$modx->regClientCSS($style);
$modx->regClientScript($script);
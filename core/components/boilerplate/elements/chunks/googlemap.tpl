{if $_modx->resource.googlemap}
{set $map = $_modx->resource.googlemap | fromJSON}
<style>
    #goolgemap {
        width:100%;
        height:500px;
    }
</style>
<section class="maps">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="goolgemap"></div>      
            </div>
        </div>
    </div>
</section>
<script src="http://maps.google.com/maps/api/js?key={'mapstv.api_key' | config}"></script>
<script>
    var map, timerCenter,
    position = {
        lat: {$map.latitude},
        lng: {$map.longitude}
    },
    coords = {
        lat: {$map.latitude},
        lng: {$map.longitude}
    };
    function initMap() {
        map = new google.maps.Map(document.getElementById('goolgemap'), {
            center: coords,
            zoom: 16,
            scrollwheel: false,
        });
      
        var marker = new google.maps.Marker({ 
            position: coords, 
            map: map,
            title: ''
        });
        
        window.onresize = function () {
            if (timerCenter) {
                clearTimeout(timerCenter);
                timerCenter = null;
            }
            timerCenter = setTimeout(function () {
                map.setCenter(position);
            }, 50);
        };
    }
    initMap();
</script>
{/if}
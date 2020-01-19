<div class="row fill">
    <div class="col-md-7 col-xs-12">
        <div class="col-12 h-100 p-0"id="map"></div>
    </div>
    <div class="col-md-5 col-xs-12">
        <div class="all col center">
            <div class="" id="form_map">
                <div class="">
                    <h4 id="title_map" class="Arial">No point selected</h4>
                </div>
                <div id="output_map" class="">
                </div>
                <div class="">
                    <div class="">
                        <p class="">Title</p>
                        <input type="text" placeholder="Title ..." id="form_title">
                    </div>
                    <div class="">
                        <p class="">Description</p>
                        <textarea placeholder="Description ..." id="form_description"></textarea>
                    </div>
                    <div class="">
                        <button id="save_map">Save</button>
                    </div>
                </div>
                <div class="">
                    <h4 id="error_map" class="Arial" style="color:red"></h4>
                </div>
            </div>
        </div>
    </div>
    
<div>
<script>

    var token="pk.eyJ1Ijoicm91cmV0bCIsImEiOiJjazVpM2lweW8wOHprM2t0N2ZnaWpjcHBlIn0.fUukwcira1H-D-DG0p6hAw"
    var map = L.map('map').setView([50.829, -0.134], 14);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token='+token, {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
    }).addTo(map);

    var isClick=false;
    var marker = {};
    var lat,lng;
    map.on('click', function(e){
        if(!isClick){
            isClick=true;
            $("#title_map").html("Point selected");
        }
        lat=e.latlng.lat.toFixed(3)
        lng=e.latlng.lng.toFixed(3)
        if (Object.keys(marker).length != 0) {
            map.removeLayer(marker);
        };
        marker = L.marker([lat,lng]).addTo(map);;  
        
        $("#output_map").html("<p>("+lat+","+lng+")</p>");
        console.log("Lat:"+lat+" Long:"+lng)
    });

    function displayErrorForm(text){
        $("#error_map").html(text)
    }

    $("#save_map").click(function(){
        let title=$("#form_title").val()
        let description=$("#form_description").val()
        
        if(Object.keys(marker).length != 0){
            var point={}
            if(title!="" && description!=""){
                point.lat=lat;
                point.lng=lng;
                point.title=title;
                point.description=description
                displayErrorForm("")
                modal("Added point successfully","Point: ("+lat+","+lng+")")
            }else{
                displayErrorForm("Fields are missing ...")
            }
        }else{
            displayErrorForm("No marker found")
        }

    })
</script>
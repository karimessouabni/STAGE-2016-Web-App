var features = new ol.Collection();
var source = new ol.source.Vector({features: features});





var vector = new ol.layer.Vector({
    source: source,
    style: new ol.style.Style({

        image: new ol.style.Icon({
            anchor: [0.5, 50],
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            opacity: 0.90,
            src: '../images/marker.png',
            scale: 0.7
        })
    })
});

var lastFeature;
var lastFeature2;


/**
 * The help tooltip element.
 * @type {Element}
 */
var helpTooltipElement;


/**
 * Overlay to show the help messages.
 * @type {ol.Overlay}
 */
var helpTooltip;


var meknes = ol.proj.fromLonLat([-5.5, 33.9]);
var fes = ol.proj.fromLonLat([-4.9998000, 34.0371500]);
var agadir = ol.proj.fromLonLat([-9.5981500, 30.4201800]);
var rabat = ol.proj.fromLonLat([-6.8325500, 34.0132500]);


/**
 * Handle pointer move.
 * @param {ol.MapBrowserEvent} evt The event.
 */
var pointerMoveHandler = function (evt) {
    if (evt.dragging) {
        return;
    }
    var helpMsg = 'Cliquez pour localiser le projet';

    helpTooltipElement.innerHTML = helpMsg;
    helpTooltip.setPosition(evt.coordinate);

    helpTooltipElement.style.visibility = "visible";
};


var raster = new ol.layer.Tile({
    source: new ol.source.OSM()
});

var map = new ol.Map({
    layers: [raster, vector],
    target: 'map',
    loadTilesWhileAnimating: true,
    view: new ol.View({
        center: meknes,
        zoom: 11
    })
});


map.on('pointermove', pointerMoveHandler);

map.getViewport().addEventListener('mouseout', function () {
    //vector.setOpacity(0.3);
    helpTooltipElement.style.visibility = "hidden";
});


var draw; // global so we can remove it later


function addInteraction() {
    var type = 'Point';
    draw = new ol.interaction.Draw({
        source: source,
        type: /** @type {ol.geom.GeometryType}  */ (type),
        style: new ol.style.Style({
            image: new ol.style.Circle({
                radius: 5,
                stroke: new ol.style.Stroke({
                    color: 'rgba(255, 0, 0, 1)'
                }),
                fill: new ol.style.Fill({
                    color: 'rgba(255, 0, 0, 0.1)'
                })
            })
        })
    });

    draw.on('drawend', function (e) {
        source.clear();
        lastFeature = e.feature;
    });

    map.addInteraction(draw);


    map.on('click', function (evt) {
        var lonlat = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
        var lon = lonlat[0];
        var lat = lonlat[1];
        document.getElementById('long').value = lon;
        document.getElementById('lat').value = lat;

        $('#editForm').find('#long').attr('value', lon);
        $('#editForm').find('#lat').attr('value', lat);
        $('#addForm').find('#long').attr('value', lon);
        $('#addForm').find('#lat').attr('value', lat);

        console.log(lon + " " + lat);
    });

    createHelpTooltip();


}


/**
 * Creates a new help tooltip
 */
function createHelpTooltip() {

    helpTooltipElement = document.createElement('div');
    helpTooltipElement.className = 'tooltip';
    helpTooltip = new ol.Overlay({
        element: helpTooltipElement,
        offset: [15, 0],
        positioning: 'bottom'
    });
    map.addOverlay(helpTooltip);
}


addInteraction();
/**
 * Created by karim on 24/07/2016.
 */






function drawMap() {
    map.setTarget("map");
    map.updateSize();


}

function drawMapEditForm() {

    long = parseFloat($('#editForm').find('#long').val());
    lat = parseFloat($('#editForm').find('#lat').val());
    var posActuelle = ol.proj.fromLonLat([long, lat]);
    lastFeature2 = new ol.Feature({

        geometry: new ol.geom.Point(ol.proj.transform([long, lat], 'EPSG:4326',
            'EPSG:3857')),

    });


    source.clear();
    source.addFeature(lastFeature2);

    map.setTarget("map2");
    map.getView().setCenter(posActuelle);
    map.updateSize();

}


var flyToBern = document.getElementById('listeville');

flyToBern.addEventListener('change', function () {
    var duration = 2000;
    var start = +new Date();
    var pan = ol.animation.pan({
        duration: duration,
        source: /** @type {ol.Coordinate} */ (map.getView().getCenter()),
        start: start
    });
    var bounce = ol.animation.bounce({
        duration: duration,
        resolution: 8 * map.getView().getResolution(),
        start: start
    });
    map.beforeRender(pan, bounce);
    switch (flyToBern.value) {
        case "706595":
            map.getView().setCenter(agadir);
            break;
        /*   case "706597":
         map.getView().setCenter(hoceima);
         break;
         case "706598":
         map.getView().setCenter(Azilal);
         break;
         case "706596":
         map.getView().setCenter(Melloul);
         break;
         case "706599":
         map.getView().setCenter(Benguerir);
         break;
         case "706601":
         map.getView().setCenter(Benslimane);
         break;
         case "706602":
         map.getView().setCenter(Berkane);
         break;
         case "706603":
         map.getView().setCenter(Berrechid);
         break;
         case "706604":
         map.getView().setCenter(Boulemane);
         break;
         case "706600":
         map.getView().setCenter(Mellal);
         break;
         case "706605":
         map.getView().setCenter(Casablanca);
         break;
         case "706606":
         map.getView().setCenter(Chefchaouen);
         break;
         case "706607":
         map.getView().setCenter(Chichaoua);
         break;
         case "706608":
         map.getView().setCenter(Dakhla);
         break;
         case "706609":
         map.getView().setCenter(Jadida);
         break;
         case "706610":
         map.getView().setCenter(Errachidia);
         break;
         case "706611":
         map.getView().setCenter(Essaouira);
         break;*/
        case "706612":
            map.getView().setCenter(fes);
            break;
        /*case "706613":
         map.getView().setCenter(Guelmim);
         break;
         case "706614":
         map.getView().setCenter(Ifrane);
         break;
         case "706615":
         map.getView().setCenter(Inzegane);
         break;
         case "706616":
         map.getView().setCenter(Sraghna);
         break;
         case "706620":
         map.getView().setCenter(Khouribga);
         break;
         case "706619":
         map.getView().setCenter(Khemisset);
         break;
         case "706618":
         map.getView().setCenter(Khenifra);
         break;
         case "706621":
         map.getView().setCenter(Kebir);
         break;
         case "706617":
         map.getView().setCenter(Kenitra);
         break;
         case "706622":
         map.getView().setCenter(Laayoune);
         break;
         case "706623":
         map.getView().setCenter(Larache);
         break;
         case "706624":
         map.getView().setCenter(Marrakech);
         break;*/
        case "706625":
            map.getView().setCenter(meknes);
            break;
        /*case "706626":
         map.getView().setCenter(Mohammedia);
         break;
         case "706627":
         map.getView().setCenter(Nador);
         break;
         case "706628":
         map.getView().setCenter(Ouarzazate);
         break;
         case "706629":
         map.getView().setCenter(Oued);
         break;
         case "706630":
         map.getView().setCenter(Oujda);
         break;*/
        case "706631":
            map.getView().setCenter(rabat);
            break;
        /*   case "706632":
         map.getView().setCenter(Safi);
         break;
         case "706633":
         map.getView().setCenter(Sale);
         break;
         case "706634":
         map.getView().setCenter(Sefrou);
         break;
         case "706635":
         map.getView().setCenter(Settat);
         break;
         case "706636":
         map.getView().setCenter(Ifni);
         break;
         case "706637":
         map.getView().setCenter(kacem);
         break;
         case "706638":
         map.getView().setCenter(Tanger);
         break;
         case "706639":
         map.getView().setCenter(Taounate);
         break;
         case "706640":
         map.getView().setCenter(Taourirt);
         break;
         case "706641":
         map.getView().setCenter(Taroudant);
         break;
         case "706642":
         map.getView().setCenter(Tata);
         break;
         case "706643":
         map.getView().setCenter(Taza);
         break;
         case "706646":
         map.getView().setCenter(Tiznit);
         break;
         case "706644":
         map.getView().setCenter(Temara);
         break;
         case "706645":
         map.getView().setCenter(Tetouan);
         break;*/

        default:
            map.getView().setCenter(meknes);
    }


    map.getView().setZoom(11);
}, false);


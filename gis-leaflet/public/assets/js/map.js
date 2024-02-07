var map,
    featureList,
    // boroughSearch = [],
    // museumSearch = [],
    markerFrom,
    mixueSearch = [];

$(window).resize(function () {
    sizeLayerControl();
});

$(document).on("click", ".mixue-terdekat", async function (e) {
    // console.log("mixue-terdekat");
    // if (map.stopLocate()) {
    //     console.log("navigator.geolocation found.");
    // } else {
    //     console.log("navigator.geolocation not found.");
    // }
    // var markerFromrom;
    // await map.locate({}).on("locationfound", async function (e_found) {
    //     markerFromrom = await L.marker([e_found.latitude, e_found.longitude]);
    //     console.log(markerFromrom);
    //     // console.log(e_found);
    //     // if (e_found) {
    //     //     console.log("e_found");
    //     // } else {
    //     //     console.log("e_found not found");
    //     // }
    // });
    function getLocation() {
        return new Promise((resolve, reject) => {
            map.locate({})
                .on("locationfound", (e_found) => {
                    markerFrom = L.marker([
                        e_found.latitude,
                        e_found.longitude,
                    ]);
                    // marker.addTo(map);
                    resolve(markerFrom);
                })
                .on("locationerror", (e) => {
                    reject(`Error getting location: ${e.message}`);
                });
        });
    }
    // .on("locationerror", function (e) {
    //     console.log(e);
    //     alert("Location access denied.");
    // });
    if (markerFrom) {
        // const markerFromrom = await getLocation();
        console.log(markerFrom);
        let mapArray = [];
        let isiContent = "";
        // markerFrom = L.marker([e_found.latitude, e_found.longitude]);
        // console.log(navigator.geolocation.getCurrentPosition(showPosition));
        console.log(markerFrom.getLatLng().lat);
        // console.log(markerFrom.getLatLng().lat);
        mixues.eachLayer(function iterateItems(poly) {
            var markerTo = L.marker([
                poly.getLatLng().lat,
                poly.getLatLng().lng,
            ]);
            var from = markerFrom.getLatLng();
            var to = markerTo.getLatLng();
            let mapObject = {
                nama: poly.feature.properties.NAMA,
                jarak: from.distanceTo(to).toFixed(0) / 1000,
                id: parseInt(L.stamp(poly), 10),
            };
            mapArray.push(mapObject);
        });
        const sortMap = mapArray.sort((a, b) => a.jarak - b.jarak);
        sortMap.forEach(function iterateItems(element, index) {
            if (iterateItems.stop) {
                return;
            }
            if (index == 4) {
                iterateItems.stop = true;
            }
            isiContent += `
            <tr>
                <th>${index + 1}.</th>
                <td>${element.nama}</td>
                <td>${element.jarak} km</td>
                <td scope="row"><button onclick="sidebarClick(${
                    element.id
                })" class="bg-info p-2 mr-2 mb-2"><i class="fas fa-solid fa-paper-plane"></i></button></td>
            </tr>`;
        });
        document.getElementById("isiMixueTerdekat").innerHTML = isiContent;
        $(document).off("mouseout", ".mixue-terdekat", clearHighlight);
        $("#mixueterdekatModal").modal("show");
    } else {
        markerFrom = await getLocation();
        let mapArray = [];
        let isiContent = "";
        // markerFrom = L.marker([e_found.latitude, e_found.longitude]);
        // console.log(navigator.geolocation.getCurrentPosition(showPosition));
        console.log(markerFrom.getLatLng().lat);
        // console.log(markerFrom.getLatLng().lat);
        mixues.eachLayer(function iterateItems(poly) {
            var markerTo = L.marker([
                poly.getLatLng().lat,
                poly.getLatLng().lng,
            ]);
            var from = markerFrom.getLatLng();
            var to = markerTo.getLatLng();
            let mapObject = {
                nama: poly.feature.properties.NAMA,
                jarak: from.distanceTo(to).toFixed(0) / 1000,
                id: parseInt(L.stamp(poly), 10),
            };
            mapArray.push(mapObject);
        });
        const sortMap = mapArray.sort((a, b) => a.jarak - b.jarak);
        sortMap.forEach(function iterateItems(element, index) {
            if (iterateItems.stop) {
                return;
            }
            if (index == 4) {
                iterateItems.stop = true;
            }
            isiContent += `
            <tr>
                <th>${index + 1}.</th>
                <td>${element.nama}</td>
                <td>${element.jarak} km</td>
                <td scope="row"><button onclick="sidebarClick(${
                    element.id
                })" class="bg-info p-2 mr-2 mb-2"><i class="fas fa-solid fa-paper-plane"></i></button></td>
            </tr>`;
        });
        document.getElementById("isiMixueTerdekat").innerHTML = isiContent;
        $(document).off("mouseout", ".mixue-terdekat", clearHighlight);
        $("#mixueterdekatModal").modal("show");
    }
    // try {
    //     const markerFromrom = await getLocation();
    //     console.log(markerFromrom);
    //     console.log(marker);
    // } catch (error) {
    //     console.error(error);
    // }
});

$(document).on("click", ".feature-row", function (e) {
    $(document).off("mouseout", ".feature-row", clearHighlight);
    sidebarClick(parseInt($(this).attr("id"), 10));
});

if (!("ontouchstart" in window)) {
    $(document).on("mouseover", ".feature-row", function (e) {
        highlight
            .clearLayers()
            .addLayer(
                L.circleMarker(
                    [$(this).attr("lat"), $(this).attr("lng")],
                    highlightStyle
                )
            );
    });
}

$(document).on("mouseout", ".feature-row", clearHighlight);

// $("#about-btn").click(function () {
//     $("#aboutModal").modal("show");
//     $(".navbar-collapse.in").collapse("hide");
//     return false;
// });

// $("#full-extent-btn").click(function () {
//     map.fitBounds(boroughs.getBounds());
//     $(".navbar-collapse.in").collapse("hide");
//     return false;
// });

// $("#legend-btn").click(function () {
//     $("#legendModal").modal("show");
//     $(".navbar-collapse.in").collapse("hide");
//     return false;
// });

// $("#login-btn").click(function () {
//     $("#loginModal").modal("show");
//     $(".navbar-collapse.in").collapse("hide");
//     return false;
// });

$("#list-btn").click(function () {
    animateSidebar();
    return false;
});

$("#nav-btn").click(function () {
    $(".navbar-collapse").collapse("toggle");
    return false;
});

$("#sidebar-toggle-btn").click(function () {
    animateSidebar();
    return false;
});

$("#sidebar-hide-btn").click(function () {
    animateSidebar();
    return false;
});

function animateSidebar() {
    $("#sidebar").animate(
        {
            width: "toggle",
        },
        350,
        function () {
            map.invalidateSize();
        }
    );
}

function sizeLayerControl() {
    $(".leaflet-control-layers").css("max-height", $("#map").height() - 50);
}

function clearHighlight() {
    highlight.clearLayers();
}

function sidebarClick(id) {
    var layer = markerClusters.getLayer(id);
    map.setView([layer.getLatLng().lat, layer.getLatLng().lng], 17);
    layer.fire("click");
    /* Hide sidebar and go to the map on small screens */
    if (document.body.clientWidth <= 767) {
        $("#sidebar").hide();
        map.invalidateSize();
    }
    $("#mixueterdekatModal").modal("hide");
}

function syncSidebar() {
    /* Empty sidebar features */
    $("#feature-list tbody").empty();
    /* Loop through mixues layer and add only features which are in the map bounds */
    mixues.eachLayer(function (layer) {
        if (map.hasLayer(mixueLayer)) {
            if (map.getBounds().contains(layer.getLatLng())) {
                $("#feature-list tbody").append(
                    '<tr class="feature-row" id="' +
                        L.stamp(layer) +
                        '" lat="' +
                        layer.getLatLng().lat +
                        '" lng="' +
                        layer.getLatLng().lng +
                        '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/icons/mixue.png"></td><td class="feature-name">' +
                        layer.feature.properties.NAMA +
                        '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>'
                );
            }
        }
    });
    /* Loop through museums layer and add only features which are in the map bounds */
    // museums.eachLayer(function (layer) {
    //     if (map.hasLayer(museumLayer)) {
    //         if (map.getBounds().contains(layer.getLatLng())) {
    //             $("#feature-list tbody").append(
    //                 '<tr class="feature-row" id="' +
    //                     L.stamp(layer) +
    //                     '" lat="' +
    //                     layer.getLatLng().lat +
    //                     '" lng="' +
    //                     layer.getLatLng().lng +
    //                     '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/museum.png"></td><td class="feature-name">' +
    //                     layer.feature.properties.NAME +
    //                     '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>'
    //             );
    //         }
    //     }
    // });
    /* Update list.js featureList */
    featureList = new List("features", {
        valueNames: ["feature-name"],
    });
    featureList.sort("feature-name", {
        order: "asc",
    });
}

/* Basemap Layers */
var cartoLight = L.tileLayer(
    "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png",
    {
        maxZoom: 19,
        attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>',
    }
);
var usgsImagery = L.layerGroup([
    L.tileLayer(
        "http://basemap.nationalmap.gov/arcgis/rest/services/USGSImageryOnly/MapServer/tile/{z}/{y}/{x}",
        {
            maxZoom: 15,
        }
    ),
    L.tileLayer.wms(
        "http://raster.nationalmap.gov/arcgis/services/Orthoimagery/USGS_EROS_Ortho_SCALE/ImageServer/WMSServer?",
        {
            minZoom: 16,
            maxZoom: 19,
            layers: "0",
            format: "image/jpeg",
            transparent: true,
            attribution: "Aerial Imagery courtesy USGS",
        }
    ),
]);

var satellite = L.tileLayer(
    "http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}",
    {
        maxZoom: 19,
        subdomains: ["mt0", "mt1", "mt2", "mt3"],
    }
);

/* Overlay Layers */
var highlight = L.geoJson(null);
var highlightStyle = {
    stroke: false,
    fillColor: "#00FFFF",
    fillOpacity: 0.7,
    radius: 10,
};

// var boroughs = L.geoJson(null, {
//     style: function (feature) {
//         return {
//             color: "black",
//             fill: false,
//             opacity: 1,
//             clickable: false,
//         };
//     },
//     onEachFeature: function (feature, layer) {
//         boroughSearch.push({
//             name: layer.feature.properties.BoroName,
//             source: "Boroughs",
//             id: L.stamp(layer),
//             bounds: layer.getBounds(),
//         });
//     },
// });
// $.getJSON("data/boroughs.geojson", function (data) {
//     boroughs.addData(data);
// });

//Create a color dictionary based off of subway route_id
var subwayColors = {
    1: "#ff3135",
    2: "#ff3135",
    3: "ff3135",
    4: "#009b2e",
    5: "#009b2e",
    6: "#009b2e",
    7: "#ce06cb",
    A: "#fd9a00",
    C: "#fd9a00",
    E: "#fd9a00",
    SI: "#fd9a00",
    H: "#fd9a00",
    Air: "#ffff00",
    B: "#ffff00",
    D: "#ffff00",
    F: "#ffff00",
    M: "#ffff00",
    G: "#9ace00",
    FS: "#6e6e6e",
    GS: "#6e6e6e",
    J: "#976900",
    Z: "#976900",
    L: "#969696",
    N: "#ffff00",
    Q: "#ffff00",
    R: "#ffff00",
};

// var subwayLines = L.geoJson(null, {
//     style: function (feature) {
//         return {
//             color: subwayColors[feature.properties.route_id],
//             weight: 3,
//             opacity: 1,
//         };
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             var content =
//                 "<table class='table table-striped table-bordered table-condensed'>" +
//                 "<tr><th>Division</th><td>" +
//                 feature.properties.Division +
//                 "<td></tr>" +
//                 "<tr><th>Line</th><td>" +
//                 feature.properties.Line +
//                 "</td></tr>" +
//                 "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.Line);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                 },
//             });
//         }
//         layer.on({
//             mouseover: function (e) {
//                 var layer = e.target;
//                 layer.setStyle({
//                     weight: 3,
//                     color: "#00FFFF",
//                     opacity: 1,
//                 });
//                 if (!L.Browser.ie && !L.Browser.opera) {
//                     layer.bringToFront();
//                 }
//             },
//             mouseout: function (e) {
//                 subwayLines.resetStyle(e.target);
//             },
//         });
//     },
// });

$.getJSON();

/* Single marker cluster layer to hold all clusters */
var markerClusters = new L.MarkerClusterGroup({
    spiderfyOnMaxZoom: true,
    showCoverageOnHover: false,
    zoomToBoundsOnClick: true,
    disableClusteringAtZoom: 16,
});

/* Empty layer placeholder to add to layer control for listening when to add/remove mixues to markerClusters layer */
var mixueLayer = L.geoJson(null);
var mixues = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {
            icon: L.icon({
                iconUrl: "assets/icons/mixue.png",
                iconSize: [24, 28],
                iconAnchor: [12, 28],
                popupAnchor: [0, -25],
            }),
            title: feature.properties.NAMA,
            riseOnHover: true,
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties) {
            var content =
                "<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" +
                feature.properties.NAMA +
                "</td></tr>" +
                "<tr><th>Alamat</th><td>" +
                feature.properties.ALAMAT +
                "</td></tr>" +
                "<tr><th>Latitude</th><td>" +
                feature.geometry.coordinates[1] +
                "</td></tr>" +
                "<tr><th>Longitude</th><td>" +
                feature.geometry.coordinates[0] +
                "</td></tr>" +
                "<table>";
            layer.on({
                click: function (e) {
                    $("#feature-title").html(feature.properties.NAMA);
                    $("#feature-info").html(content);
                    $("#featureModal").modal("show");
                    document
                        .getElementById("pilihInfo")
                        .setAttribute(
                            "onchange",
                            "isiInfo(" + JSON.stringify(feature) + ")"
                        );
                    const optionLuas = document.getElementById("luas");
                    const optionInfo = document.getElementById("info");
                    if (optionLuas) {
                        optionLuas.remove();
                    }
                    if (optionInfo) {
                        optionInfo.remove();
                    }
                    const addOptionLuas = document.createElement("option");
                    if (
                        feature.polygon.features[0].geometry.coordinates[0]
                            .length > 0
                    ) {
                        addOptionLuas.innerText = "Area";
                        addOptionLuas.value = "luas";
                        addOptionLuas.id = "luas";
                        pilihInfo.add(addOptionLuas);
                    }
                    const addOptionInfo = document.createElement("option");
                    if (feature.properties) {
                        addOptionInfo.innerText = "Tentang";
                        addOptionInfo.value = "info";
                        addOptionInfo.id = "info";
                        pilihInfo.add(addOptionInfo);
                    }
                    highlight
                        .clearLayers()
                        .addLayer(
                            L.circleMarker(
                                [
                                    feature.geometry.coordinates[1],
                                    feature.geometry.coordinates[0],
                                ],
                                highlightStyle
                            )
                        );
                },
            });
            $("#feature-list tbody").append(
                '<tr class="feature-row" id="' +
                    L.stamp(layer) +
                    '" lat="' +
                    layer.getLatLng().lat +
                    '" lng="' +
                    layer.getLatLng().lng +
                    '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/icons/mixue.png"></td><td class="feature-name">' +
                    layer.feature.properties.NAMA +
                    '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>'
            );
            mixueSearch.push({
                name: layer.feature.properties.NAMA,
                address: layer.feature.properties.ALAMAT,
                source: "Mixues",
                id: L.stamp(layer),
                lat: layer.feature.geometry.coordinates[1],
                lng: layer.feature.geometry.coordinates[0],
            });
        }
    },
});
// $.getJSON("data/DOITT_mixue_01_13SEPT2010.geojson", function (data) {
//     mixues.addData(data);
//     map.addLayer(mixueLayer);
// });

function isiInfo(feature) {
    console.log(pilihInfo.value);
    switch (pilihInfo.value) {
        case "lokasi":
            const lokasi =
                "<table class='table table-striped table-bordered table-condensed'>" +
                "<tr><th>Nama</th><td>" +
                feature.properties.NAMA +
                "</td></tr>" +
                "<tr><th>Alamat</th><td>" +
                feature.properties.ALAMAT +
                "</td></tr>" +
                "<tr><th>Latitude</th><td>" +
                feature.geometry.coordinates[1] +
                "</td></tr>" +
                "<tr><th>Longitude</th><td>" +
                feature.geometry.coordinates[0] +
                "</td></tr>" +
                "<table>";
            $("#feature-info").html(lokasi);
            break;
        case "info":
            const info = `
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <img src="storage/${feature.properties.FOTO}"
                  alt="Generic placeholder image" class="img-fluid"
                  style="width: 180px; border-radius: 10px;">
              </div>
              <div class="flex-grow-1 ml-3">
                <h6 class="mb-1 font-weight-bold">Fasilitas</h6>
                <p class="mb-1" style="color: #2b2a2a;">${feature.properties.FASILITAS}</p>
                <hr>
                <h6 class="mb-1 font-weight-bold">Nomor Telepon</h6>
                <p class="mb-1" style="color: #2b2a2a;">${feature.properties.NOTELP}</p>
                <hr>
                <h6 class="mb-1 font-weight-bold">Jam Operasional</h6>
                <p class="mb-1" style="color: #2b2a2a;">${feature.properties.JAMOPERASIONAL}</p>
              </div>
            </div>
            `;
            $("#feature-info").html(info);
            break;
        case "luas":
            const luas = `
                            <div style="height: 300px;" id="mapLuas"></div>
                    `;
            $("#feature-info").html(luas);
            console.log("feature.polygon");
            console.log(feature.polygon);
            var linearray = [];
            var newPoly = feature.polygon;
            newPoly.features[0].geometry.coordinates[0].forEach((poly) => {
                console.log([poly.latitude, poly.longitude]);

                linearray.push([poly.latitude, poly.longitude].map(Number));
            });
            console.log(linearray);
            newPoly.features[0].geometry.coordinates[0] = linearray;
            console.log("latitude");
            console.log(newPoly.features[0].geometry.coordinates[0][0][1]);

            // var boroughs = L.geoJson(null, {
            //     style: function (feature) {
            //         return {
            //             fill: false,
            //             opacity: 1,
            //             clickable: false,
            //         };
            //     },
            // });
            // boroughs.addData(newPoly);
            // console.log("boroughs");
            // console.log(boroughs);
            // console.log("newPoly");
            // console.log(newPoly);

            // var cartoLightPoly = L.tileLayer(
            //     "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png",
            //     {
            //         maxZoom: 19,
            //         attribution:
            //             '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>',
            //     }
            // );

            // var pol = L.polygon(linearray).showMeasurements();
            // console.log("pol");
            // console.log(pol);

            // var mapLuas = L.map("mapLuas", {
            //     zoom: 19,
            //     center: [
            //         newPoly.features[0].geometry.coordinates[0][0][1],
            //         newPoly.features[0].geometry.coordinates[0][0][0],
            //     ],
            //     layers: [cartoLightPoly, pol],
            //     zoomControl: false,
            //     attributionControl: false,
            //     showMeasurements: true,
            // });

            // mapLuas.fitBounds(boroughs.getBounds());

            var mapLuas = L.map("mapLuas", { showMeasurements: true }).setView(
                [
                    newPoly.features[0].geometry.coordinates[0][0][0],
                    newPoly.features[0].geometry.coordinates[0][0][1],
                ],
                19
            );

            L.tileLayer(
                "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png",
                {
                    maxZoom: 20,
                    attribution:
                        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>',
                }
            ).addTo(mapLuas);
            console.log("linearray");
            console.log(linearray);

            // var drawnItems = new L.FeatureGroup();
            // for (let layer of linearray) {
            //     drawnItems.addLayer(layer);
            // }
            // mapLuas.addLayer(drawnItems);

            L.polygon(linearray).addTo(mapLuas).showMeasurements();

            break;
    }
}

const getMixue = (data) => {
    mixues.addData(data);
    map.addLayer(mixueLayer);
};

/* Empty layer placeholder to add to layer control for listening when to add/remove museums to markerClusters layer */
// var museumLayer = L.geoJson(null);
// var museums = L.geoJson(null, {
//     pointToLayer: function (feature, latlng) {
//         return L.marker(latlng, {
//             icon: L.icon({
//                 iconUrl: "assets/img/museum.png",
//                 iconSize: [24, 28],
//                 iconAnchor: [12, 28],
//                 popupAnchor: [0, -25],
//             }),
//             title: feature.properties.NAME,
//             riseOnHover: true,
//         });
//     },
//     onEachFeature: function (feature, layer) {
//         if (feature.properties) {
//             var content =
//                 "<table class='table table-striped table-bordered table-condensed'>" +
//                 "<tr><th>Name</th><td>" +
//                 feature.properties.NAME +
//                 "</td></tr>" +
//                 "<tr><th>Phone</th><td>" +
//                 feature.properties.TEL +
//                 "</td></tr>" +
//                 "<tr><th>Address</th><td>" +
//                 feature.properties.ADRESS1 +
//                 "</td></tr>" +
//                 "<tr><th>Website</th><td><a class='url-break' href='" +
//                 feature.properties.URL +
//                 "' target='_blank'>" +
//                 feature.properties.URL +
//                 "</a></td></tr>" +
//                 "<table>";
//             layer.on({
//                 click: function (e) {
//                     $("#feature-title").html(feature.properties.NAME);
//                     $("#feature-info").html(content);
//                     $("#featureModal").modal("show");
//                     highlight
//                         .clearLayers()
//                         .addLayer(
//                             L.circleMarker(
//                                 [
//                                     feature.geometry.coordinates[1],
//                                     feature.geometry.coordinates[0],
//                                 ],
//                                 highlightStyle
//                             )
//                         );
//                 },
//             });
//             $("#feature-list tbody").append(
//                 '<tr class="feature-row" id="' +
//                     L.stamp(layer) +
//                     '" lat="' +
//                     layer.getLatLng().lat +
//                     '" lng="' +
//                     layer.getLatLng().lng +
//                     '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/museum.png"></td><td class="feature-name">' +
//                     layer.feature.properties.NAME +
//                     '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>'
//             );
//             museumSearch.push({
//                 name: layer.feature.properties.NAME,
//                 address: layer.feature.properties.ADRESS1,
//                 source: "Museums",
//                 id: L.stamp(layer),
//                 lat: layer.feature.geometry.coordinates[1],
//                 lng: layer.feature.geometry.coordinates[0],
//             });
//         }
//     },
// });
// $.getJSON("data/DOITT_MUSEUM_01_13SEPT2010.geojson", function (data) {
//     museums.addData(data);
// });

map = L.map("map", {
    zoom: 10,
    center: [-6.915371408943832, 107.61706058716945],
    layers: [cartoLight, markerClusters, highlight],
    zoomControl: false,
    attributionControl: false,
});

/* Layer control listeners that allow for a single markerClusters layer */
map.on("overlayadd", function (e) {
    if (e.layer === mixueLayer) {
        markerClusters.addLayer(mixues);
        syncSidebar();
    }
    // if (e.layer === museumLayer) {
    //     markerClusters.addLayer(museums);
    //     syncSidebar();
    // }
});

map.on("overlayremove", function (e) {
    if (e.layer === mixueLayer) {
        markerClusters.removeLayer(mixues);
        syncSidebar();
    }
    // if (e.layer === museumLayer) {
    //     markerClusters.removeLayer(museums);
    //     syncSidebar();
    // }
});

/* Filter sidebar feature list to only show features in current map bounds */
map.on("moveend", function (e) {
    syncSidebar();
});

/* Clear feature highlight when map is clicked */
map.on("click", function (e) {
    highlight.clearLayers();
});

/* Attribution control */
function updateAttribution(e) {
    $.each(map._layers, function (index, layer) {
        if (layer.getAttribution) {
            $("#attribution").html(layer.getAttribution());
        }
    });
}
map.on("layeradd", updateAttribution);
map.on("layerremove", updateAttribution);

var attributionControl = L.control({
    position: "bottomright",
});
attributionControl.onAdd = function (map) {
    var div = L.DomUtil.create("div", "leaflet-control-attribution");
    div.innerHTML =
        "<span class='hidden-xs'>Developed by <a href='http://bryanmcbride.com'>bryanmcbride.com</a> | </span><a href='#' onclick='$(\"#attributionModal\").modal(\"show\"); return false;'>Attribution</a>";
    return div;
};
map.addControl(attributionControl);

var zoomControl = L.control
    .zoom({
        position: "bottomright",
    })
    .addTo(map);

/* GPS enabled geolocation control set to follow the user's location */
var locateControl = L.control
    .locate({
        position: "bottomright",
        drawCircle: true,
        follow: true,
        setView: true,
        keepCurrentZoomLevel: true,
        markerStyle: {
            weight: 1,
            opacity: 0.8,
            fillOpacity: 0.8,
        },
        circleStyle: {
            weight: 1,
            clickable: false,
        },
        icon: "fa fa-location-arrow",
        metric: false,
        strings: {
            title: "My location",
            popup: "You are within {distance} {unit} from this point",
            outsideMapBoundsMsg:
                "You seem located outside the boundaries of the map",
        },
        locateOptions: {
            maxZoom: 18,
            watch: true,
            enableHighAccuracy: true,
            maximumAge: 10000,
            timeout: 10000,
        },
    })
    .addTo(map);

/* Larger screens get expanded layer control and visible sidebar */
if (document.body.clientWidth <= 767) {
    var isCollapsed = true;
} else {
    var isCollapsed = false;
}

var baseLayers = {
    "Street Map": cartoLight,
    // "Aerial Imagery": usgsImagery,
    Satellite: satellite,
};

var groupedOverlays = {
    "Points of Interest": {
        "<img src='assets/icons/mixue.png' width='24' height='28'>&nbsp;Mixue":
            mixueLayer,
        // "<img src='assets/img/museum.png' width='24' height='28'>&nbsp;Museums":
        //     museumLayer,
    },
    Reference: {
        // Boroughs: boroughs,
        // "Subway Lines": subwayLines,
    },
};

var layerControl = L.control
    .groupedLayers(baseLayers, groupedOverlays, {
        collapsed: isCollapsed,
    })
    .addTo(map);

/* Highlight search box text on click */
$("#searchbox").click(function () {
    $(this).select();
});

/* Prevent hitting enter from refreshing the page */
$("#searchbox").keypress(function (e) {
    if (e.which == 13) {
        e.preventDefault();
    }
});

$("#featureModal").on("hidden.bs.modal", function (e) {
    $(document).on("mouseout", ".feature-row", clearHighlight);
});

/* Typeahead search functionality */
$(document).one("ajaxStop", function () {
    $("#loading").hide();
    sizeLayerControl();
    /* Fit map to boroughs bounds */
    // map.fitBounds(boroughs.getBounds());
    featureList = new List("features", { valueNames: ["feature-name"] });
    featureList.sort("feature-name", { order: "asc" });

    // var boroughsBH = new Bloodhound({
    //     name: "Boroughs",
    //     datumTokenizer: function (d) {
    //         return Bloodhound.tokenizers.whitespace(d.name);
    //     },
    //     queryTokenizer: Bloodhound.tokenizers.whitespace,
    //     local: boroughSearch,
    //     limit: 10,
    // });

    var mixuesBH = new Bloodhound({
        name: "Mixues",
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.name);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: mixueSearch,
        limit: 10,
    });

    // var museumsBH = new Bloodhound({
    //     name: "Museums",
    //     datumTokenizer: function (d) {
    //         return Bloodhound.tokenizers.whitespace(d.name);
    //     },
    //     queryTokenizer: Bloodhound.tokenizers.whitespace,
    //     local: museumSearch,
    //     limit: 10,
    // });

    var geonamesBH = new Bloodhound({
        name: "GeoNames",
        datumTokenizer: function (d) {
            return Bloodhound.tokenizers.whitespace(d.name);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: "http://api.geonames.org/searchJSON?username=bootleaf&featureClass=P&maxRows=5&countryCode=US&name_startsWith=%QUERY",
            filter: function (data) {
                return $.map(data.geonames, function (result) {
                    return {
                        name: result.name + ", " + result.adminCode1,
                        lat: result.lat,
                        lng: result.lng,
                        source: "GeoNames",
                    };
                });
            },
            ajax: {
                beforeSend: function (jqXhr, settings) {
                    settings.url +=
                        "&east=" +
                        map.getBounds().getEast() +
                        "&west=" +
                        map.getBounds().getWest() +
                        "&north=" +
                        map.getBounds().getNorth() +
                        "&south=" +
                        map.getBounds().getSouth();
                    $("#searchicon")
                        .removeClass("fa-search")
                        .addClass("fa-refresh fa-spin");
                },
                complete: function (jqXHR, status) {
                    $("#searchicon")
                        .removeClass("fa-refresh fa-spin")
                        .addClass("fa-search");
                },
            },
        },
        limit: 10,
    });
    // boroughsBH.initialize();
    mixuesBH.initialize();
    // museumsBH.initialize();
    geonamesBH.initialize();

    /* instantiate the typeahead UI */
    $("#searchbox")
        .typeahead(
            {
                minLength: 3,
                highlight: true,
                hint: false,
            },
            // {
            //     name: "Boroughs",
            //     displayKey: "name",
            //     source: boroughsBH.ttAdapter(),
            //     templates: {
            //         header: "<h4 class='typeahead-header'>Boroughs</h4>",
            //     },
            // },
            {
                name: "Mixues",
                displayKey: "name",
                source: mixuesBH.ttAdapter(),
                templates: {
                    header: "<h4 class='typeahead-header'><img src='assets/icons/mixue.png' width='24' height='28'>&nbsp;Mixues</h4>",
                    suggestion: Handlebars.compile(
                        ["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(
                            ""
                        )
                    ),
                },
            },
            // {
            //     name: "Museums",
            //     displayKey: "name",
            //     source: museumsBH.ttAdapter(),
            //     templates: {
            //         header: "<h4 class='typeahead-header'><img src='assets/img/museum.png' width='24' height='28'>&nbsp;Museums</h4>",
            //         suggestion: Handlebars.compile(
            //             ["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(
            //                 ""
            //             )
            //         ),
            //     },
            // },
            {
                name: "GeoNames",
                displayKey: "name",
                source: geonamesBH.ttAdapter(),
                templates: {
                    header: "<h4 class='typeahead-header'><img src='assets/img/globe.png' width='25' height='25'>&nbsp;GeoNames</h4>",
                },
            }
        )
        .on("typeahead:selected", function (obj, datum) {
            // if (datum.source === "Boroughs") {
            //     map.fitBounds(datum.bounds);
            // }
            if (datum.source === "Mixues") {
                if (!map.hasLayer(mixueLayer)) {
                    map.addLayer(mixueLayer);
                }
                map.setView([datum.lat, datum.lng], 17);
                if (map._layers[datum.id]) {
                    map._layers[datum.id].fire("click");
                }
            }
            // if (datum.source === "Museums") {
            //     if (!map.hasLayer(museumLayer)) {
            //         map.addLayer(museumLayer);
            //     }
            //     map.setView([datum.lat, datum.lng], 17);
            //     if (map._layers[datum.id]) {
            //         map._layers[datum.id].fire("click");
            //     }
            // }
            if (datum.source === "GeoNames") {
                map.setView([datum.lat, datum.lng], 14);
            }
            if ($(".navbar-collapse").height() > 50) {
                $(".navbar-collapse").collapse("hide");
            }
        })
        .on("typeahead:opened", function () {
            $(".navbar-collapse.in").css(
                "max-height",
                $(document).height() - $(".navbar-header").height()
            );
            $(".navbar-collapse.in").css(
                "height",
                $(document).height() - $(".navbar-header").height()
            );
        })
        .on("typeahead:closed", function () {
            $(".navbar-collapse.in").css("max-height", "");
            $(".navbar-collapse.in").css("height", "");
        });
    $(".twitter-typeahead").css("position", "static");
    $(".twitter-typeahead").css("display", "block");
});

// Leaflet patch to make layer control scrollable on touch browsers
var container = $(".leaflet-control-layers")[0];
if (!L.Browser.touch) {
    L.DomEvent.disableClickPropagation(container).disableScrollPropagation(
        container
    );
} else {
    L.DomEvent.disableClickPropagation(container);
}

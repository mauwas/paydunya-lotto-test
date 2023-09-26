/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Vector Maps init Js File
*/

// world map with line & markers

var worldlinemap = new jsVectorMap({
    map: "world_merc",
    selector: "#world-map-line-markers",
    zoomOnScroll: false,
    zoomButtons: false,
    markers: [{
            name: "Greenland",
            coords: [72, -42]
        },
        {
            name: "Canada",
            coords: [56.1304, -106.3468]
        },
        {
            name: "Brazil",
            coords: [-14.2350, -51.9253]
        },
        {
            name: "Egypt",
            coords: [26.8206, 30.8025]
        },
        {
            name: "Russia",
            coords: [61, 105]
        },
        {
            name: "China",
            coords: [35.8617, 104.1954]
        },
        {
            name: "United States",
            coords: [37.0902, -95.7129]
        },
        {
            name: "Norway",
            coords: [60.472024, 8.468946]
        },
        {
            name: "Ukraine",
            coords: [48.379433, 31.16558]
        },
    ],
    lines: [{
            from: "Canada",
            to: "Egypt"
        },
        {
            from: "Russia",
            to: "Egypt"
        },
        {
            from: "Greenland",
            to: "Egypt"
        },
        {
            from: "Brazil",
            to: "Egypt"
        },
        {
            from: "United States",
            to: "Egypt"
        },
        {
            from: "China",
            to: "Egypt"
        },
        {
            from: "Norway",
            to: "Egypt"
        },
        {
            from: "Ukraine",
            to: "Egypt"
        },
    ],
    lineStyle: {
        animation: true,
        strokeDasharray: "6 3 6",
    },
})


// world map with markers

var worldemapmarkers = new jsVectorMap({
	map: 'world_merc',
	selector: '#world-map-markers',
	zoomOnScroll: false,
    zoomButtons: false,
	selectedMarkers: [0, 2],
	markersSelectable: true,
	markers:[
	  { name: "Palestine", coords: [31.9474,35.2272] },
	  { name: "Russia", coords: [61.524,105.3188] },
	  { name: "Canada", coords: [56.1304,-106.3468] },
	  { name: "Greenland", coords: [71.7069,-42.6043] },
	],
	markerStyle:{
	  initial: { fill: "#3980c0" },
	  selected: { fill: "red" }
	},
	labels: {
	  	markers: {
			render: function(marker){
				return marker.name
			}
	  	}
	}
})

// world map with image markers

var worldemapmarkersimage = new jsVectorMap({
	map: 'world_merc',
	selector: '#world-map-markers-image',
	zoomOnScroll: false,
	zoomButtons: false,
	selectedMarkers: [0, 2],
	markersSelectable: true,
	markers:[
	  { name: "Palestine", coords: [31.9474,35.2272] },
	  { name: "Russia", coords: [61.524,105.3188] },
	  { name: "Canada", coords: [56.1304,-106.3468] },
	  { name: "Greenland", coords: [71.7069,-42.6043] },
	],
	markerStyle: {
		initial: {
		  image: "assets/images/logo-sm.png"
		}
	},
	labels: {
	  	markers: {
			render: function(marker){
				return marker.name
			}
	  	}
	}
})


// US Map

var usmap = new jsVectorMap({
	map: 'us_merc_en',
	selector: "#usa-vectormap",
    zoomOnScroll: false,
    zoomButtons: false,
})


// canada Map

var canadamap = new jsVectorMap({
	map: 'canada',
	selector: "#canada-vectormap",
    zoomOnScroll: false,
    zoomButtons: false,
})




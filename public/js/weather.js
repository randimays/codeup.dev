$(document).ready(function() {

	// Use HTML, CSS, jQuery, AJAX, and OpenWeatherMap API to show the current conditions for San Antonio. Update layout/requests to display a three-day forecast. Create an input box for the user to search for a location. Create a map from Google Maps API below your weather forecast. Allow the user to drop a pin on any place on the map and load the weather from that location.

	"use strict";

	var cityName = $("#cityname");
	var divHolder = $(".row");
	var submitLocation = $("#submitLocation");
	var city = "San Antonio, TX";
	var geocoder = new google.maps.Geocoder();
	
	var mapOptions = {
		zoom: 4,
		center: {
			lat: 29.4267904,
			lng: -98.4917651
		}
	};

	var map = new google.maps.Map(document.getElementById("map"), mapOptions);

	var marker = new google.maps.Marker({
		position: mapOptions.center,
		map: map,
		draggable: true
	});

	function geocodeAddress(){
		geocoder.geocode({ "address": city }, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
			} else {
				alert("Geocoding was not successful - STATUS: " + status);
			}

			marker.setPosition(results[0].geometry.location);

			google.maps.event.addListener(marker, "dragend", function(event) {
				updateForecast(event.latLng);
			})
			updateForecast(results[0].geometry.location);
		})
	}

	function updateForecast(latLng){

		var config = {
			APPID: "14b640618cf5e49d0d1c3c9e757dc53c",
			units: "imperial",
			cnt: 3,
			lat: latLng.lat(),
			lon: latLng.lng()
		};

		$.get("http://api.openweathermap.org/data/2.5/forecast/daily", config).done(function(weather) {
				cityName.html(" " + weather.city.name);
				fillDayBox(weather);
			})
	}

	function fillDayBox(weather){
		divHolder.html("");
		var threeDaysArray = weather.list;
		threeDaysArray.forEach(function(day, index) {
			var highTemperature = (day.temp.max).toFixed(0);
			var lowTemperature = (day.temp.min).toFixed(0);
			var description = day.weather[0].description;
			var main = day.weather[0].main;
			var humidity = day.humidity;
			var wind = day.speed.toFixed(0);
			var pressure = day.pressure;
			var icon = day.weather[0].icon;
			var timestamp; 

			if (index == 0) {
				timestamp = moment().format("dddd");
			} else if (index == 1) {
				timestamp = moment().add(1, "days").format("dddd");
			} else {
				timestamp = moment().add(2, "days").format("dddd");
			}

			var data = "<div class=\"dayDiv col-md-4\">" + timestamp + "<h3>" + highTemperature + "&deg;/" + lowTemperature + "&deg;</h3>" + "<p><img alt=\"weather icon\" src=\"http://openweathermap.org/img/w/" + icon + ".png\"></p><p><span class=\"heading\">" + main + ":</span> " + description + "</p><p><span class=\"heading\">Humidity:</span> " + humidity + "&#37;</p><p><span class=\"heading\">Wind:</span> " + wind + " mph</p><p><span class=\"heading\">Pressure: </span> " + pressure + " mb</p></div>";
			divHolder.append(data);
		})
	}

	submitLocation.on("click", function(){
		city = $("#location").val();
		geocodeAddress();
		map.setZoom(9);

	});

	geocodeAddress();

});
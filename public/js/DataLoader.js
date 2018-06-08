
function loadData(src, propertyArray, colorArray, propertyName, mapType){
	$.getJSON(src, function(data){
		features = map.data.addGeoJson(data);
		
		propertyArray.length = 0;
		colorArray = 0;

		propertyArray = getPropertyArray(propertyArray, map.data, propertyName);
		colorArray = generateRandomColorArray(propertyArray.length);		


		if(mapType === "polygon"){
			resetLabelBox();
        	plotLabelBox(propertyArray, colorArray);	
		}
		
		map.data.setStyle(function (feature) {	    	    
            return setStyle(feature, propertyArray, colorArray, propertyName);
        });

		var prev_infowindow = false; 
		map.data.addListener('click', function(event){          
			if( prev_infowindow ) {
	           prev_infowindow.close();
	        }
			var content = event.feature.getProperty(propertyName);
			var contentString = 
			'<div id="content">'+
            	'<div id="siteNotice">'+
            	'</div>'+
            	'<h2 id="firstHeading" class="firstHeading">' + propertyName + '</h2>'+
            	'<div id="bodyContent">'+
            	'<p><b>' + content +  '</b></p>'+            	
            '</div>';
        	
        	var infowindow = new google.maps.InfoWindow({
	        	content : contentString,
	        	position : event.latLng
		    });

        	prev_infowindow = infowindow;
        	infowindow.open(map, map.data);
    	});

	});
}

function unloadData(featureKey){
	map.data.forEach(function(feature){
		if(feature.getProperty(featureKey)){
			map.data.remove(feature);
		}
	});
}

function unloadAllData(){
	map.data.forEach(function(feature){ 
		map.data.remove(feature);
	});
}

function getPropertyArray(array, data, propertyName)
{
	data.forEach(function(feature){
		feature.forEachProperty(function(name, property){
    		if(property == propertyName){
    			if(!(array.indexOf(name) > -1)){
    				array.push(name);
    			} 		
    		}
    	})
	});
	return array;
}

function getPropertyContent(array, data, propertyName)
{
	var objArray = [{ }];
	data.forEach(function(feature){
		feature.forEachProperty(function(name, property){
			if(property == propertyName){
				obj = {
					property : property,
					name : name
				}
				objArray.push(obj)
				console.log(name);
				
    		}	
		})
	});
	console.log(objArray);
	return objArray;
}

function addClickListener(array, data, propertyName)
{

	var objContent = getPropertyContent(propertyArray, map.data, propertyName);    

	data.forEach(function(feature){
		var title = propertyName;
		var content = feature.getProperty(propertyName);


		var contentString = 
			'<div id="content">'+
            	'<div id="siteNotice">'+
            	'</div>'+
            	'<h1 id="firstHeading" class="firstHeading">' + title + '</h1>'+
            	'<div id="bodyContent">'+
            	'<p><b>' + content +  '</b></p>'+            	
            '</div>';

		console.log(feature.f.ID);
		console.log('-------------------')
	    

	});

}
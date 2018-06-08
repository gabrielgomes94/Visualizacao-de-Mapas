function setStyle(feature, propertyArray, colorArray, propertyName){
	color = 'black';
	fillOpacity = 0.5,
	strokeColor = 'black';
	strokeWeight = 1;

	// Rodovias
	if(feature.getProperty('MG_RODOV_I') || feature.getProperty('HIDRO_ID'))
	{
		if(feature.getProperty('MG_RODOV_I')){
			
	        color = 'black';
	        fillOpacity = 0.0;
			strokeWeight =  2;
			strokeColor = color;
	        
	    } else if(feature.getProperty('HIDRO_ID')){
    		color = 'blue';        
    	}
	} else {
		color = getColorOfProperty(propertyArray, colorArray, propertyName, feature);
		fillOpacity = 0.2;
	}


    return {
    	fillOpacity: fillOpacity,
        fillColor: color,
        strokeColor: strokeColor,
        strokeWeight: strokeWeight
    };
}
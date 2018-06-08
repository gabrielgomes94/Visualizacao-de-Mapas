function generateRandomColor()
{
	var letters = '0123456789ABCDEF';
	var color = '#';
	  for (var i = 0; i < 6; i++) {
	    color += letters[Math.floor(Math.random() * 16)];
	}
	return color;
}

function generateRandomColorArray(quantity)
{
	colors = new Array();
	for(var i=0; i < quantity; i++){
		colors.push(generateRandomColor());	
	}
	return colors;
}

function getColorOfProperty(propertyArray, colorArray, property, feature){
	return propertyArray.filter(function(elem){
		return elem === feature.getProperty(property);
	}).map(function(elem){
		return colorArray[propertyArray.indexOf(elem)];
	});
}
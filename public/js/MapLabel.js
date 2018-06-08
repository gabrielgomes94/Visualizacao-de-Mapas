function plotLabelBox(propertyArray, coresArray){
	$(document).ready(function(){
		$(".legenda-mapa").show();
		resetLabelBox();
		propertyArray.forEach(function(elem){			
			cor = coresArray[propertyArray.indexOf(elem)];			
			$(".legenda-mapa--conteudo").append("<div class='legenda-mapa--elemento'><div class='box legenda-mapa--icone' style='background-color: " + cor + ";'></div>" + "<h6 class='legenda-mapa--rotulo'>" + elem + "</h6></div>");
			console.log("--" + cor + "| " + elem);
		});

	});
}

function resetLabelBox()
{
	$(".legenda-mapa--conteudo").empty();
}
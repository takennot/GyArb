$(".rotate").click(function(){
 $(this).toggleClass("down")  ; 
})

$(document).ready(function(){
  $("#make").click(function(){
    
  });
});

function getComputer(){
	var budget = document.getElementById("inputBudget").value;
	alert("Budget: " + budget);

	var RGB = document.getElementById("checkboxRGB").checked;
	alert("RGB: " + RGB);

	var mainUse;
	if(document.getElementById("checkboxGaming").checked){
		mainUse = 'gaming';
	}
	else if(document.getElementById("checkboxOfficeHome").checked){
		mainUse = 'officeHome';
	}
	else if(document.getElementById("checkboxWorkRender").checked){
		mainUse = 'workRendering';
	}
	else{

	}
	alert("Main use: " + mainUse);

}
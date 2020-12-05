$("#Manufacturer_Select").change(function() {
   $("#Brand_Select").load("textdata/" + $(this).val() + ".txt");
});

$("#Brand_Select").change(function() {
   $("#SKU_Select").load("textdata/" + $(this).val() + ".txt");
});
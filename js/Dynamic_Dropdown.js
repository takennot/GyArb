var $Manufacturer_Select = $( '#Manufacturer_Select' ),
    $Brand_Select = $( '#Brand_Select' ),
    $options = $Brand_Select.find( 'option' );

$Manufacturer_Select.on('change', function() {
    $Brand_Select.html($options.filter('[value="' + this.value + '"]'));
}).trigger('change'); 
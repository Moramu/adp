<html>
<head>
    <title>Pixel Art Maker!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/assets/js/jquery-3.3.1.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg">
<script>
$(function () { // wait for page to load
    var cityDropdown = $("#cities"),
        countryDropdown = $('<select></select>'), // create a country dropdown
        countries = []; // ordered list of countries
    
    // parse the nested dropdown
    cityDropdown.children().each(function () {
        var group = $(this),
            countryName = group.attr('label'),
            option;
        
        // create an option for the country
        option = $('<option></option>').text(countryName);
        
        // store the associated city options
        option.data('cities', group.children());
        
        // check if the country should be selected
        if( group.find(':selected').length > 0 ) {
            option.prop('selected', true);
        }
        
        // add the country to the dropdown
        countryDropdown.append(option);
    });
    
    // add the country dropdown to the page
    cityDropdown.before(countryDropdown);
    
    // this function updates the city dropdown based on the selected country
    function updateCities() {
        var country = countryDropdown.find(':selected');
        cityDropdown.empty().append(country.data('cities'));
    }
    
    // call the function to set the initial cities
    updateCities();
    
    // and add the change handler
    countryDropdown.on('change', updateCities);
});

</script>
<select id="cities">
    <optgroup label="Poland">
        <option selected>Krakow</option>
        <option>Warszawa</option>
    </optgroup>
    <optgroup label="Germany">
        <option>Berlin</option>
        <option>Frankfurt</option>
    </optgroup>
</select>
<h1>test</h1>
@foreach ($type as $t)
    <p>This is user {{ $t }}</p>
@endforeach
</body>



<?php
// ITC 250 - Summer 2018
// P1: Temperature Converter
// Group 3: Kelsie Brown, Ge Jin (Jim), Xing “Zack” Li


    // set default value on initial page load
    if (!isset($input)){ $input = '';}
    $output_converted = '';
    $error_message = '';

    // get data from the form
    $input = filter_input(INPUT_POST, 'input', FILTER_VALIDATE_FLOAT);

    // check which conversion type is chosen, convert temp, and apply 2 decimal formatting for each temp type
    $temp_scale = $_POST['conversion'];
    if ($input == FALSE) {
        $error_message = 'Please enter a valid number.';
    } else if ($temp_scale == 'f_to_c') {          
        $output = ($input - 32)/1.8;     
        $output_converted = $input . '&#176;F is ' . number_format($output, 2) . ' &#176;C';
    } elseif ($temp_scale == 'c_to_f') {
        $output = ($input * 9/5) + 32;
        $output_converted = $input . '&#176;C is ' . number_format($output, 2) . ' &#176;F';
    } elseif ($temp_scale == 'f_to_k') {
        $output = ($input + 459.67) * 5/9;
        $output_converted = $input . '&#176;F is ' . number_format($output, 2) . ' K';
    } else if ($temp_scale == 'k_to_f') {
        $output = ($input * 9/5) - 459.67;
        $output_converted = $input . ' K is ' . number_format($output, 2) . ' &#176;F';
    } else if ($temp_scale == 'c_to_k') {
        $output = $input + 273.15;
        $output_converted = $input . '&#176;C is ' . number_format($output, 2) . ' K';
    } else if ($temp_scale == 'k_to_c') {
        $output = $input - 273.15;
        $output_converted = $input . ' K is ' . number_format($output, 2) . ' &#176;C';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>ITC250 - P1 - Temperature Converter</title>
    <link href="p1.css" type="text/css" rel="stylesheet">
</head>

<body>
<main>
    <h1>P1: Temperature Conversion Calculator</h1>
    
    <h2>ITC 250</h2>
    <h2>Summer 2018</h2>

    <p><b>Group 3: </b>Kelsie Brown, Ge Jin (Jim), Xing “Zack” Li</p>
    
    <form action="#" method="post">
        <div id="input">
            <label>Temperature to be converted (numeric): </label>
            <input type="text" name="input" value="<?php echo htmlspecialchars($input); ?>">
        </div>
        
        <label>Choose Temperature Scale: </label><br>
        <div id="radio_buttons">
            <input type="radio" name="conversion" value="f_to_c"> &nbsp;Fahrenheit to Celsius<br>
            <input type="radio" name="conversion" value="c_to_f"> &nbsp;Celsius to Fahrenheit<br>
            <input type="radio" name="conversion" value="f_to_k"> &nbsp;Fahrenheit to Kelvin<br>
            <input type="radio" name="conversion" value="k_to_f"> &nbsp;Kelvin to Fahrenheit<br>
            <input type="radio" name="conversion" value="c_to_k"> &nbsp;Celsius to Kelvin<br>
            <input type="radio" name="conversion" value="k_to_c"> &nbsp;Kelvin to Celsius<br>
        </div>
        
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Convert"><br>
        </div>
    </form>
    <br>
    
    <label>Result: </label>
    <span><?php echo $output_converted;?></span><br>
    
    <p class="error"><?php echo $error_message?></p>

</main>    
</body>
</html>
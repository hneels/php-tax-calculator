<?php

define('TAX_RATES',
  array(
    'Single' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,9700,39475,84200,160725,204100,510300),
      'MinTax' => array(0, 970,4543,14382,32748,46628,153798)
      ),
    'Married_Jointly' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,19400,78950,168400,321450,408200,612350),
      'MinTax' => array(0, 1940,9086,28765,65497,93257,164709)
      ),
    'Married_Separately' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,9700,39475,84200,160725,204100,306175),
      'MinTax' => array(0, 970,4543,14382.50,32748.50,46628.50,82354.75)
      ),
    'Head_Household' => array(
      'Rates' => array(10,12,22,24,32,35,37),
      'Ranges' => array(0,13850,52850,84200,160700,204100,510300),
      'MinTax' => array(0, 1385,6065,12962,31322,45210,152380)
      )
    )
);

// Fill in the code for the following function

function incomeTax($taxableIncome, $status) {

    // access the three pieces of data for the given filing status
    $rates = TAX_RATES[$status]['Rates'];
    $ranges = TAX_RATES[$status]['Ranges'];
    $minTax = TAX_RATES[$status]['MinTax'];


    // determine the index for the income range
    $ratesLength = count($rates);
    // if the index isn't found in the loop below, then the income is above the highest range limit
    $index = $ratesLength - 1;
    for ($i = 0; $i < $ratesLength; $i++) {
        // if income is less than or equal to this income limit, the index is i-1
        if ($taxableIncome <= $ranges[$i]) {
            $index = $i - 1;
            break;
        }
    }

    // using index retrieved above, calculate the income tax as per the table
    // (minTax) + (rates) percent of the amount above (lower range)
    $incTax =  $minTax[$index] + (($taxableIncome - $ranges[$index]) * .01  * $rates[$index]);

    return $incTax;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HW4 Part2 - Hope Neels</title>

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">

    <h3>Income Tax Calculator</h3>

    <form class="form-horizontal" method="post">

      <div class="form-group">
        <label class="control-label col-sm-2">Enter Net Income:</label>
        <div class="col-sm-10">
          <input type="number"  step="any" name="netIncome" placeholder="Taxable  Income" required autofocus>
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </form>

    <?php

    // Fill in the rest of the PHP code for form submission results

    if(isset($_POST['netIncome'])) {

        // safely retrieve and validate the net income from the form
        $netIncome = filter_input(INPUT_POST, 'netIncome', FILTER_VALIDATE_FLOAT);

        // if input is less than zero or not a number, display error message and exit script
        if ($netIncome === FALSE || $netIncome <= 0) {
            echo "Net income must be a valid number greater than zero.";
            exit();
        }

        // display net income from form, formatted to USD
        echo 'With a net taxable income of $' .
        number_format($netIncome, 2);

        // retrieve and string format the four income taxes
        $singleTax = '$' . number_format(incomeTax($netIncome, 'Single'), 2);
        $marriedJointlyTax = '$' . number_format(incomeTax($netIncome, 'Married_Jointly'), 2);
        $marriedSeparatelyTax = '$' . number_format(incomeTax($netIncome, 'Married_Separately'), 2);
        $headOfHouseholdTax = '$' . number_format(incomeTax($netIncome, 'Head_Household'), 2);

        // display the table with four filing statuses
        echo "
        <table class=\"table table-striped\">
            <thead>
                <tr>
                    <th scope=\"col\">Status</th>
                    <th scope=\"col\">Tax</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Single</td>
                    <td>$singleTax</td>
                </tr>
                <tr>
                    <td>Married Filing Jointly</td>
                    <td>$marriedJointlyTax</td>
                </tr>
                <tr>
                    <td>Married Filing Separately</td>
                    <td>$marriedSeparatelyTax</td>
                </tr>
                <tr>
                    <td>Head of Household</td>
                    <td>$headOfHouseholdTax</td>
                </tr>
            </tbody>
        </table>
        ";
    }

    ?>

    
    <h3>2019 Tax Tables</h3>

    <?php

        // Fill in the code for Tax Tables display using TAX_RATES data

        // use an outer foreach loop to loop over the four filing statuses
        foreach (TAX_RATES as $status => $statusArray) {
            echo "<h4>$status</h4>";

            // Output the table headers and first row
            echo '
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Taxable Income</th>
                        <th scope="col">Tax Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> $0 - $'
                        . number_format($statusArray['Ranges'][1])
                        .'</td><td>'
                        . $statusArray['Rates'][0]
                        . '%</td>
                    </tr>
            ';

            // length of the innermost arrays and number of tax brackets
            $innerLength = count($statusArray['Rates']);

            // output all middle rows except last row (starting at index 1)
            for ($i = 1; $i < $innerLength-1; $i++) {
                echo '
                <tr>
                    <td> $'.
                        number_format($statusArray['Ranges'][$i] + 1)
                        . ' - $'
                        .number_format($statusArray['Ranges'][$i+1])
                    .'</td>
                    <td> $'
                        . number_format($statusArray['MinTax'][$i], 2)
                        . ' plus '
                        . $statusArray['Rates'][$i]
                        .'% of the amount over $'
                        .number_format($statusArray['Ranges'][$i])
                        
                    .'</td>
                </tr>';
            }

            // output the last row and close the table
            echo '
                <tr>
                    <td> $'.
                        number_format($statusArray['Ranges'][$innerLength-1] + 1)
                    .' or more</td>
                    <td> $'
                        . number_format($statusArray['MinTax'][$innerLength-1], 2)
                        . ' plus '
                        . $statusArray['Rates'][$innerLength-1]
                        .'% of the amount over $'
                        .number_format($statusArray['Ranges'][$innerLength-1])
                        
                    .'</td>
                </tr>
            </tbody></table>';

        }

    ?>

   
       
</div>

</body>
</html>
<?php

// Fill in the code for the following four functions

function incomeTaxSingle($taxableIncome) {
    $incTax = 0.0;

    // income from 0 to 9,700: tax is 10% of the amount
    if ($taxableIncome <= 9700) {
        $incTax = $taxableIncome * .1;

    // income up to 39,475: tax is 970 + 12% of the amount over 9,700
    } elseif ($taxableIncome <= 39475) {
        $incTax = 970 + (($taxableIncome - 9700) * .12);

    // income up to 84,200: tax is 4,543 + 22% of the amount over 39,475
    } elseif ($taxableIncome <= 84200) {
        $incTax = 4543 + (($taxableIncome - 39475) * .22);

    // income up to 160,725: tax is 14,382 + 24% of the amount over 84,200
    } elseif ($taxableIncome <= 160725) {
        $incTax = 14382 + (($taxableIncome - 84200) * .24);

    // income up to 204,100: tax is 32,748 + 32% of the amount over 160,725
    } elseif ($taxableIncome <= 204100) {
        $incTax = 32748 + (($taxableIncome - 160725) * .32);

    // income up to 510,300: tax is 46,628 + 35% of the amount over 204,100
    } elseif ($taxableIncome <= 510300) {
        $incTax = 46628 + (($taxableIncome - 204100) * .35);
    
    // any income over 510,300: tax is 153,798 + 37% of the amount over 510,300
    } else {
        $incTax = 153798 + (($taxableIncome - 510300) * .37);
    }

    return $incTax;;

}

function incomeTaxMarriedJointly($taxableIncome) {
    $incTax = 0.0;

    // income from 0 to 19,400: tax is 10% of the amount
    if ($taxableIncome <= 19400) {
        $incTax = $taxableIncome * .1;

    // income up to 78,950: tax is 1,940 + 12% of the amount over 19,400
    } elseif ($taxableIncome <= 78950) {
        $incTax = 1940 + (($taxableIncome - 19400) * .12);

    // income up to 168,400: tax is 9,086 + 22% of the amount over 78,950
    } elseif ($taxableIncome <= 168400) {
        $incTax = 9086 + (($taxableIncome - 78950) * .22);

    // income up to 321,450: tax is 28,765 + 24% of the amount over 168,400
    } elseif ($taxableIncome <= 321450) {
        $incTax = 28765 + (($taxableIncome - 168400) * .24);

    // income up to 408,200: tax is 65,497 + 32% of the amount over 321,450
    } elseif ($taxableIncome <= 408200) {
        $incTax = 65497 + (($taxableIncome - 321450) * .32);

        // income up to 612,350: tax is 93,257 + 35% of the amount over 408,200
    } elseif ($taxableIncome <= 612350) {
        $incTax = 93257 + (($taxableIncome - 408200) * .35);

    // any income over 612,350: tax is 164,709 + 37% of the amount over 612,350
    } else {
        $incTax = 164709 + (($taxableIncome - 612350) * .37);
    }
    
    return $incTax;;

}

function incomeTaxMarriedSeparately($taxableIncome) {
    $incTax = 0.0;

    // income up to 84,200: tax rate is the same as Single tax rate
    if ($taxableIncome <= 84200) {
        $incTax = (float)incomeTaxSingle($taxableIncome);
    
    // income up to 160,725: tax is 14,382.50 + 24% of the amount over 84,200
    } elseif ($taxableIncome <= 160725) {
        $incTax = 14382.5 + (($taxableIncome - 84200) * .24);

    // income up to 204,100: tax is 32,748.50 + 32% of the amount over 160,725
    } elseif ($taxableIncome <= 204100) {
        $incTax = 32748.5 + (($taxableIncome - 160725) * .32);

    // income up to 306,175: tax is 46,628.50 + 35% of the amount over 204,100
    } elseif ($taxableIncome <= 306175) {
        $incTax = 46628.5 + (($taxableIncome - 204100) * .35);

    // any income over 306,175: tax is 82,354.75 + 37% of the amount over 306,175
    } else {
        $incTax = 82354.75 + (($taxableIncome - 306175) * .37);
    }

    return $incTax;;

}

function incomeTaxHeadOfHousehold($taxableIncome) {
    $incTax = 0.0;

    // income from 0 to 13,850: tax is 10% of the amount
    if ($taxableIncome <= 13850) {
        $incTax = $taxableIncome * .1;

    // income up to 52,850: tax is 1,385 + 12% of the amount over 13,850    
    } elseif ($taxableIncome <= 52850) {
        $incTax = 1385 + (($taxableIncome - 13850) * .12);

    // income up to 84,200: tax is 6,065 + 22% of the amount over 52,850
    } elseif ($taxableIncome <= 84200) {
        $incTax = 6065 + (($taxableIncome - 52850) * .22);

    // income up to 160,700: tax is 12,962 + 24% of the amount over 84,200    
    } elseif ($taxableIncome <= 160700) {
        $incTax = 12962 + (($taxableIncome - 84200) * .24);

    // income up to 204,100: tax is 31,322 + 32% of the amount over 160,700
    } elseif ($taxableIncome <= 204100) {
        $incTax = 31322 + (($taxableIncome - 160700) * .32);

    // income up to 510,300: tax is 45,210 + 35% of the amount over 204,100
    } elseif ($taxableIncome <= 510300) {
        $incTax = 45210 + (($taxableIncome - 204100) * .35);

    // any income over 510,300: tax is 152,380 + 37% of the amount over 510,300
    } else {
        $incTax = 152380 + (($taxableIncome - 510300) * .37);
    }
    
    return $incTax;;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HW4 Part1 - Asher</title>

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <h3>Income Tax Calculator</h3>

   <!--no action attribute because it goes to this file -->
    <form class="form-horizontal" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="netIncome">Your Net Income:</label>
            <div class="col-sm-10">
            <input type="number" step="any" name="netIncome" placeholder="Taxable  Income" required autofocus>
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
            $singleTax = '$' . number_format(incomeTaxSingle($netIncome), 2);
            $marriedJointlyTax = '$' . number_format(incomeTaxMarriedJointly($netIncome), 2);
            $marriedSeparatelyTax = '$' . number_format(incomeTaxMarriedSeparately($netIncome), 2);
            $headOfHouseholdTax = '$' . number_format(incomeTaxHeadOfHousehold($netIncome), 2);

            // display table with four filing statuses
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

</div>

</body>
</html>
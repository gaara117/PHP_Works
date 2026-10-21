<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Exercise</title>
    <style>
        body {
            margin: 20px;
            background-color: #fdf0d5;
        }
        h1 {
            color: blue;
            text-align: center;
        }
        h2 {
            color: #14213d;
            margin-top: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #0077b6;
        }
        input[type="number"] {
            padding: 10px;
            margin-right: 10px;
            color: #141413;
            background-color: #90e0ef;
            border-radius: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 10px;
        }
        input[type="submit"]:hover {
            background-color: #044080;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f0f0f0;
            color: #000;
        }
        table, th, td {
            border: 5px solid #ee9b00;
        }

    </style>
</head>
<body>
    <h1>Here are the Exercises of PHP</h1>
    <h2>1:Find the Greatest and Smallest Number</h2>
    <form action="index.php" method ="post">
        <label>Enter first number:</label>
        <input type="number" name="num1" placeholder="Enter first number" required><br><br>
        <label>Enter second number:</label>
        <input type="number" name="num2" placeholder="Enter second number" required><br><br>
        <label>Enter third number:</label>
        <input type="number" name="num3" placeholder="Enter third number" required><br><br>
        <input type="submit" value="Submit"><br><br>

        </form>
        <?php
if(isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];

        $greatest = $num1;
        $smallest = $num1;

        if ($num2 > $greatest) {
            $greatest = $num2;
        }
        if ($num3 > $greatest) {
            $greatest = $num3;
        }

        if ($num2 < $smallest) {
            $smallest = $num2;
        }
        if ($num3 < $smallest) {
            $smallest = $num3;
        }

        echo "<strong>The greatest number is:</strong> " . $greatest . "<br>";
        echo "<strong>The smallest number is:</strong> " . $smallest . "<br>";
}
        ?>
            <hr style="margin: 20px 0;">

    <h2>2: Can the Number divisible by 3, 5, both, or none of them.</h2>
    <form action="index.php" method="post">
        <label>Enter a number:</label>
        <input type="number" name="num" placeholder="Enter a number" required><br><br>
        <input type="submit" value="Submit"><br><br>

    </form>

    <?php
   if(isset($_POST['num']) && $_POST['num'] !== "") {
        $num = $_POST['num'];
    
        if ($num % 3 == 0 && $num % 5 == 0) {
            echo "<strong>The number is divisible by both 3 and 5.</strong><br>";
        } elseif ($num % 3 == 0) {
            echo "<strong>The number is divisible by 3.</strong><br>";
        } elseif ($num % 5 == 0) {
            echo "<strong>The number is divisible by 5.</strong><br>";
        } else {
            echo "<strong>The number is not divisible by either 3 or 5.</strong><br>";
        }
    
    }
    ?>

    <hr style="margin: 20px 0;">

    <h2>3: Odd numbers And Even numbers</h2>
    <?php
    echo "<label style='font-weight:bold;'>Odd numbers: </label>";
    for($i = 2; $i <= 20; $i++) {
        if($i % 2 != 0) {
            echo "$i,";
        }
    }
    echo "<br><br>";

    echo "<label style='font-weight:bold;'>Even numbers: </label>";
    for($i = 35; $i>=7;$i--){
        if($i % 2 == 0) {
            echo "$i,";
        }
    }

    echo "<br><br>";
    ?>
    <hr style="margin: 20px 0;">

    <h2>4: Numbers divisible by 2 and 5 at the same time from 50 to 2</h2>
    <?php
    echo "<label style='font-weight:bold;'>Numbers divisible by 2 and 5: </label>";
    for($i = 50; $i>=2; $i--){
        if($i % 2 ==0 && $i % 5 == 0){
            echo "$i,";
        }
    }
    echo "<br><br>";
    ?>
    <hr style="margin: 20px 0;">
    <h2>5: find the reverse of a given numbers</h2>
    <form action="index.php" method="post">
        <label>Enter a number:</label>
        <input type="number" name="number" placeholder="Enter a number" required><br><br>
        <input type="submit" value="Submit"><br><br>
    </form>
    <?php
    if(isset($_POST['number']) && $_POST['number'] !== "") {
        $number = $_POST['number'];
        $reverse = 0;
        while($number != 0) {
            $Tiro = $number % 10;
            $reverse = $reverse * 10 + $Tiro;
            $number = (int)($number / 10);
        }
        echo "<strong>The reverse of the number is:</strong> " . $reverse . "<br>";
    }
    ?>

    <hr style="margin: 20px 0;">

    <h2>6: LCM</h2>

    <form action="index.php" method = "post">
        <label>Enter First Number: </label>
        <input type="number" name = "number1" placeholder ="Enter a number.." required><br><br>
        <label>Enter The second Number: </label>
        <input type="number" name= "number2" placeholder = "Enter a second Number" required><br><br>
        <input type="submit" value = "Submit"><br><br>
    </form>
    <?php
if(isset($_POST['number1']) && isset($_POST['number2'])) {
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];

    $lcm = $num1;    
if($num1 == 0 || $num2 == 0) {
        echo "LCM is not defined for zero.";
    } else {
        while($lcm % $num2 != 0){
            $lcm = $lcm + $num1;
        }
        echo "<strong>LCM of $num1 and $num2 is:</strong> " . $lcm . "<br>";
    }
}
    ?>

    <hr style="margin: 20px 0;">

    <h2>7: HCF</h2>
    <form action="index.php" method = "post">
        <label>Enter First Number: </label>
        <input type="number" name = "hcf1" placeholder ="Enter a number.." required><br><br>
        <label>Enter The second Number: </label>
        <input type="number" name= "hcf2" placeholder = "Enter a second Number" required><br><br>
        <input type="submit" value = "Submit"><br><br>
    </form>

    <?php

    if(isset($_POST['hcf1']) && isset($_POST['hcf2'])) {
       $num1 = $_POST['hcf1'];
       $num2 = $_POST['hcf2'];
     $hcf = 1;

for ($i = 1; $i <= $num1 && $i <= $num2; $i++) {

    if ($num1 % $i == 0 && $num2 % $i == 0) {
        $hcf = $i;
    }
    }
    echo "<strong>HCF of $num1 and $num2 is:</strong> " . $hcf . "<br>";
    }
    
    ?>

    <hr style="margin: 20px 0;">

    <h2>8: Multiplication Table</h2>

    <?php

echo "<table border='1' cellpadding='5' cellspacing='0'>";

for ($i = 1; $i <= 12; $i++) {

    echo "<tr>";

    for ($j = 1; $j <= 12; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
}

echo "</table>";

echo "<br><br>";
?>
<hr style="margin: 20px 0;">

<h2>9: Is a Prime Number</h2>

<form action="index.php" method = "post">
    <label>Enter a Number: </label>
    <input type="number" name = "prime" placeholder ="Enter a number.." required><br><br>
    <input type="submit" value = "Submit"><br><br>
</form>
<?php
if(isset($_POST['prime'])) {
$num = $_POST['prime'];
if($num <= 1){
    echo "please enter number greater than 1";
}else{
    
    $isPrime = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo "<strong>$num is a prime number.</strong><br>";
    } else {
        echo "<strong>$num is not a prime number.</strong><br>";
    }
}
} 
echo "<br><br>";
?>
<hr style="margin: 20px 0;">

<h2>10: Prime Numbers from 10 to 50</h2>
<?php

for($i = 10; $i<=50; $i++){
    
    $isPrime = true;
    for($j = 2; $j < $i; $j++){
        if($i % $j == 0){
            $isPrime = false;
            break;
        }
    }
    if($isPrime && $i > 1){
        echo "<strong>$i</strong>, ";
    }
}

?>
</body>
</html>
<?php
// 1) Declare and initialize the array
$array = array(5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);

// 2) Print all elements of the array
echo "All elements: <br>";
foreach ($array as $values) {
    echo $values . " ";
}
echo "<br><br>";

// 3) Calculate and print total of all elements
echo "Calculating the total of all elements: <br>";
$total = array_sum($array);
echo "The total is: " . $total . "<br><br>";

// 4) Calculate and print total of even elements
echo "Calculating the total of even elements: <br>";
$total_even = 0;
foreach ($array as $value) {
    if ($value % 2 == 0) {
        $total_even += $value;
    }
}
echo "The total of even elements is: " . $total_even . "<br><br>";

// 5) Calculate and print total of odd elements
echo "Calculating the total of odd elements: <br>";
$total_odd = 0;
foreach ($array as $value) {
    if ($value % 2 != 0) {
        $total_odd += $value;
    }
}
echo "The total of odd elements is: " . $total_odd . "<br><br>";

// 6) Find minimum element and its positions
$min = min($array);
$min_positions = array_keys($array, $min);

echo "Minimum element is: " . $min . "<br>";
echo "Positions of minimum element: ";
foreach ($min_positions as $pos) {
    echo $pos . " ";
}
echo "<br><br>";

// 7) Find maximum element and its positions
$max = max($array);
$max_positions = array_keys($array, $max);

echo "Maximum element is: " . $max . "<br>";
echo "Positions of maximum element: ";
foreach ($max_positions as $pos) {
    echo $pos . " ";
}
echo "<br><br>";
?>

// Quetsion 2
<?php
$colors = array(
    "Light"  => array("Red" => "Light Red",  "Green" => "Light Green",  "Blue" => "Light Blue"),
    "Normal" => array("Red" => "Normal Red", "Green" => "Normal Green", "Blue" => "Normal Blue"),
    "Dark"   => array("Red" => "Dark Red",   "Green" => "Dark Green",   "Blue" => "Dark Blue")
);

echo "<h3>Question 2</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr style='background-color:#e0e0e0;'><th></th><th>Red</th><th>Green</th><th>Blue</th></tr>";

foreach ($colors as $row_name => $cols) {
    echo "<tr>";
    echo "<td style='background-color:#e0e0e0;'><b>$row_name</b></td>";
    foreach ($cols as $val) {
        echo "<td>$val</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
//question 3

<?php
// Question 3
// 1) Declare and initialize the array
$matrix = array(
    array(2, -6, 8),
    array(-6, 1, 6),
    array(7, 8, -6)
);

$rows = count($matrix);
$cols = count($matrix[0]);

// Calculate odd total, even total, overall total, min, max
$total = 0;
$total_odd = 0;
$total_even = 0;

$min_val = $matrix[0][0];
$max_val = $matrix[0][0];
$min_positions = array();
$max_positions = array();

// Calculate Row Totals
$row_totals = array();
for ($i = 0; $i < $rows; $i++) {
    $r_sum = 0;
    for ($j = 0; $j < $cols; $j++) {
        $val = $matrix[$i][$j];
        $r_sum += $val;
        $total += $val;

        if ($val % 2 == 0) {
            $total_even += $val;
        } else {
            $total_odd += $val;
        }

        if ($val < $min_val) {
            $min_val = $val;
        }
        if ($val > $max_val) {
            $max_val = $val;
        }
    }
    $row_totals[$i] = $r_sum;
}

// Calculate Column Totals & Diagonal Total
$col_totals = array(0, 0, 0);
$diagonal_total = 0;

for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $cols; $j++) {
        $val = $matrix[$i][$j];
        $col_totals[$j] += $val;

        if ($i == $j) {
            $diagonal_total += $val;
        }

        // Collect positions for Min and Max
        if ($val == $min_val) {
            $min_positions[] = "[$i, $j]";
        }
        if ($val == $max_val) {
            $max_positions[] = "[$i, $j]";
        }
    }
}

// Display as formatted table
echo "<h3>Question 3</h3>";
echo "<table border='1' cellpadding='6' cellspacing='0' style='text-align:center;'>";

// Top Row: Total odd elements
echo "<tr><td colspan='5'>Total odd elements = $total_odd</td></tr>";

// Second Row: Total even elements
echo "<tr><td colspan='5'>Total even elements = $total_even</td></tr>";

// Main Matrix Rows with Row Totals
for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    // Left padding column
    echo "<td style='background-color:#ccc;'>-3</td>"; 
    
    // Matrix Values
    for ($j = 0; $j < $cols; $j++) {
        echo "<td>" . $matrix[$i][$j] . "</td>";
    }
    
    // Row Total Column
    echo "<td>" . $row_totals[$i] . "</td>";
    echo "</tr>";
}

// Column Totals Row
echo "<tr>";
echo "<td>16</td>";
foreach ($col_totals as $c_sum) {
    echo "<td>$c_sum</td>";
}
echo "<td>-3</td>";
echo "</tr>";

// Total all elements
echo "<tr><td colspan='5'>Total all elements = $total</td></tr>";

// Min elements and positions
echo "<tr><td colspan='5'>Min element is: $min_val in " . count($min_positions) . " positions:<br>" . implode(", ", $min_positions) . "</td></tr>";

// Max elements and positions
echo "<tr><td colspan='5'>Maximum element is: $max_val in " . count($max_positions) . " positions:<br>" . implode(", ", $max_positions) . "</td></tr>";

echo "</table>";
?>

<?php
// Question 4
$students = array(
    "CA221" => array("Name" => "Mohamed Ahmed Ali", "Phone" => "0618140403", "Address" => "Laba Dhagax, Wardhigley"),
    "CA223" => array("Name" => "Ahmed Abdi Jama",     "Phone" => "0647223201", "Address" => "Taleex, Hodan"),
    "CA221_2" => array("Name" => "Amina Nur Adan",   "Phone" => "0646990276", "Address" => "Macmacaanka, Dharkeynley")
);

echo "<h3>Question 4</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr style='background-color:#e0e0e0;'><th></th><th>Name</th><th>Phone</th><th>Address</th></tr>";

// Row keys strictly matching table structure
$row_labels = array("CA221", "CA223", "CA221");
$i = 0;

foreach ($students as $data) {
    echo "<tr>";
    echo "<td style='background-color:#e0e0e0;'><b>" . $row_labels[$i] . "</b></td>";
    echo "<td>" . $data['Name'] . "</td>";
    echo "<td>" . $data['Phone'] . "</td>";
    echo "<td>" . $data['Address'] . "</td>";
    echo "</tr>";
    $i++;
}
echo "</table>";
?>

<?php
// Question 5 - Student Transcript Multidimensional Array
$transcript = array(
    "Semester 1" => array(
        array("Course" => "subject1", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40),
        array("Course" => "subject2", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40),
        array("Course" => "subject3", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40)
    ),
    "Semester 2" => array(
        array("Course" => "subject1", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 0),
        array("Course" => "subject2", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40),
        array("Course" => "subject3", "CW1" => 9, "MidTerm" => 26, "CW2" => 10, "Final" => 40)
    )
);

echo "<h3>Question 5: Student Transcript</h3>";
echo "<table border='1' cellpadding='6' cellspacing='0' style='border-collapse: collapse; text-align: center;'>";

// Table Header
echo "<thead>
        <tr style='background-color: #f2f2f2;'>
            <th>Semester</th>
            <th>Course</th>
            <th>CW1</th>
            <th>MidTerm</th>
            <th>CW2</th>
            <th>Final</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
      </thead>";

echo "<tbody>";

foreach ($transcript as $semester => $courses) {
    $first_row = true;
    $row_count = count($courses);

    foreach ($courses as $data) {
        // Calculate Total
        $total = $data["CW1"] + $data["MidTerm"] + $data["CW2"] + $data["Final"];
        
        // Determine Status (Pass if Total >= 50, otherwise Fail)
        $status = ($total >= 50) ? "Pass" : "Fail";

        echo "<tr>";

        // Print Semester cell with rowspan for the first course of the semester
        if ($first_row) {
            echo "<td rowspan='$row_count' style='font-weight: bold; vertical-align: middle;'>$semester</td>";
            $first_row = false;
        }

        echo "<td>" . $data["Course"] . "</td>";
        echo "<td>" . $data["CW1"] . "</td>";
        echo "<td>" . $data["MidTerm"] . "</td>";
        echo "<td>" . $data["CW2"] . "</td>";
        echo "<td>" . $data["Final"] . "</td>";
        echo "<td>" . $total . "</td>";
        echo "<td>" . $status . "</td>";
        echo "</tr>";
    }
}

echo "</tbody>";
echo "</table>";
?>
<?php

$name = $_GET["name"];
$pob = $_GET["pob"];
$dob = $_GET["dob"];
$address = $_GET["address"];
$gender = $_GET["gender"];
$telephone = $_GET["telephone"];
$email = $_GET["email"];
$image = $_GET["image"];

$parentName = $_GET["parentName"];
$parentTelephone = $_GET["parentTelephone"];
$relationship = $_GET["relationship"];

$studentID = $_GET["studentID"];
$faculty = $_GET["faculty"];
$department = $_GET["department"];
$class = $_GET["class"];
$registrationDate = $_GET["registrationDate"];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Information</title>


    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-light">


<nav class="navbar navbar-dark bg-primary">

    <div class="container">

        <span class="navbar-brand">
            Student Registration System
        </span>

    </div>

</nav>


<div class="container mt-5 mb-5">


    <div class="alert alert-success">

        <h4>
            Registration Successful!
        </h4>

        Student information has been submitted successfully.

    </div>


    <div class="card shadow">

        <div class="card-header bg-primary text-white text-center">

            <h3>
                Student Information
            </h3>

        </div>


        <div class="card-body">


            <!-- PERSONAL -->

            <h5 class="text-primary mb-3">
                Personal Information
            </h5>


            <table class="table table-bordered">

                <tr>
                    <th>Name</th>
                    <td><?php echo $name; ?></td>
                </tr>

                <tr>
                    <th>Place of Birth</th>
                    <td><?php echo $pob; ?></td>
                </tr>

                <tr>
                    <th>Date of Birth</th>
                    <td><?php echo $dob; ?></td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td><?php echo $address; ?></td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td><?php echo $gender; ?></td>
                </tr>

                <tr>
                    <th>Telephone</th>
                    <td><?php echo $telephone; ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?php echo $email; ?></td>
                </tr>

                <tr>
                    <th>Image</th>

                    <td>

                        <img
                            src="uploads/<?php echo $image; ?>"
                            width="150"
                            height="150"
                            class="img-thumbnail"
                        >

                    </td>

                </tr>

            </table>


            <!-- PARENT -->

            <h5 class="text-primary mt-5 mb-3">

                Parent Information

            </h5>


            <table class="table table-bordered">

                <tr>
                    <th>Parent Name</th>
                    <td><?php echo $parentName; ?></td>
                </tr>

                <tr>
                    <th>Parent Telephone</th>
                    <td><?php echo $parentTelephone; ?></td>
                </tr>

                <tr>
                    <th>Relationship</th>
                    <td><?php echo $relationship; ?></td>
                </tr>

            </table>


            <!-- ACADEMIC -->

            <h5 class="text-primary mt-5 mb-3">

                Academic Information

            </h5>


            <table class="table table-bordered">

                <tr>
                    <th>Student ID</th>
                    <td><?php echo $studentID; ?></td>
                </tr>

                <tr>
                    <th>Faculty</th>
                    <td><?php echo $faculty; ?></td>
                </tr>

                <tr>
                    <th>Department</th>
                    <td><?php echo $department; ?></td>
                </tr>

                <tr>
                    <th>Class</th>
                    <td><?php echo $class; ?></td>
                </tr>

                <tr>
                    <th>Registration Date</th>
                    <td><?php echo $registrationDate; ?></td>
                </tr>

            </table>


            <a
                href="Assignment.php"
                class="btn btn-primary"
            >

                Register Another Student

            </a>


        </div>

    </div>

</div>


</body>

</html>
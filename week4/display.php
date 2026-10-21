<?php

session_start();

if (!isset($_SESSION["student"])) {

    header("Location: Assignment.php");
    exit();

}

$student = $_SESSION["student"];

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


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-primary shadow">

    <div class="container">

        <span class="navbar-brand fw-bold">
            Student Registration System
        </span>

    </div>

</nav>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">


            <!-- SUCCESS MESSAGE -->

            <div class="alert alert-success shadow-sm">

                <h5 class="alert-heading">
                    Registration Successful!
                </h5>

                <p class="mb-0">
                    The student information has been successfully registered.
                </p>

            </div>


            <!-- MAIN CARD -->

            <div class="card border-0 shadow">


                <div class="card-header bg-primary text-white text-center py-3">

                    <h3 class="mb-0">
                        Student Information
                    </h3>

                </div>


                <div class="card-body p-4">


                    <!-- PERSONAL INFORMATION -->

                    <h5 class="text-primary border-bottom pb-2 mb-3">
                        Personal Information
                    </h5>


                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <tbody>

                                <tr>
                                    <th class="table-light">
                                        Name
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["name"]) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <th class="table-light">
                                        Place of Birth
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["pob"]) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <th class="table-light">
                                        Date of Birth
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["dob"]) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <th class="table-light">
                                        Address
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["address"]) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <th class="table-light">
                                        Gender
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["gender"]) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <th class="table-light">
                                        Telephone
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["telephone"]) ?>
                                    </td>
                                </tr>


                                <tr>
                                    <th class="table-light">
                                        Email
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["email"]) ?>
                                    </td>
                                </tr>


                                <tr>

                                    <th class="table-light">
                                        Student Image
                                    </th>

                                    <td>

                                        <img
                                            src="uploads/<?= htmlspecialchars($student["image"]) ?>"
                                            alt="Student Image"
                                            class="img-thumbnail"
                                            style="width: 150px; height: 150px; object-fit: cover;"
                                        >

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>


                    <!-- PARENT INFORMATION -->

                    <h5 class="text-primary border-bottom pb-2 mb-3 mt-5">
                        Parent Information
                    </h5>


                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <tbody>

                                <tr>

                                    <th class="table-light">
                                        Parent Name
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["parentName"]) ?>
                                    </td>

                                </tr>


                                <tr>

                                    <th class="table-light">
                                        Parent Telephone
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["parentTelephone"]) ?>
                                    </td>

                                </tr>


                                <tr>

                                    <th class="table-light">
                                        Relationship
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["relationship"]) ?>
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>


                    <!-- ACADEMIC INFORMATION -->

                    <h5 class="text-primary border-bottom pb-2 mb-3 mt-5">
                        Academic Information
                    </h5>


                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <tbody>

                                <tr>

                                    <th class="table-light">
                                        Student ID
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["studentID"]) ?>
                                    </td>

                                </tr>


                                <tr>

                                    <th class="table-light">
                                        Faculty
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["faculty"]) ?>
                                    </td>

                                </tr>


                                <tr>

                                    <th class="table-light">
                                        Department
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["department"]) ?>
                                    </td>

                                </tr>


                                <tr>

                                    <th class="table-light">
                                        Class
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["class"]) ?>
                                    </td>

                                </tr>


                                <tr>

                                    <th class="table-light">
                                        Registration Date
                                    </th>

                                    <td>
                                        <?= htmlspecialchars($student["registrationDate"]) ?>
                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>


                    <!-- BUTTONS -->

                    <div class="d-flex gap-2 mt-4">

                        <a
                            href="Assignment.php"
                            class="btn btn-primary"
                        >
                            Register Another Student
                        </a>

                        <button
                            onclick="window.print()"
                            class="btn btn-secondary"
                        >
                            Print
                        </button>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>
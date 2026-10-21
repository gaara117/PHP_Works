<?php

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Personal Information
    $name = $_POST["name"];
    $pob = $_POST["pob"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];

    // Parent Information
    $parentName = $_POST["parentName"];
    $parentTelephone = $_POST["parentTelephone"];
    $relationship = $_POST["relationship"];

    // Academic Information
    $studentID = $_POST["studentID"];
    $faculty = $_POST["faculty"];
    $department = $_POST["department"];
    $class = $_POST["class"];
    $registrationDate = $_POST["registrationDate"];


    // =========================
    // PERSONAL VALIDATION
    // =========================

    if (empty($name)) {
        $errors["name"] = "Name is required.";
    }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors["name"] = "Name must contain only letters and spaces.";
    }


    if (empty($pob)) {
        $errors["pob"] = "Place of Birth is required.";
    }


    if (empty($dob)) {
        $errors["dob"] = "Date of Birth is required.";
    }


    if (empty($address)) {
        $errors["address"] = "Address is required.";
    }


    if (empty($gender)) {
        $errors["gender"] = "Gender is required.";
    }


    if (empty($telephone)) {
        $errors["telephone"] = "Telephone is required.";
    }


    if (empty($email)) {
        $errors["email"] = "Email is required.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please enter a valid email.";
    }


    // =========================
    // PARENT VALIDATION
    // =========================

    if (empty($parentName)) {
        $errors["parentName"] = "Parent Name is required.";
    }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $parentName)) {
        $errors["parentName"] = "Parent Name must contain only letters and spaces.";
    }


    if (empty($parentTelephone)) {
        $errors["parentTelephone"] = "Parent Telephone is required.";
    }


    if (empty($relationship)) {
        $errors["relationship"] = "Relationship is required.";
    }


    // =========================
    // ACADEMIC VALIDATION
    // =========================

    if (empty($studentID)) {
        $errors["studentID"] = "Student ID is required.";
    }


    if (empty($faculty)) {
        $errors["faculty"] = "Faculty is required.";
    }


    if (empty($department)) {
        $errors["department"] = "Department is required.";
    }


    if (empty($class)) {
        $errors["class"] = "Class is required.";
    }


    if (empty($registrationDate)) {
        $errors["registrationDate"] = "Registration Date is required.";
    }


    // =========================
    // IMAGE VALIDATION
    // =========================

    if ($_FILES["image"]["error"] == 4) {

        $errors["image"] = "Student image is required.";

    }
    else {

        $imageName = $_FILES["image"]["name"];
        $imageType = $_FILES["image"]["type"];

        if (
            $imageType != "image/jpeg" &&
            $imageType != "image/png" &&
            $imageType != "image/gif"
        ) {

            $errors["image"] =
                "Only JPG, PNG and GIF images are allowed.";

        }
    }


    // =========================
    // IF NO ERRORS
    // =========================

    if (empty($errors)) {

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        $imageName = $_FILES["image"]["name"];

        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "uploads/" . $imageName
        );


        // Send data to display.php

        $data =
            "name=" . urlencode($name) .
            "&pob=" . urlencode($pob) .
            "&dob=" . urlencode($dob) .
            "&address=" . urlencode($address) .
            "&gender=" . urlencode($gender) .
            "&telephone=" . urlencode($telephone) .
            "&email=" . urlencode($email) .
            "&image=" . urlencode($imageName) .

            "&parentName=" . urlencode($parentName) .
            "&parentTelephone=" . urlencode($parentTelephone) .
            "&relationship=" . urlencode($relationship) .

            "&studentID=" . urlencode($studentID) .
            "&faculty=" . urlencode($faculty) .
            "&department=" . urlencode($department) .
            "&class=" . urlencode($class) .
            "&registrationDate=" . urlencode($registrationDate);


        header("Location: display.php?" . $data);
        exit();
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body class="bg-light">


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-primary">

    <div class="container">

        <span class="navbar-brand">
            Student Registration System
        </span>

    </div>

</nav>


<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">


            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <h3>
                        Student Registration Form
                    </h3>

                </div>


                <div class="card-body">


                    <form
                        method="POST"
                        enctype="multipart/form-data"
                    >


                        <!-- PERSONAL -->

                        <h5 class="text-primary border-bottom pb-2 mb-4">
                            Personal Information
                        </h5>


                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["name"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["name"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Place of Birth
                                </label>

                                <input
                                    type="text"
                                    name="pob"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["pob"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["pob"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Date of Birth
                                </label>

                                <input
                                    type="date"
                                    name="dob"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["dob"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["dob"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Gender
                                </label>

                                <select
                                    name="gender"
                                    class="form-select"
                                >

                                    <option value="">
                                        Select Gender
                                    </option>

                                    <option value="Male">
                                        Male
                                    </option>

                                    <option value="Female">
                                        Female
                                    </option>

                                </select>

                                <?php

                                if (isset($errors["gender"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["gender"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Address
                                </label>

                                <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["address"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["address"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Telephone
                                </label>

                                <input
                                    type="text"
                                    name="telephone"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["telephone"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["telephone"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="text"
                                    name="email"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["email"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["email"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-12 mb-3">

                                <label class="form-label">
                                    Student Image
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    class="form-control"
                                    accept=".jpg,.jpeg,.png,.gif"
                                >

                                <?php

                                if (isset($errors["image"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["image"];
                                    echo "</small>";

                                }

                                ?>

                            </div>

                        </div>


                        <!-- PARENT -->

                        <h5 class="text-primary border-bottom pb-2 mt-4 mb-4">

                            Parent Information

                        </h5>


                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Parent Name
                                </label>

                                <input
                                    type="text"
                                    name="parentName"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["parentName"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["parentName"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Parent Telephone
                                </label>

                                <input
                                    type="text"
                                    name="parentTelephone"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["parentTelephone"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["parentTelephone"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Relationship
                                </label>

                                <input
                                    type="text"
                                    name="relationship"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["relationship"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["relationship"];
                                    echo "</small>";

                                }

                                ?>

                            </div>

                        </div>


                        <!-- ACADEMIC -->

                        <h5 class="text-primary border-bottom pb-2 mt-4 mb-4">

                            Academic Information

                        </h5>


                        <div class="row">


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Student ID
                                </label>

                                <input
                                    type="text"
                                    name="studentID"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["studentID"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["studentID"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Faculty
                                </label>

                                <input
                                    type="text"
                                    name="faculty"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["faculty"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["faculty"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Department
                                </label>

                                <input
                                    type="text"
                                    name="department"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["department"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["department"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Class
                                </label>

                                <input
                                    type="text"
                                    name="class"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["class"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["class"];
                                    echo "</small>";

                                }

                                ?>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Registration Date
                                </label>

                                <input
                                    type="date"
                                    name="registrationDate"
                                    class="form-control"
                                >

                                <?php

                                if (isset($errors["registrationDate"])) {

                                    echo "<small class='text-danger'>";
                                    echo $errors["registrationDate"];
                                    echo "</small>";

                                }

                                ?>

                            </div>

                        </div>


                        <!-- BUTTON -->

                        <div class="d-grid mt-4">

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg"
                            >

                                Register Student

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>
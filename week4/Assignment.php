<?php

session_start();

$errors = [];

$name = "";
$pob = "";
$dob = "";
$address = "";
$gender = "";
$telephone = "";
$email = "";

$parentName = "";
$parentTelephone = "";
$relationship = "";

$studentID = "";
$faculty = "";
$department = "";
$class = "";
$registrationDate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // =========================
    // PERSONAL INFORMATION
    // =========================

    $name = trim($_POST["name"] ?? "");
    $pob = trim($_POST["pob"] ?? "");
    $dob = trim($_POST["dob"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $gender = trim($_POST["gender"] ?? "");
    $telephone = trim($_POST["telephone"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if (empty($name)) {
        $errors["name"] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
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
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please enter a valid email address.";
    }


    // =========================
    // PARENT INFORMATION
    // =========================

    $parentName = trim($_POST["parentName"] ?? "");
    $parentTelephone = trim($_POST["parentTelephone"] ?? "");
    $relationship = trim($_POST["relationship"] ?? "");

    if (empty($parentName)) {
        $errors["parentName"] = "Parent Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $parentName)) {
        $errors["parentName"] = "Parent Name must contain only letters and spaces.";
    }

    if (empty($parentTelephone)) {
        $errors["parentTelephone"] = "Parent Telephone is required.";
    }

    if (empty($relationship)) {
        $errors["relationship"] = "Relationship is required.";
    }


    // =========================
    // ACADEMIC INFORMATION
    // =========================

    $studentID = trim($_POST["studentID"] ?? "");
    $faculty = trim($_POST["faculty"] ?? "");
    $department = trim($_POST["department"] ?? "");
    $class = trim($_POST["class"] ?? "");
    $registrationDate = trim($_POST["registrationDate"] ?? "");

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

    $imageName = "";

    if (!isset($_FILES["image"]) || $_FILES["image"]["error"] == 4) {

        $errors["image"] = "Student image is required.";

    } else {

        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        $fileName = $_FILES["image"]["name"];

        $extension = strtolower(
            pathinfo($fileName, PATHINFO_EXTENSION)
        );

        if (!in_array($extension, $allowedTypes)) {

            $errors["image"] =
                "Only JPG, JPEG, PNG and GIF files are allowed.";

        } else {

            $imageName =
                time() . "_" . basename($fileName);
        }
    }


    // =========================
    // SUCCESS
    // =========================

    if (empty($errors)) {

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "uploads/" . $imageName
        );

        $_SESSION["student"] = [

            "name" => $name,
            "pob" => $pob,
            "dob" => $dob,
            "address" => $address,
            "gender" => $gender,
            "telephone" => $telephone,
            "email" => $email,
            "image" => $imageName,

            "parentName" => $parentName,
            "parentTelephone" => $parentTelephone,
            "relationship" => $relationship,

            "studentID" => $studentID,
            "faculty" => $faculty,
            "department" => $department,
            "class" => $class,
            "registrationDate" => $registrationDate
        ];

        header("Location: display.php");
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

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">


<!-- HEADER -->

<nav class="navbar navbar-dark bg-primary shadow">

    <div class="container">

        <span class="navbar-brand mb-0 h1">
            Student Registration System
        </span>

    </div>

</nav>


<!-- MAIN CONTAINER -->

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">


            <!-- CARD -->

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white text-center py-3">

                    <h3 class="mb-0">
                        Student Registration Form
                    </h3>

                    <small>
                        Please fill in all required information
                    </small>

                </div>


                <div class="card-body p-4">


                    <form
                        method="POST"
                        enctype="multipart/form-data"
                    >


                        <!-- ================= -->
                        <!-- PERSONAL -->
                        <!-- ================= -->

                        <div class="mb-4">

                            <h5 class="text-primary border-bottom pb-2">
                                <i class="bi bi-person"></i>
                                Personal Information
                            </h5>

                        </div>


                        <div class="row g-3">


                            <!-- NAME -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control <?= isset($errors["name"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($name) ?>"
                                    placeholder="Enter student name"
                                >

                                <?php if (isset($errors["name"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["name"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- POB -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Place of Birth
                                </label>

                                <input
                                    type="text"
                                    name="pob"
                                    id="pob"
                                    class="form-control <?= isset($errors["pob"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($pob) ?>"
                                    placeholder="Enter place of birth"
                                >

                                <?php if (isset($errors["pob"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["pob"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- DOB -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Date of Birth
                                </label>

                                <input
                                    type="date"
                                    name="dob"
                                    id="dob"
                                    class="form-control <?= isset($errors["dob"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($dob) ?>"
                                >

                                <?php if (isset($errors["dob"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["dob"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- GENDER -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Gender
                                </label>

                                <select
                                    name="gender"
                                    id="gender"
                                    class="form-select <?= isset($errors["gender"]) ? 'is-invalid' : '' ?>"
                                >

                                    <option value="">
                                        Select Gender
                                    </option>

                                    <option
                                        value="Male"
                                        <?= $gender == "Male" ? "selected" : "" ?>
                                    >
                                        Male
                                    </option>

                                    <option
                                        value="Female"
                                        <?= $gender == "Female" ? "selected" : "" ?>
                                    >
                                        Female
                                    </option>

                                </select>

                                <?php if (isset($errors["gender"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["gender"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- ADDRESS -->

                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Address
                                </label>

                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    class="form-control <?= isset($errors["address"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($address) ?>"
                                    placeholder="Enter address"
                                >

                                <?php if (isset($errors["address"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["address"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- TELEPHONE -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Telephone
                                </label>

                                <input
                                    type="text"
                                    name="telephone"
                                    id="telephone"
                                    class="form-control <?= isset($errors["telephone"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($telephone) ?>"
                                    placeholder="Enter telephone"
                                >

                                <?php if (isset($errors["telephone"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["telephone"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- EMAIL -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control <?= isset($errors["email"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($email) ?>"
                                    placeholder="example@gmail.com"
                                >

                                <?php if (isset($errors["email"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["email"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- IMAGE -->

                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Student Image
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control <?= isset($errors["image"]) ? 'is-invalid' : '' ?>"
                                    accept=".jpg,.jpeg,.png,.gif"
                                >

                                <div class="form-text">
                                    Allowed: JPG, JPEG, PNG, GIF
                                </div>

                                <?php if (isset($errors["image"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["image"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>


                        <!-- ================= -->
                        <!-- PARENT -->
                        <!-- ================= -->

                        <div class="mt-5 mb-4">

                            <h5 class="text-primary border-bottom pb-2">
                                Parent Information
                            </h5>

                        </div>


                        <div class="row g-3">


                            <!-- PARENT NAME -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Parent Name
                                </label>

                                <input
                                    type="text"
                                    name="parentName"
                                    id="parentName"
                                    class="form-control <?= isset($errors["parentName"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($parentName) ?>"
                                    placeholder="Enter parent name"
                                >

                                <?php if (isset($errors["parentName"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["parentName"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- PARENT TELEPHONE -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Parent Telephone
                                </label>

                                <input
                                    type="text"
                                    name="parentTelephone"
                                    id="parentTelephone"
                                    class="form-control <?= isset($errors["parentTelephone"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($parentTelephone) ?>"
                                    placeholder="Enter parent telephone"
                                >

                                <?php if (isset($errors["parentTelephone"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["parentTelephone"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- RELATIONSHIP -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Relationship
                                </label>

                                <select
                                    name="relationship"
                                    id="relationship"
                                    class="form-select <?= isset($errors["relationship"]) ? 'is-invalid' : '' ?>"
                                >

                                    <option value="">
                                        Select Relationship
                                    </option>

                                    <option
                                        value="Father"
                                        <?= $relationship == "Father" ? "selected" : "" ?>
                                    >
                                        Father
                                    </option>

                                    <option
                                        value="Mother"
                                        <?= $relationship == "Mother" ? "selected" : "" ?>
                                    >
                                        Mother
                                    </option>

                                    <option
                                        value="Guardian"
                                        <?= $relationship == "Guardian" ? "selected" : "" ?>
                                    >
                                        Guardian
                                    </option>

                                </select>

                                <?php if (isset($errors["relationship"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["relationship"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>


                        <!-- ================= -->
                        <!-- ACADEMIC -->
                        <!-- ================= -->

                        <div class="mt-5 mb-4">

                            <h5 class="text-primary border-bottom pb-2">
                                Academic Information
                            </h5>

                        </div>


                        <div class="row g-3">


                            <!-- STUDENT ID -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Student ID
                                </label>

                                <input
                                    type="text"
                                    name="studentID"
                                    id="studentID"
                                    class="form-control <?= isset($errors["studentID"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($studentID) ?>"
                                    placeholder="Enter student ID"
                                >

                                <?php if (isset($errors["studentID"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["studentID"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- FACULTY -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Faculty
                                </label>

                                <input
                                    type="text"
                                    name="faculty"
                                    id="faculty"
                                    class="form-control <?= isset($errors["faculty"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($faculty) ?>"
                                    placeholder="Enter faculty"
                                >

                                <?php if (isset($errors["faculty"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["faculty"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- DEPARTMENT -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Department
                                </label>

                                <input
                                    type="text"
                                    name="department"
                                    id="department"
                                    class="form-control <?= isset($errors["department"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($department) ?>"
                                    placeholder="Enter department"
                                >

                                <?php if (isset($errors["department"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["department"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- CLASS -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Class
                                </label>

                                <input
                                    type="text"
                                    name="class"
                                    id="class"
                                    class="form-control <?= isset($errors["class"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($class) ?>"
                                    placeholder="Enter class"
                                >

                                <?php if (isset($errors["class"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["class"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- REGISTRATION DATE -->

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Registration Date
                                </label>

                                <input
                                    type="date"
                                    name="registrationDate"
                                    id="registrationDate"
                                    class="form-control <?= isset($errors["registrationDate"]) ? 'is-invalid' : '' ?>"
                                    value="<?= htmlspecialchars($registrationDate) ?>"
                                >

                                <?php if (isset($errors["registrationDate"])): ?>

                                    <div class="invalid-feedback">
                                        <?= $errors["registrationDate"] ?>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>


                        <!-- BUTTON -->

                        <div class="d-grid mt-5">

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


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>
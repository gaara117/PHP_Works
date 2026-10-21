<?php
// ---------- Validation ----------
$errors = [];
$submitted = isset($_POST["btnsubmit"]);

function old($key) {
    return isset($_POST[$key]) ? htmlspecialchars($_POST[$key]) : '';
}

if ($submitted) {
    if (empty(trim($_POST["name"] ?? ''))) {
        $errors["name"] = "Name is required";
    }

    if (empty($_POST["email"] ?? '')) {
        $errors["email"] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    if (!isset($_POST["gender"])) {
        $errors["gender"] = "Gender is required";
    }

    if (empty($_POST["faculties"] ?? '')) {
        $errors["faculties"] = "Please choose a faculty";
    }

    if (empty($_POST["languages"])) {
        $errors["languages"] = "Please choose at least one language";
    }
}

$success = $submitted && empty($errors);
$selectedLanguages = $_POST["languages"] ?? [];
$faculties = [
    "Computer"    => "Computer & IT",
    "Medicine"    => "Medicine",
    "Engineering" => "Engineering",
    "Economic"    => "Economic",
];
$languages = ["Somali", "Arabic", "English", "Japanese"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #0ea5e9 100%);
        }
        .card {
            border: 0;
            border-radius: 1.25rem;
            overflow: hidden;
        }
        .card-header-custom {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            padding: 2rem 1.5rem;
            text-align: center;
        }
        .card-header-custom .icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: .75rem;
        }
        .form-control, .form-select {
            padding: .7rem .9rem;
            border-radius: .65rem;
        }
        .input-group-text {
            border-radius: .65rem 0 0 .65rem;
            background: #f1f3ff;
            color: #4f46e5;
        }
        .btn-register {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border: 0;
            border-radius: .65rem;
            padding: .75rem 1.5rem;
            font-weight: 600;
        }
        .btn-register:hover {
            opacity: .92;
        }
        .btn-outline-secondary {
            border-radius: .65rem;
            padding: .75rem 1.5rem;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="card shadow-lg">

                <div class="card-header-custom">
                    <div class="icon-circle"><i class="bi bi-mortarboard-fill"></i></div>
                    <h2 class="h3 fw-bold mb-1">Student Registration</h2>
                    <p class="mb-0 opacity-75">Fill in your details to register</p>
                </div>

                <div class="card-body p-4 p-md-5">

                    <?php if ($success): ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                            <div>
                                <strong>Registration successful!</strong><br>
                                Welcome, <?php echo old('name'); ?>.
                            </div>
                        </div>

                        <!-- Result: submitted data -->
                        <div class="card border mb-4">
                            <div class="card-header bg-light fw-semibold">
                                <i class="bi bi-card-checklist me-1"></i> Registration Result
                            </div>
                            <table class="table table-striped mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 35%;">Full Name</th>
                                        <td><?php echo old('name'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?php echo old('email'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td><?php echo old('gender'); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Faculty</th>
                                        <td><?php echo htmlspecialchars($faculties[$_POST['faculties']] ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Languages</th>
                                        <td>
                                            <?php foreach ($selectedLanguages as $lang): ?>
                                                <span class="badge bg-primary me-1"><?php echo htmlspecialchars($lang); ?></span>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php elseif ($submitted): ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill fs-5 me-3"></i>
                            <div>Please fix the errors below.</div>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="" novalidate>

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" id="name" name="name"
                                       class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>"
                                       placeholder="Enter your full name"
                                       value="<?php echo old('name'); ?>">
                                <div class="invalid-feedback"><?php echo $errors['name'] ?? ''; ?></div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" id="email" name="email"
                                       class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                                       placeholder="name@example.com"
                                       value="<?php echo old('email'); ?>">
                                <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold d-block">Gender</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>"
                                       type="radio" name="gender" id="male" value="Male"
                                       <?php if (($_POST["gender"] ?? '') == "Male") echo "checked"; ?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>"
                                       type="radio" name="gender" id="female" value="Female"
                                       <?php if (($_POST["gender"] ?? '') == "Female") echo "checked"; ?>>
                                <label class="form-check-label" for="female">Female</label>
                            </div>

                            <?php if (isset($errors['gender'])): ?>
                                <div class="text-danger small mt-1"><?php echo $errors['gender']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Faculty -->
                        <div class="mb-4">
                            <label for="faculties" class="form-label fw-semibold">Faculty</label>
                            <select id="faculties" name="faculties"
                                    class="form-select <?php echo isset($errors['faculties']) ? 'is-invalid' : ''; ?>">
                                <option value="">Choose Faculty</option>
                                <?php foreach ($faculties as $value => $label): ?>
                                    <option value="<?php echo $value; ?>"
                                        <?php if (($_POST["faculties"] ?? '') == $value) echo "selected"; ?>>
                                        <?php echo $label; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback"><?php echo $errors['faculties'] ?? ''; ?></div>
                        </div>

                        <!-- Languages -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold d-block">Languages</label>

                            <?php foreach ($languages as $lang): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?php echo isset($errors['languages']) ? 'is-invalid' : ''; ?>"
                                           type="checkbox" name="languages[]"
                                           id="lang-<?php echo $lang; ?>" value="<?php echo $lang; ?>"
                                           <?php if (in_array($lang, $selectedLanguages)) echo "checked"; ?>>
                                    <label class="form-check-label" for="lang-<?php echo $lang; ?>">
                                        <?php echo $lang; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>

                            <?php if (isset($errors['languages'])): ?>
                                <div class="text-danger small mt-1"><?php echo $errors['languages']; ?></div>
                            <?php endif; ?>
                        </div>

                        <hr class="my-4">

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" name="btnsubmit" class="btn btn-primary btn-register flex-grow-1">
                                <i class="bi bi-check2-circle me-1"></i> Register
                            </button>
                            <a href="" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
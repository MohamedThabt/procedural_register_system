<?php 
session_start();


include"include/header.php";


// To handling url (if use write login in url and he is already logined)
if(isset($_SESSION['user_name'])){
    header ("location:index.php");
}


?>
<body>

<!-- form -->

<div class="container custom-container">
    <div class="row  ">
        <div class="col-md-6 ">
            <div class="form-container p-4 ">
                <h4 class="text-center mb-2">Registration Form</h4>
                <form class="needs-validation" novalidate method="post" action="controller/register.php">
                
                <!-- Display error messages -->
                <?php
                if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $error) {
                        echo '<div class="alert alert-danger text-center">' . htmlspecialchars($error) . '</div>';
                    }
                    // Clear the errors from the session after displaying
                    unset($_SESSION['errors']);
                }
                ?>

                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="text" class="form-control" id="nameInput" name="name" placeholder="Full Name" required>
                            <label for="nameInput">Full Name</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email" required>
                            <label for="emailInput">Email</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-phone"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="tel" class="form-control" id="phoneInput" name="phone" placeholder="Phone Number">
                            <label for="phoneInput">Phone Number</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
                            <label for="passwordInput">Password</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" id="confirmPasswordInput" name="confirmPassword" placeholder="Confirm Password" required>
                            <label for="confirmPasswordInput">Confirm Password</label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Register" name="submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="assets/Sign up-rafiki.png" alt="Registration illustration" class="img-fluid">
        </div>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                // Custom validation for password confirmation
                var password = document.getElementById('passwordInput')
                var confirmPassword = document.getElementById('confirmPasswordInput')

                // Always reset custom validity before re-checking
                confirmPassword.setCustomValidity('')

                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Passwords do not match')
                }

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})();

    </script>
<?php include"include/footer.php"?>
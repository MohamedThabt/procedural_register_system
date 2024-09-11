<?php 
session_start();


include"include/header.php";


// To handling url (if use write login in url and he is already logined)
if(isset($_SESSION['user_name'])){
    header ("location:index.php");
}


?>
<!-- form -->
<div class="container-sm py-4">
    <div class="row g-0 justify-content-center">
        <div class="col-md-5 d-flex align-items-center justify-content-center">
            <img src="assets/Login-amico.png" alt="Login illustration" class="img-fluid" style="max-width: 80%;">
        </div>
        <div class="col-md-5">
            <div class="form-container p-4">
                <h4 class="text-center mb-4">
                    <i class="fas fa-sign-in-alt"></i> 
                    Login
                </h4>
                <form class="needs-validation" novalidate method="post" action="controller/login.php">
                    <!-- Email Error -->
                    <?php if (isset($_SESSION['error'])):?>
                    <div class="alert alert-danger text-center"><?php echo $_SESSION['error']?></div>
                    <?php unset($_SESSION['error']);?>
                    <?php endif;?>
                    <!-- Password  Error -->
                    <?php if (isset($_SESSION['password_error'])):?>
                    <div class="alert alert-danger text-center"><?php echo $_SESSION['password_error']?></div>
                    <?php unset($_SESSION['password_error']);?>
                    <?php endif;?>
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
                            <i class="fas fa-lock"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password" required>
                            <label for="passwordInput">Password</label>
                        </div>
                    </div>

                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Login" name="submit">
                    </div>
                </form>
            </div>
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
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})();
 </script>
<?php include("include/footer.php"); ?>

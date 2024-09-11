<?php 
session_start();


include"include/header.php";


// To handling url (if use write login in url and he is already logined)
if(!isset($_SESSION['user_name'])){
    header ("location:login.php");
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
                <form class="needs-validation" novalidate method="post" action="controller/change_password_contr.php">
                      <!-- Password Error -->
                      <?php if (isset($_SESSION['reset_error'] )):?>
                    <div class="alert alert-danger text-center"><?php echo $_SESSION['reset_error']?></div>
                    <?php unset($_SESSION['reset_error']);?>
                    <?php endif;?>
                    <!-- Password  Error -->
                    <?php if (isset($_SESSION['not_right_password'])):?>
                    <div class="alert alert-danger text-center"><?php echo $_SESSION['not_right_password']?></div>
                    <?php unset($_SESSION['not_right_password']);?>
                    <?php endif;?>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" id="passwordInput" name="old_password" placeholder="Old Password" required>
                            <label for="passwordInput">Old Password</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" id="passwordInput" name="new_password" placeholder="New Password" required>
                            <label for="passwordInput">New Password</label>
                        </div>
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fas fa-check-circle"></i>
                        </span>
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" id="confirmPasswordInput" name="confirm_password" placeholder="Confirm Password" required>
                            <label for="confirmPasswordInput">Confirm Password</label>
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
<?php include("include/footer.php"); ?>

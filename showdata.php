
<?php 
session_start();
include"include/header.php";

$counter = 1;
?>


        <!-- Employee Table -->
        <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(isset($_SESSION['user_name'])): ?>

                    <tr>
                        <td> <?php echo $counter++; ?></td>
                        <td> <?php echo $_SESSION['user_name'] ;?></td>
                        <td> <?php echo $_SESSION['user_email'] ;?></td>
                        <td> <?php echo $_SESSION['user_phone'] ;?></td>
                    </tr>
                <?php else: ?>
                    <div class="alert alert-danger text-center">Data Not Found</div>
                <?php endif; ?>
                </tbody>
            </table>

</div>
</div>











<?php include"include/footer.php"?>
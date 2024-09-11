<?php 
session_start();
include"include/header.php"; 
?>
 <?php if (isset($_SESSION['login_done'])):?>
 <div class="alert alert-info text-center"><?php echo $_SESSION['login_done']?></div>
<?php unset($_SESSION['login_done']);?>
<?php endif;?>

<?php

include "include/DB.php";

// Assuming $pdo is the variable name for your PDO connection in DB.php
// If it's different, replace $pdo with the correct variable name

try {
    // Prepare and execute the query
    $stmt = $pdo->query("SELECT * FROM user");
    
    // Fetch all rows
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    exit;
}
?>

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
                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="4" class="text-center">No users found</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "include/footer.php";
?>
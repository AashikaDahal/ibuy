<?php 
    include("./dbConnection.php");
    if($_SESSION['user_role'] != '' && $_SESSION['user_role'] == 'admin'){
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>ibuy Add Categories</title>
            <link rel="stylesheet" href="ibuy.css" />
        </head>

        <body>
            <section class="addAuction-main">
                <section class="logo">
                    <a href="./index.php">
                        <h1>
                            <span class="i">i</span><span class="b">b</span><span class="u">u</span
                            ><span class="y">y</span>
                        </h1>
                    </a>
                </section>
                <div class="addAuction">
                    <div class="top">
                        <h2>Add Admin</h2>
                        <a href="./manageAdmins.php"> <- Back </a>
                    </div>
                    <div class="addAuction-form">
                    <div class="form">
                        <form action="./operation/login_register_operation.php" autocomplete="off" method="POST">
                            <input type="hidden" name="action" value="register">
                            <input type="hidden" name="role" value="admin">
                            <div class="form-group">
                                <label for="name" >Full Name : </label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" >Email : </label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password : </label>
                                <input type="password" name="password"  id="password" required>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-submit" type="submit">Add Admin</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </section>
        </body>
    </html>
    <?php
    }else{
        header("Location: ./login.php");
    }
    ?>
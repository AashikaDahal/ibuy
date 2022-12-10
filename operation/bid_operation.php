<?php 
    include("../dbConnection.php");
    $today = date("Y-m-d H:i:s"); 
    if($_SESSION['user_role'] != '' && $_SESSION['user_email'] !=''){
        $userEmail = $_SESSION["user_email"];
    
        if(isset($_POST['action'])){
            if($_POST['action'] == 'add') {
                // var_dump($_POST);
                $productId =  ucfirst($conn -> real_escape_string($_POST['id']));
                $price =  ucfirst($conn -> real_escape_string($_POST['bid']));
                $userId =  ucfirst($conn -> real_escape_string($_SESSION['user_id']));
    
                //create Table tbl_uses 
                //$sqlCreateBidsTable = "CREATE TABLE `tbl_bids` ( `id` INT NOT NULL AUTO_INCREMENT , `product_id` INT(10) NULL , `user_id` INT(10) NULL,`price` DECIMAL (10,2) NULL, `added_by` VARCHAR(256) NULL , `updated_by` VARCHAR(256) NULL , `added_on` DATETIME NULL , `updated_on` DATETIME NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
                //$createTableBids = $conn ->query($sqlCreateBidsTable);
            
                $sqlInsertBids = "INSERT INTO `tbl_bids`(`product_id`,`user_id`,`price`,`added_by`,`added_on`) VALUES ('$productId',$userId,'$price','$userEmail','$today')";
                $insertBids = $conn ->query($sqlInsertBids);
        
                // var_dump($sqlInsertBids);
                if($insertBids){
                    $_SESSION['error_message'] ="Bids Added Successfully";
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }else{
                    $_SESSION['error_message'] ="Bids Not Added";
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
    
            }
        }
        if(isset($_GET['action'])){
            if($_GET['action'] == 'delete'){
                $id = $_GET['id'];
                $deleteSql = "DELETE FROM  tbl_bids WHERE id = '$id'";
                if($conn->query($deleteSql)==TRUE && $conn->affected_rows > 0){
                    $_SESSION['error_message'] ="Data Delete Successfully";
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }else{
                    $_SESSION['error_message'] ="Sorry Some Technical Error Ocurred";
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            }
        }

    }else{
        $_SESSION['error_message'] ="Please Login First";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
?>
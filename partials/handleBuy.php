<?php
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'dbconnect.php';
        $phone = $_POST['phone'];
        $location = $_POST['location'];
        $sno = $_POST['sno'];

        $sql = "INSERT INTO `info` (`info_by`, `info_phone`, `info_item`, `info_location`) VALUES ('$sno', '$phone', '1', '$location');";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your order has been accepted!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            header("Location: /index.php");
            exit();
        }
        header("Location: /index.php");
    }
?>
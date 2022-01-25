<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Skying Club</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>

    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/header.php'; ?>


    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `event` WHERE event_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $ename = $row['event_name'];
        $edesc = $row['event_desc'];
        $ecat = $row['event_cat'];
        $time = $row['event_datetime'];
        $loc = $row['event_location'];
        $isHapppened = $row['event_ed'];
    }
    ?>
    <div class="container-fluid position-relative" id="event" style="height:1000px;">
        <div class="position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 65%;">
            <h1 class="display-4"><?php echo $ename;?></h1>
            <p class="mt-3 fw-lighter"><?php echo $ecat;?> Competition</p>
            <p class="fst-italic">Time : <?php echo $time;?></p>
            <p class="fst-italic">Location: <?php echo $loc;?></p>
            <p class="lead"> <?php echo $edesc;?></p>
            <hr>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = $_GET['catid'];
                        $sql = "SELECT * FROM `player` WHERE player_event=$id"; 
                        $result = mysqli_query($conn, $sql);
                        $noResult = true;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                        <th scope="row">'.$id.'</th>';
                        $id++;
                            $noResult = false;
                            $playid = $row['player_user'];
                            $sql2 = "SELECT user_name FROM `users` WHERE sno='$playid'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            echo '
                        <td>'.$row2['user_name'].'</td>
                    </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
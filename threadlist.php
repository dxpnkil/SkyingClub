<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="/font/fontawesome-free-5.15.4-web/css/all.min.css" >
    <title>Skying Club</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
</head>

<body>
    
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/header.php'; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `discussion` WHERE discussion_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['discussion_name'];
        $catdesc = $row['discussion_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];

        $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_datetime`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Please wait for community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        } 
    }
    ?>

    <div class="mx-auto mt-3 card" style="width: 60%;">
        <div class="card-header">
            <h1 class="display-4">Welcome to <?php echo $catname;?> forums</h1>
            <p class="lead"> <?php echo $catdesc;?></p>
            <hr class="my-4">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ruleModal">
                Read Forum Rules
            </button>
            <!-- Rule Modal -->
            <div class="modal fade" id="ruleModal" tabindex="-1" aria-labelledby="ruleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ruleModalLabel">Forum Rules</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>No Spam / Advertising in the forums</li>
                                <li>Do not post copyright-infringing material</li>
                                <li>Do not post “offensive” posts, links or images</li>
                                <li>Do not cross post questions</li>
                                <li>Remain respectful of other members at all times</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
        echo '<div class="mx-auto mt-5" style="width: 60%;">
        <h2>Start a Discussion</h2>
        <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
            <div class="mb-3">
                <label class="form-label">Problem Title</label>
                <input  class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                        possible</small>
            </div>
            <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            <div class="form-floating">
                <textarea class="form-control" id="desc" name="desc" style="height: 100px"></textarea>
                <label for="floatingTextarea2">What is your problem?</label>
            </div>
            <button type="submit" class="btn btn-secondary my-2">Post</button>
        </form>
    </div>';
    }
    else {echo'
        <div class="mx-auto mt-5" style="width: 60%;">
            <h2>Start a Discussion</h2>
            <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
        </div>';
    }
?>


    <div class="mx-auto mt-5" style="width: 60%;">
        <h2>Browser Questions</h2>

        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `thread` WHERE thread_cat_id=$id"; 
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc']; 
                $thread_time = $row['thread_datetime']; 
                $thread_user_id = $row['thread_user_id'];

                $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<div class="d-flex my-3">
                    <div class="flex-shrink-0">
                        <img src="img/user-default.png" width="35px" alt="">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="my-0 fw-normal">  '. $row2['user_name'].' at '. $thread_time. ' </div>
                        <h5 class="mt-0"> <a class="text-dark text-decoration-none" href="thread.php?threadid=' . $id. '">'. $title . ' </a></h5>
                        <div class"fw-lighter">'. $desc . ' </div>
                    </div>
                </div>';
            }

            if ($noResult) {
                echo ' <div class="bg-secondary p-2 text-dark bg-opacity-10">
                        <p class="display-4">No Questions Found</p>
                            <p class="lead"> Be the first person to ask a question</p>
                    </div>';
            }
        ?>
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
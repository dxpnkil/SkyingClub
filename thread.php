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
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/dbconnect.php'; ?>
    <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `thread` WHERE thread_id=$id"; 
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_user_id = $row['thread_user_id'];
        }
        
        if ($noResult) {
            echo ' <div class="bg-secondary p-2 text-dark bg-opacity-10">
                    <p class="display-4">No Comment Found</p>
                        <p class="lead"> Be the first person to answer this question</p>
                </div>';
        }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //Insert into comment db
        $comment = $_POST['comment']; 
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been added!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } 
    }
    ?>

    <div class="mx-auto mt-3 card" style="width: 60%;">
        <div class="card-header">
            <h1 class="display-5"><?php echo $title;?></h1>
            <p class="lead"> <?php echo $desc;?></p>
            <p class="text-end"><b>Posted by KIL</b></p>
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
        <h2 class="py-2">Post a Comment</h2>
        <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
            <div class="form-floating">
                <textarea class="form-control" id="comment" name="comment" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Type your comment</label>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            </div>
            <button type="submit" class="btn btn-secondary my-2">Post Comment</button>
        </form>
    </div>';
    }
    else {
        echo'
        <div class="mx-auto mt-5" style="width: 60%;">
            <h2>Start a Discussion</h2>
            <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
        </div>';
    }
?>

    <div class="mx-auto mt-5" style="width: 60%;">
        <h2>Discussion</h2>

        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content']; 
                $comment_time = $row['comment_time']; 
                $thread_user_id = $row['comment_by']; 
                

                $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo '<div class="d-flex my-1">
                    <div class="flex-shrink-0">
                        <img src="img/user-default.png" width="35px" alt="">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="fw-bold my-0">'. $row2['user_name'] .'</p>
                        '. $content . '
                        
                        <p class="fs-6">Like ' . $comment_time . '</p>
                        
                    </div>
                </div>';
            }

            if ($noResult) {
                echo ' <div class="bg-secondary p-2 text-dark bg-opacity-10">
                        <p class="display-4">No Comment Found</p>
                            <p class="lead"> Be the first person to answer this post</p>
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
<div class="container-fluid bg-light position-relative" id="event" style="height:700px;">
    <div class="position-absolute top-50 start-50 translate-middle" style="width: 65%; height:70%;">
        <h2 class="text-center fs-1 text-dark fw-bold">EVENT</h2>
        <p class="text-center mt-2 fst-italic text-dark">Why don't you join us?</p>
        <div class="row align-items-end mt-3">
            <?php
                $sql = "SELECT * FROM `event`"; 
                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['event_id'];
                    $name = $row['event_name'];
                    $cat = $row['event_cat'];
                    $time = $row['event_datetime'];
                    $location = $row['event_location'];

                    echo '<div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="/img/event-'. $id .'.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$name.'</h5>
                            <p class="card-text">'.$cat.' Competition</p>
                            <p class="fst-italic">'.$location.'</p>
                            <p class="fst-italic">'.$time.'</p>';
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                            echo '<a href="eventlist.php?catid=' . $id . '" class="btn btn-dark">Join us</a>';
                            }
                        echo'</div>
                    </div>
                    </div>';
                }
            ?>
        </div>
    </div>
</div>

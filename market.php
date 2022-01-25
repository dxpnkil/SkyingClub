<div class="container-fluid bg-dark position-relative" id="market" style="height:700px;">
    <div class="position-absolute top-50 start-50 translate-middle" style="width: 65%; height:70%;">
        <h2 class="text-center fs-1 text-light fw-bold">MARKET</h2>
        <p class="text-center mt-3 fst-italic text-light">Remember to buy your gear!</p>
        <div class="row align-items-end mt-5">
            <?php
                $sql = "SELECT * FROM `market`"; 
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['market_id'];
                    $name = $row['market_name'];
                    $cost = $row['market_cost'];

                    echo '<div class="col">
                    <div class="card" style="width: 15rem;">
                        <img src="/img/market-'. $id .'.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$name.'</h5>
                            <p class="card-text">Cost: '.$cost.'</p>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#buyModal">Buy now</button>
                        </div>
                    </div>
                </div>';

                }
            ?>
            

        </div>
    </div>
</div>

<?php include 'partials/buyModal.php'; ?>
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center fs-1" id="buyModalLabel">Buy Gear</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
                echo'
                <form action="/partials/handleBuy.php" method="post">
                    <div class="modal-body">
                        <form class="px-4 py-3">
                            <div class="mb-3">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="+84123456789">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1">Location</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="New York, US">
                            </div>
                            <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
                        </form>
                        
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
                <div class="modal-footer">
                    <a class="dropdown-item" href="#">Need help?</a>
                </div>';
            }
            else {
                echo'
            <p class="mx-auto">You are not logged in. Please login to be able to buy</p>';
            }
        ?>

        </div>
    </div>
</div>
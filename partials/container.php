<div class="container-fluid" id="_discussion">
<div class="container  my-4 ">
  <h2 class="text-center my-5 ">Skying Club - Discussions</h2>
  <div class="row">
    <!-- Fretch all the categories and use a loop to iterate through categories -->
    <?php 
         $sql = "SELECT * FROM `discussion`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
          $id = $row['discussion_id'];
          $cat = $row['discussion_name'];
          $desc = $row['discussion_description'];
          echo '<div class="col-md-4 my-2">
                  <div class="card" style="width: 18rem;">
                      <img src="/img/card-'.$id.'.jpg" class="card-img-top" alt="image for this category">
                      <div class="card-body">
                          <h5 class="text-dark">' . $cat . '</h5>
                          <p class="card-text">' . substr($desc, 0, 90). '... </p>
                          <a href="threadlist.php?catid=' . $id . '" class="btn btn-secondary">Got it</a>
                      </div>
                  </div>
                </div>';
          } 
      ?>
  </div>
</div>
</div>

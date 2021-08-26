<?php
        $Title ="Main";
       include("functions.php");
       
       admin_header();
       ?>
      
      <div class="row">
        <div class="col-3">
        <div class="card">
              <div class="card-header">
                Page
              </div>
              <div class="card-body">
                <h5 class="card-title">Pages</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="pages.php?workspace=create" class="btn btn-primary">Create new page</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div> 
        </div>
        <div class="col-3">
        <div class="card">
              <div class="card-header">
                Users
              </div>
              <div class="card-body">
                <h5 class="card-title">Users</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="users.php?workspace=create" class="btn btn-primary">Add new users</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div> 
        </div>
        <div class="col-3">
        <div class="card">
              <div class="card-header">
                Post
              </div>
              <div class="card-body">
                <h5 class="card-title">Post</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="post.php?workspace=create" class="btn btn-primary">Create new Post</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div> 
        </div>
        <div class="col-3">
        <div class="card">
              <div class="card-header">
                Comments
              </div>
              <div class="card-body">
                <h5 class="card-title">Comment</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="comments.php" class="btn btn-primary">Check comments</a>
              </div>
              <div class="card-footer text-muted">
                2 days ago
              </div>
            </div> 
        </div>
      </div>    

   <?php admin_footer();?>

<?php include("editor.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="com/css/bootstrap.min.css">
    <link rel="stylesheet" href="com/font/css/all.css">
    

    <title>BlackEdit &odot; TryIt</title>
  </head>
  <body>
      
     
    
          <?php $post= new Editor(); $post->post_editor('js-post.php'); ?>


         
       
          
        
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="com/js/jquery-3.3.1.min.js"></script>
    <script src="com/js/popper.min.js"></script>
    <script src="com/js/bootstrap.min.js"></script>
    <script src="com/js/editor-class.js"></script>
    <script src="t.js"> </script>
</body>
</html>

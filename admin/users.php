<?php

$Title ="Users";


include('functions.php');
    

admin_header();



?>
<?php


if (isset($_GET["workspace"])) {

    switch (htmlspecialchars($_GET["workspace"])) {
        case 'list':
            
            break;
        case 'edit':
            
            break;
        case 'update':
            if (isset($_GET['id'])) {
                user_updator($_GET['id']);
               
            }
            
            break;
        case 'create':
            user_simple_editor();// post_editor();
            break;
        default:
        echo "<input type='email' class='form-control' placeholder='default' id='exampleInputEmail1' aria-describedby='emailHelp'>";
            break;
    }
}else {
    $rows = 0;
   // echo "<h1 id='tl'></h1>";
   user_list($rows);

   //echo "\n<script>document.getElementById('tl').innerHTML = '" . $rows. "'</script>";
}
    

?>




<?php include("elements/footer.php");?>
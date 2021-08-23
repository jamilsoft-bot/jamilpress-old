<?php

$Title ="Pages";

include("functions.php");
       
admin_header();?>
<?php


if (isset($_GET["workspace"])) {

    switch (htmlspecialchars($_GET["workspace"])) {
        case 'list':
            page_list();
            break;
        case 'edit':
            echo "<input type='email' class='form-control' placeholder='edit' id='exampleInputEmail1' aria-describedby='emailHelp'>
            ";
            break;
        case 'update':
            if (isset($_GET['id'])) {
                post_updator($_GET['id']);
            }
            
            break;
        case 'create':
            post_simple_editor();// post_editor();
            break;
        default:
        echo "<input type='email' class='form-control' placeholder='default' id='exampleInputEmail1' aria-describedby='emailHelp'>";
            break;
    }
}else {
   page_list();
}
    

?>




<?php include("elements/footer.php");?>
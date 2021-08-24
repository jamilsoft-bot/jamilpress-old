<?php

$Title ="Settings";

include("functions.php");
       
admin_header();?>
<?php


if (isset($_GET["workspace"])) {

    switch (htmlspecialchars($_GET["workspace"])) {
        case 'list':
           // comment_list();
            break;
        case 'edit':
            echo "<input type='email' class='form-control' placeholder='edit' id='exampleInputEmail1' aria-describedby='emailHelp'>
            ";
            break;
        case 'update':
            if (isset($_GET['id'])) {
                Comment_updator($_GET['id']);
            }
            
            break;
        case 'create':
            comment_simple_editor(2);// post_editor();
            break;
        default:
        echo "<input type='email' class='form-control' placeholder='default' id='exampleInputEmail1' aria-describedby='emailHelp'>";
            break;
    }
}else {
   //comment_list();
}
    

?>




<?php include("elements/footer.php");?>
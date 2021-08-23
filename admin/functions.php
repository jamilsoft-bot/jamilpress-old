<?php
    require('../core/gateway.php');
    
function admin_header()
{
    global $Title;
    include("elements/header.php");
    include("elements/sidebar.php");
   
       
     include("breadcrum.php");
}

function admin_footer()
{
    include("elements/footer.php");
}

function admin_head(){
    addstyle(array("test1","test2"));
}



?>
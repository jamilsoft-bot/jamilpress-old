<?php

include('js-api.php');
//include('js-users.php');
include('js-editor.php');
include('js-path.php');

function post_list()
{
    echo "<h2> Post list</h2>";
   echo " <div class='table-responsive'>";
   $dt = new Js_Post();
    $dt->list();
   echo "</div>";
}

function page_list()
{
    echo "<h2> Page list</h2>";
   echo " <div class='table-responsive'>";
   $dt = new Js_Post();
    $dt->list_pages();
   echo "</div>";
}

function user_list()
{
    echo "<h2> User list</h2>";
   echo " <div class='table-responsive'>";
   $dt = new Js_User();
    $dt->list();
   echo "</div>";
}

function addstyle($links = array()){
    

    foreach ($links as $key => $value) {

        echo "<link href='". $value. "' rel='stylesheet' type='text/css'>\n";

    }
    

    
}

function getstyle($links = array()){
    
            $i ='';
    foreach ($links as $key => $value) {
            
        return $i .= "<link href='". $value. "' rel='stylesheet' type='text/css'>\n";

    }
    

    
}

 function js_head()
{
    $data = new Js_path();
    
    $h1 = $data->get_stylePath().'/bootstrap.min.css';

    $h2 =  $data->get_stylePath().'/all.css';
    
    
      addstyle(array($h1,$h2));
    
}

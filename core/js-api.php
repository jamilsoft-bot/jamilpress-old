<?php

use Js_User as GlobalJs_User;

require('js-db.php');

  //  $postData = new Js_DB();

    $checkpoint = new Js_Operations();

    $checkpoint->Executor();

 /* if (isset($_POST['submit'])) {
   // execute('post-data');
   echo "<script> alert('are you?');</script>";
    
  }else {
   execute('get-data');
  }*/
  
   

 
class Js_Post
{
       /*public   $Author;
         public   $Content;
         public   $Title;
         public   $Excerpt;
         public   $Status;
         public   $Link;
         public   $Type;
         public   $Password;
         public   $comment_count;*/

public     function list()
{
    $data = new Js_DB();
    $result = $data->Retrive_post('All');
    
    echo "<table class='table table-striped table-hover table-sm'><thead><tr><th>ID</th><th>Author</th><th>Title</th><th>Excerpt</th><th>Status</th><th>Date created</th><th>Date Modified</th><th>Operation</th></tr></thead>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Author'] . "</td>";
        echo "<td>" . $row['Title'] . "</td>";
        echo "<td>" . $row['Excerpt'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "<td>" . $row['Modified'] . "</td>";
        echo "<td><a href='#' data-bs-toggle='tooltip' data-bs-placement='top' title='View the Post'><i class='fas fa-eye'></i></a>,<a href='?workspace=update&id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Modify the Post'><i class='fas fa-edit'></i></a>,<a href='../core/js-api.php?delete=post&Id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete the Post'><i class='fas fa-trash-alt'></i></a> </td>";
        echo "</tr>";
        

        //echo $row['Title'];
    }

   echo "</table>";
}


public     function list_comment()
{
    /*
$Post_Id =   $Comment['Post_Id'];
$Comment_Author =   $Comment['Comment_Author'];
$Content =   $Comment['Content'];
$Author_email =   $Comment['Author_email'];
$Author_link =   $Comment['Author_link'];
$Title =   $Comment['Title'];
$Status =   $Comment['Status'];
$Author_Ip =  $_SERVER['SERVER_ADDR'];
     */
    $data = new Js_DB();
    $result = $data->Retrive_Comment();
    
    echo "<table class='table table-striped table-hover table-sm'><thead><tr><th>Comment ID</th><th>Comment Author</th><th>Author Email</th><th>Post Id</th><th>Author website</th><th>Date created</th><th>Date Modified</th><th>Operation</th></tr></thead>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['Comment_Id'] . "</td>";
        echo "<td>" . $row['Comment_Author'] . "</td>";
        echo "<td>" . $row['Author_email'] . "</td>";
        echo "<td>" . $row['Post_Id'] . "</td>";
        echo "<td>" . $row['Author_link'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "<td>" . $row['Modified'] . "</td>";
        echo "<td><a href='#' data-bs-toggle='tooltip' data-bs-placement='top' title='View the Post'><i class='fas fa-eye'></i></a>,<a href='?workspace=update&id=" . $row['Comment_Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Modify the Post'><i class='fas fa-edit'></i></a>,<a href='../core/js-api.php?delete=comment&Id=" . $row['Comment_Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete the Post'><i class='fas fa-trash-alt'></i></a> </td>";
        echo "</tr>";
        

        //echo $row['Title'];
    }

   echo "</table>";
}

public     function list_pages()
{
    $data = new Js_DB();
    $result = $data->Retrive_pages();
    
    echo "<table class='table table-striped table-hover table-sm'><thead><tr><th>ID</th><th>Author</th><th>Title</th><th>Excerpt</th><th>Status</th><th>Date created</th><th>Date Modified</th><th>Operation</th></tr></thead>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Author'] . "</td>";
        echo "<td>" . $row['Title'] . "</td>";
        echo "<td>" . $row['Excerpt'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "<td>" . $row['Modified'] . "</td>";
        echo "<td><a href='#' data-bs-toggle='tooltip' data-bs-placement='top' title='View the Post'><i class='fas fa-eye'></i></a>,<a href='?workspace=update&id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Modify the Post'><i class='fas fa-edit'></i></a>,<a href='../core/js-api.php?delete=post&Id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete the Post'><i class='fas fa-trash-alt'></i></a> </td>";
        echo "</tr>";
        

        //echo $row['Title'];
    }

   echo "</table>";
}


private $Status;
public function get_error()
{
    return $this->Status;
}
public function create($Post =  array(
    'Author' => 'unknown',
    'Content' => '',
    'Title' => '',
    'Excerpt' =>'',
    'Status' =>'draft',
    'Link' => '',
    'Type' => 'post',
    'Password' =>'',
    'comment_count' => 0))
{   
    $data  = new Js_DB();

    if ($data->Insert_post($Post)) {
        return "Ok";
    }else{
        return $this->Status =  $data->DBError;
    }
}

public function update($id, $dat = array())
{
    $data = new Js_DB();
    if ($data->Update_post($id,$dat)) {
        return 'Ok';
    }else{
        return $this->Status = $data->DBError;
    }
}

public function delete($id)
{
    $data = new Js_DB();
    if ( $data->Delete_post($id) == 0) {
        return 'ok';
    }else {
        return $this->Status = $data->DBError;
    }
    
}
}


function execute($mode = '')
{
   


    switch ($mode) {
        case 'post-data':
            $Title =  htmlspecialchars($_POST['title']);
            $Content =  htmlspecialchars($_POST['content']);
            $excerpt = htmlspecialchars($_POST['excerpt']);
           
        
            $process = new Js_Post();
            $data = array(
                'Title' => $Title,
                'Content'=> $Content,
                'Excerpt' => $excerpt,
                'Author' => 'unknown',
                'Status' =>'draft',
                'Link' => '',
                'Type' => 'post',
                'Password' =>'',
                'comment_count' => 0
            );
            if (isset($_GET['ops'])) {
                switch ($_GET['ops']) {
                    case 'create':
                        if ($process->create($data) == 'Ok') {
                           // echo "<script>window.history.back()</script>";
                        }else{
                            echo $process->get_error();
                        }
                        break;
                    case 'update':
                        if (isset($_POST['Id'])) {
                            $Id = htmlspecialchars($_POST['Id']);
                            if ($process->update($Id,$data) == 'Ok') {
                               // echo "<script>window.history.back()</script>";
                            }else{
                                echo $process->get_error();
                            }
                        }
                       
                        break;
                   
                    
                    default:
                       
                        break;
                }
            }
            break;
        case 'get-data':
           
            
        
            $process = new Js_Post();
           
            
    if (isset($_GET['ops'])) {
        switch ($_GET['ops']) {
            
                
            case 'delete':
                if (isset($_GET['Id'])) {
                    $Id = htmlspecialchars($_GET['Id']);
                    if ($process->delete($Id) == 'Ok') {
                       // echo "<script>window.history.back()</script>";
                    }else{
                        echo $process->get_error();
                    }
                    
                }
                
                break;
            
            
            default:
               
                break;
        }
    }
            break;
        
        default:
            # code...
            break;
    }
    

   
 }
 
 
 class Js_User
{
       /*public   $Author;
         public   $Content;
         public   $Title;
         public   $Excerpt;
         public   $Status;
         public   $Link;
         public   $Type;
         public   $Password;
         public   $comment_count;*/

public     function list()
{
    $data = new Js_DB();
    $result = $data->Retrive_user('All');
    
    echo "<table class='table table-striped table-hover table-sm'><thead><tr><th>ID</th><th>Username</th><th>Full Name</th><th>City</th><th>Country</th><th>Date created</th><th>Date Modified</th><th>Operation</th></tr></thead>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['Fullname'] . "</td>";
        echo "<td>" . $row['City'] . "</td>";
        echo "<td>" . $row['Country'] . "</td>";
        echo "<td>" . $row['Date_registered'] . "</td>";
        echo "<td>" . $row['Date_modified'] . "</td>";
        echo "<td><a href='#' data-bs-toggle='tooltip' data-bs-placement='top' title='View the Post'><i class='fas fa-eye'></i></a>,<a href='?workspace=update&id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Modify the Post'><i class='fas fa-edit'></i></a>,<a href='../core/js-api.php?delete=user&Id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete the Post'><i class='fas fa-trash-alt'></i></a> </td>";
        echo "</tr>";
        

        //echo $row['Title'];
    }

   echo "</table>";
}
private $Status;
public function get_error()
{
    return $this->Status;
}
public function create($User = array(
      
    'Username' => '',
    'Userpass' => '',
    'UserEmail' => '',
    'UserLink' => '',
    'Activation_key' => '',
    'Fullname' => '',
    'Bio' => '',
    'City' => '',
    'Country' => '',
    'User_stats' => '',
    'Rank' => '',
    'Refral_count' => 0,
    'User_nick' => '',
    
))
{   
    $data  = new Js_DB();

    if ($data->Insert_user($User)) {
        return "Ok";
    }else{
        return $this->Status =  $data->DBError;
    }
}

public function update($id, $dat = array())
{
    $data = new Js_DB();
    if ($data->Update_post($id,$dat)) {
        return 'Ok';
    }else{
        return $this->Status = $data->DBError;
    }
}

public function delete($id)
{
    $data = new Js_DB();
    if ( $data->Delete_post($id) == 0) {
        return 'ok';
    }else {
        return $this->Status = $data->DBError;
    }
    
}
}


function execute_user($mode = '')
{
   


    switch ($mode) {
        case 'post-data':
            $fullname =  htmlspecialchars($_POST['Fullname']);
            $Bio =  htmlspecialchars($_POST['Bio']);
            $username = htmlspecialchars($_POST['username']);
            $country = htmlspecialchars($_POST['Country']);
            $city = htmlspecialchars($_POST['City']);
            $email = htmlspecialchars($_POST['Email']);
            $nick = htmlspecialchars($_POST['NickName']);
            $pass = htmlspecialchars($_POST['Password']);
            $encPass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        
            $process = new Js_User();
            $data = array(
      
                'Username' => $username,
                'Userpass' => $encPass,
                'UserEmail' => $email,
                'UserLink' => '',
                'Activation_key' => '',
                'Fullname' => $fullname,
                'Bio' => $Bio,
                'City' => $city,
                'Country' => $country,
                'User_stats' => '',
                'Rank' => '',
                'Refral_count' => 0,
                'User_nick' => $nick,
                
            );
            if (isset($_GET['ops'])) {
                switch ($_GET['ops']) {
                    case 'create':
                        if ($process->create($data) == 'Ok') {
                           // echo "<script>window.history.back()</script>";
                        }else{
                            echo $process->get_error();
                        }
                        break;
                    case 'update':
                        if (isset($_POST['Id'])) {
                            $Id = htmlspecialchars($_POST['Id']);
                            if ($process->update($Id,$data) == 'Ok') {
                             //   echo "<script>window.history.back()</script>";
                            }else{
                                echo $process->get_error();
                            }
                        }
                       
                        break;
                   
                    
                    default:
                       
                        break;
                }
            }
            break;
        case 'get-data':
           
            
        
            $process = new Js_User();
           
            
    if (isset($_GET['ops'])) {
        switch ($_GET['ops']) {
            case 'delete':
                if (isset($_GET['Id'])) {
                    $Id = htmlspecialchars($_GET['Id']);
                    if ($process->delete($Id) == 'Ok') {
                     //   echo "<script>window.history.back()</script>";
                    }else{
                        echo $process->get_error();
                    }
                    
                }
                
                break;
            default:
               
                break;
        }
    }
            break;
        
        default:
            # code...
            break;
    }
    

   
 }
 
 class Js_Operations 
 {
    
    public function create()
    {
        if (isset($_GET['create'])) {
            
            $ops = $_GET['create'];
            switch ($ops) {
                case 'user':
                   
                    break;
                case 'post':
                   
                    break;
                case 'comment':
                    
                    break;
                
                default:
                   
                    break;
            }
        }
    } 

    public function update()
    {
        if (isset($_GET['update'])) {
            
            $ops = $_GET['update'];
            switch ($ops) {
                case 'user':
                    $Id = htmlspecialchars($_POST['Id']);
                    $fullname =  htmlspecialchars($_POST['Fullname']);
                    $Bio =  htmlspecialchars($_POST['Bio']);
                    $username = htmlspecialchars($_POST['Username']);
                    $country = htmlspecialchars($_POST['Country']);
                    $city = htmlspecialchars($_POST['City']);
                    $email = htmlspecialchars($_POST['Email']);
                    $nick = htmlspecialchars($_POST['NickName']);
                   // $pass = htmlspecialchars($_POST['Password']);
                  //  $encPass = password_hash($_POST['Password'], PASSWORD_DEFAULT);
                
                   $uop = new Js_DB();
                    $data = array(
              
                        'Username' => $username,
                        
                        'UserEmail' => $email,
                        'UserLink' => '',
                        'Activation_key' => '',
                        'Fullname' => $fullname,
                        'Bio' => $Bio,
                        'City' => $city,
                        'Country' => $country,
                        'User_stats' => '',
                        'Rank' => '',
                        'Refral_count' => 0,
                        'User_nick' => $nick,
                        
                    );
                    if ($uop->Update_User($Id,$data)) {
                        echo "<script>alert('user Id ".$Id. " is updated')</script>";
                        echo "<script>window.history.back()</script>";
                    }else{}

                   
                    break;
                case 'post':

                   /**
                    * for the post update use js-post.php
                    */
                    
                    break;
                case 'comment':
                    
                   
                    break;
                
                default:
                   
                    break;
            }
        }
    }
    
    
    public function delete()
    {
        if (isset($_GET['delete'])) {
            
            $ops = $_GET['delete'];
            switch ($ops) {
                case 'user':
                    $process = new Js_DB();
                    $Id = htmlspecialchars($_GET['Id']);
                   /**/ 
                   $op = $process->Delete_User($Id);
                   
                   if ($op !== "") {
                    echo "<script>alert('user Id ".$Id. " is deleted')</script>";
                   }
                   /**/
                    //echo "<script>alert('user Id ".$process->delete($Id). "')</script>";

                    break;
                case 'post':

                    $process = new Js_DB();
                    $Id = htmlspecialchars($_GET['Id']);
                   /**/ 
                   $op = $process->Delete_post($Id);
                   
                   if ($op !== "") {
                    echo "<script>alert('post Id ".$Id. " is deleted')</script>";
                   }
                   
                    break;
                case 'comment':

                    $process = new Js_DB();
                    $Id = htmlspecialchars($_GET['Id']);
                   /**/ 
                   $op = $process->Delete_Comment($Id);
                   
                   if ($op !== "") {
                    echo "<script>alert('Comment Id ".$Id. " is deleted')</script>";
                    echo "<script>window.history.back()</script>";
                   }
                   
                    break;
                
                default:
                   
                    break;
            }
        }
    }
    
    
    public function Executor()
    {
        $this->create();
        $this->delete();
        $this->update();
    }


    
 }
 
 
 
 ?>



 
 
 



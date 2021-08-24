<?php
     require('js-db.php');

  //  $postData = new Js_DB();

  if (isset($_POST['submit'])) {
    execute_user('post-data');
    //echo "<script> alert('are you?');</script>";
    
  }else {
    execute_user('get-data');
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

public     function list(&$getRowsN)
{
    $data = new Js_DB();
    $result = $data->Retrive_user('All');

    $getRowsN = $result->num_rows;
    
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
        echo "<td><a href='#' data-bs-toggle='tooltip' data-bs-placement='top' title='View the Post'><i class='fas fa-eye'></i></a>,<a href='?workspace=update&id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Modify the Post'><i class='fas fa-edit'></i></a>,<a href='../core/js-users.php?ops=delete&Id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete the Post'><i class='fas fa-trash-alt'></i></a> </td>";
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
                            echo "<script>window.history.back()</script>";
                        }else{
                            echo $process->get_error();
                        }
                        break;
                    case 'update':
                        if (isset($_POST['Id'])) {
                            $Id = htmlspecialchars($_POST['Id']);
                            if ($process->update($Id,$data) == 'Ok') {
                                echo "<script>window.history.back()</script>";
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
                        echo "<script>window.history.back()</script>";
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
 
 
 
 
 ?>



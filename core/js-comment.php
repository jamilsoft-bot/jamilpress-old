<?php

     require('js-db.php');

  

  if (isset($_POST['submit'])) {
    execute('post-data');
    
  }else {
    execute('get-data');
  }
  
    
class Js_Comment
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
  /*  $data = new Js_DB();
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
        echo "<td><a href='#' data-bs-toggle='tooltip' data-bs-placement='top' title='View the Post'><i class='fas fa-eye'></i></a>,<a href='?workspace=update&id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Modify the Post'><i class='fas fa-edit'></i></a>,<a href='../core/js-post.php?ops=delete&Id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete the Post'><i class='fas fa-trash-alt'></i></a> </td>";
        echo "</tr>";
        

        //echo $row['Title'];
    }

   echo "</table>";*/
}
private $Status;
public function get_error()
{
    return $this->Status;
}
public function create($Comment = array(
    'Post_Id' => '1',
    'Comment_Author' => 'jamilsoft',
    'Content' => '',
    'Author_email' => '',
    'Author_link' => '',
    'Title' => '',
    'Status' => '',
    'Author_Ip' => '',
))
{   
    $data  = new Js_DB();

    if ($data->Insert_Comment($Comment)) {
        return "Ok";
    }else{
        return $this->Status =  $data->DBError;
    }
}



public function update($id, $dat = array())
{
    $data = new Js_DB();
    if ($data->Update_Comment($id,$dat)) {
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
            $owner =  htmlspecialchars($_POST['Comment_author']);
            $link =  htmlspecialchars($_POST['Author_link']);
            $email = htmlspecialchars($_POST['Email']);
            $Content = htmlspecialchars($_POST['Content']);
            $id = htmlspecialchars($_POST['P_id']);
           
        
            $process = new Js_Comment();
            $data = array(
                'Post_Id' => $id,
                'Comment_Author' => $owner,
                'Content' => $Content,
                'Author_email' => $email,
                'Author_link' => $link,
                'Title' => '',
                'Status' => '',
                'Author_Ip' => '',
            );
            if (isset($_GET['ops'])) {
                switch ($_GET['ops']) {
                    case 'create':
                        if ($process->create($data) == 'Ok') {
                            //echo "wait";
                            echo "<script>window.history.back()</script>";
                        }else{
                            echo $process->get_error();
                        }
                        break;
                    case 'update':
                        if (isset($_POST['id'])) {
                            $Id = htmlspecialchars($_POST['id']);
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
           
            
        
            $process = new Js_Comment();
           
            
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



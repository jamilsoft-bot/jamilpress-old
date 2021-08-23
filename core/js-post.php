<?php
     require('js-db.php');

  //  $postData = new Js_DB();

  if (isset($_POST['submit'])) {
    execute('post-data');
    
  }else {
    execute('get-data');
  }
  
    
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
        echo "<td><a href='#' data-bs-toggle='tooltip' data-bs-placement='top' title='View the Post'><i class='fas fa-eye'></i></a>,<a href='?workspace=update&id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Modify the Post'><i class='fas fa-edit'></i></a>,<a href='../core/js-post.php?ops=delete&Id=" . $row['Id']."' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete the Post'><i class='fas fa-trash-alt'></i></a> </td>";
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
           
            
        
            $process = new Js_Post();
           
            
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



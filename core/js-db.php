<?php


require("../config.inc");

        
$Connector = new mysqli($Conn_data['dbhost'],$Conn_data['dbuser'],$Conn_data['dbpass'],$Conn_data['dbname']);


class Js_DB
{
           public $DBError = "";


           public function _construct()
           {
              global $Connector;
              $this->DBError = $Connector->error;
           }
/**
 * Insert user in to database 
 * 
 * @param string $User an array of User info;-
 *  $Username,
 *  $Userpass,
 *  $UserEmail,
 *  $UserLink,
 *  $Activation_key,
 *  $Fullname,
 *  $Bio,
 *  $City,
 *  $Country,
 *  $User_stats,
 *  $Rank,
 *  $Refral_count,
 *  $User_nick
 *
 */

    public  function Insert_User($User = array(
      
      
      'Username' => 'from the file',
      'Userpass' => 'yes',
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
      
 )){
  // $Id =   $User['Id'];
   $Username =   $User['Username'];
   $Userpass =   $User['Userpass'];
   $UserEmail =   $User['UserEmail'];
   $UserLink =   $User['UserLink'];
   $Activation_key =   $User['Activation_key'];
   $Fullname =   $User['Fullname'];
   $Bio =   $User['Bio'];
   $City =   $User['City'];
   $Country =   $User['Country'];
  // $Date_modified =   $User['Date_modified'];
   $User_stats =   $User['User_stats'];
   $Rank =   $User['Rank'];
   $Refral_count =   $User['Refral_count'];
   $User_nick =   $User['User_nick'];
  // $Date_registered =   $User['Date_registered'];


   $sql = "INSERT INTO `users`( `Username`, `Userpass`, `UserEmail`, `UserLink`, `Activation_key`, `Fullname`, `Bio`, `City`, `Country`, `User_stats`, `Rank`, `Refral_count`, `User_nick`) VALUES('".$Username."','".$Userpass."','".$UserEmail."','".$UserLink."','".$Activation_key."','".$Fullname."','".$Bio."','".$City."','".$Country."','".$User_stats."','".$Rank."','".$Refral_count."','".$User_nick."')";

        global $Connector;
        return $Connector->query($sql);
        
        }

        /**
         * Delete User from the databse
         * @param $User_id | the user id which the operation will be perfom
         */
           public  function Delete_User($User_id){

            if ($User_id == (int)$User_id) {
               $sql = "DELETE FROM `users` WHERE Id =".(int)$User_id;

               global $Connector;
            return  $Connector->query($sql);
                  
              

              }else {
                  return "";
              }
        
        }

        /**
         * Update the User info in the database
         * @param $User_Id | the user id in which the update will be affect
         * @param $User  | An array of user info to be updated
         */
           public  function Update_User($User_id, $User = array(
      
            'Username' => 'updating user',
            
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
            
       )){



   
   $Username =   $User['Username'];
  
   $UserEmail =   $User['UserEmail'];
   $UserLink =   $User['UserLink'];
   $Activation_key =   $User['Activation_key'];
   $Fullname =   $User['Fullname'];
   $Bio =   $User['Bio'];
   $City =   $User['City'];
   $Country =   $User['Country'];
  
   $User_stats =   $User['User_stats'];
   $Rank =   $User['Rank'];
   $Refral_count =   $User['Refral_count'];
   $User_nick =   $User['User_nick'];
   

            $sql = "UPDATE `users` SET `Username`='".$Username."',`UserEmail`='".$UserEmail."',`UserLink`='".$UserLink."',`Activation_key`='".$Activation_key."',`Fullname`='".$Fullname."',`Bio`='".$Bio."',`City`='".$City."',`Country`='".$Country."',`Date_modified`=CURRENT_TIMESTAMP,`User_stats`='".$User_stats."',`Rank`='".$Rank."',`Refral_count`=".(int)$Refral_count.",`User_nick`='".$User_nick."' WHERE `Id`=".(int)$User_id;

        global $Connector;
        return $Connector->query($sql);
        
        }

            /**
             * Ritrive the user info from the database
             * @param $mode | specify whether single row or all rows will be return
             * @param $User_Id | if single row specify the Id of the User to be retrive
             */
           public  function Retrive_User($mode, $User_Id = null){
           
              switch ($mode) {
                 case 'Single':
         $sql = "SELECT * FROM `users` WHERE Id=" . $User_Id;
         global $Connector;
         return $Connector->query($sql);
                    break;
               case 'All':
                  $sql = "SELECT * FROM `users`";
        global $Connector;
        return $Connector->query($sql);
               break;
                 
                 default:
         $sql = "SELECT * FROM `users`";
         global $Connector;
         return $Connector->query($sql);
                    break;
              }

           
        
        }
           public  function Insert_post($Post =  array(
                'Author' => 'Muhammad Jamil',
                'Content' => 'let me test this class',
                'Title' => 'testing a class',
                'Excerpt' =>'let me',
                'Status' =>'draft',
                'Link' => 'test',
                'Type' => 'post',
                'post_parent' =>'uncatigorized',
                'Password' =>'',
                'comment_count' => 0))
                {
            $Author     = $Post['Author'];
            $Content    = $Post['Content'];
            $parent    = $Post['post_parent'];
            $Title      = $Post['Title'];
            $Excerpt    = $Post['Excerpt'];
            $Status     = $Post['Status'];
            $Link       = $Post['Link'];
            $Type       = $Post['Type'];
            $Password   = $Post['Password'];
            $comment_count  = $Post['comment_count'];

            $sql = " INSERT INTO `posts`( `Author`, `Content`, `Title`, `Excerpt`, `Status`, `Password`, `Link`, `Type`,`post_parent`, `comment_count`) VALUES ('".$Author."','".$Content."','".$Title."','".$Excerpt."','".$Status."','".$Password."','".$Link."','".$Type."','".$parent."','".$comment_count."')";



        global $Connector;
      return  $Connector->query($sql);
        
        }
           public  function Delete_post($post_id){
            if ($post_id == (int)$post_id) {
                $sql = "DELETE FROM `posts` WHERE Id =".(int)$post_id;

                global $Connector;
                return  $Connector->query($sql);
                   
               

               }else {
                   return "";
               }

        
        
        }
           public  function Update_post($post_id, $Post = array(

               
                'Content' => 'let me test the update function',
                'Title' => 'testing a class',
                'Excerpt' =>'let me',
                'Status' =>'draft',
                'Link' => 'test',
                'Type' => 'post',
                'post_parent' =>'',
                'Password' =>'',
                'comment_count' => 0

           )){
            $Ndate = new DateTime();
           
            $Content    = $Post['Content'];
            $parent    = $Post['post_parent'];
            $Title      = $Post['Title'];
            $Excerpt    = $Post['Excerpt'];
            $Status     = $Post['Status'];
            $Link       = $Post['Link'];
            $Type       = $Post['Type'];
            $Password   = $Post['Password'];
            $comment_count  = $Post['comment_count'];
            $Modified = $Ndate->format('Y-m-d H:i:s');
             

            $sql = "UPDATE `posts` SET `Content`='".$Content."',`post_parent`='".$parent."',`Title`='".$Title."',`Excerpt`='".$Excerpt."',`Status`='".$Status."',`Password`='".$Password."',`Modified`='".$Modified."',`Link`='".$Link."',`Type`='".$Type."',`comment_count`='".$comment_count."' WHERE `Id`=".$post_id;
            global $Connector;

            return  $Connector->query($sql);
        
        }
        /**
             * Ritrive the Post info from the database
             * @param $mode | specify whether single row or all rows will be return
             * @param $Post_Id | if single row specify the Id of the Post to be retrive
             */
public  function Retrive_post($mode = 'All',$Post_Id =0){

            switch ($mode) {
               case 'Single':
       $sql = "SELECT * FROM `posts` WHERE Id=" . $Post_Id;
       global $Connector;
       return $Connector->query($sql);
                  break;
             case 'All':
                $sql = "SELECT * FROM `posts`";
      global $Connector;
      return $Connector->query($sql);
             break;
               
               default:
       $sql = "SELECT * FROM `post`";
       global $Connector;
       return $Connector->query($sql);
                  break;
            }
        
        }

        public  function Update_page($post_id, $Post = array(

               
         'Content' => 'let me test the update function',
         'Title' => 'testing a class',
         'Excerpt' =>'let me',
         'Status' =>'draft',
         'Link' => 'test',
         'Type' => 'page',
         'Password' =>'',
         'comment_count' => 0

    )){
     $Ndate = new DateTime();
    
     $Content    = $Post['Content'];
     $Title      = $Post['Title'];
     $Excerpt    = $Post['Excerpt'];
     $Status     = $Post['Status'];
     $Link       = $Post['Link'];
     $Type       = $Post['Type'];
     $Password   = $Post['Password'];
     $comment_count  = $Post['comment_count'];
     $Modified = $Ndate->format('Y-m-d H:i:s');
      

     $sql = "UPDATE `posts` SET `Content`='".$Content."',`Title`='".$Title."',`Excerpt`='".$Excerpt."',`Status`='".$Status."',`Password`='".$Password."',`Modified`='".$Modified."',`Link`='".$Link."',`Type`='".$Type."',`comment_count`='".$comment_count."' WHERE `Id`=".$post_id;
     global $Connector;

     return  $Connector->query($sql);
 
 }

        public  function Insert_page($Post =  array(
         'Author' => 'Muhammad Jamil',
         'Content' => 'let me test this class',
         'Title' => 'testing a class',
         'Excerpt' =>'let me',
         'Status' =>'draft',
         'Link' => 'test',
         'Type' => 'page',
         'Password' =>'',
         'comment_count' => 0))
         {
     $Author     = $Post['Author'];
     $Content    = $Post['Content'];
     $Title      = $Post['Title'];
     $Excerpt    = $Post['Excerpt'];
     $Status     = $Post['Status'];
     $Link       = $Post['Link'];
     $Type       = $Post['Type'];
     $Password   = $Post['Password'];
     $comment_count  = $Post['comment_count'];

     $sql = " INSERT INTO `posts`( `Author`, `Content`, `Title`, `Excerpt`, `Status`, `Password`, `Link`, `Type`, `comment_count`) VALUES ('".$Author."','".$Content."','".$Title."','".$Excerpt."','".$Status."','".$Password."','".$Link."','".$Type."','".$comment_count."')";



 global $Connector;
return  $Connector->query($sql);
 
 }

public  function Retrive_pages(){

         
            
    $sql = "SELECT * FROM `posts` WHERE Type='page'";
    global $Connector;
    return $Connector->query($sql);
               
         
            
           
     
     }
           public  function Insert_Comment($Comment = array(
                 'Post_Id' => '4',
                 'Comment_Author' => 'jamilsoft',
                 'Content' => '',
                 'Author_email' => '',
                 'Author_link' => '',
                 'Title' => '',
                 'Status' => '',
                 'Author_Ip' => '',
            )){

$Post_Id =   $Comment['Post_Id'];
$Comment_Author =   $Comment['Comment_Author'];
$Content =   $Comment['Content'];
$Author_email =   $Comment['Author_email'];
$Author_link =   $Comment['Author_link'];
$Title =   $Comment['Title'];
$Status =   $Comment['Status'];
$Author_Ip =  $_SERVER['SERVER_ADDR']; //$Comment['Author_Ip'];

   $sql = "INSERT INTO `comments`(`Post_Id`, `Comment_Author`, `Content`, `Author_email`, `Author_link`, `Title`, `Status`,  `Author_Ip`) VALUES('".$Post_Id."','".$Comment_Author."','".$Content."','".$Author_email."','".$Author_link."','".$Title."','".$Status."','".$Author_Ip."')";


        global $Connector;
        return $Connector->query($sql);
        
        }
           public  function Delete_Comment($Comment_id){

            if ($Comment_id == (int)$Comment_id) {
               $sql = "DELETE FROM `comments` WHERE Comment_Id =".(int)$Comment_id;

               global $Connector;
               return   $Connector->query($sql);
                  
              

              }else {
                  return "";
              }

        
        
        }
           public  function Update_Comment($Comment_id, $Comment = array(
            'Post_Id' => '4',
            'Comment_Author' => 'jamilsoft',
            'Content' => '',
            'Author_email' => '',
            'Author_link' => '',
            'Title' => '',
            'Status' => ''
           
       )){

$Post_Id =   $Comment['Post_Id'];
$Comment_Author =   $Comment['Comment_Author'];
$Content =   $Comment['Content'];
$Author_email =   $Comment['Author_email'];
$Author_link =   $Comment['Author_link'];
$Title =   $Comment['Title'];
$Status =   $Comment['Status'];
$Author_Ip =  $_SERVER['SERVER_ADDR'];

      $sql = "UPDATE `comments` SET `Post_Id`=".$Post_Id.",`Comment_Author`='".$Comment_Author."',`Content`='".$Content."',`Author_email`='".$Author_email."',`Author_link`='".$Author_link."',`Title`='".$Title."',`Status`='".$Status."',`Modified`=CURRENT_TIMESTAMP,`Modified_ip`='".$Author_Ip."' WHERE `Comment_Id`=". $Comment_id;
        global $Connector;
        return $Connector->query($sql);
        
        }
        /**
         * 
         * Retrive comment from the database
         * @param $mode | specify where Single row fetching or All rows, Default is All
         * @param $Comment_Id | Specify the id of the comment if single
         */
           public  function Retrive_Comment($mode='All', $Comment_Id = 0 ){

            switch ($mode) {
               case 'Single':
       $sql = "SELECT * FROM `comments` WHERE Comment_Id=" . $Comment_Id;
       global $Connector;
       return $Connector->query($sql);
                  break;
             case 'All':
                $sql = "SELECT * FROM `comments`";
      global $Connector;
      return $Connector->query($sql);
             break;
               
               default:
       $sql = "SELECT * FROM `comments`";
       global $Connector;
       return $Connector->query($sql);
                  break;
            }
        
        }


        
           public  function Insert_Js_option($key = '', $value = '',$autoload=''){
              $sql = "INSERT INTO `js_options`(`Option_Name`, `Option_Value`, `Autoload`) VALUES ('".$key."','".$value."','".$autoload."')";

        global $Connector;
        return $Connector->query($sql);
        
        }
           public  function Delete_Js_option($Js_info_id){

            if ($Js_info_id == (int)$Js_info_id) {
               $sql = "DELETE FROM `js_options` WHERE Id =".(int)$Js_info_id;

               global $Connector;
             return $Connector->query($sql);
                  
              

              }else {
                 
                  return $this->DBError;
              }

        
        
        }
           public  function Update_Js_option($js_option_id = 0, $js_option = array(
              'key' => '',
              'value' => '',
              'autoload' => 'yes'
           )){
              $key = $js_option['key'];
              $value = $js_option['value'];
              $autoload = $js_option['autoload'];
            $sql = "UPDATE `js_options` SET `Option_Name`='".$key."',`Option_Value`='".$value."',`Autoload`='".$autoload."' WHERE `Option_Id`=" . (int)$js_option;
        global $Connector;
        return $Connector->query($sql);
        
        }
           public  function Retrive_Js_option($js_option = 'All', $js_option_id = 0){
            switch ($js_option) {
               case 'Single':
                  $sql = "SELECT * FROM `js_options` WHERE `Option_Id`=". $js_option_id;
                  global $Connector;
                  return $Connector->query($sql);
                  break;
               
               default:
               $sql = "SELECT * FROM `js_options` WHERE 1";
               global $Connector;
               return $Connector->query($sql);
                  break;
            }
       
        
        }

       
       public function Query($sql)
       {
         global $Connector;
         return $Connector->query($sql);
       }



       public function Rows($result)
       {
          
        return $row = $result->fetch_assoc();
       }


        

            
}











?>
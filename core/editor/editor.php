<?php

class Editor
{
  public function simple_editor($post_action)
  {
           
    
    

    echo "<div class='w3-row ' style='height: 100%;'>";
    echo "<div class='w3-col w3-card w3-padding w3-margin w3-threequarter' style='width: 69%;'>";
     echo "   <form action='".$post_action."' method='post' class='w3-container'>";
            echo "<h3 class='w3-text-blue'> Title</h3>";
            echo "<input type='text' name='title' placeholder='The post title' class=' w3-input  w3-border' id=''>";
            echo "<h3 class='w3-margin'> Content</h3>";
            echo "<textarea class='w3-input w3-border font-header'  rows='14' name='content'></textarea>";
            echo "<h3>Excerpt</h3>";
            echo "<input type='text' name='excerpt' placeholder='The post summery' class='font-header w3-input  w3-border' id=''>";
            
    echo "</div>";
    echo "<div class='w3-col w3-card w3-margin w3-padding w3-quarter'>";
        echo "<h3>Status</h3>";
        echo "<select name='status' class='w3-select font-header w3-border'>";
            echo "<option value='Publish'>Publish now</option>";
            echo "<option value='Draft'>Keep draft</option>";
      echo "</select>";
        echo "<h3>Content type</h3>";
        echo "<select name='type' value='cat' class='w3-border font-header w3-select'>";
            echo "<option value='Page'>Page</option>";
            echo "<option value='Post'>Blog</option>";
            echo "<option value='cat'>Category</option>";
            echo "<option value='tag'>Tag</option>";
        echo "</select>";
        echo "<h3>Content Category</h3>";
        echo "<select name='parent' class='w3-border font-header w3-select'>";
            echo "<option value='Entertaiment'>Entertaiment</option>";
            echo "<option value='Sport'>Sport</option>";
            echo "<option value='Business'>Business</option>";
            echo "<option value='uncatigorized'>uncatigorized</option>";
       echo "</select>";

        echo "<h3>Tag</h3>";
        echo "<input type='text' name='tag' class=' font-header w3-input  w3-border' id=''>";

        echo "<h3> Author</h3>";
        echo "<input type='text' name='Author' class=' font-header w3-input  w3-border' id=''>";
        echo "<h3>&ThickSpace;</h3>";
        echo "<input type='submit' name='submit' class=' font-header w3-input w3-button w3-blue w3-btn' value='submit' id=''>";
    echo "</div>";
echo "</div>";

 echo "</form>";



    
  }
  
  
  
  
  
  public function post_simple_editor($post_action)
    {
       echo "<form action='".$post_action."' method='post'><br><br>";
              
              
              echo "<label for='Excerpt' class='form-label'>The Title of the post</label>";
              echo "<input type='text' name='title' class='form-control' placeholder='Title'>";
              
              echo "<br><br><textarea name='content' class='shadow w-100 rounded border d-block' id='output' cols='30' rows='10'></textarea><br><br>";
             
               
               echo "  <label for='excerpt' class='form-label'>The summary of the post</label>";
               echo " <input type='text' name='excerpt' maxlength='50' class='form-control' placeholder='Excerpt'> <br><br>";
             
              echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
                
    }

    public function page_simple_editor($post_action)
    {
       echo "<form action='".$post_action."' method='post'><br><br>";
              
              
              echo "<label for='Excerpt' class='form-label'>The Title Of the page</label>";
              echo "<input type='text' name='title' class='form-control' placeholder='Title'>";
              
              echo "<br><br><textarea name='content' class='shadow w-100 rounded border d-block' id='output' cols='30' rows='10'></textarea><br><br>";
             
               
               echo "  <label for='excerpt' class='form-label'>The summary of the post</label>";
               echo " <input type='text' name='excerpt' maxlength='50' class='form-control' placeholder='Excerpt'> <br><br>";
             
              echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
                
    }


    public function comment_simple_editor($post_action,$PID)
    {
      echo "<form action='".$post_action."' method='post'><br><br>";
              
              
      echo "<label for='fullname' class='form-label'>FullName</label>";
      echo "<input type='text' name='Comment_author' class='form-control' placeholder='e.g Muhammad Jamil'>";
      echo "<label for='username' class='form-label'>Website address</label>";
      echo "<input type='text' name='Author_link' class='form-control' placeholder='e.g http://www.someone.com'>";
      //echo "<label for='Nickname' class='form-label'>Nick Name</label>";
      echo "<input type='text' style='display:none' name='P_id' value='".$PID."' class='form-control' placeholder='e.g jamilsoft'>";
      echo "<label for='Email' class='form-label'>Email Address</label>";
      echo "<input type='text' name='Email' class='form-control' placeholder='e.g someone@compony.com'>";
      
     // echo "<label for='City' class='form-label'>City</label>";
     // echo "<input type='text' name='City' class='form-control' placeholder='e.g Bauchi'>";
     // echo "<label for='Country' class='form-label'>Country</label>";
     // echo "<input type='text' name='Country' class='form-control' placeholder='e.g Nigeria'>";
      echo "<br><br><center><label for='Bio' class='form-label'>Content</label></center>";
      echo "<textarea name='Content' class='shadow w-100 rounded border d-block' id='output' cols='30' rows='10'></textarea><br><br>";
     
       
      // echo "  <label for='Password' class='form-label'>User Password</label>";
      // echo " <input type='Password' name='Password' maxlength='50' class='form-control' placeholder='Password'> <br><br>";
     
      echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
        
    }



    public function comment_updator($post_action,$data = array(
      'Post_Id' => '1',
      'Comment_Author' => 'jamilsoft',
      'Content' => '',
      'Author_email' => '',
      'Author_link' => '',
      'Title' => '',
      'Status' => '',
      'Author_Ip' => '',
    ),$Id )
    {
      echo "<form action='".$post_action."' method='post'><br><br>";
              
              
      echo "<label for='fullname' class='form-label'>FullName</label>";
      echo "<input type='text' name='Comment_author' class='form-control' value='".$data['Comment_Author']."' placeholder='e.g Muhammad Jamil'>";
      echo "<label for='username' class='form-label'>Website address</label>";
      echo "<input type='text' name='Author_link' class='form-control' value='".$data['Author_link']."' placeholder='e.g http://www.someone.com'>";
      //echo "<label for='Nickname' class='form-label'>Nick Name</label>";
      echo "<input type='text' style='display:none' name='P_id' value='".$data['Author_link']."' class='form-control' placeholder='e.g jamilsoft'>";
      echo "<label for='Email' class='form-label'>Email Address</label>";
      echo "<input type='text' name='Email' value='".$data['Author_email']."' class='form-control' placeholder='e.g someone@compony.com'>";
      
     // echo "<label for='City' class='form-label'>City</label>";
      echo "<input type='text' style='display:none' name='id' class='form-control' value='".$Id."' placeholder='e.g Bauchi'>";
     // echo "<label for='Country' class='form-label'>Country</label>";
     // echo "<input type='text' name='Country' class='form-control' placeholder='e.g Nigeria'>";
      echo "<br><br><center><label for='Bio' class='form-label'>Content</label></center>";
      echo "<textarea name='Content' class='shadow w-100 rounded border d-block' id='output' cols='30' rows='10'>".$data['Content']."</textarea><br><br>";
     
       
      // echo "  <label for='Password' class='form-label'>User Password</label>";
      // echo " <input type='Password' name='Password' maxlength='50' class='form-control' placeholder='Password'> <br><br>";
     
      echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
        
    }

    public function setting_updator($post_action,$js_option = array(
      'Option_Name' => '',
      'Option_Value' => '',
      'Autoload' => "yes"
   ),$Id )
    {
      echo "<form action='".$post_action."' method='post'>\n";
              
              
      echo "<table width='1100'><tr><td><label for='fullname' class='form-label'>Setting name</label>";
      echo "<input type='text' name='OptionName' disabled='true' class='form-control' value='".$js_option['Option_Name']."'>";
      echo "<input type='text' style='display:none'  name='OptionName'  class='form-control' value='".$js_option['Option_Name']."'>";

      echo "</td><td><label for='username' class='form-label'>Setting Value</label>";
      echo "<input type='text' name='OptionValue' class='form-control' value='".$js_option['Option_Value']."' placeholder='e.g http://www.someone.com'>";
      //echo "<label for='Nickname' class='form-label'>Nick Name</label>";
     // echo "<input type='text' style='display:none' name='P_id' value='".$data['Author_link']."' class='form-control' placeholder='e.g jamilsoft'>";
      echo "</td><td><label for='Email' class='form-label'>Autoload?</label>";
      echo "<input type='text' name='Autoload' value='".$js_option['Autoload']."' class='form-control'></td></tr></table>";
      
      
     // echo "<label for='City' class='form-label'>City</label>";
      echo "<input type='text' style='display:none' name='id' class='form-control' value='".$Id."' placeholder='e.g Bauchi'>";
     // echo "<label for='Country' class='form-label'>Country</label>";
     // echo "<input type='text' name='Country' class='form-control' placeholder='e.g Nigeria'>";
     // echo "<br><br><center><label for='Bio' class='form-label'>Content</label></center>";
     // echo "<textarea name='Content' class='shadow w-100 rounded border d-block' id='output' cols='30' rows='10'>".$data['Content']."</textarea><br><br>";
     
       
      // echo "  <label for='Password' class='form-label'>User Password</label>";
      // echo " <input type='Password' name='Password' maxlength='50' class='form-control' placeholder='Password'> <br><br>";
     
      echo "</td><td><input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
      // echo "<input type='radio' name='options' value='test' id='option2'> Radio 2" ;
      // echo "<input type='radio' name='options' id='option1'> Radio 1" ;
    }

    public function post_editor($post_action)
    {
       echo "<form action='".$post_action."' method='post'><br><br>";
              
              
              echo "<label for='Excerpt' class='form-label'>The summary of the post</label>";
              echo "<input type='text' name='title' class='form-control' placeholder='Title'>";
              echo "<textarea name='content' id='output' onchange='copytext()'' style='display: none;' cols='30' rows='10'></textarea><br><br>";
              
              echo "  <div id='editor' class='shadow w-100 rounded border d-block'></div><br><br>";
             
               
               echo "  <label for='excerpt' class='form-label'>The summary of the post</label>";
               echo " <input type='text' name='excerpt' maxlength='50' class='form-control' placeholder='Excerpt'> <br><br>";
             
              echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
                
    }

    public function post_updator($post_action,$data = array(
        'Title' =>'',
        'Content'=>''
    ), $id)
    {
        
       echo "<form action='".$post_action."' method='post'><br><br>";
              
            echo "<table><tr><td><label for='Title' class='form-label'>Post Id</label></td>";
            echo "<td><input type='text' name='Id' class='form-control'  placeholder='post id' value='".$id."'></td></tr></table>";
            
              echo "<label for='Title' class='form-label'>The Title of the post</label>";
              echo "<input type='text' name='title' class='form-control'  placeholder='Title' value='".$data['Title']."'>";
              echo "<br><br><textarea name='content' class='shadow w-100 rounded border d-block' id='output' onchange='copytext()'' cols='30' rows='10'>".$data['Content']."</textarea><br><br>";
              echo "<label for='excerpt' class='form-label'>The summary of the post</label>";
            echo " <input type='text' name='excerpt' maxlength='50' class='form-control' placeholder='Excerpt' value='".$data['Excerpt']."'> <br><br>";
             
              echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='update'></form>";
                
    }

    public function comment_editor()
    {
        
    }

    public function user_simple_editor($post_action)
    {
       echo "<form action='".$post_action."' method='post'><br><br>";
              
              
              echo "<label for='fullname' class='form-label'>FullName</label>";
              echo "<input type='text' name='Fullname' class='form-control' placeholder='e.g Muhammad Jamil'>";
              echo "<label for='username' class='form-label'>Username</label>";
              echo "<input type='text' name='username' class='form-control' placeholder='e.g jamilsoft-bot'>";
              echo "<label for='Nickname' class='form-label'>Nick Name</label>";
              echo "<input type='text' name='NickName' class='form-control' placeholder='e.g jamilsoft'>";
              echo "<label for='Email' class='form-label'>Email Address</label>";
              echo "<input type='text' name='Email' class='form-control' placeholder='e.g someone@compony.com'>";
              
              echo "<label for='City' class='form-label'>City</label>";
              echo "<input type='text' name='City' class='form-control' placeholder='e.g Bauchi'>";
              echo "<label for='Country' class='form-label'>Country</label>";
              echo "<input type='text' name='Country' class='form-control' placeholder='e.g Nigeria'>";
              echo "<center><label for='Bio' class='form-label'>User Biography</label></center>";
              echo "<br><br><textarea name='Bio' class='shadow w-100 rounded border d-block' id='output' cols='30' rows='10'></textarea><br><br>";
             
               
               echo "  <label for='Password' class='form-label'>User Password</label>";
               echo " <input type='Password' name='Password' maxlength='50' class='form-control' placeholder='Password'> <br><br>";
             
              echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
                
    }


    public function user_updator($post_action,$row = array(
      'Username' => '',
      
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
    ),$Id)
    {

       echo "<form action='".$post_action."' method='post'><br><br>";
              
              
              
              echo "<table><tr><td> <label for='user-id' class='form-label'>User Id </label> </td><td><input type='text' name='Id' class='form-control' value='".$Id."'></td></tr></table>";
              echo "<label for='fullname' class='form-label'>FullName</label>";
              echo "<input type='text' name='Fullname' class='form-control' value='".$row['Fullname']."' placeholder='e.g Muhammad Jamil'>";
              echo "<label for='username' class='form-label'>Username</label>";
              echo "<input type='text' name='Username' value='".$row['Username']."' class='form-control' placeholder='e.g jamilsoft-bot'>";
              echo "<label for='Nickname' class='form-label'>Nick Name</label>";
              echo "<input type='text' name='NickName' value='".$row['User_nick']."' class='form-control' placeholder='e.g jamilsoft'>";
              echo "<label for='Email' class='form-label'>Email Address</label>";
              echo "<input type='text' name='Email' value='".$row['UserEmail']."' class='form-control' placeholder='e.g someone@compony.com'>";
              
              echo "<label for='City' class='form-label'>City</label>";
              echo "<input type='text' name='City' value='".$row['City']."' class='form-control' placeholder='e.g Bauchi'>";
              echo "<label for='Country' class='form-label'>Country</label>";
              echo "<input type='text' name='Country' value='".$row['Country']."' class='form-control' placeholder='e.g Nigeria'>";
              echo "<center><label for='Bio' class='form-label'>User Biography</label></center>";
              echo "<br><br><textarea name='Bio' class='shadow w-100 rounded border d-block' id='output' cols='30' rows='10'> ".$row['Bio']." </textarea><br><br>";
             
               
               echo " <br><br>";
             
              echo "<input type='submit' name='submit' class='w-100 btn btn-lg btn-primary' value='Submit'></form>";
                
    }
    
}

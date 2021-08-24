<?php require('js-db.php');



/**/if (isset($_GET['update'])) {
    $data = array(
        'key' => htmlspecialchars($_POST['OptionName']),
        'value' => htmlspecialchars($_POST['OptionValue']),
        'autoload' => htmlspecialchars($_POST['Autoload'])
    );
    $st = new Js_settings();
    $st->update($data,$_POST['id']);

    echo "<script>window.history.back()</script>";

    
}
/**/

//echo $_POST['OptionName'];



class Js_settings
{
    public function update($data = array(),$id)
    {
        $db = new Js_DB();
        if($db->Update_Js_option($id,$data)){
            echo "Data updated";
        }
    }
}



?>
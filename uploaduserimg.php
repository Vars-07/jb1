<?php
session_start();
$id = $_SESSION['id'];

$value = $_GET['value'];


include "database.php";
$db = new Database();
$db->connect();

if ($value == 0) {


    define ("MAX_SIZE", "2");

    function getExtension($str)
    {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

    //This variable is used as a flag. The value is initialized with 0 (meaning no error found) and it will be changed to 1 if an errro occures. If the error occures the file will not be uploaded.
    $errors = 0;
    //checks if the form has been submitted
    if (isset($_POST['Submit'])) {
        //reads the name of the file the user submitted for uploading
        $image = $_FILES['image']['name'];
        //if it is not empty
        if ($image) {
            //get the original name of the file from the clients machine
            $filename = stripslashes($_FILES['image']['name']);
            //get the extension of the file in a lower case format
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            //if it is not a known extension, we will suppose it is an error and will not upload the file, otherwize we will do more tests
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
                //print error message
                header("location:ownprofile.php?error=1");
                $errors = 1;
            }
            else
            {
                //get the size of the image in bytes
                //$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
                $size = filesize($_FILES['image']['size']);

                //compare the size with the maxim size we defined and print error if bigger
                if ($size > MAX_SIZE *1024) {
                    //echo '<h1>You have exceeded the size limit!</h1>';
                    header("location:ownprofile.php?error=2");
                    $errors = 1;
                }

                //we will give an unique name, for example the time in unix time format
                $image_name = $id . '.' . $extension;
                //the new name will be containing the full path where will be stored (images folder)
                $newname = "user_pics/" . $image_name;
                //we verify if the image has been uploaded, and print error instead
                $copied = copy($_FILES['image']['tmp_name'], $newname);
                if (!$copied) {
                    //echo '<h1>Copy unsuccessfull!</h1>';
                    header("location:ownprofile.php?error=3");
                    $errors = 1;
                }
                else
                {
                     $query = "update profile set pic='" . $newname . "'where uid='" . $id . "'";
                    $res = mysql_query($query);
                    header("location:ownprofile.php?error=0");



                }






            }
        }




    }

    //If no errors registred, print the success message
   /* if (isset($_POST['Submit'])) {
        // $db->insert('company',array($k,$name,$details,$newname));
        // $db->update('count',array('companies'=>$k),array('id',0));
        $query = "update profile set pic='" . $newname . "'where uid='" . $id . "'";
        $res = mysql_query($query);
        header("location:ownprofile.php?error=0");

    }
*/
}

else {
    $db_host = 'localhost';
    $db_infotsav = 'jobbureau';
    $db_user = 'root';
    $db_pass = 'Iiahtth';
    $nick = $_POST['nick'];

    try{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_infotsav", $db_user, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $query1 = $conn->prepare("update profile set nick=? where uid=?");
    $query1->execute(array($nick,$id));
    //$rowsw = $query1->fetch(PDO::FETCH_ASSOC);
    //print_r($rowsw);
    //$res = $query->fetchAll();
    
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    //$query = "update profile set nick='" . $nick . "'where uid='" . $id . "'";
    //$res = mysql_query($query);
    header("location:ownprofile.php?error=0");
}
?>

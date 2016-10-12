<?php
//define a maxim size for the uploaded images in Kb
include_once('database.php');
$db=new Database();
$db->connect();
$db->select('count');
$result=$db->getResult();
$k= $result['updates'];
$k=$k+1;
echo $k;
define ("MAX_SIZE","200");
$update=$_POST['update'];
//This function reads the extension of the file. It is used to determine if the file is an image by checking the extension.


//This variable is used as a flag. The value is initialized with 0 (meaning no error found) and it will be changed to 1 if an errro occures. If the error occures the file will not be uploaded.
$errors=0;


//If no errors registred, print the success message
if(isset($_POST['Submit']) )
{
    $db->update('updates',array('is_visible'=>0),array('is_visible',1));
    $db->update('count',array('companies'=>$k),array('id',0));
    $db->insert('updates',array($update,1));

    header("location:updates_insert.php?error=0");
}

?>

<?php
//define a maxim size for the uploaded images in Kb
include('database.php');
$db=new Database();
$db->connect();
define ("MAX_SIZE","200");
$details=$_POST['detail'];
//This function reads the extension of the file. It is used to determine if the file is an image by checking the extension.
function getExtension($str) {
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

//This variable is used as a flag. The value is initialized with 0 (meaning no error found) and it will be changed to 1 if an errro occures. If the error occures the file will not be uploaded.
$errors=0;
$username=$_POST['uname'];
$password=$_POST['pwd'];
if($username!="ray" || $password!="1234")
{
	$errors=5;
	header("location:sponsoradmin.php?error=5");
}

//checks if the form has been submitted
if(isset($_POST['Submit']) && errors==0)
{
    //reads the name of the file the user submitted for uploading
    $image=$_FILES['image']['name'];
    //if it is not empty
    if ($image!=null)
    {
        //get the original name of the file from the clients machine
        $filename = stripslashes($_FILES['image']['name']);
        //get the extension of the file in a lower case format
        $extension = getExtension($filename);
        $extension = strtolower($extension);
        //if it is not a known extension, we will suppose it is an error and will not upload the file, otherwize we will do more tests
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
        {
            //print error message
            header("location:sponsoradmin.php?error=1");
            $errors=1;
        }
        else
        {
            //get the size of the image in bytes
            //$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
            $size=filesize($_FILES['image']['tmp_name']);
			echo "".$size;
            //compare the size with the maxim size we defined and print error if bigger
            /*if ($size > MAX_SIZE*1024)
            {
                //echo '<h1>You have exceeded the size limit!</h1>';
                header("location:sponsoradmin.php?error=1");
                $errors=1;
            }
			else*/
			if($errors==0)
			{
				//we will give an unique name, for example the time in unix time format
				$image_name=time().'.'.$extension;
				//the new name will be containing the full path where will be stored (sponsor folder)
				$newname="sponsor_logo/".$image;
				//we verify if the image has been uploaded, and print error instead
				$copied = copy($_FILES['image']['tmp_name'], $newname);
				if (!$copied)
				{
					//echo '<h1>Copy unsuccessfull!</h1>';
					header("location:sponsoradmin.php?error=1");
					$errors=1;
				}
			}
		}
	}
	else
	{
		$errors =2;
		//header("location:sponsoradmin.php?error=2");
	}
}

//If no errors registred, print the success message
if(isset($_POST['Submit']) && $errors==0 )
{
	$update = 'UPDATE sponsor SET status=0';
	@mysql_query($update);
    $db->insert('sponsor',array(1,$details,$newname));
    header("location:sponsoradmin.php?error=0");

}

?>

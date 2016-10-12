<?php


include_once('database.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infotsav15";



session_start();
$username =trim( $_POST['uname']);
$password = trim($_POST['pass']);


//echo 'Anshul';
$db = new Database();
$db->connect();
//$db->select('profile','*',"uid='".$username."'");
//$res=$db->getResult();
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query=$conn->prepare("SELECT * FROM profile Where uid=?");
    $uid=$username;
    $query->execute();
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
//$conn = null;
//$sql = "SELECT * FROM profile Where uid='" . $username . "'";
//$query = mysql_query($sql);
$res1 = mysql_fetch_array($query);

$passdb = $res1['password'];
$usertype = $res1['usertype'];
$lock = $res1['flag'];

if(isset($_POST['uname'])==1 && isset($_POST['pass'])==1)
{
    if ((strcmp($lock, '0') == 0))
    {
        if ((strcmp($password, $passdb) == 0) && (strcmp($usertype, 'user') == 0))
        {
            $_SESSION['id'] = $username;

            $_SESSION['usertype'] = "user";
            //header("location:ownprofile.php");
        }
        elseif ((strcmp($password, $passdb) == 0) && (strcmp($usertype, 'admin') == 0))
        {
            $_SESSION['id'] = $username;

            $_SESSION['usertype'] = "admin";
            header("location:admin.php");
        }
        else {
            //alert("wrong pass");
            header("location:index.php?error= The Username or password doesnt match");
        }

    }
    else
    {

        header("location:index.php?error= You have been blocked by admin ");


    }
}
else
{
    header("location:index.php?error= Please Enter Username/Password ");

}

?>

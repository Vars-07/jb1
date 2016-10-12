<html>
<form name="newpost" method="post" enctype="multipart/form-data" action="sponsorupload.php">
                            <?php
						if($_SERVER["QUERY_STRING"]!=null)
						{
							$error=$_GET['error'];
							if($error==0)
							{
								echo "success";
							}
							elseif($error==4)
							{
								echo '';
							}
                            else
                                echo "error";
						}
                          ?>
                          <h2 align="center">
                          Sponsor</h2>
						<table cellpadding="10" cellspacing="5">
                        <tr><td><h3>Detail</h3></td>
                        <td> <label>
                            <textarea name="detail" id="textarea" cols="30" rows="5"></textarea>
                          </label></td>
                        </tr>
						<tr></tr>
						<tr></tr>
						<tr><td><h3>Image</h3></td><td><input type="file" name="image" size="42"> </td></tr>&nbsp;
						<tr><td><h3>Username</h3></td><td><input type="text" name="uname"</td></tr>
						<tr><td><h3>Password</h3></td><td><input type="password" name="pwd"</td></tr>
						<tr><td><input name="Submit" type="submit" value="Submit"></td></tr>
						</table>
						</form>
</html>
<?
if(isset($_POST['log_out']))
    {
    session_start();
    $_SESSION['user_in']=25;
    $_SESSION['temp_right_block']=1;
    $_SESSION['user_login']=0;
    $_SESSION['user_password']=0;
    $_SESSION['user_name']=0;
    $_SESSION['user_sename']=0;
    $_SESSION['user_email']=0;
    $_SESSION['temp_content']=0;
    header('location:index.php');
    }

if(isset($_POST['profile']))
    {
    session_start();
    if($_SESSION['user_in']==1)
        {
        $_SESSION['temp_content']=3;
        header('location:index.php');
        }
    }
?>
    <table>
	<tr>
		<td>
		<?  echo "<img src=\""; echo $_SESSION['user_avatar']; echo "\"/>"; ?>
		</td>
	</tr>
	<tr>
            <td>User:</td>
        </tr>
        <tr>
            <td>
<?
$d=$_SESSION['user_login'];
echo $d;
?>

            </td>
        </tr>
        <tr>
            <td>Date of registration:</td>
        </tr>
        <tr>
            <td>
            
<?
$d2=$_SESSION['user_date_reg'];
echo $d2;
?>
            
            </td>
        </tr>
        <tr>
            <td>
            <FORM method="post" ACTION="user_inf.php" NAME="user_inf">
            <INPUT TYPE="submit" NAME="log_out" VALUE="Exit">
            </FORM>
            </td>
        </tr>
    </table>
        

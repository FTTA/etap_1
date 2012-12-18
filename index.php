<?
session_start();
if(!isset($_SESSION['s_st']))
{
$_SESSION['user_in']=25;
$_SESSION['s_st']=1;
$_SESSION['reg_data']=0;
$_SESSION['hostname_db']='localhost';
$_SESSION['username_db']='root';
$_SESSION['password_db']='usbw';
$_SESSION['name_db']='stage_1';
$_SESSION['temp_right_block']=0;
$_SESSION['temp_content']=0;
$_SESSION['user_login']=0;
$_SESSION['user_password']=0;
$_SESSION['user_name']=0;
$_SESSION['user_sename']=0;
$_SESSION['user_email']=0;
$_SESSION['user_date_reg']=0;
$_SESSION['sp']=0;
$_SESSION['last_content_number']=0;
$_SESSION['content_masuv']=0;
$_SESSION['kyda_post']=0;
$_SESSION['user_skype']='дані відсутні';
$_SESSION['user_date_of_birth']='дані відсутні';
$_SESSION['user_icq']='дані відсутні';
$_SESSION['user_avatar']=0;
$_SESSION['right_block_error']=0;
$_SESSION['error']=0;
}

$temp_left_block;
$start_block;
$up_block;
$left_block;

$end_blocks;
$right_block2;
$content_block2;

 
if(isset($_POST['scrutuj_post_text']))
    $_SESSION['temp_content']=2;
if(isset($_POST['redag_button']))
    $_SESSION['temp_content']=4;



//====================================
require'build_blocks\start_block.html';
require'build_blocks\up_block.html';
//====================================

require'build_blocks\left_block.html';

require'menu_list.html';


//====================================

require'build_blocks\content_block.html';


switch($_SESSION['temp_content'])
    {
    case 1: require'add_content.html';break;
    case 2: $_SESSION['temp_show_one_content.php']=$_POST['scrutuj_post_text'];require"show_one_content.php"; break;
    case 3: require"user_profile.html";break;
    case 4: $_SESSION['temp_edit_content.html']=$_POST['search_name'];require"edit_content.html";break;
    case 5: require"edit_content.html";break;
    default: require"show_content.php";break; 
    }
/*
echo "<br>";
echo $_SESSION['user_in']; echo '<br>';
echo $_SESSION['s_st']; echo "<br>";
echo $_SESSION['reg_data'];echo "<br>";
echo $_SESSION['hostname_db'];echo "<br>";
echo $_SESSION['username_db'];echo "<br>";
echo $_SESSION['password_db'];echo "<br>";
echo $_SESSION['name_db'];echo "<br>";
echo $_SESSION['temp_right_block'];echo "<br>";
echo $_SESSION['temp_content'];echo "<br>";
echo $_SESSION['user_login'];echo "<br>";
echo $_SESSION['user_password'];echo "<br>";
echo $_SESSION['user_name'];echo "<br>";
echo $_SESSION['user_sename'];echo "<br>";
echo $_SESSION['user_email'];echo "<br>";
echo $_SESSION['user_date_reg'];echo "<br>";
echo $_SESSION['sp'];echo "<br>";
echo $_SESSION['last_content_number'];echo "<br>";
echo $_SESSION['content_masuv'];echo"<br>";

echo $_SESSION['user_avatar'];
*/
//================================================================
require'build_blocks\right_block.html';

$mmds="rtret";


switch($_SESSION['temp_right_block'])
    {
    case 1:require"blok_aytentification.html";break;
    case 2:require"user_inf.php";break;
    default:require"blok_aytentification.html";break;
    }
echo"<p style=\"color:#F70505\">";
switch($_SESSION['right_block_error'])
    {
    case 1: require'errors\error_login.html';break;
    case 2: require'errors\error_password.html';break;
    case 3: require'errors\error_user_not_register.html';break;
    }
echo '</p>';
require'build_blocks\end_block.html';

//=================================================================

?>
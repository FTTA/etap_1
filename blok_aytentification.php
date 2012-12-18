<?
session_start();
if(isset($_POST['enter'])&&(isset($_POST['login_in']))&&(isset($_POST['pass_in'])))
   {
   $temp_post_login_in=mysql_real_escape_string($_POST['login_in']);
   $temp_post_pass_in=mysql_real_escape_string($_POST['pass_in']);
   //unset ($_POST['enter'],$_POST['login_in'],$_POST['pass_in']);
    mysql_connect($_SESSION['hostname_db'],$_SESSION['username_db'],$_SESSION['password_db']) OR DIE("Не можу створити з'єднання");
    mysql_select_db($_SESSION['name_db']) or die("Користувч з даним логіном відсутній". mysql_error() );
    $table='users';
    $login_in2=$temp_post_login_in;
    $dani_user=mysql_query("select distinct * from $table where login=\"$login_in2\"");
    $dani_user2=mysql_fetch_array($dani_user);
    unset($dani_user);
    
    if ($temp_post_login_in==$dani_user2['login'])
        {
         
        if ($temp_post_pass_in==$dani_user2['password'])
            {
            $_SESSION['temp_right_block']=2;
            $_SESSION['user_login']=$dani_user2['login'];
            $_SESSION['user_password']=$dani_user2['password'];
            $_SESSION['user_name']=$dani_user2['name'];
            $_SESSION['user_sename']=$dani_user2['sename'];
            $_SESSION['user_email']=$dani_user2['e_mail'];
            $_SESSION['user_date_reg']=$dani_user2['date_reg'];
            $_SESSION['sp']=$dani_user2['sp'];
            $_SESSION['user_in']=3;
            $_SESSION['temp_content']=0;
            $_SESSION['user_skype']=$dani_user2['skype'];
            $_SESSION['user_date_of_birth']=$dani_user2['date_of_birth'];
            $_SESSION['user_icq']=$dani_user2['icq'];
            $_SESSION['user_avatar']=$dani_user2['avatar'];
            $_SESSION['right_block_error']=0;
            }    
        else
            {
            $_SESSION['right_block_error']=2;
            }
        }
    else
        {
        $_SESSION['right_block_error']=1;
        
        }
   }

if(isset($_POST['enter'])&&(isset($_POST['login_in']))&&(!isset($_POST['pass_in'])))
 $_SESSION['right_block_error']=2;
header("location:index.php");
  ?> 
    



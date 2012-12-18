<?
session_start();
$_SESSION['temp_content']=1;
$table='content';
//header("location:index2.php");
 if((isset($_POST['add']))&&(isset($_POST['name_co']))&&(isset($_POST['content']))&&($_SESSION['user_in']!=25))
     {
      
      $temp_post_name_co=mysql_real_escape_string($_POST['name_co']);
      $temp_post_content=mysql_real_escape_string($_POST['content']);
      unset($_POST['name_co']);
      unset($_POST['content']);
      if(($_SESSION['user_in']==3))//&&($_SESSION['user_login']!=0))
       {
       mysql_connect($_SESSION['hostname_db'],$_SESSION['username_db'],$_SESSION['password_db']) OR DIE("Не можу створити з'єднання");
       mysql_select_db($_SESSION['name_db']) or die(mysql_error());
       $r=mysql_query("select max(nomer)  from $table");
       $r2=mysql_result($r,0);
       unset($r);
       $n=0;
       $n=$r2+1;
       $name_content=$temp_post_name_co;
       $content=$temp_post_content;
       //$name_content=$_POST['name_co'];
       //$content=$_POST['content'];
       $user_login=$_SESSION['user_login'];
       $m=getdate();
       $date_add="$m[year].-$m[mon].-$m[mday]";
       $shlax=0;
       //===========================================================================
       $image=$shlax;
       $zaput="INSERT INTO $table VALUES ('$n','$name_content','$content','$user_login','$date_add','$image')";
       mysql_query($zaput) or die(mysql_error());
       mysql_close();
       $_SESSION['temp_content']=0;

       }
     }
if((isset($_POST['add']))&&(isset($_POST['name_co']))&&($_SESSION['user_in']==25))
 {
 $_SESSION['right_block_error']=3;
 }
header("location:index.php");



?>
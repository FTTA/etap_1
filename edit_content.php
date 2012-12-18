<?
session_start();

$pidtverdjenna=20;
$lichulnuk=0;
$unic_name=0;
if((isset($_POST['edit_button']))&&(isset($_POST['name_co']))&&(isset($_POST['search_name'])))
    {
    $pidtverdjenna=10;
    $masuv_danux[$lichulnuk]=mysql_real_escape_string($_POST['name_co']);
    $masuv_poliv[$lichulnuk]='title';
    $lichulnuk++;
    $unic_name=$_POST['name_co'];
    }         

if((isset($_POST['content']))&&(isset($_POST['edit_button']))&&(isset($_POST['search_name'])))
    {
    $pidtverdjenna=10;
    $masuv_danux[$lichulnuk]=mysql_real_escape_string($_POST['content']);
    $masuv_poliv[$lichulnuk]='material';
    $lichulnuk++;
    }
if((isset($_FILES['kartunka']))&&(isset($_POST['edit_button']))&&(isset($_POST['search_name'])))
    {
    if($unic_name==0)
        $unic_name=mysql_real_escape_string($_POST['search_name']);
    $pidtverdjenna=10;
    //$masuv_danux[$lichulnuk]=$_POST['kartunka'];
    $masuv_poliv[$lichulnuk]='image';
    $shlax="image/".$unic_name."_content_image.jpeg";
    $masuv_danux[$lichulnuk]=$shlax;    
    
    $lichulnuk++;
    }
$table='content';
if($pidtverdjenna==10)
    {
    
    mysql_connect($_SESSION['hostname_db'],$_SESSION['username_db'],$_SESSION['password_db']) OR DIE("Не можу створити з'єднання");
    mysql_select_db($_SESSION['name_db']) or die(mysql_error());
    $r2=mysql_query("select max(nomer) from $table");
    $temp_nomer=mysql_result($r2,0);
    $temp_nomer++;
    $nazva=mysql_real_escape_string($_POST['search_name']);
    //$nazva=$_POST['search_name'];
    mysql_query("UPDATE $table SET nomer=\"$temp_nomer\" where title=\"$nazva\"");
    for($i=0;$i<$lichulnuk;$i++)
        {
        $dani_dz=$masuv_danux[$i];
        $pole=$masuv_poliv[$i];
        if($pole=="image")
            {
            $r2=mysql_query("select distinct * from $table where title=\"$nazva\"");
            $f=mysql_fetch_array($r2);
            $temp=$f['image'];
            unlink($temp);            
            move_uploaded_file($_FILES['kartunka']['tmp_name'],$dani_dz);
            
            }
         mysql_query("UPDATE $table SET $pole=\"$dani_dz\" where title=\"$nazva\"");
         
        
        //header("location:http://www.google.ru/");
        
        //$dani_user=mysql_query("UPDATE $table SET e_mail=\"$new_email\" where login=\"$login\"");
        
        }    
    
    mysql_close(); 
        
        //header("location:http://www.google.ru/");
        //header("location:skudanna.php");
                
    }
if((isset($_POST['delete_button']))&&(isset($_POST['search_name'])))
    {
    mysql_connect($_SESSION['hostname_db'],$_SESSION['username_db'],$_SESSION['password_db']) OR DIE("Не можу створити з'єднання");
    mysql_select_db($_SESSION['name_db']) or die(mysql_error());
    $nazva=$_POST['search_name'];
    $r2=mysql_query("select distinct * from $table where title=\"$nazva\"");
    $f=mysql_fetch_array($r2);
    $temp=$f['image'];
    unlink($temp);
    mysql_query("DELETE from $table where title=\"$nazva\"");
    mysql_close();    
    }
    
    //header("location:index.php");
header("location:skudanna.php");
    



?>




<?
if(isset($_SESSION['temp_show_one_content.php']))
    {
    mysql_connect($_SESSION['hostname_db'],$_SESSION['username_db'],$_SESSION['password_db']) OR DIE("Не можу створити з'єднання");
            mysql_select_db($_SESSION['name_db']) or die(mysql_error());
            $table='content';
            $search=$_SESSION['temp_show_one_content.php'];
            unset($_SESSION['temp_show_one_content.php']);
            $r2=mysql_query("select distinct * from $table where nomer=\"$search\"");
            $f=mysql_fetch_array($r2);
    mysql_close();
            unset($r2);
                $m[0]=$f['title'];
                $m[1]=$f['user_login'];
                $m[2]=$f['date_add'];
                $m[3]=$f['material'];
                $m[4]=$f['image'];
            echo'<table>';
            echo"<tr><td colspan=\"2\"><h3>".$m[0]."</h3></td></tr>\n";
            echo"<td><b>$m[1]</b></td><td align=\"right\"><b>".$m[2]."</b></td>\n";
            echo"<tr><td colspan=\"2\">";echo $m[3];echo"</td>\n</tr><tr><td><!--<img src=\"";echo $m[4]; echo"\"width=\"600\" height=\"500\"/>--></td></tr>\n";
                
            if($_SESSION['user_in']!=25)
                    {
                    echo"<tr><td colspan=\"2\"><form name=\"form_edit_content\" action=\"index.php\" method=\"POST\"><input type=\"text\" name=\"search_name\" size=\"25\" value=\"";
                    echo $m[0];
                    echo "\" style=\"display:none\"><input type=\"submit\" name=\"redag_button\" size=\"25\" value=\"Edit\" ></form></td></tr>\n";
                    }
            echo'</table>';           
    }


 
?>
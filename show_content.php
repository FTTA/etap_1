<?

$script="<script type=\"text/javascript\">
    function block_in_hide(m)
         {
         var skruta_vidpravka_pole=document.getElementById('skruta_vidpravka_pole');
         skruta_vidpravka_pole.value=m;
         document.skrutuj_post.submit();
         }
</script>";
echo $script;
mysql_connect($_SESSION['hostname_db'],$_SESSION['username_db'],$_SESSION['password_db']) OR DIE("Не можу створити з'єднання");
            mysql_select_db($_SESSION['name_db']) or die(mysql_error());
            $table='content';
            $r2=mysql_query("select distinct * from $table ");
            echo "<form action=\"index.php\" method=\"POST\" name=\"skrutuj_post\" id=\"skruta_vidpravka\" ><br>";
            echo "<input type=\"text\" name=\"scrutuj_post_text\" size=\"25\" value=\"\" id=\"skruta_vidpravka_pole\" style=\"display:none\"></form>";
            echo"<table>\n";
            while ($f = mysql_fetch_array($r2))
                {
                $p=$m[0]=$f['title'];
                $m[1]=$f['user_login'];
                $m[2]=$f['date_add'];
                $m[3]=$f['material'];
                $m[4]=$f['image'];
                $m[5]=$f['nomer'];
                //====
                
                $radok=$f['material'];
                $zadano=150;
                $kilkist=substr_count($radok," ");
                $novuj_radok=$radok;
                $pokazatu=2;
                if($kilkist>$zadano)
                    {
                    $pokazatu=3;
                    $z=strlen($radok);
                    for($k=0,$n=0;$n<$zadano,$k<$z;$k++)
                        {
                        if($radok[$k]==' ')
                            $n++;
                        if($n>$zadano)
                            break;
                        }
                    unset($novuj_radok);
                    $novuj_radok=substr($radok ,0,$k);
                    $m[3]=$novuj_radok;
                    }
                
                //===
                
                echo"<tr><td colspan=\"2\"><h3><a href=\"#\" OnClick=\"block_in_hide(";echo $m[5]; echo")\"><b>".$m[0]."</b></a></h3></td></tr>\n";
                echo"<td><b>$m[1]</b></td><td align=\"right\"><b>".$m[2]."</b></td>";
                echo"<tr><td colspan=\"2\">";echo $m[3];
                if($pokazatu==3)
                    {
                    echo"... <a href=\"#\" OnClick=\"block_in_hide(";echo $m[5]; echo")\"><b>read more</b></a>";
                    }
                echo"</td></tr>\n";
                if($_SESSION['user_in']!=25)
                    {
                    echo"<tr><td colspan=\"2\"><form name=\"form_edit_content\" action=\"index.php\" method=\"POST\"><input type=\"text\" name=\"search_name\" size=\"25\" value=\"";
                    echo $m[0];
                    echo "\" style=\"display:none\"><input type=\"submit\" name=\"redag_button\" size=\"25\" value=\"Edit\" ></form></td></tr>";
                    }
                
                }
                echo '</table>';
  
?>
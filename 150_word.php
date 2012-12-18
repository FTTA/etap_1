<?
$radok;
$zadano=150;
$kilkist=substr_count($radok," ");
$novuj_radok=$radok;
if($kilkist>$zadano)
    {
    $z=strlen($radok);
    for($k=0,$n=0;$n<$zadano,$k<$z;$k++)
        {
        if($radok[$k]==' ')
            $n++;
        if($n>$zadano)
            break;
    }
    unset($novuj_radok);
    $novuj_radok=substr($radok ,0,$n);
    }
?>
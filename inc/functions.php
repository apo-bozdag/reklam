<?php
include "settings.php";

function p($par, $st = false){
    if($st){
        return htmlspecialchars(addslashes(trim($_POST[$par])));
    }else{
        return addslashes(trim($_POST[$par]));
    }
}

function post($par){
    return $_POST[$par];
}

function g($par){
    //return strip_tags(trim($_GET[$par]));
    if(isset($_GET[$par])){
        return htmlspecialchars(addslashes(trim($_GET[$par])));
    }else{
        return null;
    }
}

function kisalt($par, $uzunluk =50){
    if (strlen($par) > $uzunluk){
        $par = mb_substr($par, 0, $uzunluk, "UTF-8")."..";
    }
    return $par;
}

function go($par, $time = 0){
    if ($time == 0){
        header("Location: {$par}");
        //	echo '<META HTTP-EQUIV="Refresh" CONTENT="'.$time.';URL='.$par.'">';
    }else {
        header("Refresh: {$time}; url={$par}");
        //	echo '<META HTTP-EQUIV="Refresh" CONTENT="'.$time.';URL='.$par.'">';
    }
}

function ss($par){
    return stripslashes($par);
}


function session($par){
    if(isset($_SESSION[$par])){
        return $_SESSION[$par];
    }else {
        return false;
    }
}

function cookie($par){
    if(isset($_COOKIE[$par])){
        return $_COOKIE[$par];
    }else {
        return false;
    }
}

function session_olustur($par){
    foreach ($par as $anahtar => $deger){
        $_SESSION[$anahtar] = $deger;
    }
}



function datetimeCevir($date){
    $timestamp = strtotime($date);
    //$date_formated = date('Y-m-dTH:i:sP', $timestamp);
    $date_formated = date('c', $timestamp);
    return $date_formated;
}


function sef_link($s) {
    $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',',"'","!",'"');
    $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','',"","","");
    $s = str_replace($tr,$eng,$s);
    $s = strtolower($s);
    $s = preg_replace("@[^a-z0-9\-_şıüğçİŞĞÜÇ]+@i","-",$s);
    $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
    $s = preg_replace('/\s+/', '-', $s);
    $s = preg_replace('|-+|', '-', $s);
    $s = preg_replace('/#/', '', $s);
    $s = preg_replace('/[[:^print:]]/', '', $s);
    $s = str_replace('.', '', $s);
    $s = trim($s, '-');
    return $s;
}

function ilGetir() {
    $query   = @unserialize(file_get_contents('http://ip-api.com/php/'));
    $il = sef_link($query["city"]);
    return $il;
}


function query($query){
    return mysqli_fetch_array($query);
    //return mysqli_query($query);
}

function row($query){
    return @mysqli_fetch_array($query);
}

function rows($query){
    return @mysqli_num_rows($query);
}


function timeTR($par)
{
    $explode = explode(" ", $par);
    $explode2 = explode("-", $explode[0]);
    @$zaman = substr($explode[1], 0, 5);

    if ($explode2[1] == "1") $ay = "Ocak";
    elseif ($explode2[1] == "2") $ay = "Şubat";
    elseif ($explode2[1] == "3") $ay = "Mart";
    elseif ($explode2[1] == "4") $ay = "Nisan";
    elseif ($explode2[1] == "5") $ay = "Mayıs";
    elseif ($explode2[1] == "6") $ay = "Haziran";
    elseif ($explode2[1] == "7") $ay = "Temmuz";
    elseif ($explode2[1] == "8") $ay = "Ağustos";
    elseif ($explode2[1] == "9") $ay = "Eylül";
    elseif ($explode2[1] == "10") $ay = "Ekim";
    elseif ($explode2[1] == "11") $ay = "Kasım";
    elseif ($explode2[1] == "12") $ay = "Aralık";
    else $ay = "";

    return $explode2[2]." ".$ay." ".$explode2[0]." ".$zaman;
}

function zamanSoyle ( $zaman )
{
    $zaman =  strtotime($zaman);
    $zaman_farki = time() - $zaman;
    $saniye = $zaman_farki;
    $dakika = round($zaman_farki/60);
    $saat = round($zaman_farki/3600);
    $gun = round($zaman_farki/86400);
    $hafta = round($zaman_farki/604800);
    $ay = round($zaman_farki/2419200);
    $yil = round($zaman_farki/29030400);
    if( $saniye < 60 ){
        if ($saniye == 0){
            return "az önce";
        } else {
            return $saniye .' saniye önce';
        }
    } else if ( $dakika < 60 ){
        return $dakika .' dakika önce';
    } else if ( $saat < 24 ){
        return $saat.' saat önce';
    } else if ( $gun < 7 ){
        return $gun .' gün önce';
    } else if ( $hafta < 4 ){
        return $hafta.' hafta önce';
    } else if ( $ay < 12 ){
        return $ay .' ay önce';
    } else {
        return $yil.' yıl önce';
    }
}
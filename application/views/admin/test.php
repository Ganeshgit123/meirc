<?php
         $var = '07"-"Feb"-"21';
$date = str_replace('"', '', $var);
$strdate = date('Y-m-d', strtotime($date));
echo $strdate;
?>
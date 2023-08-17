<?php 
function writeLog($msg){
    date_default_timezone_set("America/Guayaquil");
    $fecha_actual = date("h:i:s");
    $rutaLog = $_SERVER['DOCUMENT_ROOT'].'/datanalysis/logs';
    if(!file_exists($rutaLog)){
        mkdir($rutaLog);
    }
    $rutaLog = $rutaLog.'/log.txt';
    file_put_contents($rutaLog, '['.$fecha_actual.'] '.$msg.PHP_EOL.'', FILE_APPEND);
}
?>
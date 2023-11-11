<?php 
session_start(); ob_start();


define('_VIEW_', __DIR__ . '/../App/View'); # tạo một hằng số là cái view
define('_PUBLIC_PATH_',$_SERVER['DOCUMENT_ROOT'] . '/public');

date_default_timezone_set('Asia/Ho_Chi_Minh'); # xét thời gian hiện tại việt nam

$config = [
    'Route','DB','Function'
];
foreach($config as $config){
    include $config . '.php';
}
?>
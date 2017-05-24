<?php
require_once '../app/init.php';
header("Access-Control-Allow-Origin:".DOMAIN_URL);
ini_set('display_errors', 0);
$route=new Route;
$route->get('/','Home@getHome');
$route->get('/profile','Home@getProfile');
$route->get('/test','Home@getTest');
$route->post('/ques/save','Home@postSave');
$route->get('/ques/:id','Home@getQues');
$route->get('/res','Home@getRes');
$route->get('/login','Account@getLogin');
$route->get('/submit','Home@getSubmit');
$route->post('/login','Account@postLogin');
$route->post('/insertQues','Home@insertQues');
$route->post('/ques/:id/mark','Home@postMark');
$route->post('/alertsubmit','Home@alertSubmit');
$route->post('/failure_time','Home@failure_time');
$route->post('/langsubmit','Home@langSubmit');

$route->run();
?>
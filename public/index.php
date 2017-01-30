<?php
require_once '../app/init.php';
header("Access-Control-Allow-Origin:".DOMAIN_URL);
ini_set('display_errors', 1);
$route=new Route;
$route->get('/','Home@getHome');
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
$route->post('/langsubmit','Home@langSubmit');















$route->get('/admin','AdminAuth@getAdminLogin');
$route->post('/adminlogin','AdminAuth@postAdminLogin');
// ************* routes for all admin functionalities************************************//
$route->get('/admindashboard','AdminController@adminHome');
$route->get('/authority','AdminController@authorityList');

$route->get('/add_authority','AdminController@addAuthority');
$route->post('/post_authority','AdminController@postAuthority');
$route->get('/edit_authority/:id','AdminController@editAuthority');
$route->post('/update_authority/:id','AdminController@updateAuthority');
$route->post('/delete_authority/:id','AdminController@deleteAuthority');

$route->get('/examination/:authority_id','AdminController@examinationList');
$route->get('/add_examination/:authority_id','AdminController@addExamination');
$route->post('/post_examination','AdminController@postExamination');
$route->get('/edit_examination/:authority_id/:exam_id/','AdminController@editExamination');
$route->post('/update_examination/:authority_id/:exam_id/','AdminController@updateExamination');
$route->post('/delete_examination/:authority_id/:exam_id/','AdminController@deleteExamination');

$route->get('/quiz/:authority_id/:quiz_id','AdminController@getQuiz');
$route->get('/add_quiz/:authority_id/:quiz_id','AdminController@addQuiz');
$route->post('/post_quiz/:authority_id/:quiz_id','AdminController@postQuiz');
$route->get('/edit_quiz/:authority_id/:quiz_id/:quiz_id','AdminController@editQuiz');
$route->post('/update_quiz/:authority_id/:quiz_id/:quiz_id','AdminController@updateQuiz');
$route->post('/delete_quiz/:authority_id/:quiz_id/:quiz_id','AdminController@deleteQuiz');

$route->get('/question_manager/:authority_id/:quiz_id/:quiz_id','AdminController@getQuestion_manager');
$route->get('/add_question/:authority_id/:quiz_id/:id','AdminController@addQuestion');
$route->post('/post_question/:authority_id/:quiz_id/:quiz_id','AdminController@postQuestion');
$route->get('/edit_question/:authority_id/:quiz_id/:quiz_id/:ques_id','AdminController@editQuestion');
$route->get('/upload_csv/:authority_id/:quiz_id/:quiz_id','AdminController@upload_csv');
$route->post('/post_csv/:authority_id/:quiz_id/:quiz_id','AdminController@post_csv');
$route->run();
?>
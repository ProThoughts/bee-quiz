<?php
require_once './vendor/spyc/Spyc.php';
$questions = Spyc::YAMLLoad('./questions/question1.yml'); 

header('content-type: application/json; charset=utf-8');
echo json_encode($questions);

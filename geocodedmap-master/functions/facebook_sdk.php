<?php 

require '../../../packages/vendor/autoload.php'; 
require '../db/database_class.php';

$fb = new Facebook\Facebook ([

    'app_id' => '1452021355091002',
    'app_secret'=>'8d552aeeeb9fa15c06f020ed275dd027',
    'default_graph_version' => 'v2.4',

]);

$fb->setDefaultAccessToken('1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY');
$q = '/search?&q=restaurant&type=place&center=';
$q2 = '&distance=500000&fields=talking_about_count,location&offset=0&limit=5000';

$batch = [
    $fb->request('GET', $q . '39.103118,-84.512020' . $q2),
    //$fb->request('GET', $q . '43.618710,-116.214607' . $q2),
    //$fb->request('GET', $q . '45.676998,-111.042934' . $q2),
    ];

$responses = $fb->sendBatchRequest($batch);

foreach ($responses as $key => $response) {
  
    $response->getBody();
  
}

?>








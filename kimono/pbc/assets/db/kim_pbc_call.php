<?php
$request = "https://www.kimonolabs.com/api/9ltni8v6?apikey=FBDJYl1bPU9v5loco8ASRjQzBejBLbyW";
$response = file_get_contents($request);
$results = json_decode($response, TRUE);
?>

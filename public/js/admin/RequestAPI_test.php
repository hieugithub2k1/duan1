<?php
header('Content-Type: application/json');

// if($_SERVER['REQUEST_METHOD'] == "POST"){

    $response = json_encode(['hello1', 'hello2']);
    file_put_contents('response_log.txt', $response . PHP_EOL, FILE_APPEND);
    echo $response;
// }


?>
<?php
    $method = $_SERVER['REQUEST_METHOD'];
    $file = file('Test.txt');
    $allValues = [];
    switch($method){
        case 'GET':
            foreach($file as $line){
                $values = split(';', $line);
                var_dump($values);    
                array_push($allValues, $values);    
            }
            break;
        case 'POST':
            file_put_contents("Test.txt", $_POST['a'].';'.$_POST['b'].PHP_EOL, FILE_APPEND);
            break;
        case 'PUT':
            $row = file_get_contents('php://input');
            $rows = split(';', $row);
            foreach($file as $line){
                $values = split(';', $line);
                if($values[0] === $rows[0]){
                    values = [];
                    file_put_contents("Test.txt", "");
                }   
                array_push($allValues, $values);
            }
            foreach ($allValues as $value) {
                foreach ($value as $val) {
                    file_put_contents("Test.txt", $val.';', FILE_APPEND);
                }
                file_put_contents("Test.txt", PHP_EOL, FILE_APPEND);
            }
            break;
        case 'DELETE':
            $row = file_get_contents('php://input');
            $rows = split(';', $row);
            foreach($file as $line){
                $values = split(';', $line);
                array_push($allValues, $values); 
                if($values[0] === $rows[0]){
                    file_put_contents("Test.txt", "");
                }   
            }
            break;
        default:
            echo 'EMPTY';
            break;
    }

?>
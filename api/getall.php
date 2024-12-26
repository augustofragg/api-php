<?php
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get') {

    $sql = $pdo->query("SELECT * FROM notes");
    if($sql->rowCount() > 0) {
        $arrayData= $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($arrayData as $data) {
            $array['result'][] = [
                'id' => $data['id'],
                'title' => $data['title']
            ]; 
        }
    }
}
else {
    $array['error'] = "Metodo invalido";
}




require('../return.php');
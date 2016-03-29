<?php
/**
 * Created by PhpStorm.
 * User: sereb
 * Date: 29.03.2016
 * Time: 15:06
 */
function vardump($var) {
    echo '< pre >';
    var_dump($var);
    echo '< / pre >';
    exit;
}

if(isset($_POST)){
    if($_POST["request_type"] == "ticket"){
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $id = htmlspecialchars($_POST["rep_id"]);
        $data = array();
        $data["name"] = $name;
        $data["email"] = $email;
        $data["id"] = $id;
        $inp = file_get_contents('tickets.json');
        $tempArray = json_decode($inp);
        array_push($tempArray, $data);
        $jsonData = json_encode($tempArray);
        file_put_contents('tickets.json', $jsonData);
        header("Location: index.php?message=success");
    }
    if($_POST["request_type"]=="message"){
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $msg = htmlspecialchars($_POST["message"]);
        $data = array();
        $data["name"] = $name;
        $data["email"] = $email;
        $data["message"] = $msg;

        $inp = file_get_contents('messages.json');
        $tempArray = json_decode($inp);
        array_push($tempArray, $data);
        $jsonData = json_encode($tempArray);
        file_put_contents('messages.json', $jsonData);
        header("Location: index.php?message=success");
    }

}
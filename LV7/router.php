<?php
header('Access-Control-Allow-Origin:https://localhost');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: text/html; charset=utf-8');
session_set_cookie_params(['samesite' => 'None', 'secure' => true]);
session_start();

$login_err   = '{"h_message":"login redirect","h_errcode":999}';
$request_err = '{"h_message":"request error","h_errcode":998}';
$procedure_err  = '{"h_message":"method error","h_errcode":997}';
$projekt_err  = '{"h_message":"project error","h_errcode":996}';
$logout  = '{"h_message":"Uspješno ste odjavljeni","h_errcode":0}';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $injson = json_encode($_POST);
        break;
    case 'GET':
        $injson = json_encode($_GET);
        break;
    default:
        echo $request_err;
        return;
}

$in_obj = json_decode($injson);
$in_obj->session_id = session_id();
$in_obj->UserID = $_SESSION['ID'] ?? null;
$injson = json_encode($in_obj);

// logout
if ($in_obj->procedura == "p_logout") {
    session_destroy();
    echo $logout;
    return;
}

// provjera login-a
if (!isset($_SESSION['ID']) && !in_array($in_obj->procedura, ["p_login", "p_zupanije"])) {
    echo $login_err;
    return;
}

// refresh session podataka
if (isset($_SESSION['ID']) && $in_obj->procedura == "p_refresh") {
    echo json_encode($_SESSION);
    return;
}

// sandbox metode bez baze
switch ($in_obj->procedura) {
    case "p_login":
        $users = json_decode(file_get_contents("users.json"), true);

        foreach ($users as $user) {
            if ($user['username'] == $in_obj->username && $user['password'] == $in_obj->password) {
                $_SESSION['ID'] = $user['id'];
                echo "Login successful";
                return;
            }
        }
        echo $login_err;
        return;

    case "p_users":
        if (!isset($_SESSION['ID'])) {
            echo "Morate se prijaviti da biste koristili ovu proceduru!";
            return;
        }
        echo file_get_contents("users.json");
        return;

    case "p_user_by_id":
        $users = json_decode(file_get_contents("users.json"), true);
        $input = $in_obj->id;

        foreach ($users as $user) {
            if ($user['id'] == $input) {
                echo json_encode($user);
                return;
            }
        }
        echo $login_err;
        return;

    case "p_zupanije":
        echo file_get_contents("zupanije.json");
        return;
        
    default:
        echo $procedure_err;
        return;
}
?>
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
$logout  = '{"h_message":"Successfully logged out","h_errcode":0}';

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
                $_SESSION['ime'] = $user['ime'];
                $_SESSION['prezime'] = $user['prezime'];
                echo '{"h_message":"Login successful","h_errcode":0}';
                return;
            }
        }
        echo '{"h_message":"Login unsuccessful","h_errcode":999}';
        return;    

    case "p_users":
        if (!isset($_SESSION['ID']) && !in_array($in_obj->procedura, ["p_login", "p_zupanije"])) {
            echo '{"h_message":"Please login","h_errcode":999}';
            return;
        }        

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

    case "p_refresh":
        if (isset($_SESSION['ID']) && $in_obj->procedura == "p_refresh") {
            echo json_encode($_SESSION);
            return;
        }    

    case "p_zupanije":
        echo file_get_contents("zupanije.json");
        return;

    case "p_logout":
        if ($in_obj->procedura == "p_logout") {
            session_destroy();
            echo '{"h_message":"Successfully logged out","h_errcode":0}';
            return;
        }

    case "p_add_user":
        $users = [];

        $users = json_decode(file_get_contents("users.json"), true);
        if (!is_array($users)) {
            $users = [];
        }

        $max_id = 0;
        foreach ($users as $user) {
            if (isset($user['id']) && $user['id'] > $max_id) {
                $max_id = $user['id'];
            }
        }

        $new_user = [
            "id" => $max_id + 1,
            "username" => $in_obj->username,
            "password" => $in_obj->password,
            "ime" => $in_obj->ime,
            "prezime" => $in_obj->prezime
        ];
           
        $users[] = $new_user;

        file_put_contents("users.json", json_encode($users));
        echo '{"h_message":"User added","h_errcode":0}';
        return;

    case "p_update_user":
        $users = [];

        $users = json_decode(file_get_contents("users.json"), true);
        if (!is_array($users)) {
            $users = [];
        }

        $found = false;
        foreach ($users as &$user) {
            if ($user['id'] == $in_obj->id) {
                if (isset($in_obj->ime)) $user['ime'] = $in_obj->ime;
                if (isset($in_obj->prezime)) $user['prezime'] = $in_obj->prezime;
                $found = true;
                break;
            }
        }

        if ($found) {
            file_put_contents("users.json", json_encode($users));
            echo '{"h_message":"User updated","h_errcode":0}';
        } else {
            echo '{"h_message":"User not found","h_errcode":994}';
        }
        return;

        case "p_delete_user":
            $users = [];

            $users = json_decode(file_get_contents("users.json"), true);
            if (!is_array($users)) {
                $users = [];
            }
        
            $found = false;
            foreach ($users as $key => $user) {
                if ($user['id'] == $in_obj->id) {
                    unset($users[$key]);
                    $found = true;
                    break;
                }
            }

            if ($found) {
                $users = array_values($users); //nije potrebno
                file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                echo '{"h_message":"User deleted","h_errcode":0}';
            } else {
                echo '{"h_message":"User not found","h_errcode":993}';
            }
            return;

    default:
        echo '{"h_message":"method error","h_errcode":997}';
        return;
}
?>
<?php
session_start();
if(!isset($_SESSION['id_user'])){
    require "../connection.php";
}
else{
    require "./connection.php";
}
require "Connect.php";



class User extends Connect {
    protected $name;
    protected $email;
    protected $login;
    protected $password;
    protected $role;
    protected $phone;


    private $error_valid = false;
    private $error_valid_text = [];

    public function signup($name, $email, $password, $phone, $login){
        $this->validate($name, $email, $password, $phone, $login);
        if(!$this->error_valid){
            return mysqli_query($this->connection, "INSERT INTO users (name, email, login, password, phone, role) VALUES ('$name', '$email', '$login', '$password', '$phone', 'user')");
        }
        else{
            return [
                "error_valid"=> $this->error_valid,
                "error_valid_text"=>$this->error_valid_text
            ];
        }
    }

// AUTH
    public function signin($login, $password){
        $this->validate_signin($login, $password);
        if(!$this->error_valid){
            $user = mysqli_fetch_assoc(mysqli_query($this->connection, "SELECT * FROM users WHERE login='$login'"));
            if($user){
                if($password == $user['password']){
                    return [
                        "id_user" => $user['id_user'],
                        "role" => $user['role'],
                        "name" => $user['name']
                    ];
                }
                if($password != $user['password']){

                }
                return [
                    "error_valid" => true,
                    "error_valid_text" => ['password' => 'Неверный пароль']
                ];
            }
            return [
                "error_valid" => true,
                "error_valid_text" => ['login'=>'Такой пользователь не найден!']
            ];
            // return $user;
        }
        return [
            "error_valid"=>$this->error_valid, 
            "error_valid_text"=>$this->error_valid_text

        ];
    }


    private function validate($name, $email, $password, $phone, $login){
        $this->checkEmpty($name, 'name', 'Введите ФИО');
        $this->checkEmpty($email, 'email', 'Введите email');
        $this->checkEmpty($password, 'password', 'Введите пароль');
        $this->checkEmpty($phone, 'phone', 'Введите телефон');
        $this->checkEmpty($login, 'login', 'Введите логин');
        
        if (!empty($phone) && strlen($phone) != 11) {
            $this->error_valid = true;
            $this->error_valid_text["phone"] = 'Введите корректный телефон';
        }
    }
// AUTH
    private function validate_signin($login, $password){
        $this->checkEmpty($login, 'login', 'Введите логин');
        $this->checkEmpty($password, 'password', 'Введите пароль');
    }


    private function checkEmpty($value, $field, $message) {
        if (empty($value)) {
            $this->error_valid = true;
            $this->error_valid_text[$field] = $message;
        }
    }
}





        // $stmt = $this->connection->prepare("INSERT INTO users (name, email, login, password, role, phone) VALUES (?, ?, ?, ?, 'user', ?)");
        // $stmt->bind_param("sssss", $name, $email, $login, $password, $phone);
        // return $stmt->execute();
?>





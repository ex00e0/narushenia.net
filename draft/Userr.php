<?php

require_once "/database/Connect.php";
class User extends Connect{
    protected $name;
    protected $email;
    protected $login;
    protected $password;
    protected $role;
    protected $phone;

    private $error_valid = false;
    private $error_valid_text = [];

    public function signup ($name, $email, $password, $phone, $login){

        $this->validate($name, $email, $password, $phone, $login);

        if(!$this->error_valid){
            return mysqli_query($this->connection, "INSERT INTO users(anme, email, login, password, phone )VALUES($name, $email, $password, $phone, $login)");
        }
        else{
            return ["error_valid"=>$this->error_valid,"error_valid_text"=>$this->error_valid_text];
        }

        private function validate ($name, $email, $password, $phone, $login){

            if(empty($name)){
                $this->error_valid = true;
                // $this->error_valid_text['name'] = "";
                $this->checkEmpty($name , 'name' , 'Введите ФИО');
            }
            if(empty($email)){
                $this->error_valid = true;
                // $this->error_valid_text['email'] = "";
                $this->checkEmpty($email , 'email' , 'Введите Email');
            }
            if(empty($password)){
                $this->error_valid = true;
                // $this->error_valid_text['password'] = "";
                $this->checkEmpty($password , 'password' , 'Введите пароль');
            }
            if(empty($phone)){
                $this->error_valid = true;
                // $this->error_valid_text['phone'] = "";
                $this->checkEmpty($phone , 'phone' , 'Введите номер телефона');
            }
            // else if(count($phone) != 11){
            //     $this->error_valid = true;
            //     $this->error_valid_text['phone'] = "Введите корректный номер телефона";
            //     $this->checkEmpty($ , '' , '');
            // }
            
            if(empty($login)){
                $this->error_valid = true;
                // $this->error_valid_text['login'] = "";
                $this->checkEmpty($login , 'login' , 'Введите логин');
            }

            if(!empty($phone) && strlen($phone) !=11){
                $this->error_valid = true;
                $this->error_valid_text['phone'] = 'Введите корректный номер телефона!';
            }
            
        }
            
        private function checkE


            // if(empty($name) ||  empty($email)  || empty($password)  || empty($phone)  || empty()$login)
            //     // if(){

            //     // }
            // }


        // $this->$name=$name ;
        // $this->$email=$email ;
        // $this->$password=$password ;
        // $this->$phone=$phone ;
        // $this->$login=$login ;
    }
}

?>
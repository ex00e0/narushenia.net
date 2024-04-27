<?php
session_start();
require_once "Connect.php";


class Application extends Connect {

    private $error_valid = false;
    private $error_valid_text = [];
    public function create($car_number, $description){
        $this->validate($car_number, $description);
        if(!$this->error_valid){
            $id = $_SESSION['id_user'];
            $query = "INSERT INTO applications (car_number, description, user_id) VALUES ('$car_number','$description',$id)";
            echo $query;
            $result =  mysqli_query($this->connection, $query);
            return $result;
        }
        return[
            "error_valid" => $this->error_valid, 
            "error_valid_text" => $this->error_valid_text
        ];
    }

    private function validate($car_number, $description){
        $this->checkEmpty($car_number, 'car_number', 'Введите гос. номер авто');
        $this->checkEmpty($description, 'description', 'Введите описание нарушения');
    }


    private function checkEmpty($value, $field, $message) {
        if (empty($value)) {
            $this->error_valid = true;
            $this->error_valid_text[$field] = $message;
        }
    }
    public function get_applications_user(){
        $query = "SELECT * FROM applications WHERE user_id = ".$_SESSION['id_user'];
        $appls = mysqli_fetch_all(mysqli_query($this->connection, $query));
        return $appls;
    }
}
?>
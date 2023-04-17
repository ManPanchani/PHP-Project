<?php

     class Config {

          public $HOST = "127.0.0.1";
          public $USERNAME = "root";
          public $PASSWORD = "";
          public $DB_NAME = "php_project";
          public $TRAIN_BOOKING_TABLE = "train_booking_system";
          public $PASSENGER_TABLE = "passenger";
          public $conn;


          public function connect() {
               $this->conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
          }

          public function insert($train_name, $train_code) {
               $this->connect();

               $query = "INSERT INTO $this->TRAIN_BOOKING_TABLE(train_name, train_code) VALUES('$train_name', $train_code);"; 

               $res = mysqli_query($this->conn, $query); //bool

               return $res;
          }

          public function fatchAllRecords() {
               $this->connect();

               $query = "SELECT * FROM $this->TRAIN_BOOKING_TABLE;"; 

               $res = mysqli_query($this->conn, $query); //mysqli_resulet object
          
               $records = [];

               while($record = mysqli_fetch_assoc($res)){
                         array_push($records, $record);
               }

               return $records;
          }

          public function fatchSingleRecords($id) {
               $this->connect();

               $query = "SELECT * FROM $this->TRAIN_BOOKING_TABLE WHERE id=$id;"; 

               $res = mysqli_query($this->conn, $query); 

               $record = mysqli_fetch_assoc($res);

               if($record != null){
                         return true;
               } else {
                         return false;
               }
          }

          public function delete($id) {
               $this->connect();

               $isRecordAvailable = $this->fetchSingleRecord($id);

               if($isRecordAvailable){
                         $query = "DELETE FROM $this->TRAIN_BOOKING_TABLE WHERE id=$id;";

                         $res = mysqli_query($this->conn, $query);

                         return true;
               } else {
                         return false;
               }
          }

          public function update($id, $train_name, $train_code){
               $this->connect();

               $query = "UPDATE $this->TRAIN_BOOKING_TABLE SET train_name='$train_name', train_code=$train_code  WHERE id=$id;";

               echo("==================");
               echo("<br>");
               print_r($query);
               echo("<br>");
               echo("==================");    

               $res = mysqli_query($this->conn, $query);

               return $res;
          }

          // public function signUp($email, $password) {
          //      $this->connect();

          //      $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

          //      $query = "INSERT INTO $this->PASSENGER_TABLE(email, password) VALUES('$email', '$encrypted_password');";

          //      $res = mysqli_query($this->conn, $query);

          //      return $res;
          // }

          // public function signIn($email, $password) {
          //      $this->connect();

          //      $fetched_user != null = $this->fetchUser($username);

          //      if($fetched_user != null) {
          //                $encrypted_password = $fetched_user['password'];

          //                $isPasswordverified = password_verify($password, $encrypted_password);

          //                if($isPasswordverified){
          //                          $query = "SELECT * FROM $this->PASSENGER_TABLE WHERE email='$email';";

          //                               $res = mysqli_query($this->conn, $query);

          //                          $recode = mysqli_fetch_assoc($res);

          //                          if($recode != null){
          //                               return true;
          //                          } else {
          //                               return false;
          //                          }
          //                } else {
          //                          return false;
          //                     }    
          //      } else {
          //           return false;
          //      }
          // } 
      }

?>
<?php
class Usermodel extends DB
{
  protected $resultCheck = false;
  public function addUser($user,$pass,$email,$phone,$address)
  {
    $query = "INSERT INTO user (username , pass , email ,  phone ,  addressuser ) VALUES ('".$user."','".$pass."','".$email."','".$phone."','".$address."')";
    if (mysqli_query($this->conection, $query)) {
      $this->resultCheck = true;
    } 
    return $this->resultCheck;
  }
  public function checkUser($user,$pass){
    $query = "SELECT username,pass FROM  user";
    $result = mysqli_query($this->conection, $query);
    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        if(password_verify($pass, $row['pass']) && $user == $row['username']) {
          $this->resultCheck = true;
        }
      }	
    }
    return $this->resultCheck;
  }
  public function getUser($user){
    $query = "SELECT username FROM user WHERE username LIKE '".$user."%'";
    $result = mysqli_query($this->conection, $query);
    $array = [];
    while($row = $result->fetch_array()){
        $array[] = $row[0];
    }
    return json_encode($array);
  }
  public function checkPassword($user,$password)
  {
    $query         = "SELECT pass FROM user WHERE username='".$user."'";
    $pass_check    = $this->queryDatabaseAssoc($query);
    if(password_verify($password, $pass_check['pass'])){
      $this->resultCheck = true;
    }
    return $this->resultCheck ;
  }
  public function updateUser($user,$phonenumber,$email,$address,$new_password="")
  {
    $query   = "UPDATE user SET phone=".$phonenumber.",email='".$email."',addressuser='".$address."' WHERE username='".$user."'";
    if( $new_password != ""){
      $query   = "UPDATE user SET phone=".$phonenumber.",email='".$email."',addressuser='".$address."',pass='".$new_password."' WHERE username='".$user."'";
    }
    if(mysqli_query($this->conection, $query)){
      $this->resultCheck = true;
    }
    return $this->resultCheck;
  }
  public function getInforByUser($user)
  {
    $query        = "SELECT email,phone,addressuser FROM user WHERE username='".$user."'";
    return $this->queryDatabaseAssoc($query);
  }
}
?>
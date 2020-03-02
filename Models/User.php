<?php
class User extends Model{

    public function createUser($email, $name,  $password){


        $sql = "INSERT INTO users (email, name, pass_hash) VALUES (:email, :name, :password)";

        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([
            'email' => $email,
            'name' => $name,
            'password' => $password
        ]);
        if($result) return $result;
        print($req->errorInfo()[2]);

    }


    public function checkEmailExist($email){
        $sql = "SELECT email FROM users WHERE email = :email ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(['email'=>$email]);

        return $req->rowCount() != 0;
    }

    public function getUserPassword($email){
        $sql = "SELECT id, pass_hash
                FROM users 
                WHERE email = :email ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(['email' => $email]);
        if($result){
            $data = $req->fetch();
            return array('pass' => $data['pass_hash'], 'id' => $data['id']);
        }
        print($req->errorInfo()[2]);
    }

}
?>
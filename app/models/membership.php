<?php 
namespace models;

use Illuminate\Database\Capsule\Manager as DB;
use models\DB\User as User;
class Membership {
    public $login;
    public $AuthToken;

    //Constructor y comprobador
    public function __construct()
    {
        //Booleano que comprueba si hay una sesión activa al llamar al constructor
        $this->login = $this->checkCurrentLogin();
        
        //Autenticador para identificación de la sesión
        $this->AuthToken = rand(1000000, 9999999);
        
    }

    //Función que comprueba en la sesión si hay o no un usuario logeado, con booleano

    public function checkCurrentLogin()
    {
        
        if(isset($_SESSION["Membership"]["UserID"]) && isset($_SESSION["Membership"]["AuthToken"])){
            $user = (new User)->find($_SESSION["Membership"]["UserID"]);
            if (!$user) return false;
            else {
                if ($user->auth_token == $_SESSION["Membership"]["AuthToken"]) return true;
            }
        }
        return false;
    }


    public function validateLogin($email, $password)
    {
        
        //Devuelve el primer resultado de la bdd
        $user = (new User)->where('email', '=', $email)->first();
    
        if(!$user) return false;
        else{
            //password check
            if (password_verify($password, $user->password))
            {
               
                $_SESSION["Membership"]["UserID"] = $user->id;
                $_SESSION["Membership"]["Email"] = $user->email;
                $_SESSION["Membership"]["Name"] = $user->name;
                $_SESSION["Membership"]["Surname"] = $user->surname;
                $_SESSION["Membership"]["Rol"] = $user->rol;
                $_SESSION["Membership"]["AuthToken"] = $this->AuthToken;
                $user ->auth_token = $this->AuthToken;
                $user->save();

                return true;
            }
            
        }
        return false;
    }

    public function getUser(){
        return (new User)->find($_SESSION["Membership"]["UserID"]);
    }
   

}

?>
<?php
namespace controllers;

use Flight;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager as Capsule;
use controllers\BasicController as BasicController;
use models\DB\User as User;
use models\membership;


class MembershipController extends BasicController
{

	/*
	logout
	*/
	public function logout(){
		//$_SESSION["Membership"]["UserID"]=null;
		session_destroy();
		return Flight::redirect('/');  
	}
	/*
	logIn
	*/
	public function funUserLogin()
	{
		$Vemail = isset($_POST["email2"]) ? $_POST["email2"] : null;
		$Vpassword = isset($_POST["pass2"]) ? $_POST["pass2"] : null;

		//we check if user != null otherwise will return an error message on a  view
		if ($Vemail == null || $Vpassword == null)  
		return $this->invalid('/error', [               //$$$$$ posiblmnt enviar a vista error
			'error'=>'Credenciales no válidas.', 
			'email'=>$Vemail
		]);	
        //if there's not empty fields, we create an user type object...
		$obj = new membership; //esta clase no esta en la bd
		
		$validate = $obj-> validateLogin($Vemail, $Vpassword);
		//var_dump($validate);
		//exit();
		if ($validate == true) {

           return Flight::redirect('/userProfile');  // CHECKKK
		}else {

			//return Flight::redirect('/?error=Credenciales no válidas.'); 
			// Almacenar el mensaje de error en una variable de sesión
			$_SESSION['login_error'] = 'Credenciales no válidas.';
			return Flight::redirect('/');
    	}
}
	

	private function invalid($template, $data = null)
    {
        return parent::blade($template, $data);
    }

	public function changePassword(){
		$userId = $_SESSION["Membership"]["UserID"];
		$userEmail = $_SESSION["Membership"]["Email"];

		$VoldPass = isset($_POST["oldPass"]) && ($_POST["oldPass"]) ? $_POST["oldPass"] : null;
        //$VnewPass = $_POST["newPass"] ? $_POST["newPass"] : null;
		$VnewPass2 = isset($_POST["newPass2"]) && $_POST["newPass2"] ? $_POST["newPass2"] : null;
	

		//$VoldPassEncripted = password_hash($VoldPass, PASSWORD_BCRYPT);

		//if($VoldPassEncripted==)

		$user = (new User)->where('email', '=', $userEmail)->first();
    
        if(!$user) return false;
        else{
            //password check
            if (password_verify($VoldPass, $user->password)){
				//update 

				$newPass3 = password_hash($VnewPass2, PASSWORD_BCRYPT);//pass encrypted

				DB::table("users")->where("id",$userId)->update(
					array(
					'password'=> $newPass3,
				
				));

				//echo "pass";
				//exit();
				Flight::redirect('/userProfile');


			}

		}	
		return false;

	}


}

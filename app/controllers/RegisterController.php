<?php 
namespace controllers;

use Flight; 

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager as Capsule;
use controllers\BasicController as BasicController; 
use models\DB\User as User;
use models\DB\Artist as Artist;
use models\DB\File as File;
use models\DB\Company as Company;
use models\DB\Event as Event;
use models\DB\Comment as Comment;
use models\DB\Trip as Trip;
use models\membership;


class RegisterController extends BasicController {
	
	public function funUserRegister(){
		//getting datas from form
        $VEmail = isset($_POST["email"]) && ($_POST["email"]) ? $_POST["email"] : null;
        $Name = isset($_POST["name"]) && ($_POST["name"]) ? $_POST["name"] : null;
        $LastName = isset($_POST["lastname"]) && ($_POST["lastname"]) ? $_POST["lastname"] : null;
        $Password = isset($_POST["pass"]) && ($_POST["pass"]) ? $_POST["pass"] : null;


        $getEmail = User::where("email", $VEmail)->get();//select form user where email='$VEmail'
        //var_dump($getEmail);
        //exit;
		if (count($getEmail) > 0) {
			return Flight::redirect('/error?var=Ya hay un usuario con este email');
		}

        if ($VEmail == null || $VEmail == "") {
			//return Flight::redirect('/error?var=email no valido');
		}
        if ($Name == null || $Name == "") {
			//return Flight::redirect('/error?var=nombre no valido');
		}
        if ($LastName == null || $LastName == "") {
			//return Flight::redirect('/error?var=apellido no valido');
		}
        if ($Password == null || $Password == "") {
			//return Flight::redirect('/error?var=contraseña no valido');
		}


        $pass = password_hash($Password, PASSWORD_BCRYPT);
        
        $User = new User();
        //className->namedb=var
	    $User->email = $VEmail;
        $User->name = $Name;
        $User->surname = $LastName;
        $User->password = $pass;
			
		$User->save();



        ////////////// login //////////////
        $obj = new membership; 
		
		$validate = $obj-> validateLogin($VEmail, $Password);
	
		if ($validate == true) {
           return Flight::redirect('/userProfile'); 
		}else {
			return Flight::redirect('/error'); 
    	}

	}
    
    public function funRegisterArtist(){
        //var_dump($_FILES['profilPicture']);
        //exit();
        if($_FILES["profilPicture"]["size"]==0){//si no hay imagen
            echo 'error no hay imagen';
        }else{
            
            
        $VartistName = isset($_POST["artistName"]) && ($_POST["artistName"]) ? $_POST["artistName"] : null;
        $VartistDescription = isset($_POST["artistDescription"]) && ($_POST["artistDescription"]) ? $_POST["artistDescription"] : null;

        if ($VartistName == null || $VartistName == "") {
			//return Flight::redirect('/error?var=email no valido');
		}
        if ($VartistDescription == null || $VartistDescription == "") {
			//return Flight::redirect('/error?var=email no valido');
		}

        $Artist = new Artist();
        $Artist->artistName = $VartistName;
        $Artist->artistDescription = $VartistDescription;

        $Artist->save();
        //Flight::redirect('/adminProfile');

        
        if($_FILES["profilPicture"]["size"]==0){
            echo 'No file selected';
        }else{

            if($_FILES["profilPicture"]["error"]==UPLOAD_ERR_OK){
                $folder=APP_DOCUMENT_PATH;

                $generateString = uniqid();
                $newString = "someimage-".$generateString;

                $doReplace = str_replace("image/", "",$_FILES['profilPicture']['type']);

                if(!empty($_FILES)){
                    $temporalFile = $_FILES["profilPicture"]["tmp_name"];

                    $location = $folder .$newString . "." . $doReplace;
					 
					move_uploaded_file($temporalFile, $location);

                    $File = new File();
                    $File->name = $newString;
                    $File->route = "media/".$newString.".".$doReplace;
                    $File->fileType = $doReplace;
                    $File->size = $_FILES["profilPicture"]["size"];

                    $File->save();
                    $imgId = $File->id;

                    DB::table("artists")->where("id",$Artist->id)->update(
                        array(
                        'img'=> $imgId,
                    
                    ));

                   
                    Flight::redirect('/adminProfile');
                }


            }
        }  
          
        }
    }

    public function funRegisterCompany(){
        $VcompanyName = isset($_POST["companyName"]) && ($_POST["companyName"]) ? $_POST["companyName"] : null;
        $Vcif = isset($_POST["cif"]) && ($_POST["cif"]) ? $_POST["cif"] : null;
        $Vaddress = isset($_POST["address"]) && ($_POST["address"]) ? $_POST["address"] : null;
        $VpostalCode = isset($_POST["postalCode"]) && ($_POST["postalCode"]) ? $_POST["postalCode"] : null;

        $Company = new Company();
        //className->namedb=var
	    $Company->nameCompany = $VcompanyName;
        $Company->cif = $Vcif;
        $Company->address = $Vaddress;
        $Company->postalCode = $VpostalCode;
			
		$Company->save();
        Flight::redirect('/adminProfile');
    }
   
    //function register event
    public function funRegisterEvent(){
        $VeventName = isset($_POST["eventName"]) && ($_POST["eventName"]) ? $_POST["eventName"] : null;
        $VidArtist = isset($_POST["idArtist"]) && ($_POST["idArtist"]) ? $_POST["idArtist"] : null;
        $Vlocation = isset($_POST["location"]) && ($_POST["location"]) ? $_POST["location"] : null;
        $Vaddress = isset($_POST["address"]) && ($_POST["address"]) ? $_POST["address"] : null;
        $VeventDescription = isset($_POST["eventDescription"]) && ($_POST["eventDescription"]) ? $_POST["eventDescription"] : null;
        $VprovId = isset($_POST["provId"]) && ($_POST["provId"]) ? $_POST["provId"] : null;
        $Vtownship = isset($_POST["township"]) && ($_POST["township"]) ? $_POST["township"] : null;
        $VpostalCode = isset($_POST["postalCode"]) && ($_POST["postalCode"]) ? $_POST["postalCode"] : null;
        $VticketsLink = isset($_POST["ticketsLink"]) && ($_POST["ticketsLink"]) ? $_POST["ticketsLink"] : null;
        $VdateEvent = isset($_POST["dateEvent"]) && ($_POST["dateEvent"]) ? $_POST["dateEvent"] : null;
        $VtimeStart = isset($_POST["timeStart"]) && ($_POST["timeStart"]) ? $_POST["timeStart"] : null;
        $VcompanyId = isset($_POST["companyId"]) && ($_POST["companyId"]) ? $_POST["companyId"] : null;

        $Event = new Event();
        //className->namedb=var
	    $Event->eventName = $VeventName;
        $Event->artistId = $VidArtist;
        $Event->location = $Vlocation;
        $Event->address = $Vaddress;
        $Event->eventDescription = $VeventDescription;
        $Event->provinceId = $VprovId;
        $Event->township = $Vtownship;
        $Event->postalCode = $VpostalCode;
        $Event->ticketsLink = $VticketsLink;
        $Event->date = $VdateEvent;
        $Event->timeStart = $VtimeStart;
        $Event->companyId = $VcompanyId;
			
		$Event->save();
        Flight::redirect('/adminProfile');
    }

    // fun post comment
    public function postComment(){
        $VidEvent = isset($_POST["idEvent"]) && ($_POST["idEvent"]) ? $_POST["idEvent"] : null;
        $VidUser = isset($_POST["idUser"]) && ($_POST["idUser"]) ? $_POST["idUser"] : null;
        $Vcomment = isset($_POST["comment"]) && ($_POST["comment"]) ? $_POST["comment"] : null;

        $Comment = new Comment();
        //className->namedb=var
	    $Comment->eventId = $VidEvent;
        $Comment->userId = $VidUser;
        $Comment->comment = $Vcomment;

        $Comment->save();
        Flight::redirect('/eventDetails/'.$VidEvent);
    }

    public function regTrip(){
        $VeventId = isset($_POST["eventId"]) && ($_POST["eventId"]) ? $_POST["eventId"] : null;
        $VuserId = isset($_POST["userId"]) && ($_POST["userId"]) ? $_POST["userId"] : null;
        $VpickUpLocation = isset($_POST["pickUpLocation"]) && ($_POST["pickUpLocation"]) ? $_POST["pickUpLocation"] : null;
        $VeventDestination = isset($_POST["eventDestination"]) && ($_POST["eventDestination"]) ? $_POST["eventDestination"] : null;
        $VuserDestination = isset($_POST["userDestination"]) && ($_POST["userDestination"]) ? $_POST["userDestination"] : null;
        $VnPlazas = isset($_POST["nPlazas"]) && ($_POST["nPlazas"]) ? $_POST["nPlazas"] : null;
        $Vprice = isset($_POST["price"]) && ($_POST["price"]) ? $_POST["price"] : null;
        $Vlink = isset($_POST["link"]) && ($_POST["link"]) ? $_POST["link"] : null;
        $noActive = "no active";

        $Trip = new Trip();
        $Trip->eventId = $VeventId;
        $Trip->userId = $VuserId;
        $Trip->pickUpLocation = $VpickUpLocation;
        $Trip->eventDestination = $VeventDestination;
        $Trip->destination = $VuserDestination;
        $Trip->nPlazas = $VnPlazas;
        $Trip->price = $Vprice;
        $Trip->link = $Vlink;
        $Trip->status = $noActive;

        $Trip->save();
        Flight::redirect('/');
    }

	}
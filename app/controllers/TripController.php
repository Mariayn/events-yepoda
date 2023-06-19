<?php 
namespace controllers;

use Flight; 

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager as Capsule;
use controllers\BasicController as BasicController; 
use models\DB\Trip as Trip;


class TripController extends BasicController {

	
	public function funPostTrip(){
		//getting datas from form
        $VpickUpLocation = isset($_POST["pickUpLocation"]) && ($_POST["pickUpLocation"]) ? $_POST["pickUpLocation"] : null;
        $Vdestination = isset($_POST["destination"]) && ($_POST["destination"]) ? $_POST["destination"] : null;
        $Vprice = isset($_POST["price"]) && ($_POST["price"]) ? $_POST["price"] : null;
        $Vlink = isset($_POST["link"]) && ($_POST["link"]) ? $_POST["link"] : null;
        //campo escondido userId


        //$getEventId = Trip::where("eventId", $VidEvent)->get();//select form user where email='$VEmail'
        //var_dump($getEmail);
        //exit;
		//if (count($getEventId) = 1) {
		//	return Flight::redirect('/error?var=Ya hay un usuario con este email');
		//}

        if ($VpickUpLocation == null || $VpickUpLocation == "") {
			//return Flight::redirect('/error?var=email no valido');
		}
        if ($Vdestination == null || $Vdestination == "") {
			//return Flight::redirect('/error?var=email no valido');
		}
        if ($Vprice == null || $Vprice == "") {
			//return Flight::redirect('/error?var=email no valido');
		}

        //regex email...


        
        $Trip = new Trip();
        //className->namedb=var
        //$Trip->eventId = $VidEvent;
        //$Trip->userId = $VuserId;
	    $Trip->pickUpLocation = $VpickUpLocation;
        $Trip->destination = $Vdestination;
        $Trip->price = $Vprice;
        $Trip->link = $Vlink;
			
		$Trip->save();

	}

   


	}
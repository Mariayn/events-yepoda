<?php 
namespace controllers;

use Flight; 

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager as Capsule;
use models\DB\Artist as Artist;
use controllers\BasicController as BasicController; 
use models\DB\File as File;
use models\DB\User as User;
use models\DB\Calendar as Calendar;
use models\DB\Event as Event;

class ActionsController extends BasicController {

	public function deleteArtist($id){
        $deleteArtist = DB::table("artists")->where("id", $id)->delete();

        if ($deleteArtist != 1) {
			return Flight::redirect('/error');
		}else{
			return Flight::redirect('/adminProfile');
		}
    }

    public function editArtist($id){//we get info about that artist
        $infoArtist= DB::select("SELECT artists.id, artistName, artistDescription, files.route AS ruta
        FROM artists LEFT JOIN files ON artists.img = files.id
        WHERE artists.id = '".$id."'");
        //var_dump($infoArtist);
        //exit();
		parent::blade('viewInfoArtist', compact("infoArtist"));
    }

    public function funUpdateArtist(){

        if($_FILES["profilPicture"]["size"]==0){//si no hay imagen
            echo 'error no hay imagen';
        }else{
            
            
            $VartistName = isset($_POST["artistName"]) && ($_POST["artistName"]) ? $_POST["artistName"] : null;
            $VartistDescription = isset($_POST["artistDescription"]) && ($_POST["artistDescription"]) ? $_POST["artistDescription"] : null;
            $artistId = $_POST["artistId"] ? $_POST["artistId"] : null;

            DB::table("artists")->where("id",$artistId)->update(
                array(
                    'artistName'=>$VartistName,
                    'artistDescription'=>$VartistDescription,
                )
            );

        
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

                        DB::table("artists")->where("id",$artistId)->update(
                            array(
                            'img'=> $imgId,
                        
                        ));

                        //parent::blade('adminProfile', compact("Provincias", 'LatLonProv'));
                        Flight::redirect('/adminProfile');
                    }
                }    

            }
        }  

    }
    

    public function deleteUser($id){
        $deleteUser = DB::table("users")->where("id", $id)->delete();

        if ($deleteUser != 1) {
			return Flight::redirect('/error');
		}else{
			return Flight::redirect('/adminProfile');
		}
    }

    public function getInfoCompany($id){
        $infoCompany= DB::select("SELECT * FROM companies WHERE id = '".$id."'");
		parent::blade('viewInfoCompany', compact("infoCompany"));
    }

    //edit company
    public function funEditCompany(){
            
            $VcompanyName = isset($_POST["companyName"]) && ($_POST["companyName"]) ? $_POST["companyName"] : null;
            $Vcif = isset($_POST["cif"]) && ($_POST["cif"]) ? $_POST["cif"] : null;
            $Vaddress = $_POST["address"] ? $_POST["address"] : null;
            $VpostalCode = $_POST["postalCode"] ? $_POST["postalCode"] : null;
            $Vid = $_POST["idComp"] ? $_POST["idComp"] : null;

            DB::table("companies")->where("id",$Vid)->update(
                array(
                    'nameCompany'=>$VcompanyName,
                    'cif'=>$Vcif,
                    'address'=>$Vaddress,
                    'postalCode'=>$VpostalCode,
                )
            );

        
            Flight::redirect('/adminProfile');
    }        
    
    public function deleteCompany($id){
        $delete = DB::table("companies")->where("id", $id)->delete();

        if ($delete != 1) {
			return Flight::redirect('/error');
		}else{
			return Flight::redirect('/adminProfile');
		}
    }

    public function deleteEvent($id){
        $deleteEv = DB::table("events")->where("id", $id)->delete();

        if ($deleteEv != 1) {
			return Flight::redirect('/error');
		}else{
			return Flight::redirect('/adminProfile');
		}
    }

    public function getInfoEvent($id){
        $infoEvent= DB::select("
        SELECT 
        events.*,countries.id AS countryId, companies.id AS compId
        FROM 
        events, countries, provinces, companies
        WHERE events.id='".$id."'
        AND
        provinces.id=provinceId AND provinces.countryId=countries.id
        AND events.companyId=companies.id
        ");
        
        //var_dump($infoEvent);
        //exit();
        $artistList=DB::select("SELECT * FROM artists");
        $countryList=DB::select("SELECT * FROM countries");
        $provinceList=DB::select("SELECT * FROM provinces WHERE provinces.countryId='".$infoEvent[0]['countryId']."'");
        $companyList=DB::select("SELECT * FROM companies");
		parent::blade('viewInfoEvent', compact("infoEvent","artistList","countryList","provinceList","companyList"));
    }

    //funEditEvent
    public function funEditEvent(){
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
        $Vid = $_POST["eventId"] ? $_POST["eventId"] : null;

        DB::table("events")->where("id",$Vid)->update(
            array(
                'eventName'=>$VeventName,
                'artistId'=>$VidArtist,
                'location'=>$Vlocation,
                'address'=>$Vaddress,
                'eventDescription'=>$VeventDescription,
                'provinceId'=>$VprovId,
                'township'=>$Vtownship,
                'postalCode'=>$VpostalCode,
                'ticketsLink'=>$VticketsLink,
                'date'=>$VdateEvent,
                'timeStart'=>$VtimeStart,
                'companyId'=>$VcompanyId,
            )
        );

    
        Flight::redirect('/adminProfile');
    }   

    //function that updates state to active
    public function approveTrip($id){
        DB::table("trips")->where('id',$id)->update(
            array(
                'status'=>'active',
            )
            );

            Flight::redirect('/adminProfile');
    }

    public function denegateTrip($id){
        $deleteEv = DB::table("trips")->where("id", $id)->delete();

        if ($deleteEv != 1) {
			return Flight::redirect('/error');
		}else{
			return Flight::redirect('/adminProfile');
		}
    
    }
    
    public function seeTripDetails($id) {
        $infoTrip= DB::select("
        SELECT
        trips.id,
        pickUpLocation,
        eventDestination,
        destination,
        nPlazas,
        price,
        link,
        events.eventName,
        users.name,
        users.email
        FROM trips, events, users
        WHERE trips.eventId=events.id AND trips.userId=users.id AND trips.id='".$id."'
        ");
        
        //var_dump($infoTrip);
        //exit();
  
		parent::blade('viewInfoTrip', compact("infoTrip"));
    }

    //funcion para traerme los viajes que estan activos
    public function tripView($id){
        $getActiveTrips=DB::select("
        SELECT
        trips.id,
        pickUpLocation,
        eventDestination,
        destination,
        nPlazas,
        price,
        link,
        events.eventName
        FROM trips, events, users
        WHERE trips.eventId=events.id AND trips.userId=users.id AND STATUS='active' AND userId='".$id."'
        ");

        //var_dump($getActiveTrips);
        //exit();
  
        parent::blade('myTrips', compact("getActiveTrips"));
    } 

    public function deleteUserTrip($id){
        $deleteTrip = DB::table("trips")->where("id", $id)->delete();

        if ($deleteTrip != 1) {
			return Flight::redirect('/error');
		}else{
			return Flight::redirect('/userProfile');
		}
    }

    public function outcalendar($id, $eid){
        $userid=$_SESSION["Membership"]["UserID"];
        $Delete= DB::table("calendar")->where("id",$id)->where("userId",$userid)->delete();
        return Flight::redirect("/eventDetails/$eid");
    }

    public function incalendar($id){
        $userid=$_SESSION["Membership"]["UserID"];
		$Calendar = new Calendar();
					$Calendar->userId = $userid; 
					$Calendar->eventId = $id; 
					$Calendar->save();
					
        return Flight::redirect("/eventDetails/$id");
    }

}
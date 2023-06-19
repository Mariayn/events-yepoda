<?php 
namespace controllers;

use Flight; 

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager as Capsule;
use models\DB\Artist as Artist;
use models\DB\Country as Country;
use models\DB\Company as Company;

use controllers\BasicController as BasicController; 


class PageController extends BasicController {

	
	public function index(){
        $mainEvents = DB::select(
            "SELECT 
            events.id,
            eventName,
            artists.artistName,
            location,
            events.address,
            eventDescription,
            provinces.province,
            township,
            events.postalCode,
            ticketsLink,
            events.date AS fecha,
            timeStart,
            companies.nameCompany,
            companies.id AS compId,
            countries.contryName,
            countries.id AS countryId,
            files.route
            FROM events
            JOIN artists ON events.artistId = artists.id
            JOIN provinces ON events.provinceId = provinces.id
            JOIN companies ON events.companyId = companies.id
            JOIN countries ON provinces.countryId = countries.id
            JOIN files ON artists.img = files.id WHERE CURRENT_TIMESTAMP < events.date 
            ORDER BY events.date ASC LIMIT 3;"
        );

		parent::blade('index', compact("mainEvents"));
	}

    public function notFound(){
        parent::blade('notFound');
    }

    public function register(){
        parent::blade('register');//http://localhost/mariaflightphp/register
    }

    public function pepe(){
        parent::blade('pepe');
    }

    public function userProfile(){
        $sqlTrip = DB::select(
            "SELECT * FROM trips WHERE userId = '".$_SESSION["Membership"]["UserID"]."'"
        );
		parent::blade('userProfile', compact("sqlTrip"));
	}

    //esta funcion se carga y me obtiene los datos de artistas,paises,empresas cuando accedo al menu admin.
    public function adminProfile(){
        $artistList = Artist::get();//gets all data from artist table and it saves into $artistList2
        $countryList = Country::get();
        $companyList = Company::get();
		parent::blade('adminProfile', compact("artistList","countryList","companyList"));
	}

    public function viewEvents(){

        $sqleventList= DB::select(
            "SELECT 
            events.id,
            eventName,
            artists.artistName,
            location,
            events.address,
            eventDescription,
            provinces.province,
            township,
            events.postalCode,
            ticketsLink,
            events.date AS fecha,
            timeStart,
            companies.nameCompany,
            companies.id AS compId,
            countries.contryName,
            countries.id AS countryId,
            files.route
            FROM events
            JOIN artists ON events.artistId = artists.id
            JOIN provinces ON events.provinceId = provinces.id
            JOIN companies ON events.companyId = companies.id
            JOIN countries ON provinces.countryId = countries.id
            JOIN files ON artists.img = files.id WHERE CURRENT_TIMESTAMP < events.date 
            ORDER BY events.date ASC;"
        );

        parent::blade('eventsView', compact("sqleventList"));
	}

    //this functions gets event details, trips and comments
    public function getEvent($id){
        $sqlEvent=DB::select(
            "SELECT 
            events.id,
            eventName,
            artists.artistName,
            location,
            events.address,
            eventDescription,
            provinces.province,
            township,
            events.postalCode,
            ticketsLink,
            events.date AS fecha,
            timeStart,
            countries.contryName,
            countries.id AS countryId,
            files.route
            FROM events
            JOIN artists ON events.artistId = artists.id
            JOIN provinces ON events.provinceId = provinces.id
            JOIN countries ON provinces.countryId = countries.id
            JOIN files ON artists.img = files.id
            WHERE events.id='".$id."'
            ");

            $sql2=DB::select(
                "SELECT 
                id,
                pickUpLocation,
                eventDestination
                FROM trips WHERE eventId='".$id."'"
                );

                
                $eventcalendar="";
        if (isset($_SESSION["Membership"]["UserID"])) {
            $eventcalendar=DB::select(
                "SELECT calendar.id, events.id as eventid FROM EVENTS, calendar
                WHERE EVENTS.id = calendar.eventId
                AND calendar.userId = '".$_SESSION["Membership"]["UserID"]."'
                AND calendar.eventId = '".$id."'"
                );
            }
            parent::blade('event', compact("sqlEvent","sql2","eventcalendar"));

    }

    public function createNewTrip($id){//obtiene los datos del evento y los muestra en la vista de crear viaje
        $myEvent=DB::select(
            "SELECT 
            events.id,
            events.eventName,
            address,
            township
            FROM events
            WHERE events.id='".$id."'
            ");

            parent::blade('trip', compact("myEvent"));

    }

    public function funSearcher(){
        $search = isset($_POST["search"]) && ($_POST["search"]) ? $_POST["search"] : null;

        $sqleventList=DB::select("
            SELECT 
            events.id,
            eventName,
            artists.artistName,
            location,
            events.address,
            eventDescription,
            provinces.province,
            township,
            events.postalCode,
            ticketsLink,
            events.date AS fecha,
            timeStart,
            companies.nameCompany,
            companies.id AS compId,
            countries.contryName,
            countries.id AS countryId,
            files.route
            FROM events
            JOIN artists ON events.artistId = artists.id
            JOIN provinces ON events.provinceId = provinces.id
            JOIN companies ON events.companyId = companies.id
            JOIN countries ON provinces.countryId = countries.id
            JOIN files ON artists.img = files.id WHERE  
				CURRENT_TIMESTAMP < events.date 
				AND
				(
					provinces.province like ('%". $search. "%') or 
					artists.artistName like ('%". $search. "%') or
					events.eventName like ('%". $search. "%') or
					events.location like ('%". $search. "%')
					)
            ORDER BY events.date ASC
            
            
        ");
        //var_dump($sql);
        //exit();
        parent::blade('eventsView', compact("sqleventList"));
    }

    




}
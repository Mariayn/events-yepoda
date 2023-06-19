<?php 
namespace controllers;

use Flight; 

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Capsule\Manager as Capsule;
use models\DB\Artist as Artist;
use models\DB\Comment as Comment;
use controllers\BasicController as BasicController; 


class AjaxController extends BasicController {

	public function artistCollect(){//artist list
        $Artist= DB::select("SELECT artists.id, artistName, artists.created_at, files.route AS ruta
        FROM artists LEFT JOIN files ON artists.img = files.id");
        echo json_encode($Artist);
    }

    public function searchProv(){
        $VidCountry = isset($_POST["id"]) && ($_POST["id"]) ? $_POST["id"] : null;
		$provinces= DB::select("SELECT * FROM provinces WHERE countryId = " . $VidCountry );
		echo json_encode($provinces);
    }

    public function getUsers(){//user list
        $User= DB::select("SELECT * FROM users");
        echo json_encode($User);
    }

    public function getCompanyList(){//company list
        $companies= DB::select("SELECT * FROM companies");
        echo json_encode($companies);
    }

    public function getEventList(){//event list
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
            countries.id AS countryId
            FROM events
            JOIN artists ON events.artistId = artists.id
            JOIN provinces ON events.provinceId = provinces.id
            JOIN companies ON events.companyId = companies.id
            JOIN countries ON provinces.countryId = countries.id;"
        );
        
        echo json_encode($sqleventList);
    }

    public function loadComments(){
        $id = isset($_POST["id"]) && ($_POST["id"]) ? $_POST["id"] : null;
        $commentList= DB::select("
        SELECT 
        comment,
        name,
        comments.created_at 
        FROM comments,
        users 
        WHERE comments.eventId='".$id."'AND users.id=userId ORDER BY comments.created_at desc
        ");
        echo json_encode($commentList);
    }

    public function getTrips(){
        $sql=DB::select(
            "SELECT
            trips.id,
            pickUpLocation,
            eventDestination,
            destination,
            nPlazas,
            price,
            link,
            events.eventName
            FROM trips, events
            WHERE trips.eventId=events.id"
        );

        echo json_encode($sql);
    }

    public function CalendarCollect(){
        $id=$_SESSION["Membership"]["UserID"];
		$data= DB::select("SELECT EVENTS.* FROM EVENTS, calendar
        WHERE EVENTS.id = calendar.eventId
        AND calendar.userId = '".$id."'");
        echo json_encode($data);
    }
    
}

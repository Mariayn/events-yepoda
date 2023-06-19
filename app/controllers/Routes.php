<?php 
namespace controllers;

use Flight; 

use Illuminate\Database\Capsule\Manager as DB;
use controllers\PageController as PageController;
use controllers\RegisterController as RegisterController;
use controllers\MembershipController as MembershipController;
use controllers\TripController as TripController;
use controllers\AjaxController as AjaxController;
use controllers\ActionsController as ActionsController;

/* 
Document root 
Set web controllers
*/

class Routes {


  public function __construct()
  {

    //declaracion de controladores
    $PageController = new PageController();
    $RegisterController = new RegisterController();
    $MembershipController = new MembershipController();
    $TripController = new TripController();
    $AjaxController = new AjaxController();
    $ActionsController = new ActionsController();



    //declaracion de rutas
    Flight::route('/',array($PageController, 'index'));
    Flight::route('/userProfile',array($PageController, 'userProfile'));
    
    //Flight::route('/userProfile',array($PageController, 'changePassword'));
    
    

    //declaracion de rutas POST
    Flight::route('POST /userRegister',array($RegisterController, 'funUserRegister'));
    Flight::route('POST /userLogin',array($MembershipController, 'funUserLogin'));
    Flight::route('/postTrip',array($TripController, 'funPostTrip'));
    Flight::route('/viewEvents',array($PageController, 'viewEvents'));
    Flight::route('/eventDetails/@id',array($PageController, 'getEvent'));
    Flight::route('POST /getComments',array($AjaxController, 'loadComments'));
    Flight::route('POST /searcher',array($PageController, 'funSearcher'));

    // ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑all above routes can access without login↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
    Flight::route('/*', function(){
      if(Flight::membership()->checkCurrentLogin()){ 
        $Usuario = Flight::membership()->getUser();
        Flight::set('Usuario', $Usuario);  
 
    
        return true;
      } else {
        Flight::redirect("/");
      } 
    
    });

    // ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ ↓all down routes can't access without login↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
    Flight::route('/logout',array($MembershipController, 'logout'));
    Flight::route('/adminProfile',array($PageController, 'adminProfile'));
    Flight::route('POST /registerArtist',array($RegisterController, 'funRegisterArtist'));
    Flight::route('GET /artist/collect', array($AjaxController, 'artistCollect'));
    Flight::route('/artist/delete/@id', array($ActionsController, 'deleteArtist'));
    Flight::route('/artist/edit/@id', array($ActionsController, 'editArtist'));  /// => 'editArtist
    Flight::route('POST /updateArtist',array($ActionsController, 'funUpdateArtist'));
    Flight::route('POST /registerCompany',array($RegisterController, 'funRegisterCompany'));
    Flight::route('POST /registerEvent',array($RegisterController, 'funRegisterEvent'));
    Flight::route('POST /country/search', array($AjaxController, 'searchProv'));
    Flight::route('GET /user/getUsers', array($AjaxController, 'getUsers'));
    Flight::route('/user/delete/@id', array($ActionsController, 'deleteUser'));
    Flight::route('GET /company/getCompany', array($AjaxController, 'getCompanyList'));
    Flight::route('/company/delete/@id', array($ActionsController, 'deleteCompany'));
    Flight::route('/company/edit/@id', array($ActionsController, 'getInfoCompany'));
    Flight::route('POST /editCompany', array($ActionsController, 'funEditCompany'));
    Flight::route('GET /event/getEvents', array($AjaxController, 'getEventList'));
    Flight::route('/event/delete/@id', array($ActionsController, 'deleteEvent'));
    Flight::route('/event/edit/@id', array($ActionsController, 'getInfoEvent')); /// => 'editArtist
    Flight::route('POST /editEvent',array($ActionsController, 'funEditEvent'));
    Flight::route('POST /saveComent',array($RegisterController, 'postComment')); // fun post comment
    Flight::route('/createTrip/@id', array($PageController, 'createNewTrip'));
    Flight::route('POST /registerTrip',array($RegisterController, 'regTrip'));
    Flight::route('GET /trips/getTrips', array($AjaxController, 'getTrips'));
    Flight::route('/trips/approve/@id', array($ActionsController, 'approveTrip'));
    Flight::route('/trips/denegate/@id', array($ActionsController, 'denegateTrip'));
    Flight::route('/tripDetails/@id', array($ActionsController, 'seeTripDetails'));
    Flight::route('/myTrips/@id', array($ActionsController, 'tripView'));//recoje el id del viaje y se muestra en tripView
    Flight::route('/userTrip/deleteTrip/@id', array($ActionsController, 'deleteUserTrip'));//recoje el id del viaje y se elimina
    Flight::route('POST /password', array($MembershipController, 'changePassword'));
    Flight::route('POST /calendar/collect', array($AjaxController, 'CalendarCollect'));
    Flight::route('/incalendar/@id', array($ActionsController, 'incalendar'));
    Flight::route('/outcalendar/@id/@eid', array($ActionsController, 'outcalendar'));

    Flight::route('/*',array($PageController, 'notFound')); //nombreControlador, nombreFuncion

  }
}
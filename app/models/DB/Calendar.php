<?php 

namespace models\DB;
use Illuminate\Database\Capsule\Manager as DB;

// Model Tabla Entidad
class Calendar extends \Illuminate\Database\Eloquent\Model {
	public $timestamps = false; 
	//public $fillable = array('auth_token');
	protected $table = 'calendar';
	
}
?>
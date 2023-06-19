<?php 

namespace models\DB;
use Illuminate\Database\Capsule\Manager as DB;

// Model Tabla Entidad
class Trip extends \Illuminate\Database\Eloquent\Model {
	public $timestamps = true; 
	protected $table = 'trips';
	
}
?>
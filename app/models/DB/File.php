<?php 

namespace models\DB;
use Illuminate\Database\Capsule\Manager as DB;

// Model Tabla Entidad
class File extends \Illuminate\Database\Eloquent\Model {
	public $timestamps = true; 
	//public $fillable = array('auth_token');
	protected $table = 'files';
	
}
?>
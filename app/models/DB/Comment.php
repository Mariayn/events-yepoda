<?php 

namespace models\DB;
use Illuminate\Database\Capsule\Manager as DB;

// Model Tabla Entidad
class Comment extends \Illuminate\Database\Eloquent\Model {
	public $timestamps = true; 
	//public $fillable = array('auth_token');
	protected $table = 'comments';
	
}
?>
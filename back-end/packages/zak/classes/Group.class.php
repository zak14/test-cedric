<?php  
namespace zak;
use equal\orm\Model; // this is a built-in object handler

class Group extends Model {
    public static function getColumns() {
        return array(
            'name'     => ['type' => 'string'],
            
        );
    }
}

?>
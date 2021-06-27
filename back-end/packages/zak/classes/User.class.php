<?php  
namespace zak;

use equal\orm\Model; // this is a built-in object handler

class User extends Model {
    public static function getColumns() {
        return array(
            'name'     => ['type' => 'string'],
            'age'     => ['type' => 'integer'],
            'role'     => ['type' => 'string'],
            'name_group'     => ['type' => 'string'],
            'group_id'     =>  [ 'type'  =>  'one2many' , 
                            'foreign_object'  =>  'zak\Group',
            ]
            
        );
    }
}

?>
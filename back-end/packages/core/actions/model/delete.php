<?php
/*
    This file is part of the eQual framework <http://www.github.com/cedricfrancoys/equal>
    Some Rights Reserved, Cedric Francoys, 2010-2021
    Licensed under GNU LGPL 3 license <http://www.gnu.org/licenses/>
*/
list($params, $providers) = announce([
    'description'   => "Deletes the given object.",
    'params'        => [
        'entity' =>  [
            'description'   => 'Full name (including namespace) of the class to return (e.g. \'core\\User\').',
            'type'          => 'string', 
            'required'      => true
        ],
        'id' =>  [
            'description'   => 'Unique identifier of the object to remove.',
            'type'          => 'integer',
            'required'      => true
        ],
        'permanent' => [
            'description '  => 'Flag telling if deletion has to be permanent (not in recycle bin).',
            'type'          => 'boolean', 
            'default'       => false
        ]
    ],
    'response'      => [
        'content-type'  => 'application/json',
        'charset'       => 'utf-8',
        'accept-origin' => '*'
    ],
    'providers'     => ['context', 'orm'] 
]);


list($context, $orm) = [$providers['context'], $providers['orm']];


$params['entity']::id($params['id'])->delete($params['permanent']);
                               
$context->httpResponse()
        ->status(204)
        ->body('')
        ->send();
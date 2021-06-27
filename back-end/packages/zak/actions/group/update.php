<?php
use zak\Group;


list($params, $providers) = announce([
    'description'   => 'Creates a new user account based in given credentials and details.',
    'response'      => [
        'content-type'  => 'application/json',
        'charset'       => 'UTF-8',
        'accept-origin' => '*'
    ],    
    'params'        => [
        'id' => [
            'type'      => 'integer', 
            'required'  => true
        ], 
        'name' =>  [
            'type'          => 'string',
            'required'      => true
        ]
    ],
    'providers'     => ['context', 'orm'] 
]);

list($context, $orm) = [ $providers['context'], $providers['orm'] ];



$group = Group::ids($params['id'])
        ->update($params)
        ->read(['name'])
        ->adapt('txt')
        ->first();

$context->httpResponse()
        ->status(201)
        ->body($group)
        ->send();

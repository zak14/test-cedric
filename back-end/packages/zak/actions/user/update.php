<?php
use zak\User;


list($params, $providers) = announce([
    'description'   => 'Creates a new user account based in given credentials and details.',
    'response'      => [
        'content-type'  => 'application/json',
        'charset'       => 'UTF-8',
        'accept-origin' => ['http://localhost:4200', '*']
    ],    
    'params'        => [
        'id' => [
            'type'      => 'integer', 
            'required'  => true
        ], 
        'name' =>  [
            'type'          => 'string',
            'required'      => true
        ],
        'age' =>  [
            'type'          => 'integer',
            'required'      => true
        ],
        'role' =>  [
            'type'          => 'string',
            'required'      => true
        ],
        'name_group' =>  [
            'type'          => 'string',
            'required'      => true
        ]
    ],
    'providers'     => ['context', 'orm'] 
]);

list($context, $orm) = [ $providers['context'], $providers['orm'] ];



$user = User::ids($params['id'])
        ->update($params)
        ->read(['name','age','role','name_group'])
        ->adapt('txt')
        ->first();


$context->httpResponse()
        ->status(201)
        ->body($user)
        ->send();
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
        'name' =>  [
            'description'   => 'user name.',
            'type'          => 'string',
            'usage'         => 'name',
            'required'      => true
        ],
        'age' =>  [
            'description'   => 'user age.',
            'type'          => 'integer',
            'usage'         => 'age',
            'required'      => true
        ],
        'role' =>  [
            'description'   => 'user role.',
            'type'          => 'string',
            'usage'         => 'role',
            'required'      => true
        ],
        'name_group' =>  [
            'description'   => 'user group.',
            'type'          => 'string',
            'usage'         => 'name_group',
            'required'      => true
        ]
    ],
    'providers'     => ['context', 'orm'] 
]);

list($context, $orm) = [ $providers['context'], $providers['orm'] ];



$user = User::create($params)
        ->read(['name','age','role','name_group'])
        ->adapt('txt')
        ->first();

$context->httpResponse()
        ->status(201)
        ->body($user)
        ->send();
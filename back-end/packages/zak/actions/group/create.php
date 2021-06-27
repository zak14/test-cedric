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
        'name' =>  [
            'description'   => 'group name.',
            'type'          => 'string',
            'usage'         => 'name',
            'required'      => true
        ]
    ],
    'providers'     => ['context', 'orm'] 
]);

list($context, $orm) = [ $providers['context'], $providers['orm'] ];



$group = Group::create($params)
        ->read(['name'])
        ->adapt('txt')
        ->first();

$context->httpResponse()
        ->status(201)
        ->body($group)
        ->send();


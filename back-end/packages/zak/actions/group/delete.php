<?php 
use zak\Group;

list($params, $providers) = announce([
    'params'        => [
        'id' => [
            'type' => 'integer',
            'required' => true
        ]
    ],
    'response'      => [
        'content-type'  => 'application/json',
        'charset'       => 'utf-8',
        'accept-origin' => ['http://localhost:4200', '*']
    ],
    'providers'     => ['context', 'orm'] 
]);

list($context, $orm) = [ $providers['context'], $providers['orm'] ];


$group = Group::ids($params['id'])->delete(true);

$context->httpResponse()
        ->status(204)
        ->send();

$context->httpResponse()
->status(201)
->body($group)
->send();
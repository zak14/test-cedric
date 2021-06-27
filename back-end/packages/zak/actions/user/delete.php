<?php 
use zak\User;

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
    'providers'     => ['context']
]);

list($context) = [$providers['context']];

User::ids($params['id'])->delete(true);

$context->httpResponse()
        ->status(204)
        ->send();
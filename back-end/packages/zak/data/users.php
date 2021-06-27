<?php 
use zak\User;  // calling our newly defined Task class

list($params, $providers) = announce([
    'description'   => 'Retrieve the list of existing tasks',
    'params'        => [],
    'response'      => [
                        'content-type'  => 'application/json',
                        'charset'       => 'utf-8',
                        'accept-origin' => ['http://localhost:4200', '*']
                       ],
    'providers'     => ['context']
]);

list($context) = [ $providers['context'] ];

$list = User::search([])
        ->read(['id', 'name', 'age', 'role', 'name_group'])
        ->adapt('txt')
        ->get(true);

$context->httpResponse()
        ->body($list)
        ->send();
<?php 
use zak\Group;  // calling our newly defined Task class

list($params, $providers) = announce([
    'description'   => 'Retrieve the list of existing tasks',
    'params'        => [],
    'response'      => [
                        'content-type'  => 'application/json',
                        'charset'       => 'utf-8',
                        'accept-origin' => ['*']
                       ],
    'providers'     => ['context']
]);

list($context) = [ $providers['context'] ];

$list = Group::search([])
        ->read(['name'])
        ->adapt('txt')
        ->get(true);

$context->httpResponse()
        ->body($list)
        ->send();
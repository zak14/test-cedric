<?php
/*
    This file is part of the eQual framework <http://www.github.com/cedricfrancoys/equal>
    Some Rights Reserved, Cedric Francoys, 2010-2021
    Licensed under GNU LGPL 3 license <http://www.gnu.org/licenses/>
*/
list($params, $providers) = announce([
    'description'   => "Returns the schema of given class (model) in JSON",
    'params'        => [
        'entity' =>  [
            'description'   => 'Full name (including namespace) of the class to return (e.g. \'core\\User\').',
            'type'          => 'string', 
            'required'      => true
        ],
    ],
    'response'      => [
        'content-type'  => 'application/json',
        'charset'       => 'UTF-8',
        'accept-origin' => '*'        
    ],
    'providers'     => ['context', 'orm'] 
]);


list($context, $orm) = [$providers['context'], $providers['orm']];


$data = array();

$model = $orm->getModel($params['entity']);
if(!is_object($model)) {
    throw new Exception("unknown class '{$params['entity']}'", QN_ERROR_UNKNOWN_OBJECT);
}
// get the complete schema of the object (including special fields)
$schema = $model->getSchema();

$data['parent'] = get_parent_class($model);
$data['fields'] = $schema;

if(method_exists($model, 'getUnique')) {
    $data['unique'] = $model->getUnique();
}

if(method_exists($model, 'getDefaults')) {
    $defaults = $model->getDefaults();
    $data['defaults'] = [];
    foreach($defaults as $field => $default) {
        if(is_callable($defaults[$field])) {
            $data['defaults'][$field] = call_user_func($defaults[$field]);
        }
        else {
            $data['defaults'][$field] = $default;
        }
    }
}


/*
if(method_exists($model, 'getConstraints')) {
    $data['constraints'] = $model::getConstraints();
}
*/

   
$context->httpResponse()
        ->body($data)
        ->send();
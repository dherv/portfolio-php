<?php

$router->get('', 'PagesController@home');
$router->get('skills', 'PagesController@skills');
$router->get('type', 'PagesController@type');
$router->get('contact', 'PagesController@contact');
$router->post('name', 'PagesController@store');
$router->post('delete', 'PagesController@destroy');
?>
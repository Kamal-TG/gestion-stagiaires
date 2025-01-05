<?php

// Dashboard
$router->get('/', 'index.php');
$router->get('/dashboard', 'index.php');

$router->get('/trainee/create', '/trainee/create.php');
$router->post('/trainee/add', '/trainee/add.php');

$router->post('/major/add', '/major/add.php');

$router->get('/trainee/show', '/trainee/show.php');

$router->get('/trainee/update', '/trainee/update.php');

$router->put('/trainee/update', '/trainee/edit.php');

$router->get('/trainee/delete', '/trainee/delete.php');
$router->delete('/trainee/delete', '/trainee/remove.php');

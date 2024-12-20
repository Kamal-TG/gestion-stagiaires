<?php

// Dashboard
$router->get('/', 'index.php');
$router->get('/dashboard', 'index.php');

$router->get('/trainee/create', '/trainee/create.php');
$router->post('/trainee/add', '/trainee/add.php');

$router->post('/major/add', '/major/add.php');

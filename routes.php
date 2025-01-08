<?php

// Dashboard
$router->get('/', 'index.php');
$router->get('/dashboard', 'index.php');

/* Trainee */
// show table
$router->get('/trainee/create', '/trainee/create.php');
// add trainee
$router->post('/trainee/add', '/trainee/add.php');
// add major
$router->post('/major/add', '/major/add.php');
// show trainee
$router->get('/trainee/show', '/trainee/show.php');
// update
$router->get('/trainee/update', '/trainee/update.php');
$router->put('/trainee/update', '/trainee/edit.php');
// delete
$router->get('/trainee/delete', '/trainee/delete.php');
$router->delete('/trainee/delete', '/trainee/remove.php');

/* Absent */
$router->get('/absent/create', '/absent/create.php');
// add
$router->get('/absent/add', '/absent/add.php');
$router->post('/absent/add', '/absent/add.php');
// show
$router->get('/absent/show', '/absent/show.php');
/* Justify */
// add
$router->get('/absent/justify/create', '/absent/justify/create.php');
$router->post('/absent/justify/add', '/absent/justify/add.php');
/* Justify type */
// add
$router->post('/absent/types/add', '/absent/types/add.php');

$router->get('/absent/justify/show', '/absent/justify/show.php');

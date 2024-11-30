<?php

// create
$router->get('/', 'create.php');
$router->post('/add', 'store.php');

// show
$router->get('/show', 'show.php');
$router->post('/show', 'show.php');

// list
$router->get('/list', 'list.php');
$router->post('/list', 'list.php');
$router->get('/search', 'search.php');

// edit
$router->get('/edit', 'edit.php');
$router->post('/edit', 'edit.php');
$router->post('/update', 'update.php');

//Ajoute Absence
$router->get('/absence', 'testing.php');
$router->post('/absence2', 'absence.php');

//history Absence
$router->get('/history', 'history.php');


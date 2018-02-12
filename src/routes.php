<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

// API group
$app->group('/api', function () use ($app) {
    // Version group
    $app->group('/v1', function () use ($app) {

	// platos
	 $app->get('/platos', 'getPlatos');
	 $app->get('/plato/{id}', 'getPlato');
	 $app->post('/create', 'addPlato');
	 $app->put('/update/{id}', 'updatePlato');
	 $app->delete('/delete/{id}', 'deletePlato');

	// ingredientes
	 $app->get('/platos', 'getPlatos');
	 $app->get('/plato/{id}', 'getPlato');
	 $app->post('/create', 'addPlato');
	 $app->put('/update/{id}', 'updatePlato');
	 $app->delete('/delete/{id}', 'deletePlato');

	// alergenos
	 $app->get('/platos', 'getPlatos');
	 $app->get('/plato/{id}', 'getPlato');
	 $app->post('/create', 'addPlato');
	 $app->put('/update/{id}', 'updatePlato');
	 $app->delete('/delete/{id}', 'deletePlato');

	// alergenos-plato
	 $app->get('/plato/{id}/alergenos', 'getAlergenosPlato');
 });
});

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
	 $app->post('/createPlato', 'addPlato');
	 $app->put('/updatePlato/{id}', 'updatePlato');
	 $app->delete('/deletePlato/{id}', 'deletePlato');

	// ingredientes
	 $app->get('/ingredientes', 'getIngredientes');
	 $app->get('/ingrediente/{id}', 'getIngrediente');
	 $app->post('/createIngrediente', 'addIngrediente');
	 $app->put('/updateIngrediente/{id}', 'updateIngrediente');
	 $app->delete('/deleteIngrediente/{id}', 'deleteIngrediente');

	// alergenos
	 $app->get('/alergenos', 'getAlergenos');
	 $app->get('/alergeno/{id}', 'getAlergeno');
	 $app->post('/createAlergeno', 'addAlergeno');
	 $app->put('/updateAlergeno/{id}', 'updateAlergeno');
	 $app->delete('/deleteAlergeno/{id}', 'deleteAlergeno');

	// alergenos-plato
	 $app->get('/plato/{id}/alergenos', 'getAlergenosPlato');

  // platos en los que está un alergeno
  $app->get('/platos/alergeno/{id}', 'getPlatosAlergeno');
 });
});

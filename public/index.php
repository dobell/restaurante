<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();

function getConnection() {
    $dbhost="127.0.0.1";
    $dbuser="root";
    $dbpass="";
    $dbname="test";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

/* obtiene todos los platos activos */
function getPlatos($response) {
    $sql = "select * FROM rt_platos where estado = 1";
    try {
        $stmt = getConnection()->query($sql);
        $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        return json_encode($wines);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* añade un plato */
function addPlato($request) {
    $plato = json_decode($request->getBody());
    $sql = "INSERT INTO rt_platos (descripcion) VALUES (:nombre)";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("nombre", $plato->nombre);
        $stmt->execute();
        $emp->id = $db->lastInsertId();
        $db = null;
        echo json_encode($emp);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* añade un ingrediente */
function addIngrediente($request) {
    $ingrediente = json_decode($request->getBody());
    $sql = "INSERT INTO rt_ingredientes (descripcion) VALUES (:nombre)";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("nombre", $ingrediente->nombre);
        $stmt->execute();
        $emp->id = $db->lastInsertId();
        $db = null;
        echo json_encode($emp);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* añade un alergeno */
function addAlergeno($request) {
    $alergeno = json_decode($request->getBody());
    $sql = "INSERT INTO rt_alergenos (descripcion) VALUES (:nombre)";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("nombre", $alergeno->nombre);
        $stmt->execute();
        $emp->id = $db->lastInsertId();
        $db = null;
        echo json_encode($emp);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* borra un plato */
function deletePlato($request) {
	$id = $request->getAttribute('id');
    $sql = "DELETE FROM rt_platos WHERE id=:id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $db = null;
		echo '{"error":{"text":"correcto! plato borrado"}}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/**/
function getAlergenosPlato($request) {
    $emp = json_decode($request->getBody());
	$id = $request->getAttribute('id');
    $sql = "select al.id, al.descripcion from rt_alergenos al inner join rt_alergenos_ingrediente ali on al.id = ali.id_alergeno inner join rt_ingredientes_plato ipla on ipla.id_ingrediente = ali.id_ingrediente where id_plato=:idPlato";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("idPlato", $id);
        $stmt->execute();
        $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        return json_encode($wines);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/**/
function getPlatosAlergeno($request) {
    $emp = json_decode($request->getBody());
	  $id = $request->getAttribute('id');
    $sql = "select p.id,p.descripcion from rt_platos p inner join rt_ingredientes_plato ipl on ipl.id_plato=p.id inner join rt_alergenos_ingrediente ain on ain.id_ingrediente=ipl.id_ingrediente where ain.id_alergeno=:idAlergeno";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("idAlergeno", $id);
        $stmt->execute();
        $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        return json_encode($wines);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

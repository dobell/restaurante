# Aplicación alérgenos de platos en restaurante

Aplicación de ejemplo de API Rest para controlar los alérgenos de platos de un restaurante.

Debido a una nueva legislación, los restaurantes necesitan tener información disponible acerca de los alérgenos que tiene cada plato que sirven. Un plato tiene varios ingredientes, y un ingrediente puede tener varios alérgenos.

Un restaurante ha contratado una aplicación movil que gestione para sus camareros cualquier duda de los clientes acerca de esta materia.

 Tendrá:

- Una base de datos que almacene los platos y sus alérgenos.
- Una API Rest que devuelva los alérgenos de un plato dado, o los platos en los que aparece un alérgeno concreto, y permita añadir ingredientes, platos y alérgenos.

# Framework utilizado

Se decide utilizar el framework slim para la creación de la API rest ya que es un framework sencillo y rápido. Al ser un proyecto sencillo y debido al poco tiempo disponible, la estructura del código se hace lo más simple y rápida posible. Por lo que los métodos están en index.php

# Base de datos
La carpeta sql contiene un script para crear las tablas y datos de ejemplo en la base de datos. Se debe indicar en el fichero index.php los datos de conexión a la base de datos. No es lo más correcto y debería separarse en un fichero (por ejemplo db-conf.php e incluirlo con un require_once(db-conf.php) para que sea más correcto, así como separar en DAOS el acceso a datos, mejora para la versión 1.1


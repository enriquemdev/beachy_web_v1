<?php

require_once 'vendor/autoload.php';

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Cache\SymfonyCache;
use BotMan\BotMan\Drivers\DriverManager;

//Agregados pruebas de enrique
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Middleware\DialogFlow\V2\DialogFlow;
/////////////////////////

require_once('conversaciones/OnboardingConversation.php');
require_once('conversaciones/PedirNombreConversation.php');

$config = [];

DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

$adapter = new FilesystemAdapter();

$botman = BotManFactory::create($config, new SymfonyCache($adapter));

$storage = $botman->userStorage();

// $dialogflow = BotMan\Middleware\DialogFlow\V2\DialogFlow::create('en');
// $botman->middleware->received($dialogflow);
// $botman->hears('smalltalk.(.*)', function ($bot) {
//     $extras = $bot->getMessage()->getExtras();
//     $bot->reply($extras['apiReply']);
// })->middleware($dialogflow);


$botman->hears('Hello', function($bot) {
    
    $bot->startConversation(new OnboardingConversation);
    
});

//Pruebas enrique

//Respuesta simple
$botman->hears('que onda(.*)', function($bot) {
    
    $bot->reply("como vas loco");
    
});

//(.*) Es para decir que puede poner cualquier cosa en esa posicion y el | es para ponerle las opciones de escucha
$botman->hears('hola(.*)|que tal(.*)|holi(.*)', function($bot) {
    
    $bot->reply("Hola amigo! Espero tengas una genial experiencia comprando en Beachy Nicaragua. Puedes pedirme ayuda en lo que necesites! :D");
    
});

//Respuesta con imagen
$botman->hears('imagen', function ($bot) {
    // Create attachment
    $attachment = new Image('https://botman.io/img/logo.png');

    // Build message object
    $message = OutgoingMessage::create('This is my text')
                ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});

$botman->hears('(.*)logo(.*)tienda(.*)|(.*)logo(.*)empresa(.*)', function ($bot) {
    // Create attachment
    $attachment = new Image('../img/LOGO SIN FONDO.png');

    // Build message object
    $message = OutgoingMessage::create('Este es el logo de nuestra tienda amigo! :D')
                ->withAttachment($attachment);

    // Reply message object
    $bot->reply($message);
});

//Probando guardar la info del usuario
// $botman->hears('mi nombre es {nombre}', function ($bot, $nombre) {

//     $bot->userStorage()->save([
//         'nombre' => $nombre
//     ]);

//     // Reply message object
//     $bot->reply('Hola '.$nombre);
// });

$botman->hears('mi id', function ($bot) {
    // $nombreUser = $bot->userStorage()->get('nombre');
    // $bot->reply('Tu nombre es '.$nombreUser);
    // $bot->userStorage()->save([
    //     'last' => 'ti'
    // ]);

    $nombreUser = $bot->userStorage()->get('nombre');
    $bot->reply('Tu nombre es '.$nombreUser);
    

    $bot->reply('tu id es: '.$bot->getUser()->getId());

});


//Este parametro es enviado desde public/bottom.php con el comentario <!-- Parametro bot inicial -->
$botman->hears('storeInfo123 {nombre}', function ($bot, $nombre) {
    //$bot->reply('Tu nombre es dddd');
    //session_start();
    $nombreUser = $bot->userStorage()->get('nombre');
    if($nombreUser == 'undefined' || $nombreUser == '')//Si no tiene un nombre asignado en el bot se buscara el nombre
    {
        if ($nombre == 'undefined' || $nombre == '')//Si el usuario no tiene iniciada sesion se le pedira el nombre mediante el bot
        {
            $bot->startConversation(new PedirNombreConversation);
            //$bot->startConversation(new OnboardingConversation);
        }
        else//Si tiene sesion iniciada se guardara el nombre de la bd en el bot
        {
            $bot->userStorage()->save([
                'nombre' => $nombre
            ]);
        }
    }

});

$botman->hears('talla m', function($bot) {
    require_once "../config/server.php" ;

    $connect = new PDO("mysql:host=".SERVER."; dbname=".DB, USER, PASS);

    $query = "
        SELECT * FROM tblproducto
        INNER JOIN catcolores ON tblproducto.colorProducto = catcolores.idColor
        INNER JOIN catcategorias ON tblproducto.categoriaProducto = catcategorias.idCategoria
        INNER JOIN cattela ON tblproducto.telaProducto = cattela.idTela
    ";
    
    $statement = $connect->prepare($query);
    
    $statement->execute();

    $statement = $statement->fetchAll(PDO::FETCH_ASSOC);

    //$statement = json_encode($statement);
    //echo "<script>console.log(".$statement.")</script>";

    foreach ($statement as $row) {
        $attachment = new Image('../img/imgProductos/'.$row["codigoEstilo"].'/back.jpeg');

        $message = OutgoingMessage::create(''.$row["descripcionProducto"].'')
                    ->withAttachment($attachment);
        $bot->reply($message);
        //$bot->reply($row['idProducto']."");//recordar ponerle eso al final
        }

    //OTRA MANERA DE HACERLO
    // for ($i=0; $i < count($statement); $i++) { 
    //     $bot->reply($statement[$i]['idProducto']."");
    // } 
    
});

$botman->fallback(function($bot) {
    $bot->typesAndWaits(1);
    $bot->reply('Lo siento, lo que me dices está fuera de mi alcance por el momento. Tengo una lista de preguntas frecuentes por si te ayudan a aclarar tus dudas.');
    //$bot->reply('Tengo una lista de preguntas frecuentes por si te ayudan a aclarar tus dudas.');
});



$botman->listen();
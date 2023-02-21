<?php

use BotMan\BotMan\Messages\Conversations\Conversation;

class PedirNombreConversation extends Conversation
{

    protected $firstname;


    public function pedirNombre()
    {
        $this->ask('Por favor ingresa tu primer nombre.', function($answer) {
            $nombre = $answer->getText();
            $this->bot->userStorage()->save([//importante
                'nombre' => $nombre
            ]);
            $this->say('¡Mucho gusto '.$nombre.'! Dime si necesitas algo.');
        });
    }


    public function run()
    {
        $this->pedirNombre();
    }
}
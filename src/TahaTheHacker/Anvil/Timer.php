<?php

namespace TahaTheHacker\Anvil;

use pocketmine\scheduler\PluginTask;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\item\item;
use pocketmine\tile\Sign;
use pocketmine\scheduler\ServerScheduler;
use pocketmine\level\Position;

class Timer extends PluginTask {


  public function __construct($plugin,  $player) {
    parent::__construct($plugin) ;
  }
  public function onSignCreate($tick, SignChangeEvent $event) {
        $player = $event->getPlayer(); //Get the player
        $line_0 = $event->getLine(0); //The sign's line 1 (Despite the number)
        $line_1 = $event->getLine(1); //The sign's line 2
        if(strtolower($line_0) === "[sg]" && !empty($line_1)){ //Check if the line 1 is equal to [sg] (Since strtolower) and if line 1 is not empty
            $level = $this->getServer()->getLevelByName($line_1); //Get the level object with the name of $line_1
            if(!$this->getServer()->isLevelGenerated($line_1)){ //Check if level is generated
                $player->sendMessage("Failed, Not found."); //LOL
                return false; //Return a boolean value of false
            }
            $player->sendMessage("Created!"); //AGAIN LOL
            if($level instanceof Level){ //No need this but I am Bored
                $event->setLine(0, "§c[§l§6SG§r§c]", "[" . count($level->getPlayers()) . "/10]", "§l§aTap To Join"); //Set the text. BTW, better use TextFormat::**
                $event->setLine(1, "Map :§l§a" . $line_1);
                $event->setLine(2, "§l§b[" . count($level->getPlayers($line_1)) . "/10]");
                $event->setLine(3, "§l§6Tap To Join");
            }
        }
    }
}//Class

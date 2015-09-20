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


  public function __construct(Main $plugin, $event, $player){
    $this->plugin = $plugin;
    $this->player = $player;
    parent::__construct($plugin);
  }
  public function onRun($tick) {
    $this->plugin->onSignCreate();
}
}//Class

<?php

namespace TahaTheHacker\Anvil;

use pocketmine\scheduler\PluginTask;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\item\item;
use pocketmine\tile\Sign;
use pocketmine\scheduler\Task;
use pocketmine\scheduler\ServerScheduler;
use pocketmine\level\Position;
use pocketmine\math\Vector3;

class Timer extends PluginTask {


  public function __construct(Main $plugin, Player $player) {
    parent::__construct($plugin, $player);
    $this->plugin = $plugin;
    $this->player = $player;
}
  public function onRun($tick) {
    $sg1tile = $this->plugin->getServer()->getLevelByName("lobby")->getTile(new Vector3(173, 68, 126));
    if($sg1tile instanceof Sign){
    $tile->setText("§c[§l§6SG§r§c]", "Map :§l§aSG1", "§l§b[" . count($level->getPlayers("sg1")) . '/10]', "§l§6Tap To Join");
    }
    }
}

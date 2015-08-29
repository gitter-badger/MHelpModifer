<?php
namespace TahaTheHacker;

use Pocketmine/plugin/PluginBase;
use Pocketmine/plugin/PluginLoader;
use Pocketmine/player;
use Pocketmine/event/player/PlayerItemHeldEvent;
use pocketmine/item/item;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
   $this->getServer()->getPluginManager()->registerEvents($this, $this); 
  }
  
    public function ItemHeld(PlayerItemHeldEvent $event) {
$item = $event->getItem(); // UNUSED VARIABLE
$id = $item->getId(); // UNUSED VARIABLE
$damage = $item->getDamage(); // UNUSED VARIABLE
if ($getid->345) $player->sendPopup($Click_Me); // UNDEFINED_VARIABLE_EXCEPTION
}

}

<?php
namespace TahaTheHacker;

use pocketmine/plugin/PluginBase;
use pocketmine/plugin/PluginLoader;
use pocketmine/player;
use pocketmine/event/player/PlayerItemHeldEvent;
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

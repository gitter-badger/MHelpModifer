<?php
namespace TahaTheHacker;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;
use pocketmine\player;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\item;
use pocketmine\event\Listenser

class Main extends PluginBase implements Listenser {
  
  public function onEnable(){
   $this->getServer()->getPluginManager()->registerEvents($this, $this); 
  }
  
    public function ItemHeld(PlayerItemHeldEvent $event) {
$item = $event->getItem();
$id = $item->getId();
if($id == 345){
$player = $event->getPlayer();
$player->sendPopup("Your text here");
}
}

}

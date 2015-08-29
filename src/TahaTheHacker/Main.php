<?php
namespace TahaTheHacker;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;
use pocketmine\player;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
   $this->getServer()->getPluginManager()->registerEvents($this, $this); 
  }
  
  public function ItemHeld(PlayerItemHeldEvent $event) {
$item = $event->getItem();
$id = $item->getId();
if($id == 345){
$player = $event->getPlayer();
$player->sendPopup("§a§lTouch the floor to §bSneak!");
}
}
  public function onProcess(PlayerCommandPreprocessEvent $event){
if($event->getMessage() == "/me"){
$event->getPlayer()->sendMessage("Sorry. This command is disabled");
$event->setCancelled(true);
}
}
}

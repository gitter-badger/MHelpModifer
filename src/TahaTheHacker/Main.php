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
 public function onCmd(PlayerCommandPreprocessEvent $event){
    if(in_array($event->getPlayer()->getName(), (array) $this->blocked_players)){
        $cmd = explode(" ", $event->getMessage());
        if($cmd[0] == "/me") {
            $event->getPlayer()->sendmessage("You are not able to use this command now!");
            $event->setCancelled(true);
        }
    }

}

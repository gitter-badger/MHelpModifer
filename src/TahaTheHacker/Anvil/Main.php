<?php
namespace TahaTheHacker\Anvil;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;
use pocketmine\player;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\ulits\TextFormat

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
   $this->getServer()->getPluginManager()->registerEvents($this, $this);
   $this->getLogger()->info(TextFormat::DARK_GREEN . "✔ §c+§6Anvil§c+§2Enabled");
   	$this->saveDefaultConfig();
}
  
  public function ItemHeld(PlayerItemHeldEvent $event) {
$item = $event->getItem();
if($this->getConfig()->get("Compass") == "true"){
$id = $item->getId();
if($id == 345){
$player = $event->getPlayer();
$player->sendPopup("§a§lTouch the floor to §bSneak!");
}
}
}
  public function onProcess(PlayerCommandPreprocessEvent $event){
if($event->getMessage() == "/me"){
$event->getPlayer()->sendMessage("§cSorry. This command is Blocked because of bigger text.");
$event->setCancelled(true);
}
}
}
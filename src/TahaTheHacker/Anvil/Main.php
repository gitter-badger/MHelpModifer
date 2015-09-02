<?php
namespace TahaTheHacker\Anvil;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;
use pocketmine\player;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\utils\TextFormat;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
   $this->getServer()->getPluginManager()->registerEvents($this, $this);
   $this->getLogger()->info(TextFormat::DARK_GREEN . "✔ §c+§6Anvil§c+§2 Enabled");
   	$this->saveDefaultConfig();
   	Item::addCreativeItem(Item::get(276))
    Item::removeCreativeItem(Item::get(325:8))
    Item::removeCreativeItem(Item::get(325:10))
  }
  
  public function ItemHeld(PlayerItemHeldEvent $event) {
$item = $event->getItem();
if($this->getConfig()->get("Compass") == "true"){
$id = $item->getId();
if($id == 345){
$player = $event->getPlayer();
$player->sendTip("§l§a|§6§lSneaking §cCompass§a|");
 foreach((array)$this->getConfig()->get("sneak") as $command){
  $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
}
}
}
if($event->getPlayer()->hasPermission("anvil") || $event->getPlayer()->hasPermission("anvil.feather")){
$item = $event->getItem();
if($this->getConfig()->get("feather") == "true"){
$id = $item->getId();
if($id == 288){
  $player = $event->getPlayer();
$player->sendTip("§l§a|§6§lFlying §cFeather§a|");
 foreach((array)$this->getConfig()->get("feather-command") as $command){
  $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
}
}
}
}
}
}

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
}
  
  public function ItemHeld(PlayerItemHeldEvent $event) {
$item = $event->getItem();
if($this->getConfig()->get("Compass") == "true"){
$id = $item->getId();
if($id == 345){
$player = $event->getPlayer();
$player->sendTip("§a§lTouch the floor to §bSneak!");
 $this->getConfig()->get("Sneak") as $command){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
}
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

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
 foreach((array)$this->getConfig()->get("Sneak") as $command){
  $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
}
}
}
}
public function onCmd(PlayerCommandPreprocessEvent $event){
    if(in_array($event->getPlayer()->getName(), (array) $this->config)){
        $cmd = explode(" ", $event->getMessage());
        if($cmd[0] == "/me") {
            $event->getPlayer()->sendTip("You are not able to use this command now!");
            $event->setCancelled(true);
        }
    }
}
}

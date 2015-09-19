<?php

namespace TahaTheHacker\Anvil;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\utils\TextFormat;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;

class Main extends PluginBase implements Listener {
  
  public function onEnable(){
   $this->getServer()->getPluginManager()->registerEvents($this, $this);
   $this->getLogger()->info(TextFormat::DARK_GREEN . "Enabled");
   	$this->saveDefaultConfig();
   	item::removeCreativeItem(Item::get(Item::TNT, 0));
   	item::removeCreativeItem(Item::get(Item::BUCKET, 10));
   	
                 }

public function onCmd(PlayerCommandPreprocessEvent $event){
        $cmd = explode(" ", $event->getMessage());
        if($cmd[0] == "/me") {
            $event->getPlayer()->sendMessage("§c§lThis command is Blocked. reason : §4Bigger text");
            $event->setCancelled(true);
        }
    }
    	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "test":
			if($sender->hasPermission("anvil.taha")){
				if(!$sender instanceof Player){
            $sender->sendMessage("Run this command in-game.");
            return false;
        }
        if(count($args) !== 1){
            $sender->sendMessage("§cUse /test <world>");
            return false;
        }
        if(!$sender->getServer()->isLevelGenerated($args[0])){
            $sender->sendMessage(TextFormat::RED . "Something wrong happen while joining");
            return false;
        }else{
        if(!$sender->getServer()->isLevelLoaded($args[0])){
            $sender->sendMessage(TextFormat::DARK_GREEN . "starting first match..");
        }
            if(!$sender->getServer()->loadLevel($args[0])){
                $sender->sendMessage(TextFormat::RED . "Error while joining the match.");
                return false;
            }
        $world = $sender->getServer()->getLevelByName($args[0]);
        $sender->teleport($world->getSpawnLocation(), 0, 0);
        $sender->sendMessage(TextFormat::GREEN . "Joining the match..");
        return true;
    }

}
}
}
}

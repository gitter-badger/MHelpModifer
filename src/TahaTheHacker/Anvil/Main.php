<?php

namespace TahaTheHacker\Anvil;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoader;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\item\item;
use pocketmine\tile\Sign;
use pocketmine\level\Position;
use pocketmine\event\block\SignChangeEvent;
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
   	item::addCreativeItem(Item::get(Item::DIAMOND_SWORD, 0));
   	item::addCreativeItem(Item::get(Item::DIAMOND, 0));
   	
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
			case "joinmatch":
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
            $sender->sendMessage(TextFormat::RED . "§c[§l§6SG§r§c] §4Something wrong happen while joining");
            return false;
        }else{
            if(!$sender->getServer()->loadLevel($args[0])){
                $sender->sendMessage(TextFormat::RED . "§c[§l§6SG§r§c] §4Error while joining the match.");
                return false;
            }
        $world = $sender->getServer()->getLevelByName($args[0]);
        $sender->teleport($world->getSpawnLocation(), 0, 0);
        $sender->sendMessage(TextFormat::GREEN . "§c[§l§6SG§r§c] §aJoining the match..");
        return true;
    }

		}
	}
 }

public function onSignCreate(SignChangeEvent $event){
	$player = $event->getPlayer();
	$sign = $event->getPlayer()->getLevel()->getTile($event->getBlock());
	if($event->getBlock()->getID() == 323 || $event->getBlock()->getID() == 63 || $event->getBlock()->getID() == 68){
	if($sign instanceof Sign){
	$line0 = $event->getLine(0);
	$line1 = $event->getLine(1);
	$lvl = $player->getServer()->getLevelByName($line1);
	
	if($line0 =="[SG]"){
		
	if(empty($line1) !== true){
		
	if(!$player->getServer()->isLevelGenerated($line1)){
		$player->sendMessage("Faild, Not found.");
		return false;
	}//Level
		if($player->getServer()->isLevelGenerated($line1)){
		$player->sendMessage("Created!.");
		$signTile->setText("§c[§l§6SG§r§c]", $line1, "[" . $lvl->getPlayers() . '/10]', "§l§aTap To Join");
		}
	}//empty!
	}//sg
}//sign
}//block
	
}//Event
}//Main

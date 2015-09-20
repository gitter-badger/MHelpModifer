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
use pocketmine\level\Level;

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
        $player = $event->getPlayer(); //Get the player
        $line_0 = $event->getLine(0); //The sign's line 1 (Despite the number)
        $line_1 = $event->getLine(1); //The sign's line 2
        if(strtolower($line_0) === "[sg]" && !empty($line_1)){ //Check if the line 1 is equal to [sg] (Since strtolower) and if line 1 is not empty
            $level = $this->getServer()->getLevelByName($line_1); //Get the level object with the name of $line_1
            if(!$this->getServer()->isLevelGenerated($line_1)){ //Check if level is generated
                $player->sendMessage("Failed, Not found."); //LOL
                return false; //Return a boolean value of false
            }
            $player->sendMessage("Created!"); //AGAIN LOL
            if($level instanceof Level){ //No need this but I am Bored
                $event->setLine(0, "§c[§l§6SG§r§c]", "[" . count($level->getPlayers()) . "/10]", "§l§aTap To Join"); //Set the text. BTW, better use TextFormat::**
                $event->setLine(1, "Map :§l§a" . $line_1);
                $event->setLine(2, "§l§b[" . count($level->getPlayers($line_1)) . "/10]");
                $event->setLine(3, "§l§6Tap To Join");
            }
        }
    }
}

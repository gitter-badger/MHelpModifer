<?php

namespace TahaTheHacker\Test;

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
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\level\Level;
use pocketmine\event\player\PlayerMoveEvent;

class Main extends PluginBase implements Listener {
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
 switch($cmd->getName()){
			case "test":
			    if($this->$sender->getServer()->getLevelByName("sg1"){
			        $sender->sendMessage("Perfect");
			    }
			    
 }
    }//onMove

    }//main

<?php

namespace TahaTheHacker\HelpModifer;

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
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		$this->getServer()->getLogger()->info("§l§cHelp§6Modifer §aEnabled§c!");
	}
		
    
	public function onCmd(PlayerCommandPreprocessEvent $event){
	$cmd = explode(" ", $event->getMessage());
        $player = $event->getPlayer();
		if(strtolower($cmd[0]) === "/help" || strtolower($cmd[0]) === "/?"){
			$event->setCancelled(true);
			foreach($this->getConfig()->get("messages") as $msg){
              	$player->sendMessage(str_replace("{player}", $player->getName(), $msg);
			}
		}
	}
    }/*Main*/

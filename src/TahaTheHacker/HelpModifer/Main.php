<?php

namespace TahaTheHacker\HelpModifer;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\utils\TextFormat;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
		$this->getServer()->getLogger()->info("§l§cHelp§6Modifer §aEnabled§c!");
		$yml = yaml_parse(file_get_contents($this->getDataFolder() . "config.yml"));
	}
		
    
	public function onCmd(PlayerCommandPreprocessEvent $event){
	$cmd = explode(" ", $event->getMessage());
        $player = $event->getPlayer();
        	if($yml["enable-plugin"] == true){
		if(strtolower($cmd[0]) == "/help" || strtolower($cmd[0]) == "/?"){
			foreach($yml["messages"] as $array){
              	$player->sendMessage(str_replace("{player}", $player->getName(), $array));
			}
              	$event->setCancelled(true);
		}
		}
	}
    }/*Main*/

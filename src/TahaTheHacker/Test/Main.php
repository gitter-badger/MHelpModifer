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
    
    public function onMove(PlayerMoveEvent $event){
        $player = $event->getPlayer();
        $direction = $player->getDirectionVector();
        $x = $direction->getX();
        $z = $direction->getZ();
        $block = $player->getLevel()->getBlockIdAt($player->getX(), ($player->getY() - 0.1), $player->getZ());
         if($block === 152){
          for($i = 1; $i <= 1000; $i++) {
                    $player->knockBack($player, 0, $x, $z, 3.2);
                }
         }
    }//onMove

    }//main

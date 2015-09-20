<?php

namespace yournamespace;

use pocketmine\scheduler\PluginTask;

class Timer extends PluginTask {


  public function __construct($plugin,  $player) {
    parent::__construct($plugin) ;
  }
  public function onRun($tick) {
}//Ticker
}//Class

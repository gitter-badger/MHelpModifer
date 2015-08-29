<?php

use Pocketmine/plugin/PluginBase;
use Pocketmine/plugin/PluginLoader;
use Pocketmine/player;
use Pocketmine/event/Cancellable;
use pocketmine/item/item;

class Main extends PluginBase,player,item implements Listener,Cancellable {
  public function ItemHeld(PlayerItemHeldEvent $event) {
$item = $event->getItem();
$id = $item->getId();
$damage = $item->getDamage();
if $getid->345 $player->sendPopup($Click_Me);
}
}

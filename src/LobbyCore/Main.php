<?php

namespace LobbyCore;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\item\Item;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;

class main extends PluginBase implements Listener {

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();

		$slot1 = Item::get(360, 0, 1);
		$slot9 = Item::get(152, 0, 1);
		$slot1->setCustomName("§cGames");
		$slot9->setCustomName("§aProfile");
		$player->getInventory()->clearAll();
		$player->getInventory()->setItem(0, $slot1);
		$player->getInventory()->setItem(8, $slot9);
	}

	public function onInteract(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		$item = $event->getPlayer();

		if($item->getId() == 360){
			$event->setCancelled();
			$player->sendMessage("§cThere's no games online!");
			return true;
		}
		if($item->getId() == 152){
			$event->setCancelled();
			$player->sendMessage("§cComing Soon OwO");
			return true;
		}
	}

}
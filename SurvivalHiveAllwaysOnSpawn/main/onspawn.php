<?php


namespace main;


use pocketmine\utils\TextFormat as MT;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\math\Vector3;
use pocketmine\level\Position;

	class onspawn extends PluginBase implements Listener
	
	{
		public function onEnable()
		{
			$this->getServer()->getPluginManager()->registerEvents($this,$this);
		}
	
		public function onRespawn(PlayerRespawnEvent $event)
		{
			$player = $event->getPlayer();
			$player->sendMessage("1");
			
			$x = $this->getServer()->getLevelByName($player->getLevel()->getName())->getSafeSpawn()->getX();
			$y = $this->getServer()->getLevelByName($player->getLevel()->getName())->getSafeSpawn()->getY();
			$z = $this->getServer()->getLevelByName($player->getLevel()->getName())->getSafeSpawn()->getZ();
			$level = $player->getLevel()->getName();
			
			//$player->teleport($player->getLevel()->getSpawnLocation());
			$event->setRespawnPosition(new Position($x, $y, $z));
			$player->sendMessage("2");
			
			//$event->getPlayer()->teleport(Server::getInstance()->getLevelByName($event->getPlayer()->getLevel()->getName())->getSafeSpawn());
		}
		
		public function onDisable()
		{
			$this->getLogger()->info("Plugin unloaded!");
		}
	}

<?php

namespace Yoyu\CmdOnJoin;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Main extends PluginBase implements Listener {
  public function onEnable() {
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->saveDefaultConfig();
    }
  
  public function onJoin(PlayerJoinEvent $event) {
	if($this->getConfig()->get("enablejoin") == "true"){
		$player = $event->getPlayer();
		foreach($this->getConfig()->get("JoinCommand") as $command){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
		}
		if(!$player instanceof Player){
						 $sender->sendMessage("§4[Error] Player not found");
					 } if(!$sender instanceof Player){
						 $sender->sendMessage("§4You §lSERIOUSLY§r§4 think that you can add the Console effects?");
					 } else {
						 $player->removeEffect(16);
					  $regen = Effect::getEffect(16);
					  $regen->setDuration(99999);
					  $regen->setAmplifier(1);
					  $regen->setVisible(false);
					  $player->addEffect($regen);
					  $sucess = $this->getConfig()->get("enablejoin"); if($sucess == true)
					  return true;
					  break;
	}
  }
  
  public function onDeath(PlayerDeathEvent $event) {
	if($this->getConfig()->get("enabledeath") == "true"){
		$player = $event->getEntity();
		if($player instanceof Player) {
			foreach($this->getConfig()->get("DeathCommand") as $command){
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
			}
		}
	}
  }
  
  public function onRespawn(PlayerRespawnEvent $event) {
	if($this->getConfig()->get("enablespawn") == "true"){
		$player = $event->getPlayer();
		foreach($this->getConfig()->get("RespawnCommand") as $command){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
		}
	}
  }
  
  public function onQuit(PlayerQuitEvent $event) {
	if($this->getConfig()->get("enableleave") == "true"){
		$player = $event->getPlayer();
		foreach($this->getConfig()->get("LeaveCommand") as $command){
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));	
		}
	}
  }
}
?>

<?php

namespace Test;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\Player;
use muqsit\invmenu\{InvMenu, InvMenuHandler};
use pocketmine\entity\EffectInstance;
use pocketmine\entity\Effect;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\utils\Config;
use pocketmine\level\sound\AvilFallSound;

class Test extends PluginBase{
  
public $myConfig;

public function onEnable(){
$this->getLogger()->info(TextFormat::GREEN . "Test is now Active");
$this->getLogger()->info(TextFormat::BLUE . "Author: Crow Balde");
$this->getServer()->getPluginManager()->registerEvents($this, $this);

$this->myConfig = (new Config($this->getDataFolder() . "test.yml", Config::YAML, array(
  "Messages" => [
    "TestMessage" => "Setup in test.yml"
    ]
  )));
}

public function onDisable(){
$this->getLogger()->info(TextFormat::RED. "Test is now Disabled");
$this->getLogger()->info(TextFormat::BLUE . "Author: Crow Balde");
}

public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{

switch($cmd->getName()){
		
       case "test":
		if($sender instanceof Player){
			if($sender->hasPermission("test.cmd")){
			  //Config
			  $config = $this->myConfig->getAll();
				$message = $config["Messages"] ["TestMessage"];
				//sound
        $sender->getlevel()->addSound(new AvilFallSoundSound($sender));
         //message
				$sender->sendMessage($message);
        $sender->sendPopup($message);
			}
		}
		break;
}
return true;
}
}
				  

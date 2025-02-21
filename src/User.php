<?php

namespace OnlyJaiden\ScrimAS;

use OnlyJaiden\ScrimAS\Main;
use pocketmine\utils\Config;
use pocketmine\player\Player;


class User{
    public $User = [];
    
    public function checkAlert(Player $player) : void{
        $config = new Config('plugin_data/ScrimAS/'."user.yml", Config::YAML);
        $new = Main::getInstance()->getConfig();
        if($config->get($player->getName()) == true) {
            $config->set($player->getName(), false);
            $player->SendMessage($new->get("AntiCheat.prefix")." §l§6» §r§aAnticheat alerts are now §2ENABLED!");
        } elseif($config->get($player->getName()) == false) {
            $config->set($player->getName(), true);
            $player->SendMessage($new->get("AntiCheat.prefix")." §l§6» §r§aYour alerts are now §4DISABLED!");
        }
        $config->save();
        
    }
    
    public function getUser(Player $staff, string $cheat, string $player) : void{
         $config = new Config('plugin_data/ScrimAS/'."user.yml", Config::YAML);
         $new = Main::getInstance()->getConfig();
         if($config->get($staff->getName()) == false) {
             $staff->SendMessage($new->get("AntiCheat.prefix")." §l§6»§r §e$player §chas been using §b$cheat");
         }
    }

}

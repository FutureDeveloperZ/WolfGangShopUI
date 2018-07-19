<?php

namespace ShopUI;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;

use pocketmine\event\player\PlayerMoveEvent;

use pocketmine\entity\Effect;

use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\item\Item;

use pocketmine\utils\Config;

use onebone\economyapi\EconomyAPI;
use jojoe77777\FormAPI;


class Main extends PluginBase implements Listener {

	public $cfg;

	public $itemName;
	public $itemId;
	public $itemMeta;
	public $paymentPrice;
	public $totalPaymentPrice;
	public $recentShop;


    public function onEnable() {
		$this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "WolfGangShopUI is finally enabled!");
		$this->cfg = $this->getConfig();
    }

    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "WolfGangShopUI is currently dsabled!");
    }
   
     
     
    public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args) : bool {
		
		switch($cmd->getName()){
		
			case "shop":
				if($sender instanceof Player) {
					
						$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						// CHECK THIS ?
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						
						if($result === null){
						// CHECK THIS ?
						}
							switch($result){
								
								case 0:
									
									break;
								case 1:
									$this->armorsForm($sender);
									break;
								case 2:
									$this->weaponsForm($sender);
									break;
								case 3:
									$this->toolsForm($sender);
									break;
								case 4:
									$this->blocksForm($sender);
									break;
								case 5:
									$this->foodsForm($sender);
									break;
								case 6:
								    $this->spawnersForm($sender);
									break;
                                                                case 7:
                                                                     $this->itemsForm($sender);
								break;
                                                                case 8:
                                                                     $this->itemsForm($sender);
								break;
                                                                case 9:
                                                                     $this->itemsForm($sender);
								break;




								
							}
					
						});

					$money = EconomyAPI::getInstance()->myMoney($sender);
						
					$form->setTitle("§l§6WolfGang§cMC §aShop");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton("§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					$form->addButton(TextFormat::RESET . "§8ARMORS", 1, "http://vignette1.wikia.nocookie.net/voltz/images/3/3d/Power_Armor_Helmet.png");
					$form->addButton(TextFormat::RESET . "§8WEAPONS", 1, "http://hydra-media.cursecdn.com/minecraft.gamepedia.com/2/28/Zanite_Sword_(The_Aether).png");
					$form->addButton(TextFormat::RESET . "§8TOOLS", 1, "http://media-minecraftforum.cursecdn.com/attachments/49/915/635494137401037540.png");
					$form->addButton(TextFormat::RESET . "§8BLOCKS", 1, "http://img11.deviantart.net/6c38/i/2015/114/a/7/minecraft_diamond_png_block___redsheep_collestion__by_epicartmaniac-d8quprh.png");
					$form->addButton(TextFormat::RESET . "§8FOOD", 1, "http://i.imgur.com/LFd3KYc.png");
					$form->addButton(TextFormat::RESET . "§8SPAWNERS", 1, "https://ftbwiki.org/images/thumb/1/1b/Block_Monster_Spawner_%28Hardcore_Ender_Expansion%29.png/128px-Block_Monster_Spawner_%28Hardcore_Ender_Expansion%29.png");
					$form->addButton(TextFormat::RESET . "§8ITEMS", 1, "http://img06.deviantart.net/3637/i/2012/183/8/4/mc_items_expanded_by_jluigijohn-d55rh7k.png");

					$form->sendToPlayer($sender);

				}
				else{
					$sender->sendMessage(TextFormat::RED . "Use this Command in-game.");
					return true;
				}
			break;

		}
		return true;
    }
	
	public function armorsForm($sender){
		
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result === null){
						
						}
							switch($result){
								
								case 0:
									$command = "shop";
									$this->getServer()->getCommandMap()->dispatch($sender, $command);
									break;
									
								case 1:
									$this->itemName = "LEATHER HELMET";
									$this->itemId = 298;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Leather_Helmet");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 2:
									$this->itemName = "LEATHER CHESTPLATE";
									$this->itemId = 299;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Leather_Chestplate");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 3:
									$this->itemName = "LEATHER LEGGINGS";
									$this->itemId = 300;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Leather_Leggings");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 4:
									$this->itemName = "LEATHER BOOTS";
									$this->itemId = 301;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Leather_Boots");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								// IRON ARMOR
								
								case 5:
									$this->itemName = "IRON HELMET";
									$this->itemId = 306;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Helmet");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 6:
									$this->itemName = "IRON CHESTPLATE";
									$this->itemId = 307;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Chestplate");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 7:
									$this->itemName = "IRON LEGGINGS";
									$this->itemId = 308;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Leggings");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 8:
									$this->itemName = "IRON BOOTS";
									$this->itemId = 309;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Boots");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								// GOLD ARMOR
								
								case 9:
									$this->itemName = "GOLD HELMET";
									$this->itemId = 314;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gold_Helmet");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 10:
									$this->itemName = "GOLD CHESTPLATE";
									$this->itemId = 315;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gold_Chestplate");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 11:
									$this->itemName = "GOLD LEGGINGS";
									$this->itemId = 316;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gold_Leggings");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 12:
									$this->itemName = "GOLD BOOTS";
									$this->itemId = 317;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gold_Boots");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								// DIAMOND ARMOR
								
								case 13:
									$this->itemName = "DIAMOND HELMET";
									$this->itemId = 310;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Helmet");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 14:
									$this->itemName = "DIAMOND CHESTPLATE";
									$this->itemId = 311;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Chestplate");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 15:
									$this->itemName = "DIAMOND LEGGINGS";
									$this->itemId = 312;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Leggings");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 16:
									$this->itemName = "DIAMOND BOOTS";
									$this->itemId = 313;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Boots");
									$this->recentShop = "armorsForm";
									$this->confirmBuy($sender);
									
									break;
								
								
							}
					
						});

					$money = EconomyAPI::getInstance()->myMoney($sender);	
						
					$form->setTitle("ARMORS");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton(TextFormat::BOLD . "§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					$form->addButton(TextFormat::BOLD . "LEATHER HELMET | " . TextFormat::GOLD . "$" . $this->cfg->get("Leather_Helmet"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/l/e/leatherhelmet_icon32.png");
					$form->addButton(TextFormat::BOLD . "LEATHER CHESTPLATE | " . TextFormat::GOLD . "$" . $this->cfg->get("Leather_Chestplate"), 1, "http://www.minecraftopia.com/images/blocks/leather_chestplate.png");
					$form->addButton(TextFormat::BOLD . "LEATHER LEGGINGS | " . TextFormat::GOLD . "$" . $this->cfg->get("Leather_Leggings"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/2/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/l/e/leatherleggings_icon32.png");
					$form->addButton(TextFormat::BOLD . "LEATHER BOOTS | " . TextFormat::GOLD . "$" . $this->cfg->get("Leather_Boots"), 1, "http://www.minecraftopia.com/images/blocks/leather_boots.png");
					
					$form->addButton(TextFormat::BOLD . "IRON HELMET | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Helmet"), 1, "https://i.pinimg.com/originals/b1/b4/ce/b1b4ce259b6fa2d22611c7204b801d7e.png");
					$form->addButton(TextFormat::BOLD . "IRON CHESTPLATE | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Chestplate"), 1, "http://www.minecraftopia.com/images/blocks/iron_chestplate.png");
					$form->addButton(TextFormat::BOLD . "IRON LEGGINGS | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Leggings"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/i/r/ironleggings_icon32.png");
					$form->addButton(TextFormat::BOLD . "IRON BOOTS | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Boots"), 1, "http://www.minecraftopia.com/images/blocks/iron_boots.png");
					
					$form->addButton(TextFormat::BOLD . "GOLDEN HELMET | " . TextFormat::GOLD . "$" . $this->cfg->get("Gold_Helmet"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/g/o/goldhelmet_icon32.png");
					$form->addButton(TextFormat::BOLD . "GOLDEN CHESTPLATE | " . TextFormat::GOLD . "$" . $this->cfg->get("Gold_Chestplate"), 1, "http://www.minecraftopia.com/images/blocks/gold_chestplate.png");
					$form->addButton(TextFormat::BOLD . "GOLDEN LEGGINGS | " . TextFormat::GOLD . "$" . $this->cfg->get("Gold_Leggings"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/g/o/goldleggings_icon32.png");
					$form->addButton(TextFormat::BOLD . "GOLDEN BOOTS | " . TextFormat::GOLD . "$" . $this->cfg->get("Gold_Boots"), 1, "http://www.minecraftopia.com/images/blocks/gold_boots.png");
					
					$form->addButton(TextFormat::BOLD . "DIAMOND HELMET | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Helmet"), 1, "http://www.minecraftopia.com/images/blocks/diamond_helmet.png");
					$form->addButton(TextFormat::BOLD . "DIAMOND CHESTPLATE | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Chestplate"), 1, "https://t5.rbxcdn.com/4c22f38625c66278993cd023c8cd26c1");
					$form->addButton(TextFormat::BOLD . "DIAMOND LEGGINGS | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Leggings"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/d/i/diamondleggings_icon32.png");
					$form->addButton(TextFormat::BOLD . "DIAMOND BOOTS | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Boots"), 1, "https://t1.rbxcdn.com/9da1ef03527cf4781c0acfda8fd203ad");
					
					
					
					$form->sendToPlayer($sender);
		
	}

	public function weaponsForm($sender){
		
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result === null){
						
						}
							switch($result){
								
								case 0:
									$command = "shop";
									$this->getServer()->getCommandMap()->dispatch($sender, $command);
									break;
								case 1:
									$this->itemName = "WOODEN SWORD";
									$this->itemId = 268;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Wooden_Sword");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									
									break;
								case 2:
									$this->itemName = "STONE SWORD";
									$this->itemId = 272;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Stone_Sword");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									break;
								case 3:
									$this->itemName = "IRON SWORD";
									$this->itemId = 267;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Sword");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									break;
								case 4:
									$this->itemName = "GOLDEN SWORD";
									$this->itemId = 283;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Golden_Sword");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									break;
								case 5:
									$this->itemName = "DIAMOND SWORD";
									$this->itemId = 276;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Sword");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									break;
								case 6:
									$this->itemName = "Bow";
									$this->itemId = 261;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Bow");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									break;
								case 7:
									$this->itemName = "Arrow";
									$this->itemId = 262;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Arrow");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									break;
								case 8:
									$this->itemName = "Fishing Rod";
									$this->itemId = 346;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Fishing_Rod");
									$this->recentShop = "weaponsForm";
									$this->confirmBuy($sender);
									break;

							}
					
						});

						
					$money = EconomyAPI::getInstance()->myMoney($sender);	
						
					$form->setTitle("WEAPONS");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton(TextFormat::BOLD . "§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					$form->addButton(TextFormat::BOLD . "WOODEN SWORD | " . TextFormat::GOLD . "$" . $this->cfg->get("Wooden_Sword"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/c/cd/Wooden_Sword.png");
					$form->addButton(TextFormat::BOLD . "STONE SWORD | " . TextFormat::GOLD . "$" . $this->cfg->get("Stone_Sword"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/f2/Stone_Sword.png?version=ede6f1623f23eb3959b3d5287dc54bb0");
					$form->addButton(TextFormat::BOLD . "IRON SWORD | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Sword"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/c/c7/Iron_Sword.png?version=960c58b1c1a899eacd00cd622db5d8a5");
					$form->addButton(TextFormat::BOLD . "GOLDEN SWORD | " . TextFormat::GOLD . "$" . $this->cfg->get("Golden_Sword"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a8/Golden_Sword.png?version=799e9e89e78c4c34d81b85e3bb8adc7f");
					$form->addButton(TextFormat::BOLD . "DIAMOND SWORD | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Sword"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a0/Diamond_Sword.png?version=0099d273527ef4575ac9dec22c2a58f2");
					$form->addButton(TextFormat::BOLD . "BOW | " . TextFormat::GOLD . "$" . $this->cfg->get("Bow"), 1, "https://lh3.googleusercontent.com/pANSFpCw9o6FFF8dEK13_x0Tbgzog-R-B7rSDLBNm-IamT4HtCoGMrmjIs7PI6wj_ZAsL8s9PABuuo741-Me=s400");
					$form->addButton(TextFormat::BOLD . "ARROW | " . TextFormat::GOLD . "$" . $this->cfg->get("Arrow"), 1, "https://lh3.googleusercontent.com/-bZ4_PZq0yMwXV7HLoini2-qfhltwtU6NcLy2aaUYz0K5-VCUpB0xOJA8uddTsef4b5xMlG6hxxnHY4kN8jYJSA=s400");
                                        $form->addButton(TextFormat::BOLD . "FISHING ROD | " . TextFormat::GOLD . "$" . $this->cfg->get("Fishing_Rod"), 1, "https://d1u5p3l4wpay3k.cloudfront.net/minecraft_gamepedia/c/c7/Fishing_Rod.png?version=59e4d8d3d6642eaf4623e9bb5fdce36e");
					$form->sendToPlayer($sender);
		
	}
	
	public function toolsForm($sender){
		
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result === null){
						
						}
							switch($result){
								
								case 0:
									$command = "shop";
									$this->getServer()->getCommandMap()->dispatch($sender, $command);
									break;
								case 1:
									$this->itemName = "WOODEN PICKAXE";
									$this->itemId = 270;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Wooden_Pickaxe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									
									break;
								case 2:
									$this->itemName = "STONE PICKAXE";
									$this->itemId = 274;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Stone_Pickaxe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 3:
									$this->itemName = "IRON PICKAXE";
									$this->itemId = 257;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Pickaxe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 4:
									$this->itemName = "GOLDEN PICKAXE";
									$this->itemId = 285;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Golden_Pickaxe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 5:
									$this->itemName = "DIAMOND PICKAXE";
									$this->itemId = 278;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Pickaxe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								
								// SHOVEL
								
								case 6:
									$this->itemName = "WOODEN SHOVEL";
									$this->itemId = 269;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Wooden_Shovel");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									
									break;
								case 7:
									$this->itemName = "STONE SHOVEL";
									$this->itemId = 273;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Stone_Shovel");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 8:
									$this->itemName = "IRON SHOVEL";
									$this->itemId = 256;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Shovel");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 9:
									$this->itemName = "GOLDEN SHOVEL";
									$this->itemId = 284;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Golden_Shovel");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 10:
									$this->itemName = "DIAMOND SHOVEL";
									$this->itemId = 277;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Shovel");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
									
								// AXE
								
								case 11:
									$this->itemName = "WOODEN AXE";
									$this->itemId = 271;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Wooden_Axe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									
									break;
								case 12:
									$this->itemName = "STONE AXE";
									$this->itemId = 275;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Stone_Axe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 13:
									$this->itemName = "IRON AXE";
									$this->itemId = 258;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Axe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 14:
									$this->itemName = "GOLDEN AXE";
									$this->itemId = 286;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Golden_Axe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 15:
									$this->itemName = "DIAMOND AXE";
									$this->itemId = 279;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Axe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								
								// HOE
								
								case 16:
									$this->itemName = "WOODEN HOE";
									$this->itemId = 290;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Wooden_Hoe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									
									break;
								case 17:
									$this->itemName = "STONE HOE";
									$this->itemId = 291;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Stone_Hoe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 18:
									$this->itemName = "IRON HOE";
									$this->itemId = 292;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Hoe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 19:
									$this->itemName = "GOLDEN HOE";
									$this->itemId = 294;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Golden_Hoe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								case 20:
									$this->itemName = "DIAMOND HOE";
									$this->itemId = 293;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Hoe");
									$this->recentShop = "toolsForm";
									$this->confirmBuy($sender);
									break;
								
							}
							
						});

						
					$money = EconomyAPI::getInstance()->myMoney($sender);	
					
					$form->setTitle("TOOLS");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton(TextFormat::BOLD . "§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					$form->addButton(TextFormat::BOLD . "WOODEN PICKAXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Wooden_Pickaxe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/b3/Wooden_Pickaxe.png");
					$form->addButton(TextFormat::BOLD . "STONE PICKAXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Stone_Pickaxe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/4/40/Stone_Pickaxe.png?version=b862335f58b9d4817e0fce89f2d2df6c");
					$form->addButton(TextFormat::BOLD . "IRON PICKAXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Pickaxe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a2/Iron_Pickaxe.png?version=d45e200883b89a8fcf7cf2719aeec1a4");
					$form->addButton(TextFormat::BOLD . "GOLDEN PICKAXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Golden_Pickaxe"), 1, "http://www.minecraftopia.com/images/blocks/gold_pickaxe.png");
					$form->addButton(TextFormat::BOLD . "DIAMOND PICKAXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Pickaxe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/5/54/Diamond_Pickaxe.png?version=412768df37c7bb2759040d586cdf80c5");
					
					$form->addButton(TextFormat::BOLD . "WOODEN SHOVEL | " . TextFormat::GOLD . "$" . $this->cfg->get("Wooden_Shovel"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a4/Wooden_Shovel.png");
					$form->addButton(TextFormat::BOLD . "STONE SHOVEL | " . TextFormat::GOLD . "$" . $this->cfg->get("Stone_Shovel"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/4/48/Stone_Shovel.png?version=01ccad7bcb1da91ab6a548cf1e8072fe");
					$form->addButton(TextFormat::BOLD . "IRON SHOVEL | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Shovel"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/i/r/ironshovel_icon32.png");
					$form->addButton(TextFormat::BOLD . "GOLDEN SHOVEL | " . TextFormat::GOLD . "$" . $this->cfg->get("Golden_Shovel"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/g/o/goldshovel_icon32.png");
					$form->addButton(TextFormat::BOLD . "DIAMOND SHOVEL | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Shovel"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/bf/Diamond_Shovel.png?version=79ee863276697d1d72eb108f69d066ad");
					
					$form->addButton(TextFormat::BOLD . "WOODEN AXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Wooden_Axe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/1/11/Wooden_Axe.png");
					$form->addButton(TextFormat::BOLD . "STONE AXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Stone_Axe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/2/2f/Stone_Axe.png?version=1473514098e3156daf298b6d03c8bab8");
					$form->addButton(TextFormat::BOLD . "IRON AXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Axe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/8/81/Iron_Axe.png?version=4e0416a53dc3e39e5dd61709e67aa097");
					$form->addButton(TextFormat::BOLD . "GOLDEN AXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Golden_Axe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/97/Golden_Axe.png?version=670b8bbf325457d378dc26a868bf1ec2");
					$form->addButton(TextFormat::BOLD . "DIAMOND AXE | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Axe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/e/e8/Diamond_Axe.png?version=dca9774a6c2a809235b81aca2d0f8fc2");
					
					$form->addButton(TextFormat::BOLD . "WOODEN HOE | " . TextFormat::GOLD . "$" . $this->cfg->get("Wooden_Hoe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/b7/Wooden_Hoe.png");
					$form->addButton(TextFormat::BOLD . "STONE HOE | " . TextFormat::GOLD . "$" . $this->cfg->get("Stone_Hoe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a3/Stone_Hoe.png?version=cf6d41a940dd2ac11f591a11759bb14c");
					$form->addButton(TextFormat::BOLD . "IRON HOE | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Hoe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/4/4d/Iron_Hoe.png?version=10d64f3283f4908a7370988f7f2aad9e");
					$form->addButton(TextFormat::BOLD . "GOLDEN HOE | " . TextFormat::GOLD . "$" . $this->cfg->get("Golden_Hoe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/4/42/Golden_Hoe.png?version=a21f359252a04b08bbaee8e650cb0454");
					$form->addButton(TextFormat::BOLD . "DIAMOND HOE | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Hoe"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/0/04/Diamond_Hoe.png?version=afee934404b552c05e7c90d32d089c2f");
					
					
					
					
					
					$form->sendToPlayer($sender);
	}
	
	public function blocksForm($sender){
		
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result === null){
						
						}
							switch($result){
								
								case 0:
									$command = "shop";
									$this->getServer()->getCommandMap()->dispatch($sender, $command);
									break;
								case 1:
									$this->itemName = "STONE";
									$this->itemId = 1;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Stone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 2:
									$this->itemName = "GRANITE";
									$this->itemId = 1;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Granite");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 3:
									$this->itemName = "Polished Granite";
									$this->itemId = 1;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Polished_Granite");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 4:
									$this->itemName = "Diorite";
									$this->itemId = 1;
									$this->itemMeta = 3;
									$this->paymentPrice = $this->cfg->get("Diorite");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 5:
									$this->itemName = "Polished Diorite";
									$this->itemId = 1;
									$this->itemMeta = 3;
									$this->paymentPrice = $this->cfg->get("Polished_Diorite");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								////////
								
								case 6:
									$this->itemName = "Andesite";
									$this->itemId = 1;
									$this->itemMeta = 5;
									$this->paymentPrice = $this->cfg->get("Andesite");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 7:
									$this->itemName = "Polished Andesite";
									$this->itemId = 1;
									$this->itemMeta = 6;
									$this->paymentPrice = $this->cfg->get("Polished_Andesite");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 8:
									$this->itemName = "Grass";
									$this->itemId = 2;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Grass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 9:
									$this->itemName = "Dirt";
									$this->itemId = 3;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Dirt");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 10:
									$this->itemName = "Coarse Dirt";
									$this->itemId = 3;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Coarse_Dirt");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								////////
									
								case 11:
									$this->itemName = "Podzol";
									$this->itemId = 3;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Podzol");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 12:
									$this->itemName = "Cobblestone";
									$this->itemId = 4;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Cobblestone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 13:
									$this->itemName = "Oak Wood Plank";
									$this->itemId = 5;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Oak_wood_plank");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 14:
									$this->itemName = "Spruce Wood Plank";
									$this->itemId = 5;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Spruce_wood_plank");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 15:
									$this->itemName = "Birch Wood Plank";
									$this->itemId = 5;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Birch_wood_plank");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								////////
									
								case 16:
									$this->itemName = "Jungle Wood Plank";
									$this->itemId = 5;
									$this->itemMeta = 3;
									$this->paymentPrice = $this->cfg->get("Jungle_wood_plank");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 17:
									$this->itemName = "Acacia Wood Plank";
									$this->itemId = 5;
									$this->itemMeta = 4;
									$this->paymentPrice = $this->cfg->get("Acacia_wood_plank");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 18:
									$this->itemName = "Dark Oak Wood Plank";
									$this->itemId = 5;
									$this->itemMeta = 5;
									$this->paymentPrice = $this->cfg->get("Darkoak_wood_plank");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 19:
									$this->itemName = "Bedrock";
									$this->itemId = 7;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Bedrock");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 20:
									$this->itemName = "Sand";
									$this->itemId = 12;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Sand");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								////////
									
								case 21:
									$this->itemName = "Red Sand";
									$this->itemId = 12;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Red_Sand");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 22:
									$this->itemName = "Gravel";
									$this->itemId = 13;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gravel");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 23:
									$this->itemName = "Gold Ore";
									$this->itemId = 14;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gold_Ore");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 24:
									$this->itemName = "Iron Ore";
									$this->itemId = 15;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Ore");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 25:
									$this->itemName = "Coal Ore";
									$this->itemId = 16;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Coal_Ore");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								////////
									
								case 26:
									$this->itemName = "Oak Wood";
									$this->itemId = 17;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Oak_Wood");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 27:
									$this->itemName = "Spruce Wood";
									$this->itemId = 17;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Spruce_Wood");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 28:
									$this->itemName = "Birch Wood";
									$this->itemId = 17;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Birch_Wood");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 29:
									$this->itemName = "Jungle Wood";
									$this->itemId = 17;
									$this->itemMeta = 3;
									$this->paymentPrice = $this->cfg->get("Jungle_Wood");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 30:
									$this->itemName = "Sponge";
									$this->itemId = 19;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Sponge");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								////////
									
								case 31:
									$this->itemName = "Glass";
									$this->itemId = 20;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 32:
									$this->itemName = "Lapis Lazuli Ore";
									$this->itemId = 21;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Lapis_Lazuli_Ore");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 33:
									$this->itemName = "Lapis Lazuli Block";
									$this->itemId = 22;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Lapis_Lazuli_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 34:
									$this->itemName = "Sandstone";
									$this->itemId = 24;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Sandstone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 35:
									$this->itemName = "Chiseled Sandstone";
									$this->itemId = 24;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Chiseled_Sandstone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;		
									
									
								////////
									
								case 36:
									$this->itemName = "Smooth Sandstone";
									$this->itemId = 24;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Smooth_Sandstone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 37:
									$this->itemName = "Note Block";
									$this->itemId = 25;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Note_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 38:
									$this->itemName = "White Wool";
									$this->itemId = 35;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("White_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 39:
									$this->itemName = "Orange Wool";
									$this->itemId = 35;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Orange_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 40:
									$this->itemName = "Magenta Wool";
									$this->itemId = 35;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Magenta_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								
								////////
									
								case 41:
									$this->itemName = "Light Blue Wool";
									$this->itemId = 35;
									$this->itemMeta = 3;
									$this->paymentPrice = $this->cfg->get("Light_Blue_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 42:
									$this->itemName = "Yellow Wool";
									$this->itemId = 35;
									$this->itemMeta = 4;
									$this->paymentPrice = $this->cfg->get("Yellow_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 43:
									$this->itemName = "Lime Wool";
									$this->itemId = 35;
									$this->itemMeta = 5;
									$this->paymentPrice = $this->cfg->get("Lime_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 44:
									$this->itemName = "Pink Wool";
									$this->itemId = 35;
									$this->itemMeta = 6;
									$this->paymentPrice = $this->cfg->get("Pink_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 45:
									$this->itemName = "Gray Wool";
									$this->itemId = 35;
									$this->itemMeta = 7;
									$this->paymentPrice = $this->cfg->get("Gray_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								////////
									
								case 46:
									$this->itemName = "Light Gray Wool";
									$this->itemId = 35;
									$this->itemMeta = 8;
									$this->paymentPrice = $this->cfg->get("Light_Gray_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 47:
									$this->itemName = "Cyan Wool";
									$this->itemId = 35;
									$this->itemMeta = 9;
									$this->paymentPrice = $this->cfg->get("Cyan_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 48:
									$this->itemName = "Purple Wool";
									$this->itemId = 35;
									$this->itemMeta = 10;
									$this->paymentPrice = $this->cfg->get("Purple_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 49:
									$this->itemName = "Blue Wool";
									$this->itemId = 35;
									$this->itemMeta = 11;
									$this->paymentPrice = $this->cfg->get("Blue_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 50:
									$this->itemName = "Brown Wool";
									$this->itemId = 35;
									$this->itemMeta = 12;
									$this->paymentPrice = $this->cfg->get("Brown_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								////////
									
								case 51:
									$this->itemName = "Green Wool";
									$this->itemId = 35;
									$this->itemMeta = 13;
									$this->paymentPrice = $this->cfg->get("Green_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 52:
									$this->itemName = "Red Wool";
									$this->itemId = 35;
									$this->itemMeta = 14;
									$this->paymentPrice = $this->cfg->get("Red_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 53:
									$this->itemName = "Black Wool";
									$this->itemId = 35;
									$this->itemMeta = 15;
									$this->paymentPrice = $this->cfg->get("Black_Wool");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 54:
									$this->itemName = "Gold Block";
									$this->itemId = 41;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gold_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 55:
									$this->itemName = "Iron Block";
									$this->itemId = 42;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Iron_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								////////
									
								case 56:
									$this->itemName = "Bricks";
									$this->itemId = 45;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Bricks");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 57:
									$this->itemName = "TNT";
									$this->itemId = 46;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("TNT");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 58:
									$this->itemName = "Bookshelf";
									$this->itemId = 47;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Bookshelf");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 59:
									$this->itemName = "Moss Stone";
									$this->itemId = 48;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Moss_Stone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 60:
									$this->itemName = "Obsidian";
									$this->itemId = 49;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Obsidian");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
									
								////////
									
								case 61:
									$this->itemName = "Chest";
									$this->itemId = 54;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Chest");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 62:
									$this->itemName = "Diamond Ore";
									$this->itemId = 56;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Ore");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 63:
									$this->itemName = "Diamond Block";
									$this->itemId = 57;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Diamond_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 64:
									$this->itemName = "Redstone Ore";
									$this->itemId = 73;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Redstone_Ore");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 65:
									$this->itemName = "Ice";
									$this->itemId = 79;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Ice");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
									
								////////
									
								case 66:
									$this->itemName = "Snow Block";
									$this->itemId = 80;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Snow_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	

								case 67:
									$this->itemName = "Pumpkin";
									$this->itemId = 86;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Pumpkin");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 68:
									$this->itemName = "Netherrack";
									$this->itemId = 87;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Netherrack");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 69:
									$this->itemName = "Soul Sand";
									$this->itemId = 88;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Soul_Sand");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 70:
									$this->itemName = "Glowstone";
									$this->itemId = 89;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Glowstone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								// Stained Glass
								
								case 71:
									$this->itemName = "White Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("White_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 72:
									$this->itemName = "Orange Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Orange_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 73:
									$this->itemName = "Magenta Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Magenta_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 74:
									$this->itemName = "Light Blue Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 3;
									$this->paymentPrice = $this->cfg->get("Light_Blue_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 75:
									$this->itemName = "Yellow Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 4;
									$this->paymentPrice = $this->cfg->get("Yellow_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 76:
									$this->itemName = "Lime Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 5;
									$this->paymentPrice = $this->cfg->get("Lime_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 77:
									$this->itemName = "Pink Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 6;
									$this->paymentPrice = $this->cfg->get("Pink_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 78:
									$this->itemName = "Gray Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 7;
									$this->paymentPrice = $this->cfg->get("Gray_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 79:
									$this->itemName = "Light Gray Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 8;
									$this->paymentPrice = $this->cfg->get("Light_Gray_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 80:
									$this->itemName = "Cyan Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 9;
									$this->paymentPrice = $this->cfg->get("Cyan_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 81:
									$this->itemName = "Purple Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 10;
									$this->paymentPrice = $this->cfg->get("Purple_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 82:
									$this->itemName = "Blue Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 11;
									$this->paymentPrice = $this->cfg->get("Blue_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 83:
									$this->itemName = "Brown Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 12;
									$this->paymentPrice = $this->cfg->get("Brown_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 84:
									$this->itemName = "Green Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 13;
									$this->paymentPrice = $this->cfg->get("Green_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 85:
									$this->itemName = "Red Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 14;
									$this->paymentPrice = $this->cfg->get("Red_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;

								case 86:
									$this->itemName = "Black Stained Glass";
									$this->itemId = 241;
									$this->itemMeta = 15;
									$this->paymentPrice = $this->cfg->get("Black_Stained_Glass");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								
								
								////////
								
								case 87:
									$this->itemName = "Nether Brick";
									$this->itemId = 112;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Nether_Brick");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								
								case 88:
									$this->itemName = "Enchantment Table";
									$this->itemId = 116;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Enchantment_Table");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 89:
									$this->itemName = "End Portal Frame";
									$this->itemId = 120;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("End_Portal_Frame");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 90:
									$this->itemName = "End Stone";
									$this->itemId = 121;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("End_Stone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								////////
								
								case 91:
									$this->itemName = "Emerald Ore";
									$this->itemId = 129;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Emerald_Ore");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 92:
									$this->itemName = "Ender Chest";
									$this->itemId = 130;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Ender_Chest");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 93:
									$this->itemName = "Emerald Block";
									$this->itemId = 133;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Emerald_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 94:
									$this->itemName = "Beacon";
									$this->itemId = 138;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Beacon");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 95:
									$this->itemName = "Redstone Block";
									$this->itemId = 152;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Redstone_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 95:
									$this->itemName = "Redstone Block";
									$this->itemId = 152;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Redstone_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 96:
									$this->itemName = "Quartz Block";
									$this->itemId = 155;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Quartz_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
									
								// CLAY
									
									
								case 97:
									$this->itemName = "White Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("White_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 98:
									$this->itemName = "Orange Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 1;
									$this->paymentPrice = $this->cfg->get("Orange_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 99:
									$this->itemName = "Magenta Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 2;
									$this->paymentPrice = $this->cfg->get("Magenta_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 100:
									$this->itemName = "Light Blue Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 3;
									$this->paymentPrice = $this->cfg->get("Light_Blue_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 101:
									$this->itemName = "Yellow Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 4;
									$this->paymentPrice = $this->cfg->get("Yellow_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 102:
									$this->itemName = "Lime Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 5;
									$this->paymentPrice = $this->cfg->get("Lime_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								
								case 103:
									$this->itemName = "Pink Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 6;
									$this->paymentPrice = $this->cfg->get("Pink_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 104:
									$this->itemName = "Gray Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 7;
									$this->paymentPrice = $this->cfg->get("Gray_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 105:
									$this->itemName = "Light Gray Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 8;
									$this->paymentPrice = $this->cfg->get("Light_Gray_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 106:
									$this->itemName = "Cyan Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 9;
									$this->paymentPrice = $this->cfg->get("Cyan_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 107:
									$this->itemName = "Purple Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 10;
									$this->paymentPrice = $this->cfg->get("Purple_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 108:
									$this->itemName = "Blue Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 11;
									$this->paymentPrice = $this->cfg->get("Blue_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 109:
									$this->itemName = "Brown Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 12;
									$this->paymentPrice = $this->cfg->get("Brown_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 110:
									$this->itemName = "Green Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 13;
									$this->paymentPrice = $this->cfg->get("Green_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 111:
									$this->itemName = "Red Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 14;
									$this->paymentPrice = $this->cfg->get("Red_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 112:
									$this->itemName = "Black Terracotta";
									$this->itemId = 159;
									$this->itemMeta = 15;
									$this->paymentPrice = $this->cfg->get("Black_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								
								////////
								
								case 113:
									$this->itemName = "Slime Block";
									$this->itemId = 165;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Slime_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 114:
									$this->itemName = "Prismarine";
									$this->itemId = 168;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Prismarine");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 115:
									$this->itemName = "Sea Lantern";
									$this->itemId = 169;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Sea_Lantern");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								
								case 116:
									$this->itemName = "Hay Bale";
									$this->itemId = 170;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Hay_Bale");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 117:
									$this->itemName = "Red Sandstone";
									$this->itemId = 179;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Red_Sandstone");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 118:
									$this->itemName = "Chorus Plant";
									$this->itemId = 199;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Chorus_Plant");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 119:
									$this->itemName = "Chorus Flower";
									$this->itemId = 200;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Chorus_Flower");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 120:
									$this->itemName = "Purpur Block";
									$this->itemId = 201;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Purpur_Block");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 121:
									$this->itemName = "White Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("White_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 122:
									$this->itemName = "Orange Glazed Terracotta";
									$this->itemId = 236;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Orange_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 123:
									$this->itemName = "Magenta Glazed Terracotta";
									$this->itemId = 237;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Magenta_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 124:
									$this->itemName = "Light Blue Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Light_Blue_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
									
								case 125:
									$this->itemName = "Yellow Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Yellow_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;	
								
								case 126:
									$this->itemName = "Lime Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Lime_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
								
								case 127:
									$this->itemName = "Pink Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Pink_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;

								case 128:
									$this->itemName = "Gray Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Gray_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 129:
									$this->itemName = "Light Gray Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Light_Gray_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 130:
									$this->itemName = "Cyan Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Cyan_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 131:
									$this->itemName = "Purple Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Purple_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 132:
									$this->itemName = "Blue Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Blue_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;
									
								case 133:
									$this->itemName = "Brown Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Brown_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;

								case 134:
									$this->itemName = "Green Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Green_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;

								case 135:
									$this->itemName = "Red Glazed Terracotta";
									$this->itemId = 235;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Red_Glazed_Terracotta");
									$this->recentShop = "blocksForm";
									$this->confirmBuy($sender);
									
									break;


								
							}
					
						});

						
					$money = EconomyAPI::getInstance()->myMoney($sender);	
						
					$form->setTitle("BLOCKS");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton(TextFormat::BOLD . "§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					
					$form->addButton(TextFormat::BOLD . "STONE | " . TextFormat::GOLD . "$" . $this->cfg->get("Stone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/d/d4/Stone.png?version=7ead9ea12bda450283f862be51a58cb3");
					$form->addButton(TextFormat::BOLD . "GRANITE | " . TextFormat::GOLD . "$" . $this->cfg->get("Granite"), 1, "http://www.minecraftopia.com/images/blocks/granite_block.png");
					$form->addButton(TextFormat::BOLD . "Polished Granite | " . TextFormat::GOLD . "$" . $this->cfg->get("Polished_Granite"), 1, "http://www.minecraftopia.com/images/blocks/polished_granite.png");
					$form->addButton(TextFormat::BOLD . "Diorite | " . TextFormat::GOLD . "$" . $this->cfg->get("Diorite"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/D/i/Diorite_4.png");
					$form->addButton(TextFormat::BOLD . "Polished Diorite | " . TextFormat::GOLD . "$" . $this->cfg->get("Polished_Diorite"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/P/o/Polished_Diorite_4.png");
					
					// 6 - 10
					$form->addButton(TextFormat::BOLD . "Andesite | " . TextFormat::GOLD . "$" . $this->cfg->get("Andesite"), 1, "https://vignette.wikia.nocookie.net/minecraft/images/c/ce/Andesite.png/revision/latest?cb=20150223125632");
					$form->addButton(TextFormat::BOLD . "Polished Andesite | " . TextFormat::GOLD . "$" . $this->cfg->get("Polished_Andesite"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/P/o/Polished_Andesite_4.png");
					$form->addButton(TextFormat::BOLD . "Grass | " . TextFormat::GOLD . "$" . $this->cfg->get("Grass"), 1, "http://assets.stickpng.com/thumbs/580b57fcd9996e24bc43c2f1.png");
					$form->addButton(TextFormat::BOLD . "Dirt | " . TextFormat::GOLD . "$" . $this->cfg->get("Dirt"), 1, "https://vignette.wikia.nocookie.net/biomesoplenty/images/6/63/Vanilla_Dirt.png/revision/latest?cb=20170616230032");
					$form->addButton(TextFormat::BOLD . "Coarse Dirt | " . TextFormat::GOLD . "$" . $this->cfg->get("Coarse_Dirt"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/be/Coarse_Dirt.png");
					
					// 11- 15
					$form->addButton(TextFormat::BOLD . "Podzol | " . TextFormat::GOLD . "$" . $this->cfg->get("Podzol"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/6/62/Podzol.png");
					$form->addButton(TextFormat::BOLD . "Cobblestone | " . TextFormat::GOLD . "$" . $this->cfg->get("Cobblestone"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/c/o/cobblestone_6.png");
					$form->addButton(TextFormat::BOLD . "Oak Wood Plank | " . TextFormat::GOLD . "$" . $this->cfg->get("Oak_wood_plank"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/0/0f/Oak_Wood_Planks.png");
					$form->addButton(TextFormat::BOLD . "Spruce Wood Plank | " . TextFormat::GOLD . "$" . $this->cfg->get("Spruce_wood_plank"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/8/82/Spruce_Wood_Planks.png?version=39ba60f54708d54438947e1a1ad61e71");
					$form->addButton(TextFormat::BOLD . "Birch Wood Plank | " . TextFormat::GOLD . "$" . $this->cfg->get("Birch_wood_plank"), 1, "http://www.minecraftopia.com/images/blocks/Birch_Wood_Planks.png");
					
					// 16 -20
					$form->addButton(TextFormat::BOLD . "Jungle Wood Plank | " . TextFormat::GOLD . "$" . $this->cfg->get("Jungle_wood_plank"), 1, "https://vignette.wikia.nocookie.net/minecraftpocketedition/images/5/5b/Jungle_Wood_Planks.png/revision/latest/fixed-aspect-ratio-down/width/320/height/320?cb=20140831094757&fill=transparent");	
					$form->addButton(TextFormat::BOLD . "Acacia Wood Plank | " . TextFormat::GOLD . "$" . $this->cfg->get("Acacia_wood_plank"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/f6/Acacia_Wood_Planks.png?version=eb67644d91340ea891ca2e1cb9c509c8");	
					$form->addButton(TextFormat::BOLD . "Dark Oak Wood Plank | " . TextFormat::GOLD . "$" . $this->cfg->get("Darkoak_wood_plank"), 1, "http://www.minecraftopia.com/images/blocks/Dark_Oak_Wood_Planks.png");	
					$form->addButton(TextFormat::BOLD . "Bedrock | " . TextFormat::GOLD . "$" . $this->cfg->get("Bedrock"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/e/ee/Bedrock.png");	
					$form->addButton(TextFormat::BOLD . "Sand | " . TextFormat::GOLD . "$" . $this->cfg->get("Sand"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a7/Sand.png");	
					
					// 21 - 25
					$form->addButton(TextFormat::BOLD . "Red Sand | " . TextFormat::GOLD . "$" . $this->cfg->get("Red_Sand"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/f4/Red_Sand.png?version=10ae65cd4ff5b38628614093d5622e29");	
					$form->addButton(TextFormat::BOLD . "Gravel | " . TextFormat::GOLD . "$" . $this->cfg->get("Gravel"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/9a/Gravel.png");	
					$form->addButton(TextFormat::BOLD . "Gold Ore | " . TextFormat::GOLD . "$" . $this->cfg->get("Gold_Ore"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/f7/Gold_Ore.png");	
					$form->addButton(TextFormat::BOLD . "Iron Ore | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Ore"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/8/87/Iron_Ore.png");	
					$form->addButton(TextFormat::BOLD . "Coal Ore | " . TextFormat::GOLD . "$" . $this->cfg->get("Coal_Ore"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/fe/Coal_Ore.png");	
					
					// 26 - 30
					$form->addButton(TextFormat::BOLD . "Oak Wood | " . TextFormat::GOLD . "$" . $this->cfg->get("Oak_Wood"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/9c/Oak_Wood.png");
					$form->addButton(TextFormat::BOLD . "Spruce Wood | " . TextFormat::GOLD . "$" . $this->cfg->get("Spruce_Wood"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/e/ec/Spruce_Wood.png?version=b66440c7647323087c0bb590c107f5ea");	
					$form->addButton(TextFormat::BOLD . "Birch Wood | " . TextFormat::GOLD . "$" . $this->cfg->get("Birch_Wood"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/e/e3/Birch_Wood.png?version=cfe34cf1d5ff1334b9341d1417f6fa6a");	
					$form->addButton(TextFormat::BOLD . "Jungle Wood | " . TextFormat::GOLD . "$" . $this->cfg->get("Jungle_Wood"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/5/56/Jungle_Wood.png?version=9fe74ee7a5782ddfd36f8ecf7ea6142b");	
					$form->addButton(TextFormat::BOLD . "Sponge | " . TextFormat::GOLD . "$" . $this->cfg->get("Sponge"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a0/Sponge.png");	
					
					// 31 - 35
					$form->addButton(TextFormat::BOLD . "Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/1/15/Glass.png");	
					$form->addButton(TextFormat::BOLD . "Lapis Lazuli Ore | " . TextFormat::GOLD . "$" . $this->cfg->get("Lapis_Lazuli_Ore"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/c/c3/Lapis_Lazuli_Ore.png");	
					$form->addButton(TextFormat::BOLD . "Lapis Lazuli Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Lapis_Lazuli_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/b1/Lapis_Lazuli_Block.png");	
					$form->addButton(TextFormat::BOLD . "Sandstone | " . TextFormat::GOLD . "$" . $this->cfg->get("Sandstone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/d/d6/Sandstone.png");	
					$form->addButton(TextFormat::BOLD . "Chiseled Sandstone | " . TextFormat::GOLD . "$" . $this->cfg->get("Chiseled_Sandstone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/7/71/Chiseled_Sandstone.png?version=3c57400e5dac1fdaa9b0a2e1559dd14b");	
					
					// 36 - 40
					$form->addButton(TextFormat::BOLD . "Smooth Sandstone | " . TextFormat::GOLD . "$" . $this->cfg->get("Smooth_Sandstone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/3/3c/Smooth_Sandstone.png?version=c900030ec112fac9a141d41997fed223");	
					$form->addButton(TextFormat::BOLD . "Note Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Note_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/9b/Note_Block.png");	
					$form->addButton(TextFormat::BOLD . "White Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("White_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/0/07/White_Wool.png");	
					$form->addButton(TextFormat::BOLD . "Orange Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Orange_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/9/9b/Orange_Wool.png/150px-Orange_Wool.png?version=92f7ce12a1cd92750ea02b4ce858977a");	
					$form->addButton(TextFormat::BOLD . "Magenta Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Magenta_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/3/33/Magenta_Wool.png/150px-Magenta_Wool.png?version=dd57e1e853e4e854dc97640d67e8c5c1");	
					
					// 41 - 45
					$form->addButton(TextFormat::BOLD . "Light Blue Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Blue_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/b/b7/Light_Blue_Wool.png/150px-Light_Blue_Wool.png?version=d8f7c9d5ca7f241ffb15c004fe5bfbba");	
					$form->addButton(TextFormat::BOLD . "Yellow Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Yellow_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/1/18/Yellow_Wool.png/150px-Yellow_Wool.png?version=9f7a8309084606efe3e32b6ef750bc38");	
					$form->addButton(TextFormat::BOLD . "Lime Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Lime_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/3/30/Lime_Wool.png/150px-Lime_Wool.png?version=d21243dc7bf22613b8c899466a42cf92");	
					$form->addButton(TextFormat::BOLD . "Pink Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Pink_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/b/b6/Pink_Wool.png/150px-Pink_Wool.png?version=8d1b1ac9df18342a4737cee5cef47524");	
					$form->addButton(TextFormat::BOLD . "Gray Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Gray_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/1/1c/Gray_Wool.png/150px-Gray_Wool.png?version=49ba85f251a576d97fa38e89d7af57c9");	
					
					// 46 - 50
					$form->addButton(TextFormat::BOLD . "Light Gray Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Gray_Wool"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/200x/6cffa5908a86143a54dc6ad9b8a7c38e/w/o/wool.gif");	
					$form->addButton(TextFormat::BOLD . "Cyan Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Cyan_Wool"), 1, "https://minecraft-zh.gamepedia.com/media/minecraft-zh.gamepedia.com/archive/c/cf/20170210134209%21Cyan_Wool.png");	
					$form->addButton(TextFormat::BOLD . "Purple Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Purple_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/8/83/Purple_Wool.png/150px-Purple_Wool.png?version=33d2dda59d3e55a3d294c1435b0004e9");	
					$form->addButton(TextFormat::BOLD . "Blue Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Blue_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/c/ce/Blue_Wool.png/150px-Blue_Wool.png?version=2ba1e6c36727e579e53f455e3ac32130");	
					$form->addButton(TextFormat::BOLD . "Brown Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Brown_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/d/db/Brown_Wool.png/150px-Brown_Wool.png?version=1eb8acbbb9d46262885ccd6aab6fd5ac");	
					
					// 51 - 55
					$form->addButton(TextFormat::BOLD . "Green Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Green_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/7/71/Green_Wool.png/150px-Green_Wool.png?version=76a929edb87af10c66894eb0901683b7");	
					$form->addButton(TextFormat::BOLD . "Red Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Red_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/7/70/Red_Wool.png/150px-Red_Wool.png?version=55a121b62c84d71c3618668c59815964");	
					$form->addButton(TextFormat::BOLD . "Black Wool | " . TextFormat::GOLD . "$" . $this->cfg->get("Black_Wool"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/0/05/Black_Wool.png/150px-Black_Wool.png?version=b13bf7b299f2bd900fc5f6b226ea68c9");	
					$form->addButton(TextFormat::BOLD . "Gold Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Gold_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/5/5d/Block_of_Gold.png");	
					$form->addButton(TextFormat::BOLD . "Iron Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/8/86/Block_of_Iron.png");	
					
					// 56 - 60
					$form->addButton(TextFormat::BOLD . "Bricks | " . TextFormat::GOLD . "$" . $this->cfg->get("Bricks"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/ff/Bricks.png");	
					$form->addButton(TextFormat::BOLD . "TNT | " . TextFormat::GOLD . "$" . $this->cfg->get("TNT"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/1/1e/TNT.png");	
					$form->addButton(TextFormat::BOLD . "Bookshelf | " . TextFormat::GOLD . "$" . $this->cfg->get("Bookshelf"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/f7/Bookshelf.png");	
					$form->addButton(TextFormat::BOLD . "Moss Stone | " . TextFormat::GOLD . "$" . $this->cfg->get("Moss_Stone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/1/12/Moss_Stone.png");	
					$form->addButton(TextFormat::BOLD . "Obsidian | " . TextFormat::GOLD . "$" . $this->cfg->get("Obsidian"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/2/23/Obsidian.png");	
					
					// 61 - 65
					$form->addButton(TextFormat::BOLD . "Chest | " . TextFormat::GOLD . "$" . $this->cfg->get("Chest"), 1, "http://www.minecraftopia.com/images/blocks/trapped_chest.png");	
					$form->addButton(TextFormat::BOLD . "Diamond Ore | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Ore"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/97/Diamond_Ore.png");	
					$form->addButton(TextFormat::BOLD . "Diamond Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Diamond_Block"), 1, "https://vignette.wikia.nocookie.net/minecraft/images/4/40/Block_of_Diamond.png/revision/latest?cb=20111018170718");	
					$form->addButton(TextFormat::BOLD . "Redstone Ore | " . TextFormat::GOLD . "$" . $this->cfg->get("Redstone_Ore"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/5/56/Redstone_Ore.png");	
					$form->addButton(TextFormat::BOLD . "Ice | " . TextFormat::GOLD . "$" . $this->cfg->get("Ice"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/7/77/Ice.png");	
					
					// 66 - 70
					$form->addButton(TextFormat::BOLD . "Snow Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Snow_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/2/21/Snow_%28Block%29.png");	
					$form->addButton(TextFormat::BOLD . "Pumpkin | " . TextFormat::GOLD . "$" . $this->cfg->get("Pumpkin"), 1, "https://vignette.wikia.nocookie.net/minecraft/images/6/64/Pumpkin.png/revision/latest?cb=20111018005655");	
					$form->addButton(TextFormat::BOLD . "Netherrack | " . TextFormat::GOLD . "$" . $this->cfg->get("Netherrack"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/7/72/Netherrack.png");	
					$form->addButton(TextFormat::BOLD . "Soul Sand | " . TextFormat::GOLD . "$" . $this->cfg->get("Soul_Sand"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a7/Soul_Sand.png");	
					$form->addButton(TextFormat::BOLD . "Glowstone | " . TextFormat::GOLD . "$" . $this->cfg->get("Glowstone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/91/Glowstone.png");	
					
					// 71 - 86
					
					$form->addButton(TextFormat::BOLD . "White Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("White_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/e/e0/White_Stained_Glass.png?version=5d5bd9faf15ab3491544b35dfbfb6e10");	
					$form->addButton(TextFormat::BOLD . "Orange Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Orange_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/1/13/Orange_Stained_Glass.png?version=1e003cda829ca10747261c9739623222");	
					$form->addButton(TextFormat::BOLD . "Magenta Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Magenta_Stained_Glass"), 1, "http://fr-minecraft.net/img/blocs/095_02.png");	
					$form->addButton(TextFormat::BOLD . "Light Blue Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Blue_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/4/40/Light_Blue_Stained_Glass.png?version=f7ca495bce4b6e3e47b0c4abfc1fc388");	
					$form->addButton(TextFormat::BOLD . "Yellow Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Yellow_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/bd/Yellow_Stained_Glass.png?version=265016a924c68137edadae856150136d");	
					$form->addButton(TextFormat::BOLD . "Lime Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Lime_Stained_Glass"), 1, "http://minecraft.tools/en/img/blocs/095_05.png");	
					$form->addButton(TextFormat::BOLD . "Pink Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Pink_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/ac/Pink_Stained_Glass.png?version=3a325c31f7403e8f6d386dbc9094c6d9");	
					$form->addButton(TextFormat::BOLD . "Gray Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Gray_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/d/d1/Gray_Stained_Glass.png?version=e17485b6db82c29c610e2f9113634c00");	
					$form->addButton(TextFormat::BOLD . "Light Gray Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Gray_Stained_Glass"), 1, "http://www.bgs.ac.uk/discoveringGeology/geologyOfBritain/minecraft/images/Light_Gray_Stained_Glass.png");	
					$form->addButton(TextFormat::BOLD . "Cyan Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Cyan_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/5/51/Cyan_Stained_Glass.png?version=f33d880e5d01a3298db05bd382963437");	
					$form->addButton(TextFormat::BOLD . "Purple Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Purple_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/b1/Purple_Stained_Glass.png?version=07526d9ec55c6ece521159454fd6d12b");	
					$form->addButton(TextFormat::BOLD . "Blue Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Blue_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/4/40/Blue_Stained_Glass.png?version=4c9ff3758bc70299732cb8abcc91ec3b");	
					$form->addButton(TextFormat::BOLD . "Brown Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Brown_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/7/7c/Brown_Stained_Glass.png?version=37f5aad2fa6daab6b3702cd04641931c");	
					$form->addButton(TextFormat::BOLD . "Green Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Green_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/2/24/Green_Stained_Glass.png?version=d100aac098fe09da2365357d0031f800");	
					$form->addButton(TextFormat::BOLD . "Red Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Red_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/8/8e/Red_Stained_Glass.png?version=4793b1ef8fe0234a4493ea5cd8aabcd0");	
					$form->addButton(TextFormat::BOLD . "Black Stained Glass | " . TextFormat::GOLD . "$" . $this->cfg->get("Black_Stained_Glass"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/0/0f/Black_Stained_Glass.png?version=47b6fb0ba999c54865cf2eefcd3b652e");	
					
					// 87 - 90
					$form->addButton(TextFormat::BOLD . "Nether Brick | " . TextFormat::GOLD . "$" . $this->cfg->get("Nether_Brick"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/6/62/Nether_Brick.png");	
					$form->addButton(TextFormat::BOLD . "Enchantment Table | " . TextFormat::GOLD . "$" . $this->cfg->get("Enchantment_Table"), 1, "https://vignette.wikia.nocookie.net/minecraft/images/c/ca/Enchantment_Table.png/revision/latest?cb=20111012173932");	
					$form->addButton(TextFormat::BOLD . "End Portal Frame | " . TextFormat::GOLD . "$" . $this->cfg->get("End_Portal_Frame"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/5/56/End_Portal_Frame.png");	
					$form->addButton(TextFormat::BOLD . "End Stone | " . TextFormat::GOLD . "$" . $this->cfg->get("End_Stone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/0/06/End_Stone.png");	
					
					// 91 - 96
					$form->addButton(TextFormat::BOLD . "Emerald Ore | " . TextFormat::GOLD . "$" . $this->cfg->get("Emerald_Ore"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/9f/Emerald_Ore.png");	
					$form->addButton(TextFormat::BOLD . "Ender Chest | " . TextFormat::GOLD . "$" . $this->cfg->get("Ender_Chest"), 1, "http://www.minecraftopia.com/images/blocks/ender_chest.png");	
					$form->addButton(TextFormat::BOLD . "Emerald Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Emerald_Block"), 1, "http://www.minecraftopia.com/images/blocks/emerald_block.png");	
					$form->addButton(TextFormat::BOLD . "Beacon | " . TextFormat::GOLD . "$" . $this->cfg->get("Beacon"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/b3/Beacon.png");	
					$form->addButton(TextFormat::BOLD . "Redstone Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Redstone_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/9d/Block_of_Redstone.png");	
					$form->addButton(TextFormat::BOLD . "Quartz Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Quartz_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/ba/Block_of_Quartz.png");	
					
					// 97 - 112
					$form->addButton(TextFormat::BOLD . "White Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("White_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/d/d3/White_Concrete.png");	
					$form->addButton(TextFormat::BOLD . "Orange Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Orange_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/0/07/Orange_Concrete.png/150px-Orange_Concrete.png?version=0db57cd8b1a65b2e225a6919e897c899");	
					$form->addButton(TextFormat::BOLD . "Magenta Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Magenta_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/3/31/Magenta_Concrete.png/150px-Magenta_Concrete.png?version=77e4bc5de6875e124a5716b388978b8c");	
					$form->addButton(TextFormat::BOLD . "light Blue Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Blue_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/6/60/Light_Blue_Concrete.png/150px-Light_Blue_Concrete.png?version=30360b63be67f5bcd5e273d8f73f1c9d");	
					$form->addButton(TextFormat::BOLD . "Yellow Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Yellow_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/8/8b/Yellow_Concrete.png/150px-Yellow_Concrete.png?version=8a71d17618df0e53d250b55b56d9ad31");	
					$form->addButton(TextFormat::BOLD . "Lime Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Lime_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/4/4d/Lime_Concrete.png/150px-Lime_Concrete.png?version=a4c67e0b7afeead4a73b315205721d9f");	
					$form->addButton(TextFormat::BOLD . "Pink Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Pink_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/4/46/Pink_Concrete.png/150px-Pink_Concrete.png?version=1502cc29d4e7ce83b13baad640ffd2a8");	
					$form->addButton(TextFormat::BOLD . "Gray Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Gray_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/4/40/Gray_Concrete.png/150px-Gray_Concrete.png?version=41f885e3b34d96596dad3a3f70fab9f5");	
					$form->addButton(TextFormat::BOLD . "Light Gray Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Gray_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/c/c8/Light_Gray_Concrete.png?version=324c49bb18d1f62f004fa702331081ea");	
					$form->addButton(TextFormat::BOLD . "Cyan Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Cyan_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/8/8d/Cyan_Concrete.png/150px-Cyan_Concrete.png?version=d0cb14ae099eb92504da713089adda57");	
					$form->addButton(TextFormat::BOLD . "Purple Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Purple_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/a/a1/Purple_Concrete.png?version=fdd945b2fc6b3faa0e149fe151c30e61");	
					$form->addButton(TextFormat::BOLD . "Blue Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Blue_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/9/99/Blue_Concrete.png/150px-Blue_Concrete.png?version=cfcfe04975af1c9af812d7deec60c9d8");	
					$form->addButton(TextFormat::BOLD . "Brown Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Brown_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/7/76/Brown_Concrete.png/150px-Brown_Concrete.png?version=88eec05bfa3e1a86ae6de22ff83d6d88");	
					$form->addButton(TextFormat::BOLD . "Green Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Green_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/a/a2/Green_Concrete.png/150px-Green_Concrete.png?version=f6b25683fb9f80f45bf4e290524c708c");	
					$form->addButton(TextFormat::BOLD . "Red Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Red_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/3/37/Red_Concrete.png/150px-Red_Concrete.png?version=d13e4368e8d411d8dac1e4283ec56b39");	
					$form->addButton(TextFormat::BOLD . "Black Terracotta | " . TextFormat::GOLD . "$" . $this->cfg->get("Black_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/d/d8/Black_Concrete.png/150px-Black_Concrete.png?version=cf0b7a7dc00129383890b774a2f8e00d");	
					
					// 113 - 119
					$form->addButton(TextFormat::BOLD . "Slime Block | " . TextFormat::GOLD . "$" . $this->cfg->get("Slime_Block"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/7/72/Slime_Block.png");	
					$form->addButton(TextFormat::BOLD . "Prismarine | " . TextFormat::GOLD . "$" . $this->cfg->get("Prismarine"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/9/99/Dark_Prismarine.png?version=1362b6735cace6cc327a7b5b2569badf");	
					$form->addButton(TextFormat::BOLD . "Sea Lantern | " . TextFormat::GOLD . "$" . $this->cfg->get("Sea_Lantern"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/0/07/Sea_Lantern.gif");	
					$form->addButton(TextFormat::BOLD . "Hay Bale | " . TextFormat::GOLD . "$" . $this->cfg->get("Hay_Bale"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/b/b9/Hay_Bale.png");	
					$form->addButton(TextFormat::BOLD . "Red Sandstone | " . TextFormat::GOLD . "$" . $this->cfg->get("Red_Sandstone"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/f/fc/Red_Sandstone.png?version=1ad62ba7d17365c6d09f87fac94896d9");	
					$form->addButton(TextFormat::BOLD . "Chorus Plant | " . TextFormat::GOLD . "$" . $this->cfg->get("Chorus_Plant"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/1/1f/Chorus_Plant.png");	
					$form->addButton(TextFormat::BOLD . "Chorus Flower | " . TextFormat::GOLD . "$" . $this->cfg->get("Chorus_Flower"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/7/73/Chorus_Flower.png");	
					
					//
					$form->addButton(TextFormat::BOLD . "White Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("White_Glazed_Terracotta"), 1, "https://minecraft-pl.gamepedia.com/media/minecraft-pl.gamepedia.com/7/76/Bia%C5%82a_glazurowana_terakota.png?version=3266f7bfa7fda8d63dd16d3c9ffd725e");	
					$form->addButton(TextFormat::BOLD . "Orange Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Orange_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/0/00/Orange_Glazed_Terracotta.png/150px-Orange_Glazed_Terracotta.png?version=d7d069b1f96c8acf3d65fdfa838ded70");	
					$form->addButton(TextFormat::BOLD . "Magenta Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Magenta_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/6/62/Magenta_Glazed_Terracotta.png/150px-Magenta_Glazed_Terracotta.png?version=e69b9f515a1ef2a4de783d2fb3bd0ab0");	
					$form->addButton(TextFormat::BOLD . "Light Blue Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Blue_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/4/4b/Light_Blue_Glazed_Terracotta.png/150px-Light_Blue_Glazed_Terracotta.png?version=18f8586694950fd457f72a06ff07f134");	
					$form->addButton(TextFormat::BOLD . "Yellow Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Yellow_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/2/29/Yellow_Glazed_Terracotta.png/150px-Yellow_Glazed_Terracotta.png?version=0f6ac7b4b8d00ea8242b68c7faa0285d");	
					$form->addButton(TextFormat::BOLD . "Lime Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Lime_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/2/22/Lime_Glazed_Terracotta.png/150px-Lime_Glazed_Terracotta.png?version=3e4ae59ee9736603ebeb9a0b1dd1d9c0");	
					$form->addButton(TextFormat::BOLD . "Pink Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Pink_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/d/d3/Pink_Glazed_Terracotta.png/150px-Pink_Glazed_Terracotta.png?version=d9036143590081880f5f6cd5df7d412b");	
					$form->addButton(TextFormat::BOLD . "Gray Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Gray_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/c/c0/Gray_Glazed_Terracotta.png/150px-Gray_Glazed_Terracotta.png?version=12d005f661618f7c7882413c27476634");	
					$form->addButton(TextFormat::BOLD . "Light Gray Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Light_Gray_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/8/8e/Light_Gray_Glazed_Terracotta.png/150px-Light_Gray_Glazed_Terracotta.png?version=23b44ca43831a62e9ac13ee5e2eb8484");	
					$form->addButton(TextFormat::BOLD . "Cyan Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Cyan_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/6/6c/Cyan_Glazed_Terracotta.png/150px-Cyan_Glazed_Terracotta.png?version=04674163222846e739b5f59aa306d2f1");	
					$form->addButton(TextFormat::BOLD . "Purple Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Purple_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/e/e0/Purple_Glazed_Terracotta.png/150px-Purple_Glazed_Terracotta.png?version=0d6f213f058b595128464f9c75035a7e");	
					$form->addButton(TextFormat::BOLD . "Blue Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Blue_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/4/4c/Blue_Glazed_Terracotta.png/150px-Blue_Glazed_Terracotta.png?version=f06488d34d4e714e664c4f13398e7fb6");	
					$form->addButton(TextFormat::BOLD . "Brown Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Brown_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/8/88/Brown_Glazed_Terracotta.png/150px-Brown_Glazed_Terracotta.png?version=a087d02f02443114f240e1eb18fe4844");	
					$form->addButton(TextFormat::BOLD . "Green Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Green_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/3/38/Green_Glazed_Terracotta.png/150px-Green_Glazed_Terracotta.png?version=7d46bd2a8aef31718a971ac4843bd551");	
					$form->addButton(TextFormat::BOLD . "Red Glazed | " . TextFormat::GOLD . "$" . $this->cfg->get("Red_Glazed_Terracotta"), 1, "https://minecraft.gamepedia.com/media/minecraft.gamepedia.com/thumb/a/aa/Red_Glazed_Terracotta.png/150px-Red_Glazed_Terracotta.png?version=8f4ccf2c5257e8f38e518460db8f0c16");					
					
					
					
					
					
					
					
					$form->sendToPlayer($sender);
		
	}
	
	public function foodsForm($sender){
		
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result === null){
						
						}
							switch($result){
								
								case 0:
									$command = "shop";
									$this->getServer()->getCommandMap()->dispatch($sender, $command);
									break;
								case 1:
									$this->itemName = "Apple";
									$this->itemId = 260;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Apple");
									$this->recentShop = "foodsForm";
									$this->confirmBuy($sender);
									break;
									
								case 2:
									$this->itemName = "Enchanted Apple";
									$this->itemId = 466;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Enchanted_Apple");
									$this->recentShop = "foodsForm";
									$this->confirmBuy($sender);
									break;
									
								case 3:
									$this->itemName = "Golden Apple";
									$this->itemId = 322;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Golden_Apple");
									$this->recentShop = "foodsForm";
									$this->confirmBuy($sender);
									break;
									
									
								case 4:
									$this->itemName = "Pork Chop";
									$this->itemId = 319;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Pork_Chop");
									$this->recentShop = "foodsForm";
									$this->confirmBuy($sender);
									break;
									
								case 5:
									$this->itemName = "Steak";
									$this->itemId = 364;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Steak");
									$this->recentShop = "foodsForm";
									$this->confirmBuy($sender);
									break;

                     									
							}
					
						});

						
					$money = EconomyAPI::getInstance()->myMoney($sender);	
						
					$form->setTitle("FOODS");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton(TextFormat::BOLD . "§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					
					$form->addButton(TextFormat::BOLD . "Apple | " . TextFormat::GOLD . "$" . $this->cfg->get("Apple"), 1, "https://vignette.wikia.nocookie.net/minecraftpocketedition/images/7/7d/Apple.png/revision/latest?cb=20130227183426");
					$form->addButton(TextFormat::BOLD . "Enchanted Apple | " . TextFormat::GOLD . "$" . $this->cfg->get("Enchanted_Apple"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/3/2/322_1.png");
					$form->addButton(TextFormat::BOLD . "Golden Apple | " . TextFormat::GOLD . "$" . $this->cfg->get("Golden_Apple"), 1, "https://lh6.googleusercontent.com/proxy/G_qNYVSDCCYsghztD4qPGsiGaFh2y1n9xVHerSDKTYu78UOAIAiTDo_v_6t87Hmv4ibBe_2J9MjywfPEjsNgnkPMTUyc1LIvVKaCBPj20WZHRw9EohT1USgxtEq4a29IaU8N1s7an6qHX96o3kFPUtDGbeKZJ8MoX6zEUwsjvp5SYZuRti3rrGPmg1hAYxlgTA=w150-h150-nc");
					$form->addButton(TextFormat::BOLD . "Pork Chop | " . TextFormat::GOLD . "$" . $this->cfg->get("Pork_Chop"), 1, "https://lh3.googleusercontent.com/qFkUJOy-_8rBCtltsz40uag9wYxQxS8F42G0_xIgT27PQzi6QUFSzSdZ1YDiNGfKBILs_c3W8Zd1WwVR87B12g=s400");
					$form->addButton(TextFormat::BOLD . "Steak | " . TextFormat::GOLD . "$" . $this->cfg->get("Steak"), 1, "http://www.minecraftopia.com/images/blocks/steak.png");					
					

					

					$form->sendToPlayer($sender);
		
	}
	
	public function spawnersForm($sender){
		
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result === null){
						
						}
							switch($result){
								
								case 0:
									$command = "shop";
									$this->getServer()->getCommandMap()->dispatch($sender, $command);
									break;
								case 1:
									$this->itemName = "Spawner";
									$this->itemId = 52;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Spawner");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 2:
									$this->itemName = "Zombie";
									$this->itemId = 383;
									$this->itemMeta = 32;
									$this->paymentPrice = $this->cfg->get("Zombie");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 3:
									$this->itemName = "Chicken";
									$this->itemId = 383;
									$this->itemMeta = 10;
									$this->paymentPrice = $this->cfg->get("Chicken");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
									
								case 4:
									$this->itemName = "Cow";
									$this->itemId = 383;
									$this->itemMeta = 11;
									$this->paymentPrice = $this->cfg->get("Cow");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 5:
									$this->itemName = "Pig";
									$this->itemId = 383;
									$this->itemMeta = 12;
									$this->paymentPrice = $this->cfg->get("Pig");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 6:
									$this->itemName = "Sheep";
									$this->itemId = 383;
									$this->itemMeta = 13;
									$this->paymentPrice = $this->cfg->get("Sheep");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 7:
									$this->itemName = "Wolf";
									$this->itemId = 383;
									$this->itemMeta = 14;
									$this->paymentPrice = $this->cfg->get("Wolf");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 8:
									$this->itemName = "Iron Golem";
									$this->itemId = 383;
									$this->itemMeta = 20;
									$this->paymentPrice = $this->cfg->get("Iron_Golem");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 9:
									$this->itemName = "Blaze";
									$this->itemId = 383;
									$this->itemMeta = 43;
									$this->paymentPrice = $this->cfg->get("Blaze");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 10:
									$this->itemName = "Skeleton";
									$this->itemId = 383;
									$this->itemMeta = 34;
									$this->paymentPrice = $this->cfg->get("Skeleton");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 11:
									$this->itemName = "Spider";
									$this->itemId = 383;
									$this->itemMeta = 35;
									$this->paymentPrice = $this->cfg->get("Spider");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 12:
									$this->itemName = "Husk";
									$this->itemId = 383;
									$this->itemMeta = 47;
									$this->paymentPrice = $this->cfg->get("Husk");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 13:
									$this->itemName = "Zombie Pigman";
									$this->itemId = 383;
									$this->itemMeta = 36;
									$this->paymentPrice = $this->cfg->get("Zombie_Pigman");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									
								case 14:
									$this->itemName = "Slime";
									$this->itemId = 383;
									$this->itemMeta = 37;
									$this->paymentPrice = $this->cfg->get("Slime");
									$this->recentShop = "spawnersForm";
									$this->confirmBuy($sender);
									break;
									

                     									
							}
					
						});

						
					$money = EconomyAPI::getInstance()->myMoney($sender);	
						
					$form->setTitle("SPAWNERS");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton(TextFormat::BOLD . "§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					
					$form->addButton(TextFormat::BOLD . "Spawner | " . TextFormat::GOLD . "$" . $this->cfg->get("Spawner"), 1, "https://d1u5p3l4wpay3k.cloudfront.net/minecraft_gamepedia/f/f9/Monster_Spawner.gif?version=78ea897599d84ba006f6fd05b908b7a5");
					$form->addButton(TextFormat::BOLD . "Zombie | " . TextFormat::GOLD . "$" . $this->cfg->get("Zombie"), 1, "https://vignette.wikia.nocookie.net/minecraftpocketedition/images/1/15/Spawn_zombie.gif/revision/latest?cb=20150518135802");
					$form->addButton(TextFormat::BOLD . "Chicken | " . TextFormat::GOLD . "$" . $this->cfg->get("Chicken"), 1, "https://static.planetminecraft.com/files/resource_media/screenshot/1617/spawneggchicken_icon3210100687_lrg.png");
					$form->addButton(TextFormat::BOLD . "Cow | " . TextFormat::GOLD . "$" . $this->cfg->get("Cow"), 1, "http://piq.codeus.net/static/media/userpics/piq_82774_400x400.png");
					$form->addButton(TextFormat::BOLD . "Pig | " . TextFormat::GOLD . "$" . $this->cfg->get("Pig"), 1, "http://piq.codeus.net/static/media/userpics/piq_82774_400x400.png");					
					$form->addButton(TextFormat::BOLD . "Sheep | " . TextFormat::GOLD . "$" . $this->cfg->get("Sheep"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/2/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/s/p/spawneggsheep_icon32_1.png");				
                                       $form->addButton(TextFormat::BOLD . "Wolf | " . TextFormat::GOLD . "$" . $this->cfg->get("Wolf"), 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/s/p/spawneggwolf_icon32.png");					
					$form->addButton(TextFormat::BOLD . "Iron Golem | " . TextFormat::GOLD . "$" . $this->cfg->get("Iron_Golem"), 1, "http://www.rextechs.net/wp-content/uploads/2017/01/IG_spawn_egg.png");					
					$form->addButton(TextFormat::BOLD . "Blaze | " . TextFormat::GOLD . "$" . $this->cfg->get("Blaze"), 1, "https://vignette.wikia.nocookie.net/minecraftpocketedition/images/3/3e/Blazer.png/revision/latest?cb=20150411115245");					
					$form->addButton(TextFormat::BOLD . "Skeleton | " . TextFormat::GOLD . "$" . $this->cfg->get("Skeleton"), 1, "http://piq.codeus.net/static/media/userpics/piq_82774_400x400.png");					
					$form->addButton(TextFormat::BOLD . "Spider | " . TextFormat::GOLD . "$" . $this->cfg->get("Spider"), 1, "http://piq.codeus.net/static/media/userpics/piq_82774_400x400.png");					
					$form->addButton(TextFormat::BOLD . "Husk | " . TextFormat::GOLD . "$" . $this->cfg->get("Husk"), 1, "http://piq.codeus.net/static/media/userpics/piq_82774_400x400.png");					
					$form->addButton(TextFormat::BOLD . "Zombie Pigman | " . TextFormat::GOLD . "$" . $this->cfg->get("Zombie_Pigman"), 1, "http://piq.codeus.net/static/media/userpics/piq_82774_400x400.png");					
					$form->addButton(TextFormat::BOLD . "Slime | " . TextFormat::GOLD . "$" . $this->cfg->get("Slime"), 1, "http://piq.codeus.net/static/media/userpics/piq_82774_400x400.png");										
					
					

					$form->sendToPlayer($sender);
		
	}
	
       public function itemsForm($sender){
		
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
						if($api === null || $api->isDisabled()){
						
						}
						$form = $api->createSimpleForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result === null){
						
						}
							switch($result){
								
								case 0:
									$command = "shop";
									$this->getServer()->getCommandMap()->dispatch($sender, $command);
									break;
								case 1:
									$this->itemName = "Ender Pearl";
									$this->itemId = 368;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Ender_Pearl");
									$this->recentShop = "itemsForm";
									$this->confirmBuy($sender);
									break;
                                                                case 2:
									$this->itemName = "Lava";
									$this->itemId = 10;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Lava");
									$this->recentShop = "itemsForm";
									$this->confirmBuy($sender);
									break;
                                                                case 3:
									$this->itemName = "Water";
									$this->itemId = 8;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Water");
									$this->recentShop = "itemsForm";
									$this->confirmBuy($sender);
									break;
                                                                case 4:
									$this->itemName = "Hopper";
									$this->itemId = 410;
									$this->itemMeta = 0;
									$this->paymentPrice = $this->cfg->get("Hopper");
									$this->recentShop = "itemsForm";
									$this->confirmBuy($sender);
									break;

									

 							
							}
					
						});

						
					$money = EconomyAPI::getInstance()->myMoney($sender);	
						
					$form->setTitle("ITEMS");
					$form->setContent("§3Purchase items here!\n§3Your money: " . TextFormat::GOLD . $money);
					$form->addButton(TextFormat::BOLD . "§l§cEXIT", 1, "http://www.blocksandgold.com//media/catalog/product/cache/3/image/cbcbef48e5e3bcce7c7ed908f20bc5b4/B/a/Barrier.png");
					
					$form->addButton(TextFormat::BOLD . "Ender Pearl | " . TextFormat::GOLD . "$" . $this->cfg->get("Ender_Pearl"), 1, "https://vignette.wikia.nocookie.net/minecraftpocketedition/images/5/5a/Ender_Pearl.png/revision/latest?cb=20160209132948");
					$form->addButton(TextFormat::BOLD . "Lava | " . TextFormat::GOLD . "$" . $this->cfg->get("Lava"), 1, "https://d1u5p3l4wpay3k.cloudfront.net/totalminer_gamepedia/2/27/Lava.png?version=0670a7aea58d6390028df4f6da1b966d");
					$form->addButton(TextFormat::BOLD . "Water | " . TextFormat::GOLD . "$" . $this->cfg->get("Water"), 1, "http://pngimg.com/uploads/water/water_PNG3290.png");
                                        $form->addButton(TextFormat::BOLD . "Hopper | " . TextFormat::GOLD . "$" . $this->cfg->get("Hopper"), 1, "http://hydra-media.cursecdn.com/minecraft.gamepedia.com/8/81/Hopper.png?version=7e06edbe21a901ea248ac02cacbd9e76");


					$form->sendToPlayer($sender);
		
	}


	
	public function confirmBuy($sender){
		
		
		
					$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
					if($api === null || $api->isDisabled()){
						
					}
					$form = $api->createCustomForm(function (Player $sender, array $data){

						$result = $data[0];
						if($result != null){
							
							$money = EconomyAPI::getInstance()->myMoney($sender);
							$this->totalPaymentPrice = $this->paymentPrice * $result;						
							
							if($money > $this->totalPaymentPrice){
								EconomyAPI::getInstance()->reduceMoney($sender->getName(), $this->totalPaymentPrice, true);
								$sender->getInventory()->addItem(Item::get($this->itemId, $this->itemMeta, $result));
								$sender->sendMessage(TextFormat::GREEN . "§l§8(§a!§8)§r §aYou have bought " . TextFormat::AQUA . $this->itemName . " x" . $result . TextFormat::GREEN .  " for " . TextFormat::GOLD . "$" . $this->totalPaymentPrice);
								
								if($this->recentShop == "armorsForm"){
									$this->armorsForm($sender);
								}
			
								if($this->recentShop == "weaponsForm"){
									$this->weaponsForm($sender);
								}
			
								if($this->recentShop == "toolsForm"){
									$this->toolsForm($sender);
								}
			
								if($this->recentShop == "blocksForm"){
									$this->blocksForm($sender);
								}
			
								if($this->recentShop == "foodsForm"){
								$this->foodsForm($sender);
								}

								if($this->recentShop == "spawnersForm"){
								$this->spawnersForm($sender);
								}

                                                                if($this->recentShop == "itemsForm"){
								$this->itemsForm($sender);
								}

                                                                if($this->recentShop == "raidingForm"){
								$this->itemsForm($sender);
								}

                                                                if($this->recentShop == "farmingForm"){
								$this->itemsForm($sender);
								}


			
								return true;
							}else {
								$sender->sendMessage("§l§8(§a!§8)§r §cYou don't have enough money!");
								return true;
							}
							
						}

					});

						
					$form->setTitle(TextFormat::BOLD . TextFormat::GREEN . $this->itemName );
					$form->addSlider("Amount" , 1, 64, 1);
					$form->sendToPlayer($sender);

		
	}

	
	
}	

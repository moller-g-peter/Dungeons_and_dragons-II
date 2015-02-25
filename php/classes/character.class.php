<?php

class character extends Base
{
	
	public $name;
	public $level = 50;
	public $health = 100;
	public $strength = 1;


	// public $weapons = array();
	// public $armors = array();
	// public $tools = array();
	
	// public $dexterity = 25;
	// public $intelligence = 25;


	public function __construct($name) 
	{
		$this->name = $name;
	}
//--------------------------------------------------------------
// 	public function set_name($name)
// 	{
// 		$this->name = $name;
// 	}

// 	public function get_name()
// 	{
// 		return $this->name;
// 	}
// //--------------------------------------------------------------
// 		public function set_weapons($weapons)
// 	{
// 		if(count($this->weapons) < 3)
// 		{
// 		$this->weapons[] = $weapons;
// 		}
// 	}

// 	public function get_weapons()
// 	{
// 		return $this->weapons;
// 	}

// //--------------------------------------------------------------
// 		public function set_armors($armors)
// 	{
// 		if(count($this->armors) < 3)
// 		{
// 		$this->armors[] = $armors;
// 		}
// 	}

// 	public function get_armors()
// 	{
// 		return $this->armors;
// 	}

// //--------------------------------------------------------------
// 	public function set_health($health)
// 	{
// 		$this->health = $health;
// 	}

// 	public function get_health()
// 	{
// 		return $this->health;
// 	}

// //--------------------------------------------------------------
// 	public function set_tools($tools)
// 	{
// 		$this->tools = $tools;
// 	}

// 	public function get_tools()
// 	{
// 		return $this->tools;
// 	}

//--------------------------------------------------------------
// if-sats för hit metoder


	public function battle($opponent)
	{
		$damage = 0;
		$t10_dice_roll = rand(1,10);
		$result;

		if($this->is_alive())
		{
			if($t10_dice_roll == 10)
			{
				// critical hit!!
				$damage = rand(1,10) + $t10_dice_roll;

				// $object_weapons = $this->weapons;
				// $object_armors = $opponent->armors;

				// for ($i=0; $i < count($object_weapons); $i++){
				// 	$damage += $object_weapons[$i]->weapon_strength;
				// }

				// for ($i=0; $i < count($object_armors); $i++){
				// 	$damage -= $object_armors[$i]->armor_strength;
				// }

				$opponent->health -= $damage;
				//$opponent->health -= $damage > 0 ? $damage : 0;

				$result = $this->name." attacks.<br>"."A critical hit!! ".$opponent->name." suffers ".$damage." point(s) of damage.<br>";
			}
			else if ($t10_dice_roll == 1)
			{
				// no hit...opponent dodges attack
				$result = $this->name." attacks.<br>"."The attack missed! ".$opponent->name." suffers ".$damage." point(s) of damage.<br>";
			}
			else
			{
				// normal hit
				$damage = rand(1,10);
				//$damage = rand(1,10) + $object_weapons[0] - $object_armors[0];
				// $object_weapons = $this->weapons;
				// $object_armors = $opponent->armors;
				
				// for ($i=0; $i < count($object_weapons); $i++){
				// 	$damage += $object_weapons[$i]->weapon_strength;
				// }

				// for ($i=0; $i < count($object_armors); $i++){
				// 	$damage -= $object_armors[$i]->armor_strength;
				// }

				$opponent->health -= $damage;

				$result = $this->name." attacks.<br>".$opponent->name." is hit and suffers ".$damage." point(s) of damage.<br>";
			}

					if ($opponent->is_alive())
					{
						return $result;
					}
					else
					{
						$this->level++;
						return $this->name." stands victorious! ".$this->level." gained.<br>";
					}
		}
		else
		{
			return $this->name. " is dead!<br>";
		}
	}

//--------------------------------------------------------------

	public function is_alive()
	{
		if($this->health >0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

//--------------------------------------------------------------

	// public function item_quantity() {
 //    return $this->item > 0;
 //  	}

//--------------------------------------------------------------

	// public function use_items() {
		
 // 		if($this->item_quantity() && $this->is_alive()) {
	// 	$this->health += 30;
 //     	$this->item --;
 //     	return $this->name." restored ".$this->health." HP.<br>";
	// 	// $object_tools = $this->tools;	
	// 	}
 //  	}







}


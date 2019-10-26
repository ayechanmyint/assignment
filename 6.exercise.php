<?php

//Create Inventory Class
//There should be add item method which can add the new item and 
//qty into the list property
//There should be a sale method which will 
//reduce the qty of the item

class Inventory{
	private $item_list = [];
	

	function addItem(string $item_name, int $qty){
		$new_item = $this->buildItem($item_name,$qty);
		$arr= array_push($this->item_list,$new_item);
		//return $this->item_list;
		//var_dump($this->item_list);
	}

	private function buildItem(string $item_name, int $qty){
		return ['name' => $item_name, 'qty'=>$qty];
	}


	function saleItem(string $item_name,int $sold_qty=1){

		$item_list = $this->item_list;
		$searchValue  = ['name'=>$item_name,'qty'=>$sold_qty];		
		$check = array_search($item_name,array_column($item_list,'name'));

		if($check != false || $check == 0){
			$last_qty = $item_list[$check]["qty"] - $searchValue["qty"];
			$new_arr = ['name'=>$item_list[$check]["name"],'qty'=>$last_qty];

			foreach($item_list as $key=>$value){
				if($value['name'] == $new_arr['name']){
					$item_list[$key]['qty'] = $new_arr['qty'];
					print_r($item_list);
				}
			}
		}else{
			echo "This array no search found!!";
		}

	}

}
	$inventory = new Inventory();
	$inventory->addItem('apple',20);
	$inventory->addItem('orange',10);
	$inventory->addItem('grape',24);
	$inventory->addItem('mango',14);
	$inventory->saleItem('grape',8);
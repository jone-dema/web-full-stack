<?php
/**
* 
*/
class CategoryModel extends Db
{
	public function getAllItems()
	{
        $items = $this->getItems("SELECT * FROM categories");
        return $items;
	}
 
    public function getItemById($item_id) {
        $items = $this->getItems("SELECT * FROM categories WHERE category_id=$item_id");
        return $items;
    }


}
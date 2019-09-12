<?php
/**
* 
*/
class ProductModel extends Db
{
	public function getAllItems($page, $perPage)
	{
        $firstItem = ($page - 1) * $perPage;
        $items = $this->getItems("SELECT products.product_id, products.product_name, categories.category_name FROM products JOIN categories ON products.category_id = categories.category_id LIMIT $firstItem, $perPage");
        return $items;
	}

    public function countAllItems()
    {
        $data = parent::$connection->query("SELECT COUNT(*) as total FROM products");
        return $data->fetch_assoc()['total'];
    }
        
    public function getItemById($item_id) {
        $items = $this->getItems("SELECT * FROM products WHERE product_id=$item_id");
        return $items;
    }
    
    public function addItem($item_name, $category_id) {
        $query = parent::$connection->prepare("INSERT INTO products(product_name, category_id) VALUES (?, ?)");
        $query->bind_param("si", $item_name, $category_id);
        return $query->execute();
    }
    
    public function editItem($item_id, $item_name, $category_id) {
        $query = parent::$connection->prepare("UPDATE products SET product_name=?, category_id=? WHERE product_id=?");
        $query->bind_param("sii", $item_name, $category_id, $item_id);
        return $query->execute();
    }

    public function searchItem($keyword, $page, $perPage) {
        $firstItem = ($page - 1) * $perPage;
        $items = $this->getItems("SELECT * FROM products WHERE product_name LIKE '%$keyword%' LIMIT $firstItem, $perPage");
        return $items;
    }

    public function countSearchItem($keyword)
    {
        $data = parent::$connection->query("SELECT COUNT(*) as total FROM products WHERE product_name LIKE '%$keyword%'");
        return $data->fetch_assoc()['total'];
    }

    public function deleteItem($item_id) {
        $query = parent::$connection->prepare("DELETE FROM products WHERE product_id=?");
        $query->bind_param("i", $item_id);
        return $query->execute();
    }

}
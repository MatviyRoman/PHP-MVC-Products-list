<?php
class ProductModel
{
    protected $db;
    protected string $name;
    protected int $price;
    protected int $status;

    public function __construct($database)
    {
        $this->db = $database;
        $this->name = (string) htmlspecialchars(addslashes($_POST['name']));
        $this->price = (int) htmlspecialchars(addslashes($_POST['price']));
        $this->status = (int) htmlspecialchars(addslashes($_POST['status']));
        $this->status = $this->status ? $this->status : 0;
    }

    public function getAllProduct()
    {
        $link = $this->db->openDbConnection();

        $sort = (string) htmlspecialchars(addslashes($_GET['sort']));
        $method_sort = (string) htmlspecialchars(addslashes($_GET['method_sort']));

        switch ($method_sort) {
            case 'DESC':
                $method_sort = 'DESC';
                break;

            default:
                $method_sort = 'ASC';
                break;
        }

        switch ($sort) {
            case 'price':
                $sort = 'price';
                break;

            case 'name':
                $sort = 'name';
                break;

            default:
                $sort = 'id';
                break;
        }

        $result = $link->query('SELECT * FROM product ORDER BY ' . $sort . ' ' . $method_sort);

        $product = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $product[] = $row;
        }
        $this->db->closeDbConnection($link);


        return $product;
    }

    public function getProductById($id)
    {
        $link = $this->db->openDbConnection();

        $query = 'SELECT * FROM product WHERE  id=:id';
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $this->db->closeDbConnection($link);

        return $row;
    }

    public function insert()
    {
        $link = $this->db->openDbConnection();

        $query = 'INSERT INTO product (name, price, status) VALUES (:name, :price, :status)';
        $statement = $link->prepare($query);
        $statement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $statement->bindValue(':price', $this->price, PDO::PARAM_INT);
        $statement->bindValue(':status', $this->status, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function update($id)
    {
        $link = $this->db->openDbConnection();

        $query = "UPDATE product SET name = :name, price = :price, status = :status WHERE id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $statement->bindValue(':price', $this->price, PDO::PARAM_INT);
        $statement->bindValue(':status', $this->status, PDO::PARAM_INT);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function delete($id)
    {
        $link = $this->db->openDbConnection();

        $query = "DELETE FROM product WHERE id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }
}

<?php
namespace App;

use App\Config\Database;
use MongoDB\BSON\ObjectId;

class EntityManager
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getDb();
    }

    public function findAll($collectionName)
    {
        $collection = $this->db->$collectionName;
        return $collection->find()->toArray();
    }

    public function findById($collectionName, $id)
    {
        $collection = $this->db->$collectionName;
            try {
                $id = new ObjectId($id);
            } catch (\Exception $e) {
                return null;
            }
        

        return $collection->findOne(['_id' => $id]);
    }
}

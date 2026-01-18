<?php
namespace App;

use App\Config\Database;
use MongoDB\BSON\ObjectId;
use MongoDB\Builder\Expression\ObjectFieldPath;

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

    public function findById($collectionName, $dataCompare, $customCol = "_id")
    {
        $collection = $this->db->$collectionName;
        try {
            if ($customCol == "_id") {
                $dataCompare = new ObjectId($dataCompare);
            } else {
                $dataCompare = new ObjectFieldPath($dataCompare);
            }
        } catch (\Exception $e) {
            return null;
        }
        return $collection->findOne([$customCol => $dataCompare]);
    }

    public function insertOne($collectionName, $data, $checker = null)
    {
        $collection = $this->db->$collectionName;

        if ($checker && isset($data[$checker])) {
            $elExist = $collection->findOne([$checker => $data[$checker]]);
            if ($elExist) {
                return null;
            }
        }

        $data["_id"] = new ObjectId();
        try {
            $result = $collection->insertOne($data);
            return $result;
        } catch (\Exception $e) {
            return null;
        }
    }
}

<?php
namespace App\Model;
use DB;

class DataModel extends \Illuminate\Database\Eloquent\Model
{

    private $pdo = null;

    public $incrementing = false;
    public $timestamps = false;
    public $primaryKey = '';

    public function __construct()
    {
        $this->pdo = self::getConnection()->getPdo();
        parent::__construct();
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function getRecords($sql, $params = [])
    {
        $pdo = $this->getPdo();
        $records = $this->getPdo()->prepare($sql);

        $records->execute($params);

        return $records->fetchAll($pdo::FETCH_ASSOC);
    }
}
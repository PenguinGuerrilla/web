<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

    const HOST ='localhost';
    const NAME ='atividade5';
    const USER ='root';
    const PASS ='';

    private $table;
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('Erro: '.$e->getMessage()); //OBS:Não fazer isso. Nunca expor o erro para o usuario final, salvar em LOG!
        }
    }

    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('Erro: '.$e->getMessage()); //OBS:Não fazer isso. Nunca expor o erro para o usuario final, salvar em LOG!
        }
    }

    public function insert($values){

        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        $query = 'insert into '.$this->table.' ('.implode(',',$fields).') values ('.implode(',',$binds).')';

        $this->execute($query,array_values($values));

        return  $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields ='*'){

        $where = !empty($where) ? 'where '.$where : '';
        $order = !empty($order) ? 'order '.$order : '';
        $limit = !empty($limit) ? 'limit '.$limit : '';

        $query = 'select '.$fields.' from '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    public function update($where,$values){

        $fields = array_keys($values);

        $query = 'update '.$this->table.' set '.implode('=?,',$fields).'=? where '.$where;

        $this->execute($query,array_values($values));

        return true;
    }

    public function delete($where){
        $query = 'delete from '.$this->table.' where '.$where;

        $this->execute($query);

        return true;
    }
}


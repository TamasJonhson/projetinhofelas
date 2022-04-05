<?php 

    namespace App\db;

use PDO;
use PDOException;

    class Database {
      const HOST = 'localhost';
      const NAME = 'soufuturedb';   
      const USER = 'root';
      const PASS = '';
      
      private $table;
      private $connection;


      public function setConnection(){
        try{
            $this -> connection = new PDO('mysql:host=' . self::HOST . self::NAME, self::USER,self::PASS);
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } 
        catch(PDOException  $erro ){
            die('444F4TAL3RROR44'. $erro  -> getMessage());

        }
      }
      public function execute($query,$params = [])
      {
        try{
            $statement = $this->connection->prepare($query);
            $statement -> execute($params);
            return $statement;
        
        }catch(PDOException $erro ){
            die ('FATAL ERRO! 02'. $erro -> getMessage());
        }
      }
        public function insert($values)
        {
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields) , '?'); 

        $query = 'INSERT INTO' . $this->table . '(' .   implode(',',$fields) . ')VALUES ' . implode(',', $binds);

        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId(); 
        } 
        public function select($where = NULL, $order = NULL, $limit = NULL, $fields = '*')
    {
        //Preparar os dados da query    

        $where = strlen($where) ? 'WHERE '. $where : '';
        $order = strlen($order) ? ' ORDER BY '. $order : '';
        $limit = strlen($limit) ? ' LIMIT '. $limit : '';

        //Montando a query  

        $query = 'SELECT' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        //Executa a query

        $this->execute ($query);
    }

    public function update($where, $values)
    {
        //Dados da query sendo passados

        $fields = array_keys($values);

        //Montando a query 

        $query = 'UPDATE' . $this->table . ' SET ' . implode('=?', $fields) . '=? WHERE' . $where ;
    }

    public function delete($where)
    {
        //Montar a query
        $query = 'DELETE FROM ' . $this->table . 'WHERE' . $where; 

        //Executa a query 
        $this->execute ($query); 

        //Retorna sucesso
        return true;
    }

}
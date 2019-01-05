<?php 

class QueryBuilder {

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $intoClass) {
        // prepare the query
        $statement = $this->pdo->prepare("select * from {$table}");
        // execute the statement
        $statement->execute();
        // Fetch all the results in memory
        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }

    public function insert($table, $parameters) {
        // prepare the query
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
       
        try {
            $statement = $this->pdo->prepare($sql);
            // execute the statement - need to pass the parameters to the placeholders in the previous sql query
            // execute expect an associative array and will bind each key to a placeholder
           $statement->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM {$table} WHERE id = :id";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($id);
        } catch (Exception $e) {
            die($e -> getMessage());
        }
    }
}
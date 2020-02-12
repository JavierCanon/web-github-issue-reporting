<?php

class Config {
    /**
     * path to the sqlite file
     */
    const PATH_TO_SQLITE_FILE = 'DB/Issues.db';

}

/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type
     */
    private $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }
        return $this->pdo;
    }
}

/**
 * PHP SQLite Insert
 */
class SQLiteInsert {

    /**
     * PDO object
     * @var \PDO
     */
    private $pdo;

    /**
     * Initialize the object with a specified PDO object
     * @param \PDO $pdo
     */
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function insertTask($title, $body, $software) {
        $sql = 'INSERT INTO [Issues]
           ([Title]
           ,[Body]
           ,[Software])
     VALUES
           (
            :title
           ,:body
           ,:software
           )';

        $stmt = $this->pdo->prepare($sql);

        if($stmt!= false){
            $stmt->execute([
                ':title' => $title,
                ':body' => $body,
                ':software' => $software
            ]);

            return $this->pdo->lastInsertId();
        }
    }

}


?>
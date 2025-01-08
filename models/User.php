<?php
require __DIR__ . '/Database.php';


class User {

private $pdo;
private $name;
private $message;
private $date;

        public function __construct($nom=null, $message=null) {

            $this->name = $nom;
            $this->message = $message;
            $this->date = date("Y/m/d");


            $pdo = new Database;
            $this->pdo = $pdo-> getPDO();
        }
    

    public function create() {
            $stmt = $this->pdo->prepare("INSERT INTO commentaires (nom, message, horodatage) 
                    VALUES (:nom, :message, :date)");
            $stmt->execute([
            ':nom' => $this->name, 
            ':message' => $this->message,
            ':date' => $this->date
            ]);
    }

    public function read() {
            $stmt = $this->pdo->prepare("SELECT * FROM commentaires");
            $stmt->execute();
            $Comments = $stmt->fetchAll(PDO::FETCH_OBJ); 
            return $Comments;
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM commentaires where id=:id");
        $stmt->execute([
           ':id'=>$id
        ]);
    }

    public function edit($id)  {
        $stmt = $this->pdo->prepare("SELECT * FROM commentaires WHERE id = :id ");
        $stmt->execute([
            ':id' => $id
        ]);
        $Comment = $stmt->fetchAll(); 
        return $Comment;
        }
}

?>
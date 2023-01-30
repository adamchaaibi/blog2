<?php

require_once 'DbConfig.php';

class Post extends DbConfig{

    public function getPosts(){
        $sql = "SELECT * FROM posts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPostsFromUser($id){
        $sql = "SELECT * FROM posts WHERE author = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getPost($id){
        $sql = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function create($data){
        try{
            $sql = "INSERT INTO posts (title, description, body, author) VALUES (:title, :description, :body, :author)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":title", $data['title']);
            $stmt->bindParam(":description", $data['description']);
            $stmt->bindParam(":body", $data['body']);
            $stmt->bindParam(":author", $data['author']);
            if(!$stmt->execute()){
                throw new Exception("Post kon niet aangemaakt worden");
            }
            return;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

}

?>
<?php

    class Model{

        private $db;

        function __construct(){
           $this->db = new PDO('mysql:host=localhost;'.'dbname=db_catalogo;charset=utf8', 'root', '');
        }

        function getAllGames(){
            $query = $this->db->prepare('SELECT * FROM juegos');
            $query->execute([]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function addSong($nombre,$compania,$compatibilidad,$lanzamiento,$trailer,$categorias,$img = null){
            $pathImg = null;

            if($img){
                $pathImg = $this->uploadFile($img);
            }
            
            $query = $this->db->prepare(
            'INSERT INTO juegos (nombre,lanzamiento,compania,compatibilidad,trailer,imagen,id_categoria_fk)
             VALUES (?,?,?,?,?,?,?)');
            $query->execute([$nombre,$lanzamiento,$compania,$compatibilidad,$trailer,$pathImg,$categorias]);
            $addSong = $this->db->lastInsertId();

            if($addSong){
                return true;
            }else{
                return false;
            }
        }

        function getCategorys(){
            $query = $this->db->prepare('SELECT * FROM categorias');
            $query->execute([]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        private function uploadFile($imagen){
            $filePath = 'img/' . uniqid() . '.jpg';
            move_uploaded_file($imagen, $filePath);
            return $filePath;
        }

        function validateAdmin($user,$pass){
            $query = $this->db->prepare('SELECT * FROM user WHERE user = ? and contra = ?');
            $query->execute([$user,$pass]);
            return $query->fetch(PDO::FETCH_OBJ);
        }


        function GameById($id){
            $query = $this->db->prepare(
           'SELECT j.*, c.nombre AS categoria
            FROM juegos j
            JOIN categorias c ON j.id_categoria_fk = c.id_categoria
            WHERE j.id = ?');
            $query->execute([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function delete($id){
            $query = $this->db->prepare('DELETE FROM juegos WHERE id = ?');
            $query->execute([$id]);
        }
    }
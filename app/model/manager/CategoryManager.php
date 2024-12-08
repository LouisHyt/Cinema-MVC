<?php

    namespace Model\Manager;
    use Model\Connect;

    class CategoryManager {

        // Get all movies
        public function getCategories() {

            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT ca.id_category, ca.label, COUNT(be.id_movie) AS movies_in
                FROM category ca
                LEFT JOIN belongs be ON ca.id_category = be.id_category
                GROUP BY ca.id_category
                ORDER BY movies_in DESC
            ");
            $categories = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $categories;
        }

        public function getCategoryById(int $id) {

            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("
                SELECT label
                FROM category
                WHERE id_category = :id
            ");
            $request->bindValue(":id", $id, \PDO::PARAM_INT);
            $request->execute();
            $category = $request->fetch(\PDO::FETCH_ASSOC);
            return $category;
        }

        public function editCategory(string $label, int $id) {
            $pdo = Connect::seConnecter();
            try {
                $request = $pdo->prepare("
                    UPDATE category
                    SET label = :label
                    WHERE id_category = :id 
                ");
                $request->bindValue(":id", $id, \PDO::PARAM_INT);
                $request->bindValue(":label", $label, \PDO::PARAM_STR);
                $request->execute();
            } catch (\PDOException $error) {
                return $error;
            }
        }

        public function addCategory(string $name) {
            $pdo = Connect::seConnecter();
            try {
                $request = $pdo->prepare("
                    INSERT INTO category (label)
                    VALUES (:name)
                ");
                $request->bindValue(":name", "$name", \PDO::PARAM_STR);
                $request->execute();
            } catch (\PDOException $error) {
                return $error;
            }
        }

        public function deleteCategory(int $id) {
            $pdo = Connect::seConnecter();
            try {
                $request = $pdo->prepare("
                    DELETE FROM category
                    WHERE id_category = :id
                ");
                $request->bindValue(":id", $id, \PDO::PARAM_INT);
                $request->execute();
            } catch (\PDOException $error) {
                return $error;
            }
        }
    }
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

        public function editCategory(int $id) {
            return null;
        }

        public function addCategory() {
            return null;
        }

        public function deleteCategory(int $id) {
            $pdo = Connect::seConnecter();
            $request = $pdo->prepare("
                DELETE FROM category
                WHERE id_category = :id
            ");
            $request->bindValue(":id", $id, \PDO::PARAM_INT);
            $request->execute();
        }
    }
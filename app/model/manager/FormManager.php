<?php

    namespace Model\Manager;
    use Model\Connect;

    class FormManager {

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
    }
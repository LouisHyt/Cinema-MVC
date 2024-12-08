<?php

    namespace Model\Manager;
    use Model\Connect;

    class RoleManager {

        public function getRoles() {
            $pdo = Connect::seConnecter();
            $request = $pdo->query("
                SELECT id_role, role_name
                FROM casting_role
            ");
            $request->execute();
            $roles = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $roles;
        }

        public function addRole(string $name) {
           
        }

        public function editRole(int $id) {
           
        }

        public function deleteRole(int $id) {
           
        }
    }
<?php
class Reservas extends Connection{

    protected function setReserva($userID, $pisId){
        $error = false;
        $stmt = $this->connect()->prepare("INSERT INTO reservas (id_user, id_pis) VALUES (?,?)");

        if(!$stmt->execute(array($userID, $pisId))){
            $error = true;
        }
        $stmt = null;
        return $error;
    }

    // todo: para mostrar si ya la ha reservado o no en la lista general de pisos
    protected function getDataReserva($userID, $pisId){
        $error = false;
        $stmt = $this->connect()->prepare("SELECT r.data_reserva FROM reservas r INNER JOIN users u ON r.id_user = u.users_id INNER JOIN pisos p ON p.id = r.id_pis WHERE r.id_user = ? AND r.id_pis = ?;");

        if(!$stmt->execute(array($userID, $pisId))){
            $error = true;
        }
        $stmt = null;
        return $error;
    }

    // mostrar las reservas para listarlas discriminando por usuario almacenado en sessión
    protected function showPisosUser($userID) {
        try {
            // Prepare the SQL statement
            $stmt = $this->connect()->prepare("SELECT p.*, r.data_reserva FROM reservas r INNER JOIN users u ON r.id_user = u.users_id INNER JOIN pisos p ON p.id = r.id_pis WHERE r.id_user = ?;");
            $results = [];
    
            // Execute the statement
            if (!$stmt->execute(array($userID))) {
                // Log the error if execution fails
                error_log("Failed to execute query: " . implode(", ", $stmt->errorInfo()));
                $stmt = null;
                return $results;
            }
    
            // Fetch and return the results as an associative array
            if ($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
    
            // Close the statement
            $stmt = null;
            return $results;
    
        } catch (PDOException $e) {
            // Log any exceptions
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }

}
?>
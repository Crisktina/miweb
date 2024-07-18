<?php
class Pisos extends Connection{

    protected function setPisos($pisname, $tipus, $numHabitacions, $numLavabos){
        $error = false;
        $stmt = $this->connect()->prepare("INSERT INTO pisos (uidpis, tipus, numHabitacions, numLavabos) VALUES (?,?,?,?)");

        if(!$stmt->execute(array($pisname, $tipus, $numHabitacions, $numLavabos))){
            $error = true;
        }
        $stmt = null;
        return $error;

    }

    protected function showPisos() {
        try {
            // Prepare the SQL statement
            $stmt = $this->connect()->prepare("SELECT * FROM pisos;");
            $results = [];
    
            // Execute the statement
            if (!$stmt->execute()) {
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

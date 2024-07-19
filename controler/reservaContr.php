<?php 

class ReservaContr extends Reservas{

    private $userID;
    private $pisId;

    public function __construct( $userID, $pisId = ''){
        $this->userID = $userID;
        $this->pisId = $pisId;
    }

    /**Setters and getters */
    public function setUserID ($userID){
         $this->userID = $userID;
    }
    public function getUserID(){
        return $this->userID;
    }
    
    public function setPisId($pisId){
        $this->pisId = $pisId;
    }
    public function getPisId(){
        return $this->pisId;
    }

    /*** */

    public function newReserva(){

        //validation
        if($this->emptyInput($this->userID) == false || $this->emptyInput($this->pisId) == false){
            header("Location: ../view/pisos.php?error=emptyInput");
            exit();
        }

        //setReserva to DB
        if($this->setReserva($this->userID, $this->pisId)){
            
            header("Location: ../view/pisos.php?error=FailedStmt");
        }
    }

    private function emptyInput($input){
        $result = true;

        if(empty($input)){
            $result = false;
        }
        return $result;
    }

    public function showPisosUserList(){
        $res =  $this->showPisosUser($this->userID, $this->pisId);
        return $res;
    }
    public function showDataReserva(){
        $res =  $this->getDataReserva($this->userID, $this->pisId);
        return $res;
    }



}
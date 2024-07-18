<?php 

class PisContr extends Pisos{
    private $pisname;
    private $tipus;
    private $numHabitacions;
    private $numLavabos;

    public function __construct($pisname = '', $tipus = '', $numHabitacions = '', $numLavabos = ''){
        $this->pisname = $pisname;
        $this->tipus = $tipus;
        $this->numHabitacions = $numHabitacions;
        $this->numLavabos = $numLavabos;
    }

    /**Setters and getters */
    public function setPisname($pisname){
         $this->pisname = $pisname;
    }
    public function getPisname(){
        return $this->pisname;
    }
    
    public function setTipus($tipus){
        $this->tipus = $tipus;
    }
    public function getTipus(){
        return $this->tipus;
    }
   
    public function setNumHabitacions($numHabitacions){
        $this->numHabitacions = $numHabitacions;
    }
    public function getNumHabitacions(){
        return $this->numHabitacions;
    }
    
    public function setNumLavabos($numLavabos){
        $this->numLavabos = $numLavabos;
    }
    public function getNumLavabos(){
       return $this->numLavabos;
    }
    /*** */

    public function createPis(){

        //setPis to DB
        if($this->setPisos($this->pisname, $this->tipus, $this->numHabitacions, $this->numLavabos)){
            header("Location: ../view/noupis.php?error=FailedStmt");
        }
    }

    public function showPisosList(){
        $res =  $this->showPisos($this->pisname, $this->tipus, $this->numHabitacions, $this->numLavabos);
        return $res;
    }



}
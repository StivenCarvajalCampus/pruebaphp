<?php
namespace App;
class region extends connect{
    private $queryGetAll = 'SELECT region.*, departamento.nombreDep FROM region INNER JOIN departamento ON region.idDep = departamento.idDep';
    private $queryPost = 'INSERT INTO region (idReg, nombreReg, idDep) VALUES(:idReg, :nombreReg, :idDep)';
    private $queryUpdate = 'UPDATE region SET nombreReg=:nombreReg idDep=:idDep WHERE idReg=:idReg';
    private $queryDelete = 'DELETE FROM region WHERE idReg = :idReg';
    private $message;
    use getInstance;
    function __construct(private $idReg, public $nombreReg, public $idDep){
        parent::__construct();
    }
    public function getAllRegion(){
        try {
            $stmt = $this->conex->prepare($this->queryGetAll);
            $stmt->execute();
            $this->message = ["Code"=>200, "Message"=>$stmt->fetchAll(\PDO::FETCH_ASSOC)];
        }catch(\PDOException $e) {
                $this->message = ["Code"=> $e->getCode(), "Message"=> $stmt->errorInfo()[2]];
            }finally{
                print_r($this->message);
            }
        }
        public function postRegion(){
            try {
                $stmt=$this->conex->prepare($this->queryPost);
                $stmt->bindValue("idReg", $this->idReg);
                $stmt->bindValue("nombreReg", $this->nombreReg); 
                $stmt->bindValue("idDep", $this->idDep);
                $stmt->execute();
                $this->message = ["Code"=>200+$stmt->rowCount(),"Message"=>"insert data"];


            } catch(\PDOException $e){
                $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
            }finally{
                print_r($this->message);
        
        
            }
        }
        public function updateRegion(){
            try {
                 
            $stmt= $this->conex->prepare($this->queryUpdate);
            $stmt->bindValue("idReg", $this->idReg);
            $stmt->bindValue("nombreReg", $this->nombreReg); 
            $stmt->bindValue("idDep", $this->idDep);
            $stmt= $stmt->execute();
            $this->message = ["Code"=>200, "Message"=>"update data"];
            }catch(\PDOException $e) {
                    $this->message = ["Code"=> $e->getCode(), "Message"=> $stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }
            }
            public function deleteRegion(){
                try {
                    $stmt = $this->conex->prepare($this->queryDelete);
                    $stmt->bindValue('idReg',$this->idReg);
                    $stmt->execute(); $this->message = ["Code"=> 200, "Message"=> "delete data "];
        
                } catch (\PDOException $e) {
                    $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }

            }
        }
    

?>
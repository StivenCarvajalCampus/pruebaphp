<?php
namespace App;
class campers extends connect{
    private $queryGetAll = 'SELECT campers.*, region.nombreReg FROM campers INNER JOIN region ON campers.idReg = region.idReg';
    private $queryPost = 'INSERT INTO campers (idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES(:id, :nombre,:apellido, :fecha, :idReg)';
    private $queryUpdate = 'UPDATE campers SET nombreCamper=:nombre apellidoCamper=:apellido fechaNac=:fecha idReg=:idReg WHERE idReg=:idReg';
    private $queryDelete = 'DELETE FROM campers WHERE idCampers = :id';
    private $message;
    use getInstance;
    function __construct(private $idCamper, public $nombreCamper,public $apellidoCamper,public $fechaNac, public $idReg){
        parent::__construct();
    }
    public function getAllCampers(){
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
        public function postCampers(){
            try {
                $stmt=$this->conex->prepare($this->queryPost);
                $stmt->bindValue("id", $this->idCamper);
                $stmt->bindValue("nombre", $this->nombreCamper);
                $stmt->bindValue("apellido", $this->apellidoCamper);
                $stmt->bindValue("fecha", $this->fechaNac); 
                $stmt->bindValue("idReg", $this->idReg);
                $stmt->execute();
                $this->message = ["Code"=>200+$stmt->rowCount(),"Message"=>"insert data"];


            } catch(\PDOException $e){
                $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
            }finally{
                print_r($this->message);
        
        
            }
        }
        public function updateCampers(){
            try {
                 
            $stmt= $this->conex->prepare($this->queryUpdate);
            $stmt->bindValue("id", $this->idCamper);
            $stmt->bindValue("nombre", $this->nombreCamper);
            $stmt->bindValue("apellido", $this->apellidoCamper);
            $stmt->bindValue("fecha", $this->fechaNac); 
            $stmt->bindValue("idReg", $this->idReg);
            $stmt= $stmt->execute();
            $this->message = ["Code"=>200, "Message"=>"update data"];
            }catch(\PDOException $e) {
                    $this->message = ["Code"=> $e->getCode(), "Message"=> $stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }
            }
            public function deleteCampers(){
                try {
                    $stmt = $this->conex->prepare($this->queryDelete);
                    $stmt->bindValue('id',$this->idCamper);
                    $stmt->execute(); $this->message = ["Code"=> 200, "Message"=> "delete data "];
        
                } catch (\PDOException $e) {
                    $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }

            }
        }
    

?>
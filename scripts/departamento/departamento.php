<?php
namespace App;
class departamento extends connect{
    private $queryGetAll = 'SELECT departamento.*, pais.nombrePais FROM departamento INNER JOIN pais ON departamento.idPais = pais.idPais';
    private $queryPost = 'INSERT INTO departamento (idDep, nombreDep, idPais) VALUES(:idDep, :nombreDep, :idPais)';
    private $queryUpdate = 'UPDATE departamento SET nombreDep=:nombreDep idPais=:idPais WHERE idDep=:idDep';
    private $queryDelete = 'DELETE FROM departamento WHERE idDep = :idDep';
    private $message;
    use getInstance;
    function __construct(private $idDep, public $nombreDep, public $idPais){
        parent::__construct();
    }
    public function getAllDepartamento(){
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
        public function postDepartamento(){
            try {
                $stmt=$this->conex->prepare($this->queryPost);
                $stmt->bindValue("idDep", $this->idDep);
                $stmt->bindValue("nombreDep", $this->nombreDep); 
                $stmt->bindValue("idPais", $this->idPais);
                $stmt->execute();
                $this->message = ["Code"=>200+$stmt->rowCount(),"Message"=>"insert data"];


            } catch(\PDOException $e){
                $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
            }finally{
                print_r($this->message);
        
        
            }
        }
        public function updateDepartamento(){
            try {
                 
            $stmt= $this->conex->prepare($this->queryUpdate);
            $stmt->bindValue("idDep", $this->idDep);
            $stmt->bindValue("nombreDep", $this->nombreDep); 
            $stmt->bindValue("idPais", $this->idPais);
            $stmt= $stmt->execute();
            $this->message = ["Code"=>200, "Message"=>"update data"];
            }catch(\PDOException $e) {
                    $this->message = ["Code"=> $e->getCode(), "Message"=> $stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }
            }
            public function deleteDepartamento(){
                try {
                    $stmt = $this->conex->prepare($this->queryDelete);
                    $stmt->bindValue('idDep',$this->idDep);
                    $stmt->execute(); $this->message = ["Code"=> 200, "Message"=> "delete data "];
        
                } catch (\PDOException $e) {
                    $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }

            }
        }
    

?>
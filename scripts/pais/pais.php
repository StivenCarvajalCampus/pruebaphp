<?php
namespace App;
class pais extends connect{
    private $queryGetAll = 'SELECT * FROM pais';
    private $queryPost = 'INSERT INTO pais (idPais, nombrePais) VALUES(:idPais, :nombrePais)';
    private $queryUpdate = 'UPDATE pais SET nombrePais=:nombrePais WHERE idPais=:idPais';
    private $queryDelete = 'DELETE FROM pais WHERE idPais = :idPais';
    private $message;
    use getInstance;
    function __construct(private $idPais, public $nombrePais){
        parent::__construct();
    }
    public function getAllPais(){
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
        public function postPais(){
            try {
                $stmt=$this->conex->prepare($this->queryPost);
                $stmt->bindValue("idPais", $this->idPais);
                $stmt->bindValue("nombrePais", $this->nombrePais);
                $stmt->execute();
                $this->message = ["Code"=>200+$stmt->rowCount(),"Message"=>"insert data"];


            } catch(\PDOException $e){
                $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
            }finally{
                print_r($this->message);
        
        
            }
        }
        public function updatePais(){
            try {
                 
            $stmt= $this->conex->prepare($this->queryUpdate);
            
            $stmt->bindValue("idPais", $this->idPais);
            $stmt->bindValue("nombrePais", $this->nombrePais);
            $stmt= $stmt->execute();
            $this->message = ["Code"=>200, "Message"=>"update data"];
            }catch(\PDOException $e) {
                    $this->message = ["Code"=> $e->getCode(), "Message"=> $stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }
            }
            public function deletePais(){
                try {
                    $stmt = $this->conex->prepare($this->queryDelete);
                    $stmt->bindValue('id',$this->id);
                    $stmt->execute(); $this->message = ["Code"=> 200, "Message"=> "delete data "];
        
                } catch (\PDOException $e) {
                    $this->message = ["Code"=>$e->getCode(),"Message"=>$stmt->errorInfo()[2]];
                }finally{
                    print_r($this->message);
                }

            }
        }
    

?>
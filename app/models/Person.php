<?php
class Person extends Model{
	public $first_name;
	public $last_name;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll(){
        $stmt = self::$_connection->prepare("SELECT * FROM person");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'person');
		return $stmt->fetchAll();
    }

    public function find($person_id){
        $stmt = self::$_connection->prepare("SELECT * FROM person WHERE person_id = :person_id");
        $stmt->execute(['person_id'=>$person_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'person');
        return $stmt->fetch();
    }

    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO person(first_name, last_name) VALUES(:first_name,:last_name)");
        $stmt->execute(['first_name'=>$this->first_name,
         'last_name'=>$this->last_name]);
    }

    public function delete(){
        $stmt = self::$_connection->prepare("DELETE FROM person WHERE person_id = :person_id");
        $stmt->execute(['person_id'=>$this->person_id]);
    }

    public function update(){
        $stmt = self::$_connection->prepare("UPDATE person SET first_name = :first_name, last_name = :last_name WHERE person_id = :person_id");
        $stmt->execute(['first_name'=>$this->first_name,
         'last_name'=>$this->last_name, 'person_id'=>$this->person_id]);
    }

}
?>
<?php

class Student{
    //db stuffs
       private $conn;
       private $table='students'; 
    
    
    //Student properties
    public $Student_id;
    public $First_name;
    public $Last_name;
    public $Programme;

// constructor with db construction
 
public function __construct($db)
{
    $this->conn =$db;
}

// getting Studentfrom ourdatabase
public function read(){
    //create query
    $query= 'SELECT * FROM '.$this->table.' ORDER BY Student_id DESC'; //DESC get the latest Student

    //Prepare statement
    $stmt= $this->conn->prepare($query);

    //execute query
    $stmt->execute();

    return $stmt;

  }

    //read single Student record from our database
  public function read_single(){
    //create query; will be the same as read function
    $query= 'SELECT  * FROM '.$this->table.' WHERE Student_id = ? LIMIT 1';
     // we only want to see one post to be returned

    //Prepare statement
    $stmt= $this->conn->prepare($query);

    //Binding Parameter
    $stmt->bindParam(1,$this->Student_id);

    //execute the query
    $stmt->execute();

    //fetch associative array (Get row)
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //Get row properties
    $this->Student_id     = $row['Student_id'];
    $this->First_name     = $row['First_name'];
    $this->Last_name      = $row['Last_name'];
    $this->Programme      = $row['Programme'];
   


    //return $stmt;

  }

  
  //Add Student function
  public function create(){
    // create query
    $query = 'INSERT INTO '.$this->table.' SET First_name = :First_name , Last_name = :Last_name, Programme  = :Programme ';
    
    //prepare statement
    $stmt = $this->conn->prepare($query);

    //clean data
    $this->First_name     = htmlspecialchars(strip_tags($this->First_name));
    $this->Last_name      = htmlspecialchars(strip_tags($this->Last_name));
    $this->Programme      = htmlspecialchars(strip_tags($this->Programme));
    

    //binding of parameters
    $stmt->bindParam(':First_name', $this->First_name);
    $stmt->bindParam(':Last_name', $this->Last_name);
    $stmt->bindParam(':Programme', $this->Programme);

    //Execute query
     if($stmt->execute()){
       return True;
     }else{
       // print error if something goes wrong
       printf("Error %s. \n", $stmt->error);
       return false;
     }
  }


  //Update Student function
  public function update(){
    // create query
    $query = 'UPDATE '.$this->table.' 
    SET First_name = :First_name , Last_name = :Last_name, Programme  = :Programme 
    WHERE Student_id = :Student_id';
    
    //prepare statement
    $stmt = $this->conn->prepare($query);

    //clean data
    $this->First_name     = htmlspecialchars(strip_tags($this->First_name));
    $this->Last_name      = htmlspecialchars(strip_tags($this->Last_name));
    $this->Programme      = htmlspecialchars(strip_tags($this->Programme));
    $this->Student_id      = htmlspecialchars(strip_tags($this->Student_id));

    //binding of parameters
    $stmt->bindParam(':First_name', $this->First_name);
    $stmt->bindParam(':Last_name', $this->Last_name);
    $stmt->bindParam(':Programme', $this->Programme);
    $stmt->bindParam(':Student_id', $this->Student_id);

    //Execute query
     if($stmt->execute()){
       return True;
     }else{
       printf("Error %s. \n", $stmt->error);
       return false;
     }
    
  }

   //delete Student function
   public function delete(){
    //create query
    $query = 'DELETE FROM '.$this->table.' WHERE Student_id = :Student_id';
    
    //prepare statement
    $stmt = $this->conn->prepare($query);

    //clean data
    $this->Student_id = htmlspecialchars(strip_tags($this->Student_id));

    //binding the id parameter
    $stmt->bindParam(':Student_id', $this->Student_id);

    //execute query
    if($stmt->execute()){
      return true;

    }else{
      //print error statement if something happens
      printf("Error %s. \n", $stmt->error);
      return false;
    }

  }

}


<?php
class User implements JsonSerializable
{
    private $name;
    private $age;
    
    public function __construct($name,$age) 
    {
        $this->name = $name;
        $this->age = $age;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

    public function jsonSerialize() 
    {
        return array(
            'name'=>  $this->name,
            'age'=> $this->age
        );
    }
    public function __destruct() 
    {}

    
}
header('Content-Type: application/json');

$user = new User('Timothy Meijer',36);
echo 'A new user => '. json_encode($user);


?>
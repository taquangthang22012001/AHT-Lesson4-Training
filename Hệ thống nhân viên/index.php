<?php
abstract class Employee {
    protected $name;
    protected $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    // Abstract phương thức tính thưởng
    abstract public function calculateBonus();
}


interface Workable {
    public function work();
}


class Manager extends Employee implements Workable {
    public function calculateBonus() {
        return $this->salary * 0.2; // 20% 
    }

    public function work() {
        return $this->name . " là PM";
    }
}


class Developer extends Employee implements Workable {
    public function calculateBonus() {
        return $this->salary * 0.1; 
    }

    public function work() {
        return $this->name . " là dev";
    }
}


class Designer extends Employee implements Workable {
    public function calculateBonus() {
        return $this->salary * 0.15; //
    }

    public function work() {
        return $this->name . " là designer";
    }
}

// Test
$manager = new Manager("Alice", 5000);
$developer = new Developer("Bob", 4000);
$designer = new Designer("Charlie", 3500);

echo $manager->work();
echo "Manager thưởng: $" . $manager->calculateBonus();
echo "</br>";

echo $developer->work();
echo "Developer thưởng: $" . $developer->calculateBonus();
echo "</br>";

echo $designer->work();
echo "Designer thưởng: $" . $designer->calculateBonus();
?>

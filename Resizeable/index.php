<?php
interface Resizeable {
    public function resize(float $percent): void;
}

class Shape
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function show(){
        return "I am a shape. My name is $this->name";
    }
}

class Circle extends Shape implements Resizeable
{
    public $radius;

    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function calculateArea(){
        return pi() * pow($this->radius, 2);
    }

    public function calculatePerimeter(){
        return pi() * $this->radius * 2;
    }

    public function resize(float $percent): void {
        $this->radius += $this->radius * ($percent / 100);
    }
}

class Rectangle extends Shape implements Resizeable
{
    public $width;
    public $height;

    public function __construct($name, $width, $height)
    {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(){
        return $this->height * $this->width;
    }

    public function calculatePerimeter(){
        return ($this->height + $this->width) * 2;
    }

    public function resize(float $percent): void {
     $this->width += $this->width * ($percent / 100);
    $this->height += $this->height * ($percent / 100);
    }
}

class Square extends Rectangle implements Resizeable
{
    public function __construct($name, $width)
    {
        parent::__construct($name, $width, $width, $width);
    }

    public function resize(float $percent): void {
        $this->width += $this->width * ($percent / 100);
       }
    
}

// TEST
$shapes = [
    new Circle("Circle", 10),
    new Rectangle("Rectangle", 5, 10),
    new Square("Square", 7)
];

foreach ($shapes as $shape) {

    echo $shape->name . "\n";
    echo "Initial Area: " . number_format($shape->calculateArea(), 2) . "\n";

    $randomPercent = rand(1, 100);
    $shape->resize($randomPercent);

    echo "Resize Percentage: {$randomPercent}%\n";
    echo "New Area: " . number_format($shape->calculateArea(), 2) . "\n";
    echo "<br>";
}

?>

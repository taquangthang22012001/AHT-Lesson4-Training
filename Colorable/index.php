<?php
interface Colorable {
    public function howtoColor();
}

class square implements Colorable {
    public $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function getArea() {
        return $this->side * $this->side;
    }

    public function howToColor()
    {
        echo "Color all four sides.\n <br>";
    }
    
}

class Circle { // không có Colorable
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea() {
        return pi()* $this->radius * $this->radius;
    }
}
//TEST
function main() {
    $shapes = [
        new Square(5),
        new Circle(3),
        new Square(10)
    ];


foreach ($shapes as $shape) {
    if (method_exists($shape, 'getArea')) {
        echo "Area: " . $shape->getArea() . "\n";
        echo "<br>";
    }

    if ($shape instanceof Colorable) {
        $shape->howToColor();
    }
}
}
main();

 
<?php

class circle {
    const pi = 3.14;

    public function Area($radius) {
        return self::pi * ($radius*$radius);
    }
}

$circle = new circle;
echo $circle->Area(100);
?>
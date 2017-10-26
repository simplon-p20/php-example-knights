<?php

class Knight {
    private $life = 100;
    private $agility = 100;
    private $strength = 10;
    private $name;

    public function __construct($name, $options = [])
    {
        $this->name = $name;
        if(isset($options["life"])) {
            $this->life = $options["life"];
        }
        if(isset($options["agility"])) {
            $this->agility = $options["agility"];
        }
        if(isset($options["strength"])) {
            $this->strength = $options["strength"];
        }
        echo "je suis le chevalier $this->name<br>";
    }

    public function attack(Knight $other) {
        echo "je suis le chevalier $this->name, et j'attaque $other->name<br>";

        $precision = rand(0, 200);

        if($precision < $other->agility) {
            echo "(mais j'ai loupé mon coup)<br>";
        } else {
            $other->life -= $this->strength;
            // équivalent à :
            // $other->life = $other->life - $this->strength;
        }

        if($other->isAlive()) {
            $other->attack($this);
        }
    }

    public function isAlive() {
        return $this->life > 0;
    }
};

$lancelot = new Knight("Lancelot", ["life" => 120, "strength" => 20]);

var_dump($lancelot);

echo "<br>";
echo "<br>";

$bayard = new Knight("Bayard", ["agility" => 130]);

var_dump($bayard);

echo "<br>";
echo "<br>";

$lancelot->attack($bayard);

var_dump($lancelot);

echo "<br>";
echo "<br>";

var_dump($bayard);


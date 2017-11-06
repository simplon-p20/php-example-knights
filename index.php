<?php
//création d'un objet
class Knight { 
    private $life = 100; 
    private $agility = 100;
    private $strength = 10;
    private $name;
    //definir les propriétés d'objets 
    //(private donc accessible seulement depuis l'objet)

    public function __construct($name, $options = [])
    //définition d'une méthode(fonction dans une classe)
    //public: la méthode peut etre appelée en dehors de la classe
    //construct: méthode magique php.net/manual/fr/language.oop5.magic.php
    //$name,$option sont les paramètres de la méthode construct
    {
        $this->name = $name; 
    //$this représente l'instance sur laquelle on appelle la méthode 
    //(elle est toujours une instanc de sa classe) 
    //l'opérateur -> entre $this et name permet d'accèder à 
    //la propriété($name) de l'objet (Knight) )
        if(isset($options["life"])) { 
    // Si l'option life est définie alors elle prendra cette valeur
    //sinon elle prendra la valeur précédemment définie dans l'objet (Knight) 
            $this->life = $options["life"];
        }
        if(isset($options["agility"])) {
            $this->agility = $options["agility"];
        }
        if(isset($options["strength"])) {
            $this->strength = $options["strength"];
        }
        echo "je suis le chevalier $this->name<br>";
    // $this->name affiche le nom qui sera rentré en paramètre
    }

    public function attack(Knight $other) {
    //définition de la méthode attack de la classe Knight 
    //( qui peut s'écrire Knight::attack)
        echo "je suis le chevalier $this->name, et j'attaque $other->name<br>";

        $precision = rand(0, 200);
    //définition d'une variable qui génèrera un nombre compris entre 0 et 200

        if($precision < $other->agility) {
            echo "(mais j'ai loupé mon coup)<br>";
    //définition d'un test par une condition (un test est un type de structure de 
    //contrôle permettant l'affichage conditionnel d'une partie du code :
    // php.net/manual/fr/language.control-structures.php)
    // Si l'agilité de celui qui est attaqué est inférieure à la précision
    // de celui qui attaque alors, le echo s'affiche
        } else {
            $other->life -= $this->strength;
    // équivalent à :
    // $other->life = $other->life - $this->strength;
        }

        if($other->isAlive()) {
            $other->attack($this);
        }
    }
    //si other est encore vivant alors il attaque this (contre attaque)

    public function isAlive() {
        return $this->life > 0;
    }
    //methode publique qui retourne l'état du personnage (booléen)

};

$lancelot = new Knight("Lancelot", ["life" => 120, "strength" => 20]);
// création d'une instance de la classe Knight
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


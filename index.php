<?php

abstract class Company {
    public $name;
    public $location;
    public $tot_employees;
    public $costo_per_dipendente = 50000; // Supponiamo un costo fisso per dipendente
    public static $companies = [];

    public function __construct($_name, $_location, $_tot_employees = 0) {
        $this->name = $_name;
        $this->location = $_location;
        $this->tot_employees = $_tot_employees;
        self::$companies[] = $this;
    }

    public function calcolaSpesaAnnuale() {
        $spesa_annuale = $this->tot_employees * $this->costo_per_dipendente;
        echo "La spesa annuale per l'azienda {$this->name} è di €{$spesa_annuale}\n";
        return $spesa_annuale;
    }

    public static function calcolaSpesaTotale() {
        $spesa_totale = 0;
        foreach (self::$companies as $company) {
            $spesa_totale += $company->tot_employees * $company->costo_per_dipendente;
        }
        echo "La spesa totale per tutte le aziende è di €{$spesa_totale}\n";
    }
}

class Aulab extends Company {
    public function __construct($_name, $_location, $_tot_employees = 0) {
        parent::__construct($_name, $_location, $_tot_employees);
    }

    public function descriviti() {
        if ($this->tot_employees > 0) {
            echo "L'ufficio {$this->name} con sede in {$this->location} ha ben {$this->tot_employees} dipendenti\n";
        } else {
            echo "L'ufficio {$this->name} con sede in {$this->location} non ha dipendenti\n";
        }
    }
}

// Esempio di utilizzo
$aulab = new Aulab('Aulab', 'Italia', 50);
$aulab->descriviti();
$aulab->calcolaSpesaAnnuale();

class Amazon extends Company {}
class Zalando extends Company {}
class Unieuro extends Company {}
class Mediaworld extends Company {}

// Esempio di utilizzo per altre aziende
$amazon = new Amazon('Amazon', 'USA', 1000);
$zalando = new Zalando('Zalando', 'Germania', 200);
$unieuro = new Unieuro('Unieuro', 'Italia', 150);
$mediaworld = new Mediaworld('Mediaworld', 'Italia', 300);

$amazon->calcolaSpesaAnnuale();
$zalando->calcolaSpesaAnnuale();
$unieuro->calcolaSpesaAnnuale();
$mediaworld->calcolaSpesaAnnuale();

// Calcola la spesa totale per tutte le aziende
Company::calcolaSpesaTotale();
?>

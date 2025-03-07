
<?php

class Kniha
{

    public $Id;
    public $ISBN;
    public $Jmeno;
    public $Prijmeni;
    public $Kniha;
    public $Popis;
    public $Img;

    public function __construct($ISBN, $Jmeno, $Prijmeni, $Kniha, $Popis, $Img, $Id = -1)
    {
        $this->Id = $Id;
        $this->ISBN = $ISBN;
        $this->Jmeno = $Jmeno;
        $this->Prijmeni = $Prijmeni;
        $this->Kniha = $Kniha;
        $this->Popis = $Popis;
        $this->Img = $Img;
    }
}

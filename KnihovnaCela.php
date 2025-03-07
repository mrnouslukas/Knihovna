<?php

class KnihovnaCela
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Databaze::getInstance()->getConnection();
    }

    public function getAllBooks()
    {
        $stmt = $this->pdo->query("SELECT * FROM knihovna");
        $knihy = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $knihy[] = new Kniha($row["ISBN"], $row["Jmeno"], $row["Prijmeni"], $row["Kniha"], $row["Popis"], $row["Img"], $row["ID"]);
        }
        return $knihy;
    }

    public function createBook(Kniha $knihy)
    {
        $stmt = $this->pdo->prepare("INSERT INTO knihovna (ISBN, Jmeno, Prijmeni, Kniha, Popis, Img) VALUES (?,?,?,?,?,?)");
        return $stmt->execute([$knihy->ISBN, $knihy->Jmeno, $knihy->Prijmeni, $knihy->Kniha, $knihy->Popis, $knihy->Img]);
    }

    public function filterBooks($ISBN, $Jmeno, $Prijmeni, $Kniha)
    {
        $query = "SELECT * FROM knihovna WHERE 1=1";
        $params = [];

        if (!empty($ISBN)) {
            $query .= " AND ISBN = ?";
            $params[] = $ISBN;
        }
        if (!empty($Jmeno)) {
            $query .= " AND Jmeno LIKE ?";
            $params[] = "%{$Jmeno}%";
        }
        if (!empty($Prijmeni)) {
            $query .= " AND Prijmeni LIKE ?";
            $params[] = "%{$Prijmeni}%";
        }
        if (!empty($Kniha)) {
            $query .= " AND Kniha LIKE ?";
            $params[] = "%{$Kniha}%";
        }

         $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

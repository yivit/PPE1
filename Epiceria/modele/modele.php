<?php

class Modele
{

  private $pdo, $table;

  public function __construct($serveur, $bdd, $user, $mdp)
  {
    // Instanciation de la classe PDO
    $this->pdo = null;
    try{
      $this->pdo = new PDO("mysql:host=" . $serveur . "; dbname=" . $bdd, $user, $mdp);
    }catch (Exception $exp){
      echo "</br> Erreur de connexion à la BDD ". $bdd ;
    }

    $this->table = "";

  }

  public function setTable($table)
  {
    $this->table = $table;
  }


  public function selectAll()
  {
    if($this->pdo == null){
      return null;
    }else{
      // Execution de la requete de selection des eleves
      $sql = "select * from " . $this->table . " ;";
      $req = $this->pdo->prepare($sql);
      $req->execute();
      $res = $req->fetchAll();
      return $res;
    }
  }

  public function selectChamps($tab)
  {
    $champs = implode(",", $tab);

    if($this->pdo == null){
      return null;
    }else{
      // Execution de la requete de selection des eleves
      $sql = "select " . $champs . " from " . $this->table . " ;";

      $req = $this->pdo->prepare($sql);
      $req->execute();
      $res = $req->fetchAll();
      return $res;
    }

  }

  public function selectAllWhere($where)
  {
    $clause = array();
    $donnees = array();

    foreach ($where as $cle=>$valeur)
    {
      $clause[] = $cle . " = :" . $cle;
      $donnees[":".$cle] = $valeur;
    }
    $chaineClause = implode (" and ", $clause);

    $sql = "select * from " . $this->table . " where " . $chaineClause . " ; ";

    if($this->pdo == null){
      return null;
    }else{
      // Execution de la requete de selection des eleves
      $sql = "select * from " . $this->table . " ;";
      $req = $this->pdo->prepare($sql);
      $req->execute();
      $res = $req->fetch(PDO::FETCH_ASSOC);
      return $res;
    }
  }

  public function selectWhere($tab, $where)
  {
    $champs = implode(",", $tab);
    $clause = array();
    $donnees = array();

    foreach ($where as $cle=>$valeur)
    {
      $clause[] = $cle . " = :" . $cle;
      $donnees[":".$cle] = $valeur;
    }
    $chaineClause = implode (" and ", $clause);
    if($this->pdo == null){
      return null;
    }else{
      // Execution de la requete de selection des eleves
      $sql = "select " . $champs . " from " . $this->table . " where " . $chaineClause . " ; ";

      $req = $this->pdo->prepare($sql);
      $req->execute($donnees);
      $res = $req->fetchAll();
      return $res;
    }
  }

  public function existe($where)
  {
    $clause = array();
    $donnees = array();

    foreach ($where as $cle=>$valeur)
    {
      $clause[] = $cle . " = :" . $cle;
      $donnees[":".$cle] = $valeur;
    }
    $chaineClause = implode (" and ", $clause);
    if($this->pdo == null){
      return null;
    }else{
      // Execution de la requete de selection des eleves
      $sql = "select * from " . $this->table . " where " . $chaineClause . " ; ";

      $req = $this->pdo->prepare($sql);
      $req->execute($donnees);
      $res = $req->fetchAll();

      if($res->rowCount()){
        return true;
      }else{
        return false;
      }
    }
  }

  public function connexion($where)
  {
    $clause = array();
    $donnees = array();

    foreach ($where as $cle=>$valeur)
    {
      $clause[] = $cle . " = :" . $cle;
      $donnees[":".$cle] = $valeur;
    }
    $chaineClause = implode (" and ", $clause);
    if($this->pdo == null){
      return null;
    }else{
      // Execution de la requete de selection des eleves
      $sql = "select * from professionnel, client where " . $chaineClause . " ; ";

      $req = $this->pdo->prepare($sql);
      $req->execute($donnees);
      $res = $req->fetchAll();

      return $res;
    }
  }

  public function insert($tab)
  {
    $champs = array();
    $donnees = array();

    foreach($tab as $cle => $valeur)
    {
      $champs[] = ":".$cle;
      $donnees[":".$cle] = $valeur;
    }

  $chaineChamps = implode(",", $champs);

    $requete = "insert into " . $this->table . " values (null," . $chaineChamps . ");";

    // var_dump($requete);
    // die();

    if ($this->pdo != null)
    {
      $insert = $this->pdo->prepare($requete);
      $insert->execute($donnees);
    }
  }

  public function rechercher($motCle)
  {
    $requete = "select * from eleve where nom like :motcle or prenom like :motcle or classe like :motcle;";
    $donnees = array(':motcle' => '%' . $motCle . '%');

    if ($this->pdo != null)
    {
      $select = $this->pdo->prepare($requete);
      $select->execute($donnees);
      $res = $select->fetchAll();
      return $res;
    }else{
      return null;
    }

  }

  public function update($tab, $where)
  {
    $champs = implode(",", $tab);
    $clause = array();
    $donnees = array();

    foreach ($where as $cle=>$valeur)
    {
      $clause[] = $cle . " = :" . $cle;
      $donnees[":".$cle] = $valeur;
    }
    $chaineClause = implode (" and ", $clause);

    foreach($tab as $cle => $valeur)
    {
      $set[] = $cle . " =:" .$cle;
      $donnees[":".$cle] = $valeur;
    }
    $chaineSet = implode(",", $tab);
    if($this->pdo == null){
      return null;
    }else{
      // Execution de la requete de selection des eleves
      $sql = "update "  . $this->table . " set " . $chaineSet .  " where " . $chaineClause . " ; ";

      $req = $this->pdo->prepare($sql);
      $req->execute($donnees);
      $res = $req->fetchAll();
      return $res;
    }
  }

  public function supprimer($tab)
  {
    $champs = array();
    $donnees = array();
    foreach ($tab as $cle => $valeur) {
      $champs[] = $cle . " = :".$cle;
      $donnees[":".$cle] = $valeur;
    }
    $chaineChamps = implode(" and ", $champs);

    $requete = "delete from " . $this->table . " where " . $chaineChamps . " ; ";

    if ($this->pdo != null)
    {
      $select = $this->pdo->prepare($requete);
      $select->execute($donnees);
    }
  }
}

?>

<?php
  // include ("../modele/modele.php");

  class controleurProfessionnel
  {
    private $unModele;

    public function __construct($serveur, $bdd, $user, $mdp, $table)
    {
      // instanciation de la classe modele
      $this->unModele = new Modele ($serveur, $bdd, $user, $mdp);

      $this->unModele->setTable($table);
    }

    public function selectAll()
    {
      return $this->unModele->selectAll();
    }

    public function selectAllWhere($where)
    {
      return $this->unModele->selectAllWhere($where);
    }

    public function selectChamps($tab)
    {
      return $this->unModele->selectChamps($tab);
    }


    public function selectWhere($tab, $where)
    {
      return $this->unModele->selectWhere($tab, $where);
    }


    public function insert(Professionnel $unP)
    {
      $tab = $unP->serialiser();
      $this->unModele->insert($tab);
    }

    public function rechercher($motcle)
    {
      if(empty($motcle))
      {
        return null;
      }else{
        return $this->unModele->rechercher($motcle);
      }
    }

    public function update($tab, $where)
    {
      $this->unModele->update($tab, $where);
    }

    public function supprimer($tab)
    {
      $this->unModele->supprimer($tab);
    }

    public function getModele() {
      return $this->unModele;
    }

  } // Fin de la classe

?>

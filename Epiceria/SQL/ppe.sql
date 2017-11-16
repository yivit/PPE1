drop database if exists bdd_ppe;

create database bdd_ppe;

use bdd_ppe;

create table compte(
  idCompte int(11) not null auto_increment,
  libelle varchar(32),
  primary key (idCompte)
);

create table zoneG(
  idZoneG int(11) not null auto_increment,
  region varchar(32),
  arrondissement varchar(32),
  primary key (idZoneG)
);

create table categProf(
  idCategProf int(11) not null auto_increment,
  libelle varchar(32),
  primary key (idCategProf)
);

create table professionnel (
  idProf int(11) not null auto_increment,
  idCompte int(11) not null,
  idZoneG int(11) not null,
  idCategProf int(11) not null,
  nomDirigeant varchar(32),
  prenomDirigeant varchar(32),
  raisonSocial varchar(32),
  noSiret varchar(64),
  mail varchar(64),
  tel varchar(16),
  noRue varchar(32),
  nomRue varchar(32),
  cpostal varchar(10),
  ville varchar(32),
  pays varchar(64),
  login varchar(64),
  mdp varchar(64),
  lattitude double(5,5),
  longitude double(5,5),
  -- Rajouter une image et une description
  primary key (idProf),
  foreign key (idCompte) references compte(idCompte),
  foreign key (idZoneG) references zoneG(idZoneG),
  foreign key (idCategProf) references categProf(idCategProf)
);

create table client(
  idClient int(11) not null auto_increment,
  idCompte int(11) not null,
  nom varchar(32),
  prenom varchar(32),
  mail varchar(64),
  tel varchar(16),
  noRue varchar(32),
  nomRue varchar(32),
  cpostal varchar(10),
  ville varchar(32),
  pays varchar(64),
  login varchar(64),
  mdp varchar(64),
  primary key (idClient),
  foreign key (idCompte) references compte(idCompte)
);

create table tva(
  txTva float(5,2) not null,
  libelle varchar(32),
  primary key (txTva)
);

create table categProd(
  idCategProd int(11) not null auto_increment,
  libelle varchar(32),
  primary key (idCategProd)
);

create table produit(
  idProf int(11) not null,
  idProduit varchar(32),
  idCategProd int(11) not null,
  designation varchar(32),
  image longblob,
  qteDispo int(16),
  prixAchat float(5,2),
  prixVente float(5,2),
  primary key (idProf, idProduit),
  foreign key (idProf) references professionnel(idProf),
  foreign key (idCategProd) references categProd(idCategProd)
);

create table factureClient(
  idFacture int(11) not null auto_increment,
  idProf int(11) not null,
  prixTotal float(5,2),
  dateFac date,
  dateRef date,
  primary key (idFacture),
  foreign key (idProf) references professionnel(idProf)
);

create table factureProf(
  idFacture int(11) not null auto_increment,
  idProf int(11) not null,
  dateFac date,
  dateReg date,
  prixTotal float(5,2),
  primary key (idFacture),
  foreign key (idProf) references professionnel(idProf)
);

create table commande(
  idCom int(11) not null auto_increment,
  idClient int(11) not null,
  idFacture int(11) not null,
  dateCom date,
  primary key (idCom),
  foreign key (idClient) references client(idClient),
  foreign key (idFacture) references factureClient(idFacture)
);

create table ligneCom(
  idProf int(11) not null,
  idProduit varchar(32),
  idClient int(11) not null,
  idCom int(11) not null,
  qte int (5) not null,
  primary key (idProf, idProduit, idClient, idCom),
  foreign key (idProf, idProduit) references produit(idProf, idProduit),
  foreign key (idClient) references client(idClient),
  foreign key (idCom) references commande(idCom)
);


insert into zoneG values
(null, 'Île-de-France', '1er arr.'),
(null, 'Île-de-France', '2ème arr.'),
(null, 'Île-de-France', '3ème arr.'),
(null, 'Île-de-France', '4ème arr.'),
(null, 'Île-de-France', '5ème arr.'),
(null, 'Île-de-France', '6ème arr.'),
(null, 'Île-de-France', '7ème arr.'),
(null, 'Île-de-France', '8ème arr.'),
(null, 'Île-de-France', '9ème arr.'),
(null, 'Île-de-France', '10ème arr.'),
(null, 'Île-de-France', '11ème arr.'),
(null, 'Île-de-France', '12ème arr.'),
(null, 'Île-de-France', '13ème arr.'),
(null, 'Île-de-France', '14ème arr.'),
(null, 'Île-de-France', '15ème arr.'),
(null, 'Île-de-France', '16ème arr.'),
(null, 'Île-de-France', '17ème arr.'),
(null, 'Île-de-France', '18ème arr.'),
(null, 'Île-de-France', '19ème arr.'),
(null, 'Île-de-France', '20ème arr.');


create view StatsVendeur (nomVendeur, prenomVendeur, nomSociete, nomSociete CategorieCommerce, QteCommandee, QteFacturee) 
as select nomDirigeant, prenomDirigeant, raisonSocial, categProf.libelle, count(ligneCom.idCom),
factureProf.idFacture 
from professionnel, categProf, commande, ligneCom, 
where professionnel.idProf = ligneCom.idProf 
and factureProf.idCom = ligneCom.idCom
and commande.idFacture = factureProf.idFacture
and categProf.idCategProf= professionnel.idCategProf
group by ligneCom.idCom;

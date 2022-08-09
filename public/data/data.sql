
CREATE DATABASE commerce;

drop table appreciation;
drop table achats;
drop table compte_bancaire;
drop table personne;
drop table produits;

create table produits(
	idProduit varchar(10) primary key,
	images varchar(30),
	genre varchar(10),
	categorie varchar(20),
	types varchar(20),
	marque varchar(20),
	nom varchar(20),
	prix float,
	descri text,
	stock int(10)
);

create table personne(
	idPersonne varchar(10) primary key,
	mdp varchar(100),
	nom varchar(20)
);

create table appreciation(
	idAppreciation varchar(10) primary key,
	idProduit varchar(10),
	idPersonne varchar(10),
	nombreEtoiles int(20),
	commentaires text,
	dates date,
	foreign key(idProduit) references produits(idProduit),
	foreign key(idPersonne) references personne(idPersonne)
);

create table achats(
	idAchat varchar(10) primary key,
	idProduit varchar(10),
	quantite int(20),
	dates date,
	rabais int(20),
	foreign key(idProduit) references produits(idProduit)
);



create table compte_bancaire(
	idCompte varchar(10) primary key,
	idPersonne varchar(20),
	vola float,
	foreign key(idPersonne) references personne(id)
);




insert into produits values('PROD 01','images/image1.jpg','enfant','sport','ballonFoot','nike','FootNike',20,'ballon produit par nike',37);
insert into produits values('PROD 02','images/image2.jpg','homme','vetements','short','adidas','short_jean',25,'short authentique',33);



insert into personne values('PERS 01',sha1('rabe'),'Rabe');
insert into personne values('PERS 02',sha1('manda'),'Manda');


insert into appreciation values('PROD 01','manda',5,'norma le bola',"2020-11-21");
insert into appreciation values('PROD 02','sedra',7,'bonne quanlite',"2020-11-21");


insert into achats values('PROD 01',3,"2020-11-20",20);
insert into achats values('PROD 02',1,"2020-11-10",15);


insert into compte_bancaire values('PERS 01',10000);
insert into compte_bancaire values('PERS 02',19000);	
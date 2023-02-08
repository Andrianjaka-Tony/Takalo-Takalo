create database echange;
use echange;


create table client (
  id_client int primary key auto_increment,
  pseudo varchar(50),
  email varchar(30) unique,
  password varchar(30)
);
create table categorie (
  id_categorie int primary key auto_increment,
  designation varchar(30)
);
create table objet (
  id_objet int primary key auto_increment,
  designation varchar(30),
  description varchar(200),
  prix int,
  id_client int references client(id_client),
  id_categorie int references categorie(id_categorie)
);
create table photo (
  id_photo int primary key auto_increment,
  designation varchar(30),
  id_objet int references objet(id_objet)
);
create table echange (
  id_echange int primary key auto_increment,
  id_sender int,
  id_receiver int,
  objet_sender int REFERENCES objet(id_objet),
  objet_receiver int REFERENCES objet(id_objet),
  state int
);
create table historique(
  id_client int references client(id_client),
  id_objet int references objet(id_objet),
  date date
);


insert into client values(0, "admin", "admin@gmail.com", "administrateur");


insert into categorie values('null', 'Vetements');
insert into categorie values('null', 'DVD');
insert into categorie values('null', 'Bijoux');
insert into categorie values('null', 'Electronique');



-- CREATE OR REPLACE VIEW join_photo_objet AS
-- select 
-- o.id_objet, o.designation, o.description, o.prix, o.id_client,
-- p.designation as source
-- from objet as o
-- join photo as p
-- on o.id_objet = p.id_objet
-- order by id_objet desc;

-- select o.id_objet, o.designation, o.description, o.prix, o.id_client, p.designation as source from objet as o join photo as p on o.id_objet = p.id_objet order by id_objet desc;


-- create or replace view echange_produit as
-- select 
-- e.*,
-- o1.designation as desi1, o1.description as desc1, o1.prix as p1,
-- o2.designation as desi2, o2.description as desc2, o2.prix as p2
-- from echange as e 
-- join objet as o1 on o1.id_objet = e.objet_sender 
-- join objet as o2 on o2.id_objet = e.objet_receiver;

-- select e.*, o1.designation as desi1, o1.description as desc1, o1.prix as p1, o2.designation as desi2, o2.description as desc2, o2.prix as p2 from echange as e join objet as o1 on o1.id_objet = e.objet_sender join objet as o2 on o2.id_objet = e.objet_receiver;


-- create or replace view histo_objet as
-- select 
-- h.date, 
-- o.designation, o.description, o.prix, o.id_objet,
-- c.pseudo
-- from historique as h
-- join objet as o on o.id_objet = h.id_objet
-- join client as c on c.id_client = h.id_client;


-- select h.date, o.designation, o.description, o.prix, o.id_objet, c.pseudo from historique as h join objet as o on o.id_objet = h.id_objet join client as c on c.id_client = h.id_client;


select o.id_objet, o.designation, o.description, o.prix, o.id_client, p.designation as source from objet as o join photo as p on o.id_objet = p.id_objet where id_client != 0 order by id_objet desc;
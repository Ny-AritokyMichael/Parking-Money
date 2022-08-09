create database easyPark;
use easyPark;




create table admins(
    email varchar(50) not null,
    mdp varchar(50) not null
    );


    create table tarifs(
        idTarif serial primary key,
        duree VARCHAR(50) not null,
        temps double not null,
        prix double not null
    );



    create table parkings(
        idParking serial not null,
        numeroParking varchar(50) not null,
        type varchar(50) not null,
    );



    create table voitures(
        idVoiture serial primary key,
        marque VARCHAR(50) not null,
        numeroImmatricule varchar(50) not null,
        idUser int not null,
        dateDebut datetime not null,
        idParking int not null,
        idTarifs int not null,
        FOREIGN key (idUser) REFERENCES users (idUser),
        FOREIGN key (idParking) REFERENCES parkings (idParking),
        FOREIGN key (idTarifs) REFERENCES Tarifs (idTarifs)
    );


    create table getNow(
        idGetNow serial primary key,
        dateGetNow DATE
    );



    drop table admins;
    drop table voitures;
    drop table tarifs;
    drop table parkings;
    drop table voiture_sortants;
    drop table voiture_entrants;

    drop view parking_all;
    drop view all_all;
    drop view voiture_all;
    drop view entrant_all;
    drop view all_be;
    drop view sortant;
    drop view sortant_all;
    drop view chart;


insert into admins(email,mdp) values('admin@gmail.com','admin123');

insert into get_nows(dateGetNow) values('2022-01-01 00:00:00');

insert into tarifs(duree,temps,prix) values('null','null','null');
insert into tarifs(duree,temps,prix) values('15 minutes',15,3000);
insert into tarifs(duree,temps,prix) values('30 minutes',30,7000);
insert into tarifs(duree,temps,prix) values('1 heure',60,15000);
insert into tarifs(duree,temps,prix) values('2 heure',60,22500);

insert into users(name,contact,money,email,password) values ('null','null','null','null','null');
insert into users(name,contact,money,email,password) values ('Michael','+261',60000,'michael@gmail.com','michael@gmail.com');


update voitures set
    marque = 'Sprinter',
    numeroImmatricule = '3678 TAD',
    dateDebut = '2022-07-17 09:13:00',
    user_id = 2,
    parking_id = 1,
    tarif_id = 4
 where id = 1;

 update voitures set
    marque = 'Mazda',
    numeroImmatricule = '3456 TBB',
    dateDebut = '2022-07-17 08:47:00',
    user_id = 2,
    parking_id = 11,
    tarif_id = 2
 where id = 11;


  update voitures set
    marque = 'Starex',
    numeroImmatricule = '1234 TAB',
    dateDebut = '2022-07-17 08:00:00',
    user_id = 2,
    parking_id = 3,
    tarif_id = 4
 where id = 3;


   update voitures set
    marque = 'Getz',
    numeroImmatricule = '1498 TAF',
    dateDebut = '2022-07-17 10:10:00',
    user_id = 2,
    parking_id = 13,
    tarif_id = 5
 where id = 13;





update voiture_sortants set
    numeroImmatricule = '3678 TAD',
    dateFin = '2022-07-17 09:02:00',
    parking_id = 1
 where id = 1;


  update voiture_sortants set
    numeroImmatricule = '3456 TBB',
    dateFin = '2022-07-17 10:13:00',
    parking_id = 11
 where id = 11;


  update voiture_sortants set
    numeroImmatricule = '1234 TAB',
    dateFin = '2022-07-17 09:15:00',
    parking_id = 3
 where id = 3;


   update voiture_sortants set
    numeroImmatricule = '1498 TAF',
    dateFin = '2022-07-17 10:10:00',
    parking_id = 13
 where id = 13;



DELIMITER //

CREATE FUNCTION CalcAmende ( time_left int )
RETURNS INT

BEGIN

   DECLARE income INT;
   DECLARE amende INT;
   DECLARE min INT;

   SET income = 25;
   SET amende = 10000;
   SET min = time_left + 1;


   label1: WHILE income < min DO
     SET income = income + 25;
     SET amende = amende * 2;
   END WHILE label1;

   RETURN amende;

END; //

DELIMITER ;


    create view parking_all as
    select
    voitures.id as voiture_id,
    voitures.user_id,
    voitures.marque,
    get_nows.dateGetNow,
    voitures.numeroImmatricule,
    voitures.dateDebut,
    voiture_sortants.dateFin,
    users.name,
    users.contact,
    parkings.id,
    parkings.numeroParking,
    parkings.type,
    tarifs.duree,
    tarifs.temps,
    tarifs.prix
    from get_nows,voitures
    left join users on voitures.user_id = users.id
    join parkings on voitures.parking_id = parkings.id
    join voiture_sortants on voitures.parking_id = voiture_sortants.parking_id
    join tarifs on voitures.tarif_id = tarifs.id;


    create view all_all as
    select
    voiture_id,
    user_id,
        marque,
        numeroImmatricule,
        dateDebut,
        dateGetNow,
        name,
        contact,
        id,
        numeroParking,
        type,
        duree,
        temps,
        prix,
        case
            when Time(dateGetNow) = '00:00:00' then
             ((TIME_TO_SEC(Time(dateDebut)))/60 + temps - TIME_TO_SEC(current_time)/60 )
            else
             ( (TIME_TO_SEC(Time(dateDebut)))/60 + temps - TIME_TO_SEC(Time(dateGetNow))/60 )
        end as heure,
        case
            when Time(dateGetNow) = '00:00:00' then
            ( (((TIME_TO_SEC(Time(dateDebut)))/60 + temps - TIME_TO_SEC(current_time)/60)*100) / temps )
            else
            ( (((TIME_TO_SEC(Time(dateDebut)))/60 + temps - TIME_TO_SEC(Time(dateGetNow))/60)*100) / temps )
        end as pourcentage
    from parking_all
    group BY
    voiture_id,
    user_id,
    marque,
        numeroImmatricule,
        dateDebut,
        dateGetNow,
        name,
        contact,
        id,numeroParking,
        type,
        duree,
        temps,
        prix
        ;


        create view voiture_all as
select
 voiture_id,
    user_id,
        marque,
        numeroImmatricule,
        dateDebut,
        name,
        contact,
        id,
        numeroParking,
        type,
        duree,
        temps,
        prix,
        heure,
        (select calcAmende(abs(heure))) as amende,
        pourcentage,
        case
            when Time(dateGetNow) = '00:00:00' and Time_To_Sec(dateDebut) < TIME_TO_SEC(Time(current_time))  and pourcentage<0
                 then 'infraction'
            when Time(dateGetNow) != '00:00:00' and Time_To_Sec(dateDebut) < TIME_TO_SEC(Time(dateGetNow)) and pourcentage<0 then 'infraction'

             when Time(dateGetNow) = '00:00:00' and Time_To_Sec(dateDebut) < TIME_TO_SEC(Time(current_time)) and pourcentage>=0 and pourcentage<=100
                 then 'busy'
            when Time(dateGetNow) != '00:00:00' and Time_To_Sec(dateDebut) < TIME_TO_SEC(Time(dateGetNow)) and pourcentage>=0 and pourcentage<=100 then 'busy'

              when Time(dateGetNow) = '00:00:00'  and pourcentage is NULL or pourcentage>100
                 then 'free'
            when Time(dateGetNow) != '00:00:00'  and pourcentage is NULL or pourcentage>100
            then 'free'
        end as  'etat'
    from all_all
    ;




-- create view voiture_all as
--     select
--     voiture_id,
--     user_id,
--         marque,
--         numeroImmatricule,
--         dateDebut,
--         name,
--         contact,
--         id,
--         numeroParking,
--         type,
--         duree,
--         temps,
--         prix,
--         heure,
--         pourcentage,
--         case
--             when  Time_To_Sec(dateDebut) < TIME_TO_SEC(Time(dateGetNow)) and pourcentage<0 then 'infraction'
--             when Time_To_Sec(dateDebut) < TIME_TO_SEC(Time(dateGetNow)) and pourcentage>0 && pourcentage<100  then 'busy'
--             when Time_To_Sec(dateDebut) > TIME_TO_SEC(Time(dateGetNow))  then 'free'
--         end as etat
--     from all_all
--     ;


create view chart   AS
select
count(case when etat = 'free' then 1 end) as free,
count(case when etat = 'busy' then 1 end) as busy,
count(case when etat = 'infraction' then 1 end) as infraction
from voiture_all;




































select
voiture_entrants.marque,
voiture_entrants.numeroImmatricule,
voiture_entrants.dateDebut,
voiture_sortants.dateFin
from voiture_entrants
left join voiture_sortants on voiture_entrants.id = voiture_sortants.parking_id;


    create view entrant_all as
    select
    voiture_entrants.id as voiture_id,
    voiture_entrants.user_id,
    voiture_entrants.marque,
    get_nows.dateGetNow,
    voiture_entrants.numeroImmatricule,
    voiture_entrants.dateDebut,
    users.name,
    users.contact,
    parkings.id,
    parkings.numeroParking,
    parkings.dateParking,
    parkings.type,
    tarifs.duree,
    tarifs.temps,
    tarifs.prix
    from get_nows,voiture_entrants
    left join users on voiture_entrants.user_id = users.id
    left join parkings on voiture_entrants.parking_id = parkings.id
    join tarifs on voiture_entrants.tarif_id = tarifs.id
;


create view all_be as
    select
        entrant_all.voiture_id,
        entrant_all.user_id,
        entrant_all.marque,
        entrant_all.dateGetNow,
        entrant_all.numeroImmatricule,
        entrant_all.dateDebut,
        voiture_sortants.dateFin,
        entrant_all.name,
        entrant_all.contact,
        entrant_all.id,
        entrant_all.numeroParking,
        entrant_all.dateParking,
        entrant_all.type,
        entrant_all.duree,
        entrant_all.temps,
        entrant_all.prix
    from entrant_all
    join voiture_sortants on entrant_all.id = voiture_sortants.parking_id
    ;





    select all_be.id,all_be.marque,all_be.dateDebut,all_be.dateFin,all_be.temps
    from voitures
    left join all_be on voitures.parking_id = all_be.id
    where voitures.marque is not null;

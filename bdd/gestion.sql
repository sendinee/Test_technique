DROP database if EXISTS gestion;
CREATE database if NOT EXISTS gestion;
use gestion;

CREATE TABLE etudiant(
    idEtudiant int(4) auto_increment primary key,
    nom varchar(50),
    prenom varchar(50),
    mail varchar(1),
    idConvention int(4)
);

CREATE TABLE convention(
    idConvention int(4) auto_increment primary key,
    nom varchar(50),
    nbHeure time(6)
);

CREATE TABLE attestation(
    idAttestation int(4) auto_increment primary key,
    nom varchar(255),
    idConvention int(4),
    message varchar(255)
);

Alter table etudiant add constraint
    foreign key(idConvention) references convention(idConvention);

INSERT INTO convention(nom,nbHeure) VALUES
    ('SAADAOUI','25'),
    ('SALIM','10'),
    ('CHAADI','5'),
    ('FAOUZI','60'),
    ('ETTAOUSSI','8'),
    ('EZZAKI','94'),

    ('PUFFBALL','70'),
    ('PANACLOC','4'),
    ('PIERRE','65'),
    ('SOMADOO','57'),
    ('DESMA','31'),
    ('DIKABOU','22');


INSERT INTO attestation(nom,idConvention, message) VALUES
    ('SAADAOUI',1,''),
    ('SALIM',2,''),
    ('CHAABI',3,''),
    ('FAOUZI',4,''),
    ('ETTAOUSSI',5,''),
    ('EZZAKI',6,''),

    ('PUFFBALL',7,''),
    ('PANACLOC',8,''),
    ('PIERRE',9,''),
    ('SOMADOO',10,''),
    ('DESMA',11,''),
    ('DIKABOU',12,'');

INSERT INTO etudiant(nom,prenom,mail,idConvention) VALUES
    ('SAADAOUI','MOHAMMED','s.mohammed@formation-plus.com',1),
    ('SALIM','RACHIDA','s.rachida@formation-plus.com',2),
    ('CHAABI','OMAR','c.omar@formation-plus.com',3),
    ('FAOUZI','NABILA','f.nabila@formation-plus.com',4),
    ('ETTAOUSSI','KAMAL','e.kamal@formation-plus.com',5),
    ('EZZAKI','ABDELKARIM','e.adbelkaril@formation-plus.com',6),

    ('PUFFBALL','DIANE','p.diane@formation-plus.com',7),
    ('PANACLOC','JEFF','p.jeff@formation-plus.com',8),
    ('PIERRE','HENRY','p.henry@formation-plus.com',9),
    ('SOMADOO','REMIEL','s.remiel@formation-plus.com',10),
    ('DESMA','DAHLIA','d.dahlia@formation-plus.com',11),
    ('DIKABOU','BRYAN','d.bryan@formation-plus.com',12);


select * from convention;
select * from etudiant;
select * from attestation;


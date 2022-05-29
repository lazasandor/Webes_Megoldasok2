create database lacinema;  



create table movie(
     id int(11) NOT NULL, 
     title varchar(50) COLLATE utf8_hungarian_ci NOT NULL ) 
     ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

insert into movie(id,title) VALUES
    (1,'Volt egyszer egy Hollywood'),
    (2,'Toy Story 4'),
    (3,'Bosszúállók:Végjáték'),
    (4,'Joker');

create table projection(
    id int(11) NOT NULL,
    date datetime NOT NULL,
    movie_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

insert into projection(id,date,movie_id) VALUES
    (1,'2020-07-18 13:00:00',1),
    (2,'2020-07-18 15:00:00',2),
    (3,'2020-07-18 10:00:00',4),
    (4,'2020-07-18 18:00:00',3),
    (5,'2020-07-20 12:00:00',1),
    (6,'2020-07-20 08:00:00',2),
    (7,'2020-07-20 19:00:00',3),
    (8,'2020-07-20 20:00:00',4);

create table reservation(
    id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    projection_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

insert into reservation (id,user_id,projection_id) VALUES 
(5,10,3),
(6,10,8);

create table users(
    id int(11) NOT NULL,
    first_name varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
    last_name varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
    email varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
    password varchar(300) COLLATE utf8_hungarian_ci NOT NULL,
    username varchar(50) COLLATE utf8_hungarian_ci NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;





ALTER TABLE users
 ADD PRIMARY KEY(id);

 ALTER TABLE movie
 ADD PRIMARY KEY(id);

 ALTER TABLE reservation
 ADD PRIMARY KEY(id);

 ALTER TABLE projection
 ADD PRIMARY KEY(id);

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

  ALTER TABLE reservation
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

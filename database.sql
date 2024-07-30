CREATE DATABASE trgovina;

USE trgovina;

CREATE TABLE roza(
  id int PRIMARY KEY AUTO_INCREMENT,
  cena int NOT NULL,
  sezona nvarchar(50),   
  zaloga int NOT NULL,
  barva nvarchar(50),  
  ime nvarchar(100) NOT NULL unique, 
  slika nvarchar(2000)
);

CREATE TABLE user(
  id int PRIMARY KEY AUTO_INCREMENT,
  isAdmin boolean default false,
  username nvarchar(50) NOT NULL,
  email nvarchar(80) NOT NULL,
  geslo text NOT NULL
);

CREATE TABLE nakup(
  id int PRIMARY KEY AUTO_INCREMENT,
  kupec int,
  FOREIGN KEY (kupec) REFERENCES user(id),
  vsebina TEXT, 
  cena int,
  naslov nvarchar(100) NOT NULL,
  posta int NOT NULL,
  kraj nvarchar(100) NOT NULL,
  naslovnik nvarchar(100) NOT NULL,
  telefon int NOT NULL,
  datum date DEFAULT NOW(),
  complete boolean default false
);

INSERT INTO user(isAdmin, username, email, geslo) VALUES (true, 'admin', 'admin@mail.com', 'admin');

INSERT  INTO roza(cena, sezona, zaloga, barva, ime, slika) VALUES (10, 'Zima', 100,'Rdeča','Vrtnica', 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fget.pxhere.com%2Fphoto%2Fblossom-plant-photography-flower-petal-bloom-red-botany-flora-close-up-dahlia-late-summer-dahlia-garden-fiery-autumn-flower-macro-photography-flowering-plant-daisy-family-plant-stem-land-plant-garden-cosmos-206439.jpg&f=1&nofb=1&ipt=2c8ac014cd7b0f5d98f93cde308b86628c01c0bc67fd66841254a87a80c98799&ipo=images');


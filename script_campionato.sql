CREATE DATABASE campionato;


CREATE TABLE campionato.Piloti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    nazionalita VARCHAR(50),
    numero INT UNIQUE NOT NULL,
    id_casa INT,  
    FOREIGN KEY (id_casa) REFERENCES CaseAutomobilistiche(id) 
);



CREATE TABLE campionato.CaseAutomobilistiche (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    colore_livrea VARCHAR(50) NOT NULL
);


CREATE TABLE campionato.Gare (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    luogo VARCHAR(100),
);

ALTER TABLE campionato.Gare 
    ADD COLUMN luogo_id INT, 
    ADD CONSTRAINT fk_luogo 
    FOREIGN KEY (luogo_id) REFERENCES campionato.luogo_gara(id);



CREATE TABLE campionato.Risultati (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_gara INT,
    id_pilota INT,
    posizione INT NOT NULL,
    tempo TIME NOT NULL,  -- Tempo più veloce per il pilota nella gara
    FOREIGN KEY (id_gara) REFERENCES Gare(id),  -- Riferimento alla gara
    FOREIGN KEY (id_pilota) REFERENCES Piloti(id) -- Riferimento al pilota
);



create table campionato.luogo_gara(
id INT auto_increment primary key,
luogo varchar(100)
);


INSERT INTO campionato.luogo_gara (luogo) VALUES
('Montecarlo'),
('Monza'),
('Silverstone'),
('Circuit de Barcelona-Catalunya'),
('Circuit Paul Ricard'),
('Hockenheimring'),
('Circuit de Spa-Francorchamps'),
('Melbourne Grand Prix Circuit'),
('Autódromo José Carlos Pace'),
('Circuit of the Americas'),
('Baku City Circuit'),
('Circuit Gilles Villeneuve'),
('Sochi Autodrom'),
('Yas Marina Circuit'),
('Shanghai International Circuit'),
('Suzuka Circuit'),
('Miami Grand Prix Circuit');



INSERT INTO campionato.CaseAutomobilistiche (nome, colore_livrea) VALUES
('Mercedes', 'Argento e Verde'),  -- ID 1
('Red Bull', 'Blu e Rosso'),      -- ID 2
('Ferrari', 'Rosso Ferrari'),    -- ID 3
('McLaren', 'Arancione e Nero'), -- ID 4
('Alpine', 'Blu e Bianco'),      -- ID 5
('Alfa Romeo', 'Rosso e Bianco'),-- ID 6
('Aston Martin', 'Verde e Oro'), -- ID 7
('Williams', 'Blu e Bianco'),    -- ID 8
('Haas', 'Bianco e Rosso'),      -- ID 9
('AlphaTauri', 'Blu e Bianco');  -- ID 10



INSERT INTO campionato.Piloti (nome, cognome, nazionalita, numero, id_casa) VALUES
('Lewis', 'Hamilton', 'Britannico', 44, 1),  -- Mercedes
('Max', 'Verstappen', 'Olandese', 33, 2),  -- Red Bull
('Charles', 'Leclerc', 'Monegasco', 16, 3),  -- Ferrari
('Lando', 'Norris', 'Britannico', 4, 4),  -- McLaren
('Sergio', 'Perez', 'Messicano', 11, 2),  -- Red Bull
('Daniel', 'Ricciardo', 'Australiano', 3, 4),  -- McLaren
('Carlos', 'Sainz', 'Spagnolo', 55, 3),  -- Ferrari
('Esteban', 'Ocon', 'Francese', 31, 5),  -- Alpine
('Fernando', 'Alonso', 'Spagnolo', 14, 5),  -- Alpine
('Pierre', 'Gasly', 'Francese', 10, 5),  -- AlphaTauri
('Valtteri', 'Bottas', 'Finlandese', 77, 6),  -- Alfa Romeo
('Kimi', 'Raikkonen', 'Finlandese', 7, 6),  -- Alfa Romeo
('Sebastian', 'Vettel', 'Tedesco', 5, 7),  -- Aston Martin
('Lance', 'Stroll', 'Canadese', 18, 7),  -- Aston Martin
('George', 'Russell', 'Britannico', 63, 1),  -- Mercedes
('Nicholas', 'Latifi', 'Canadese', 6, 8),  -- Williams
('Mick', 'Schumacher', 'Tedesco', 47, 9),  -- Haas
('Nikita', 'Mazepin', 'Russo', 9, 9),  -- Haas
('Robert', 'Kubica', 'Polacco', 88, 6),  -- Alfa Romeo (come pilota di riserva)
('Zhou', 'Guanyu', 'Cinese', 24, 6);  -- Alfa Romeo





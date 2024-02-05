/* DDL - Data Definition Language */ 

CREATE DATABASE miodb; -- Crea un DB di nome miodb;
USE miodb; -- Seleziona il DB da utilizzare;
DROP DATABASE miodb; -- Cancella un DB di nome miodb;

CREATE TABLE IF NOT EXISTS miatab ( -- Crea una tabella di nome miatab se non esiste;
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, -- Crea una PRIMARY KEY con valori generati in automatico e auto incrementanti
    name VARCHAR(255) NOT NULL, -- Crea una colonna di tipo stringa non vuota
    age INT UNSIGNED NOT NULL, -- Crea una colonna di tipo int non vuota con valori positivi
    email VARCHAR(100) NOT NULL UNIQUE -- Crea una colonna di tipo stringa con valori univoci
);

DROP TABLE miatab; -- Cancella una tabella di nome miatab;

ALTER TABLE miatab ADD cf VARCHAR(16) NOT NULL UNIQUE; -- Modifico la struttura della tabella aggiungendo un nuovo campo
ALTER TABLE miatab RENAME COLUMN cf TO fiscal_code; -- Modifico la struttura della tabella rinominando un campo esistente
ALTER TABLE miatab DROP fiscal_code; -- Modifico la struttura della tabella cancellando un campo esistente

/* DML - Data Manipulation Language */ 

INSERT INTO miatab (name, age, email) -- Inserisco un RECORD nella tabella maitab nei campi (name, age, email)
    VALUES ('Mario', 25, 'm.rossi@gmail.com'); -- con questi valori VALUES ('Mario', 25, 'm.rossi@gmail.com')

-- Modifica i valori del campo age ed email con dei nuovi valori per tutte le righe che hanno un id uguale a quello inserito
UPDATE miatab SET age = 26, email = 'mario.rossi@gmail.com' WHERE id = 1; -- attenzione ad inserire sempre la clausola WHERE altrimenti vengono modificati tutti i record della tabella

-- Cancello tutti i valori della mia tabella per tutte le righe che hanno un id uguale a quello inserito
DELETE FROM miatab WHERE id = 1; -- attenzione ad inserire sempre la clausola WHERE altrimenti vengono eliminati tutti i record della tabella


/* DQL - Data Query Language */

SELECT name, email FROM miatab; -- Restituisce nome ed email di tutti i record presenti nella tabella
SELECT * FROM miatab; -- Restituisce tutti i campi di tutti i record presenti nella tabella
SELECT * FROM miatab WHERE name = 'Mario'; -- Restituisce tutti i campi di tutti i record che corrispondono alla clausola WHERE nella tabella
SELECT * FROM miatab WHERE name = 'Mario' AND age = 30; -- Restituisce tutti i campi di tutti i record che corrispondono alla clausola WHERE nella tabella
SELECT * FROM miatab WHERE age > 18;
SELECT * FROM miatab WHERE email LIKE '%.com'; -- Restituisce tutti i campi in cui il campo email finisca con .com
SELECT * FROM miatab WHERE email LIKE '%ro%'; -- Restituisce tutti i campi in cui il campo email contenga i caratteri 'ro'
SELECT * FROM miatab WHERE email LIKE 'ma%'; -- Restituisce tutti i campi in cui il campo email cominci con 'ma'
SELECT * FROM miatab WHERE email LIKE 'm%.com'; -- Restituisce tutti i campi in cui il campo email cominci con 'm' e finisca con .com
SELECT * FROM miatab WHERE email LIKE 'm_rio@example.com'; -- Restituisce tutti i campi in cui il campo email nel secondo carattere può avere qualsiasi cosa


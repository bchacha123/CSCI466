/*
          Name: Brayan Chacha Gonzalez (Z1861700)
          Date: 10/7/2020
     Professor: Lehuta
        Course: CSCI 466 Database
    Assignment: Creating a SQL script that creates 
		two tables called dogs and visits
		and will be motified through this
		assignemnt. 
*/

/* Removing all the tables that will be created below */
DROP TABLE dogs;
DROP TABLE visits;

/* Creating dog tbl */
CREATE TABLE dogs(
    dogid INT NOT NULL AUTO_INCREMENT,
    breed VARCHAR(255) NOT NULL,
    dname VARCHAR(255) NOT NULL,

-- Primary Key for the dog tbl
    PRIMARY KEY(dogid) 
);

/* inserting 5 rows of data into dog tbl */
INSERT INTO dogs
    (breed, dname)
    VALUES('Bulldog', 'Gus'),
          ('Beagle', 'Rex'),
          ('Dachshund', 'Rocky'),
          ('Poodle', 'Lucky'),
          ('Dobermann ', 'Coco');

/* Running the command DESCRIBE */
DESCRIBE dogs;

/* Running the Table to seee what was INSERTED */
SELECT * FROM dogs;

/* Creating visit tbl */
CREATE TABLE visits(
    visitid INT NOT NULL AUTO_INCREMENT, 
    dogid INT NOT NULL,
    visitdate DATE NOT NULL, 

    -- Primary key for the visit tbl
    PRIMARY KEY(visitid),

    -- Foreign key to dogs tbl 
    FOREIGN KEY(dogid) REFERENCES dogs(dogid)
);

/* Inserting rows into visit tbl */
INSERT INTO visits
    (dogid, visitdate)
    VALUES(1, "2020-06-20"); 

INSERT INTO visits
    (dogid, visitdate)
    VALUES(2, "2020-03-20");

INSERT INTO visits
    (dogid, visitdate)
    VALUES(2, "2018-04-21");
          
INSERT INTO visits
    (dogid, visitdate)
    VALUES(2, "2018-05-12");

INSERT INTO visits
    (dogid, visitdate)
    VALUES(3, "2018-07-03");

INSERT INTO visits
    (dogid, visitdate)
    VALUES(4, "2018-06-11"); 
        
INSERT INTO visits
    (dogid, visitdate)
    VALUES(5, "2018-11-20");

INSERT INTO visits
    (dogid, visitdate)
    VALUES(4, "2017-06-20");

/* Running the command DESCRIBE */
DESCRIBE visits;

/* Running the table to see what data is INSERTED */
SELECT * FROM visits;

/* ALTER the tbl adding the time of the visit */
ALTER TABLE visits ADD visittime TIME NOT NULL; 

/* UPDATING the visits tbl, changing value for the 
   newly-added attribute                         */
   
UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 1;

UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 2;

UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 3;

UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 4;

UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 5;

UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 6;

UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 7;

UPDATE visits
    SET visittime = CURTIME()
    WHERE visitid = 8;

/* RUNNING updating tbl */
SELECT * FROM visits;

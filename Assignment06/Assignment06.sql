/*
          Name: Brayan Chacha Gonzalez (Z1861700)
          Date: 10/23/2020
     Professor: Lehuta
        Course: CSCI 466 Database
    Assignment: SQL-DML-Singl Table 
                Writing another SQL script, this script should work with BabyName 
                database. Add a limit of 50. 
*/

/* 1. Select the BabyName */
USE BabyName;               -- Current Database  

/* 2. Show all of the table in the database */
SHOW TABLES;

/* 3. Show all of the columns and their types for each table in the database */
DESCRIBE BabyName;          -- DESCRIBE -> Display properties of column table 

/* 4. Show all of the years (only once = distinct) where your first name appears */
SELECT DISTINCT year        -- DISTINCT -> Display only once 
    FROM BabyName           -- Database Name  
    WHERE name = 'Brian';   -- Filtering by User name (Brian)

/* 5. Show all of the names from your birthday (1997) */
SELECT DISTINCT name        -- DISTINCT -> Display only once
    FROM BabyName           -- Database Name
    WHERE year = '1997';    -- Filtering by User year (1997)

/* 6. Display the most popular male and female names from the year of your birth */             
SELECT name 
FROM BabyName               -- Database Name
WHERE count IN              -- IN operator used to check current count against the list
    (SELECT MAX(count)      -- Subquery
        FROM BabyName 
        WHERE place = 'US'  -- Returning only place in US 
        AND year = '1997'   -- and Users bday year
        AND gender = 'M')   -- Male 
    UNION                   -- Union -> merging 
        SELECT name 
        FROM BabyName 
        WHERE count IN 
            (SELECT MAX(count) 
                FROM BabyName 
                WHERE place = 'US' 
                AND year = '1997' 
                AND gender = 'F');   -- Female 

/* 7. Show all the info available about names similar to your name */
/*    sort by alphabetical order -> name, count, and year.         */
SELECT * FROM BabyName              -- Selecting from all the columns from BabyName DB 
    WHERE name LIKE '%Brian%'       -- Creating a clause anything that is between 'Brian'
    ORDER BY name, count, year;     -- Sorting 

/* 8. Show how many rows are in the table */ 
SELECT COUNT(*) FROM BabyName;      -- Counting the content 

/* 9. Show how many names there were in the year 1972 */
SELECT COUNT(DISTINCT name)         -- NO duplicate values 
FROM BabyName                       -- Database Name 
    WHERE year = '1972';            -- Creating a filter only 1972 names 

/* 10. Show how many names are in the table for each sex from the year 1953 */
SELECT gender,                      -- Male or Female 
COUNT(DISTINCT name)                -- No Duplicate Values 
FROM BabyName
    WHERE year = '1953'             -- Specific year 1953
    GROUP BY gender;

/* 11. List how many different names there are for each place */ 
SELECT place,                       -- States 
COUNT(DISTINCT name)                -- Counting the names of each state 
FROM BabyName
    GROUP BY place;                 -- Grouping them by place 
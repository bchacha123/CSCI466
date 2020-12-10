/*
          Name: Brayan Chacha Gonzalez (Z1861700)
          Date: 9/30/2020
     Professor: Lehuta
        Course: CSCI 466 Database
    Assignment: Creating a Database for Serenity Spring Spa
                Creating SQL CREATE TABLE for each table that 
                was created in the database
*/

/*
                        Employee Table 

          Emp_ID:  Employee ID           -> XXXXXX           PRIMARY KEY
        Emp_Name:  Employee Name         -> XXXXXXX XXXXXXXX
       Job_Title:  Employee Job Title    -> XXXXXXXXXX
        Pay_Rate:  Employee Pay Rate     -> ##.##
    Emp_PhoneNum:  Employee Phone Number 
     Emp_Address:  Employee Address
       Emp_Email:  Employee Email
*/
CREATE TABLE Employee  
(
    Emp_ID          CHAR(6)   NOT NULL PRIMARY KEY,
    Emp_Name     VARCHAR(128) NOT NULL,
    Job_Title    VARCHAR(25)  NOT NULL,
    Pay_Rate     DECIMAL(4,2) NOT NULL,     
    Emp_PhoneNum VARCHAR(10),
    Emp_Address  VARCHAR(32),
    Emp_Email    VARCHAR(40)
);

/*
                         Client Table 

       Client_ID:  Client ID           -> XXXXXX            PRIMARY KEY
     Client_Name:  Client Name         -> XXXXXXX XXXXXXXX   
 Client_PhoneNum:  Cleint Phone Number 
  Client_Address:  Cleint Address
    Client_Email:  Cleint Email
*/
CREATE TABLE Client
(
    Client_ID          CHAR(6)   NOT NULL PRIMARY KEY,
    Client_Name     VARCHAR(128) NOT NULL,
    Client_PhoneNum VARCHAR(10),
    Client_Address  VARCHAR(32),
    Client_Email    VARCHAR(40)
);

/*
                            Service_tbl

     Services_ID:  Service ID          -> XXXXXX             PRIMARY KEY 
           Price:  Service Price       -> ###.##
    Service_Type:  Service Type  
      Client_ID†:  Cleint ID           -> XXXXXX             FOREIGN KEY
*/
CREATE TABLE Service_tbl
(
    Service_ID   CHAR(6)      NOT NULL,
    Price        DECIMAL(5,2) NOT NULL,  
    Service_Type VARCHAR(24)  NOT NULL,

    PRIMARY KEY (Service_ID),   -- Setting up PRIMARY KEY
    FOREIGN KEY (Client_ID) REFERENCES Client(Client_ID)
);

/*
                            Appointments Table 

        Appt_ID:  Appointment ID      -> XXXXXX             PRIMARY KEY
    Client_Name:  Client Name         -> XXXXXXX XXXXXXXX   
       Emp_Name:  Employee Name       -> XXXXXXX XXXXXXXX
      Appt_Date:  Date                -> YYYY-MM-DD
     Client_ID†:  Cleint ID           -> XXXXXX             FOREIGN KEY
*/
CREATE TABLE Appointments
(
    Appt_ID         CHAR(6)   NOT NULL,
    Client_Name  VARCHAR(128) NOT NULL,
    Emp_Name     VARCHAR(128) NOT NULL,
    Appt_Date       DATE      NOT NULL,

    PRIMARY KEY (Appt_ID),   -- Setting up PRIMARY KEY 
    FOREIGN KEY (Client_ID) REFERENCES Client(Client_ID)
);

/*
                                Bill Table 

        Bill_ID:  Bill ID             -> XXXXXX             PRIMARY KEY
     Service_ID:  Service ID          -> XXXXXX 
          Total:  Total Amount        -> XXX.XX
      Appt_Date:  Date                -> YYYY-MM-DD
     Client_ID†:  Cleint ID           -> XXXXXX             FOREIGN KEY
*/
CREATE TABLE Bill
(
    Bill_ID         CHAR(6)    NOT NULL,
    Service_ID      CHAR(6)    NOT NULL,
    Total        DECIMAL(5,2)  NOT NULL,  
    Appt_Date       DATE       NOT NULL,

    PRIMARY KEY (Bill_ID),   -- Setting up PRIMARY KEY 
    FOREIGN KEY (Client_ID) REFERENCES Client(Client_ID)   
);

/*
                        Schedule Table 
Schedule (PunchIn_ID, Emp_Name, Time_In, Time_out, Emp_ID†)
      PunchIn_ID:  Punch-in ID          -> XXXXXX           PRIMARY KEY
        Emp_Name:  Employee Name        -> XXXXXX     
         Time_In:  Time-in              -> HH:MM:SS
        Time_Out:  Time-Out             -> HH:MM:SS
          Emp_ID:  Employee ID          -> XXXXXX           FOREIGN KEY
*/
CREATE TABLE Schedule
(
    PunchIn_ID    CHAR(6)   NOT NULL,
    Emp_Name   VARCHAR(128) NOT NULL,  
    Time_in       TIME      NOT NULL,
    Time_out      TIME      NOT NULL,

    PRIMARY KEY (PunchIN_ID),
    FOREIGN KEY (EMP_ID) REFERENCES Employee(Emp_ID)
);
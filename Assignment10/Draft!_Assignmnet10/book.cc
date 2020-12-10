/*
	Name: Brayan Chacha Gonzalez (z1861700)
	Date: 11/20/20
   Professor: Lehuta 
      Course: CSCI 466 Database 
  Assignment: For this assignment we will create a C++ program that 
  	      will print reports on the books in the henrybooks 
	      using MariaDB server 
 */

#include <iostream>
#include <iomanip>
#include <mysql.h>//Need header file for MariaDB API
#include <string>

#define SERVER "courses"
#define USER "z1861700"
#define PASSWORD "1997Jun20"
#define DATABASE "henrybooks"

using namespace std;

int main()
{
	// Title 
  	cout << "\n";
	cout << "       H e n r y ' s   B o o k   S h o p      " << endl;
	cout << "----------------------------------------------" << endl;
	cout << "----------------------------------------------" << endl;
	cout << "          Available List of Books             " << "\n\n" << endl;

	// Connection to MariaDB Server 
	MYSQL *connection, mysql;

	// Initiazling a the connection object that was created 
	connection = mysql_init(&mysql);

	// Establishing the Connection to MariaDB 
	connection = mysql_real_connect(connection, SERVER, USER,PASSWORD, DATABASE,0,NULL,0);

	if (connection)
	{
		// Setting up an object pointer for result set 
		MYSQL_RES *use_result1;

		// Setting up an object for the rows 
		MYSQL_ROW row1;

		// Running my SQL query
		mysql_query(connection,"SELECT b.title, a.AuthorFirst, a.AuthorLast, b.Price FROM Book b, Author a, Wrote w WHERE w.AuthorNum = a.AuthorNum AND b.BookCode = w.BookCode;");

		// Downloading all the rows of the results from the SQL statment above 
		use_result1 = mysql_store_result(connection);

		// fetching the new row 
		while((row1 = mysql_fetch_row(use_result1)) != NULL)
		{
			// Displaying data 
			cout << row1[0] << ", " << row1[1] << " " << row1[2] << ", " << row1[3] << "\n" << endl; 

		}// End while loop

		mysql_free_result(use_result1);

		mysql_close(connection);
	

	}
	
	// Connection fail
	else
	{
		// Message for the User 
		cout << "The connection fail, Please try again!\n" << endl;
	}

	// Code above will display #1 
	// Author , Title , Price of book
	
	// Variable for user to pick from Menu
	int userChoice;
	string userAuthor;
	string userTitle;

	// Turning flag on, until switch statement turns it off 
	bool flagON = true;

	while(flagON != false)
	{
		cout << endl;
		cout << "* * * * * * * * * * * * * * * * * * * * * * *" << endl;
		cout << "	M E N U   T O   D A T A B A S E       " << endl;
		cout << " * * * * * * * * * * * * * * * * * * * * * * " << endl << endl;
		cout << "   1 - Author Search \n";
		cout << "   2 - Title  Search \n";
		cout << "   3 - EXIT   Database \n\n";
		cout << "   Please enter your choice and press ENTER: ";

		cin >> userChoice;

		switch(userChoice)
		{
			case 1:
				
				// Here we will ask the user to ENTER Author name 
				// according to the names that are in the database
				cout << "   ENTER Name of Author: ";
				cin >> userAuthor;
				//string query = "SELECT DISTINCT Title From Book JOIN Wrote Using (BookCode) JOIN Author USING (AuthorNum) WHERE AuthorFirst ='"+userAuthor+"' || AuthorLast = '"+userAuthor+"'";




				break;

			case 2:
				// Here we will ask the user to ENTER title of book
				// according to the title name in the database
				cout << "   ENTER title name: ";
				cin >> userTitle;
				break;
			case 3: 
				cout << "   EXIT PROGRAM" << endl;
				flagON = false;
				break;

			default:
				cout << endl;
				cout << "   Number should be 1 - 3 ONLY \n";
				cout << "   Please try again!";
				cin >> userChoice;
				break;

		}// End Switch statement 


	}// End switch loop

	return 0;
}// End Main


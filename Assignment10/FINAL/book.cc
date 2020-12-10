/*
		Name: Brayan Chacha Gonzalez (z1861700)
		Date: 11/20/20
   Professor: Lehuta 
      Course: CSCI 466 Database 
  Assignment: For this assignment we will create a C++ program that 
  	     	  will print reports on the books in the henrybooks 
	          using MariaDB server.
 */

#include <iostream>
#include <iomanip>
#include <mysql.h>
#include <string>

#define SERVER "courses"
#define USER "z1861700"
#define PASSWORD "1997Jun20"
#define DATABASE "henrybooks"

using namespace std;

// B o o l i s t 
// This function will pring the book and title and author 
// coming from the database -> henrybooks
void BookList(MYSQL *connection)
{

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
			cout << endl;

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
	cin.clear();

	exit(0);
}





// A u t h o r S e a r c h 2 
// This function will print a report showing all books by authors whose first or last 
// name match the user supplied. 
// OUTPUT FORMAT:
//			     Book Title 
				 
//			     Book Code 			Book Title 			AuthorFirst   AuthorLast      Price 

//			     Book Code 	 		BranchName          OnHand
void AuthorSearch2(MYSQL *connection)
{
	cin.clear();

	//Declaring variables for 
	string userAuthor;

	cout << endl;

	// Asking the user to enter the name of the author they want to search 
	// format: _______ _______ or _______ 
	cout << "   You enter option #2" << endl;
	cout << "   Enter the Author you are looking for: ";
	
	cin >> userAuthor;

	cin.clear();

	/* 		Q   U   E   R    Y     # 1        */


	// Running my SQL query
	string query = string("SELECT DISTINCT Title From Book JOIN Wrote USING (BookCode) JOIN Author USING (AuthorNum) WHERE AuthorFirst = '")+userAuthor+string("' OR AuthorLast = '")+userAuthor+string("'; ");

	// Setting up my result sets that will fetch its rows one at a time 
	int result_set = mysql_query(connection,query.c_str());

	MYSQL_RES *use_result2 = mysql_store_result(connection);

	// if the query is incorrect, display message to user 
	if(use_result2 == NULL)
	{
		cout << "An Error occured with the query, try again!" << endl;
	}
	else //Loop that will print my data 
	{
		MYSQL_ROW row2;
		unsigned columns = mysql_num_fields(use_result2);
		while(row2 = mysql_fetch_row(use_result2))
		{
			for (int i = 0; i < columns; i++)
			{
				cout << setw(5) << " " << row2[i] << " ";
 			}
			cout << endl << endl << endl; 

		}

	}
	// Free up memory from query above
	mysql_free_result(use_result2);



	/* 		Q   U   E   R    Y     # 2        */

	// This query will print the BookCode, Title, AuthrFirst - AuthorLast, and Price 
	string query2 = string("SELECT DISTINCT BookCode,Title,AuthorLast,AuthorFirst,Price From Book JOIN Wrote USING (BookCode) JOIN Author USING (AuthorNum) WHERE AuthorFirst = '")+userAuthor+string("' OR AuthorLast = '")+userAuthor+string("'; ");

	// Setting up my result sets that will fetch its rows one at a time 
	int result_set3 = mysql_query(connection,query2.c_str());

	MYSQL_RES *use_result3 = mysql_store_result(connection);

	// if the query is incorrect, display message to user 
	if(use_result3 == NULL)
	{
		cout << "An Error occured with the query, try again!" << endl;
	}
	else //Loop that will print my data 
	{
		MYSQL_ROW row3;
		unsigned columns = mysql_num_fields(use_result3);
		while(row3 = mysql_fetch_row(use_result3))
		{
			for (int i = 0; i < columns; i++)
			{
				cout << setw(5) << " " << row3[i] << " ";
 			}
			cout << endl << endl << endl; 

		}

	}


	// Free up memory from query above
	mysql_free_result(use_result3);


	/* 		Q   U   E   R    Y     # 3        */
	
	// This query will print the BookCode. Branch and showing OnHand Books
	string query3 = string("SELECT BookCode,BranchName,OnHand From Book JOIN Wrote USING (BookCode) JOIN Author USING (AuthorNum) JOIN Inventory USING (BookCode) JOIN Branch USING(BranchNum) WHERE OnHand >=1 AND AuthorFirst ='")+userAuthor+string("' OR AuthorLast = '")+userAuthor+string("'; ");
	
	// Setting up my result sets that will fetch its rows one at a time 
	int result_set4 = mysql_query(connection,query3.c_str());

	MYSQL_RES *use_result4 = mysql_store_result(connection);

	// if the query is incorrect, display message to user 
	if(use_result4 == NULL)
	{
		cout << "An Error occured with the query, try again!" << endl;
	}
	else //Loop that will print my data
	{
		MYSQL_ROW row4;

		unsigned columns = mysql_num_fields(use_result4);

		while(row4 = mysql_fetch_row(use_result4))
		{
			for (int i = 0; i < columns; i++)
			{
				cout << setw(5) << " " << row4[i] << " ";
 			}
			cout << endl << endl << endl; 

		}

	}

	// End Sub-Probram
	exit(0);

}// End AuthorSearch2




// T i t l e S e a r c h 
// This function will print a report showing all books by authors whose title
// match the user supplied. 
// OUTPUT FORMAT:	
//			     AuthorFirst		AuthorLast 

//			     BranchName         BranchLocation

//				 OnHand
void TitleSearch2(MYSQL *connection)
{
	cin.clear();

	//Declaring variables for 
	string userTitle;

	cout << endl;
	cout << "   You enter option #3" << endl;
	cout << "   Enter the Title you are looking for: ";
	
	//Using getline function to grab all the character User will use
	getline(cin, userTitle);

	/* 		Q   U   E   R    Y     # 1        */

	// This query will print the AuthorFirst and AuthorLast base on the Title the use supplied
	string Tquery = string("SELECT AuthorFirst, AuthorLast FROM Author WHERE AuthorNum IN (SELECT AuthorNum FROM Wrote WHERE BookCode IN (SELECT BookCode FROM Book WHERE Title='")+userTitle+"'));";

	// Setting up my result sets that will fetch its rows one at a time  
	int Tresult_set = mysql_query(connection,Tquery.c_str());

	MYSQL_RES *Tuse_result = mysql_store_result(connection);

	// if the query is incorrect, display message to user 
	if(Tuse_result == NULL)
	{
		cout << "An Error occured with the query, try again!" << endl;
	}
	else //Loop that will print my data
	{
		MYSQL_ROW Trow;

		unsigned columns = mysql_num_fields(Tuse_result);

		while(Trow = mysql_fetch_row(Tuse_result))
		{
			for (int i = 0; i < columns; i++)
			{
				cout << setw(5) << " " << Trow[i] << " ";
 			}
			cout << endl << endl << endl; 

		}

	}

	
	// Free up memory from query above
	mysql_free_result(Tuse_result);

	/* 		Q   U   E   R    Y     # 2        */

	// This query will pring the BranchName and Branch Location base on the Title the User entered 
	string Tquery4 = string("SELECT BranchName, BranchLocation FROM Branch WHERE BranchNum IN " 
                                                "(SELECT BranchNum FROM Inventory WHERE BookCode IN (SELECT BookCode FROM Book WHERE Title='" + userTitle + "'));");

	// Setting up my result sets that will fetch its rows one at a time  
	int Tresult_set2 = mysql_query(connection,Tquery4.c_str());

	MYSQL_RES *Tuse_result2 = mysql_store_result(connection);

	// if the query is incorrect, display message to user 
	if(Tuse_result2 == NULL)
	{
		cout << "An Error occured with the query, try again!" << endl;
	}
	else //Loop that will print my data
	{
		MYSQL_ROW Trow;
		unsigned columns = mysql_num_fields(Tuse_result2);
		while(Trow = mysql_fetch_row(Tuse_result2))
		{
			for (int i = 0; i < columns; i++)
			{
				cout << setw(5) << " " << Trow[i] << " ";
 			}
			cout << endl << endl << endl; 

		}

	}

	// Free up memory from query above
	mysql_free_result(Tuse_result2);

	/* 		Q   U   E   R    Y     # 3        */

	string Tquery5 = string("SELECT OnHand FROM Inventory WHERE BookCode IN (SELECT BookCode FROM Book WHERE Title='" +userTitle+ "');");

	// Setting up my result sets that will fetch its rows one at a time  
	int Tresult_set3 = mysql_query(connection,Tquery5.c_str());

	MYSQL_RES *Tuse_Result3 = mysql_store_result(connection);

	// if the query is incorrect, display message to user 
	if(Tuse_Result3 == NULL)
	{
		cout << "An Error occured with the query, try again!" << endl;
	}
	else //Loop that will print my data
	{
		MYSQL_ROW Trow2;

		unsigned columns = mysql_num_fields(Tuse_Result3);

		while(Trow2 = mysql_fetch_row(Tuse_Result3))
		{
			for (int i = 0; i < columns; i++)
			{
				cout << setw(5) << " " << Trow2[i] << " ";
 			}
			cout << endl << endl; 
		}
	}

	// Free up memory from query above
	mysql_free_result(Tuse_Result3);

}// End TitleSearch2


/*
**************************************************************
*		M   A   I   N      F  U  N  C  T  I  O  N  ! 		 *
**************************************************************
*/

int main()
{
	// Title 
  	cout << "\n";
	cout << "       H e n r y ' s   B o o k   S h o p      " << endl;
	cout << "----------------------------------------------" << endl;
	cout << "----------------------------------------------" << endl;

	// Library Initialization 
	int sql = mysql_library_init(0, NULL, NULL);

	// Connection to MariaDB Server 
	MYSQL *connection;

	// Initiazling a the connection object that was created 
	connection = mysql_init(NULL);

	// Establishing the Connection to MariaDB 
	if(mysql_real_connect(connection, SERVER, USER,PASSWORD, DATABASE,0,NULL,0) == NULL )
	{
		// Message for the User if connection fails
		cout << "The connection fail, Please try again!\n" << endl;
		exit(1);
	}
	
	// Variable for user to pick from Menu
	int userChoice;

	// Turning flag on, until switch statement turns it off 
	//bool flagON = true;
	cout << endl;
	cout << "* * * * * * * * * * * * * * * * * * * * * * *" << endl;
	cout << "	M E N U   T O   D A T A B A S E       " << endl;
	cout << " * * * * * * * * * * * * * * * * * * * * * * " << endl << endl;
	cout << "   1 - List of ALL books in the database (Title, Author, Cost) \n";
	cout << "   2 - Author  Search \n";
	cout << "   3 - Title   Search \n";
	cout << "   4 - EXIT    Database \n\n";
	cout << "   Please enter your choice and press ENTER: ";

	cin >> userChoice;

	// in case cin fails 
	if(cin.fail())
	{
		cin.clear();
		cin.ignore(10000, '\n');
	}

	while(userChoice != 4)
	{

		switch(userChoice)
		{
			case 1:
				
				// Here we will ask the user to press ENTER to see 
				// everything in the database Formar: Title, Author, Cost
				BookList(connection);
				break;


			case 2:
				cin.clear();
				// Here we will turn on the Author search 
				AuthorSearch2(connection);
				break;


			case 3:
				cin.clear();
				// Here we will ask the user to ENTER title of book
				// according to the title name in the database
				TitleSearch2(connection);
				break;

			case 4: 
				cout << "   EXIT PROGRAM" << endl;
				exit(0);
				break;

			default:
				cout << endl;
				cout << "   Number should be 1 - 3 ONLY \n";
				cout << "   Please try again!";
				break;

		}// End Switch statement 


	}// End While loop

	return 0;
}// End Main
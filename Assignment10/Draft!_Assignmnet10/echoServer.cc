// Creating my server 
#include<sys/types.h>
#include<sys/socket.h>
//
#include<stdio.h>
#include<strings.h>
#include<arpa/inet.h>
#include<netinet/in.h>
#include<unistd.h>
#include<stdlib.h>
#include<cstring>
#include<iostream>

using namespace std;

#pragma comment(lib,"ws2_32.lib")
int main(int argc, char * argv[])
{

char buffer[300];
int sock;
int serverlen;
double clientlen;
int received;

// structure for address of server 
struct sockaddr_in echoserver;

// structure for address of client
struct sockaddt_in *echoclient;

// creating the UDP socket 
if((sock = socket(AF_INET, SOCK_DGRAM, 0)) < 0){
	
	// print message if socket fails 
	perror("Failed to create socket");

	// exit the program 
	exit(EXIT_FAILURE);
}



	// constructing hte server sockaddr_in structure 
	// clear struct 
	memset(&echoserver, 0, sizeof(echoserver));

	// interner IP
	echoserver.sin_family = AF_INET;

	// any IP address 
	echoserver.sin_addr.s_addr = INADDR_ANY;

	// server port 
	echoserver.sin_port = htons (atoi(argv[1]));



	// bind the socket 
	serverlen = sizeof(echoserver);

	if(bind(sock, (struct sockaddr*) &echoserver, serverlen) < 0)
	{
		// print error msssage
		perror("Failed to bind server socket");

		// ecit the program 
		exit(EXIT_FAILURE);
	}



	// run until cancel 
	while(true)
	{
		
		// get the message from the client 
		clientlen = sizeof(echoclient);

		
		if ((received = recvfrom(sock, buffer, 256, 0, (struct sockaddr *) &echoclient, &clientlen)) < 0)
			       	{
					// print error message
					perror("Failed to receive message");

					// ecit the program
					exit(EXIT_FAILURE);
				}
		cerr << "Client Connected: " << inet_ntoa(echoclient.sin_addr) << "\n";

		// send message to cliente 
		if (sendto(sock,buffer, received, 0, (struct sockaddr *) &echoclient, clientlen) != received)
				{
					perror("Mismatch in number of echo'd bytes");

					exit(EXIT_FAILURE);
				}		
	}

close(sock);

return 0;

}


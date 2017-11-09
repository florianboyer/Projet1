#include <iostream>  
using namespace std; 
//Création d'une Class Contact dans un ficher externe (.h)
class Contact
{
	private :
    // Les proritétés de Contact
	string name;
	string surname;
	int old;

	public : 
	// Les méthodes de Contact
	string getName();
	string getSurname();
	int getOld();

	void setName(string thisName);
	void setSurname(string thisSurame);
	void setOld(int thisOld);

	void display(); // méthode d'affichage
	void input();  // méthode de saisie par l'utilisateur
}; 
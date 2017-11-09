#include <iostream>  
using namespace std; 
//Création d'une Class Person dans un ficher externe .h
class Person
{
	private :
    // Les proritétés de Person
	string name;
	string surname;
	int old;

	public : 
	string getName();
	string getSurname();
	int getOld();

	void setName(string thisName);
	void setSurname(string thisSurame);
	void setOld(int thisOld);

	void display(); // méthode d'affichage
	void input();  // méthode de saisie par l'utilisateur
}; 

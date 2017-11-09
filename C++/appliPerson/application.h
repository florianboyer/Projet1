#include <vector>
#include "person.h"

//Création d'une Class Application dans un ficher externe .h
class Application
{
	private :

	vector <Person> vectPerson;
	void afficherMenu(); //méthode d'affichage du Menu
	char saisieChoix(); //méthode de saisie du choix par l'utilisateur
	void actionChoix(char leChoix); // méthode de récuparation du choix
	void ajouterPerson(); // méthode d'ajout d'une Personne
	void afficherPerson(); //méthode daffiche des personnes
	Person rechercherPerson(string chainRecherche); //méthode de recherche d'une Personne

	public :

	void run();
};

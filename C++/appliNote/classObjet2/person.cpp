#include "person.h" // Relier la class Contact externe à ce fichier (entre "" pour les fichier écrit par moi-même)
// Codage des méthode présent dans la Class
string Contact::getName()
{
	return name;
}

string Contact::getSurname()
{
	return name;
}

int Contact::getOld()
{
	return old;
}

void Contact::setName(string thisName)
{
	name = thisName;
}

void Contact::setSurname(string thisSurname)
{
	name = thisSurname;
}

void Contact::setOld(int thisOld)
{
	name = thisOld;
}

void Contact::display()
{
	cout << "Vous êtes Mr/Mme " << name << " ";
	cout << surname << ", \n" ;
	cout << "agé(e) de "<< old << "ans. \n\nJe vous souhaites la bienvenue.\n\n";
}

void Contact::input()
{ 	
	cout << "\nSaisir votre nom : " ;
	getline(cin,name); //getline pour les strings
	cout << "Saisir votre prénom : ";
	getline(cin,surname); //getline pour les strings
	cout << "Saisir votre âge : ";
	cin >> old;
	cout << "\n\n";
}

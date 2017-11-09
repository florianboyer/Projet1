#include "person.h" // Relier la class Person externe à ce fichier (entre "" pour les fichier écrit par moi-même)
// Codage des méthode présent dans la Class
string Person::getName()
{
	return name;
}

string Person::getSurname()
{
	return surname;
}

int Person::getOld()
{
	return old;
}

void Person::setName(string thisName)
{
	name = thisName;
}

void Person::setSurname(string thisSurname)
{
	name = thisSurname;
}

void Person::setOld(int thisOld)
{
	name = thisOld;
}

void Person::display()
{
	cout << "\nMr/Mme " << name << " ";
	cout << surname << ", \n" ;
	cout << "agé(e) de "<< old << "ans. \n\n";
}

void Person::input()
{ 	
	cout << "\nSaisir nom : " ;
	getline(cin,name); //getline pour les strings
	cout << "Saisir prénom : ";
	getline(cin,surname); //getline pour les strings
	cout << "Saisir âge : ";
	cin >> old;
	cout << "\n\n";
}
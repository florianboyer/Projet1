#include "biche.h"

Biche::Biche(string nomAnimal, string dateNaissanceAnimal, Animal * pereAnimal, Animal * mereAnimal, int bicheTailleOreils)
	:Animal(nomAnimal, dateNaissanceAnimal, pereAnimal, mereAnimal)
{
	tailleOreils = bicheTailleOreils;
}

void Biche::crier()
{
	cout << "BIBICHE, je brame"<<endl;
}
void Biche::display()
{
	cout <<"___________ BICHE ___________"<<endl;
	crier();
	Animal::display();
	cout << "La taille de ses oreils sont de "<<tailleOreils<<"cm."<<endl<<endl;
}
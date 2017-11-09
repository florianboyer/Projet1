#include "lion.h"

Lion::Lion(string nomAnimal, string dateNaissanceAnimal, Animal * pereAnimal, Animal * mereAnimal, int lionTailleCriniere)
	:Animal(nomAnimal, dateNaissanceAnimal, pereAnimal, mereAnimal)
{
	tailleCriniere = lionTailleCriniere;
}

void Lion::crier()
{
	cout << "RRRWAAAARRRH, je rugis"<<endl;
}
void Lion::display()
{
	cout <<"___________ LION ___________"<<endl;
	crier();
	Animal::display();
	cout << "Sa taille de crinière est de "<<tailleCriniere<<"cm."<<endl<<endl;
}
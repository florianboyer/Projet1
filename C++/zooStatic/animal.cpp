#include "animal.h"

int Animal::nbAnimal=0;

void Animal::display()
{
	cout << "Un animal a rejoins le zoo, qui s'appel : " << nom <<" né le "<< dateNaissance <<endl<<endl;
}
Animal::Animal(string nomAnimal, string dateNaissanceAnimal, Animal * pereAnimal, Animal * mereAnimal)
{
	nom = nomAnimal;
	dateNaissance = dateNaissanceAnimal;
	pere = pereAnimal;
	mere = mereAnimal;

	nbAnimal++;
}
Animal::~Animal()
{
	if(nbAnimal==2)
	{
		cout << "Pumba mange Bambie..."<<endl;
	}
	if(nbAnimal==1)
	{
		cout << "Alors on fusille Pumba !"<<endl;
	}
	nbAnimal--;
	displayNbAnimaux();
}

void Animal::displayNbAnimaux()
{
	cout<<"Il y a "<<nbAnimal;
	if(nbAnimal<2)
	{
		cout << " animal dans le zoo."<<endl<<endl;
	}
	else
	{
		cout << " animaux dans le zoo."<<endl<<endl;
	}
}
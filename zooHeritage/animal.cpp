#include "animal.h"

int Animal::nbAnimal=0;

void Animal::display()
{
	cout << "Un animal a rejoins le zoo, qui s'appel : " << nom <<" né le "<< dateNaissance <<endl;
	if (pere !=NULL)
	{
		cout <<"Père :"<<pere<<endl;
	}
	else 
	{
		cout <<"Père inconnu"<<endl;
	}
	if (mere !=NULL)
	{
		cout <<"Mère :"<<mere<<endl;
	}
	else 
	{
		cout <<"Mère inconnu"<<endl;
	}
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
		cout << "Simba mange Bambie..."<<endl;
	}
	if(nbAnimal==1)
	{
		cout << "Alors on fusille Simba !"<<endl;
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
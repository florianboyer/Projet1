#ifndef BICHE
	#define BICHE
/**
* @file BICHE.h
* @author BAYEUX Rémy
* @version 0.1
*/
#include "animal.h"

class Biche : public Animal
{	
	protected :
		int tailleOreils;

	public :
		Biche(string nomAnimal, string dateNaissanceAnimal, Animal * pereAnimal, Animal * mereAnimal, int bicheTailleOreils);
		void display();
		void crier();

};

#endif
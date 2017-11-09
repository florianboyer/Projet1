#ifndef LION
	#define LION
/**
* @file lion.h
* @author BAYEUX Rémy
* @version 0.1
*/
#include "animal.h"

class Lion : public Animal
{	
	protected :
		int tailleCriniere;

	public :
		Lion(string nomAnimal, string dateNaissanceAnimal, Animal * pereAnimal, Animal * mereAnimal, int lionTailleCriniere);
		void display();
		void crier();

};

#endif
#ifndef ANIMAL
	#define ANIMAL
/**
* @file animal.h
* @author BAYEUX Rémy
* @version 0.1
*/
using namespace std;
#include <iostream>

class Animal
{
	private :
		string nom;
		string dateNaissance;
		Animal * pere;
		Animal * mere;

	public :

		static int nbAnimal;
		static void displayNbAnimaux();

		void display();
		void crier();
		
		Animal(string nomAnimal, string dateNaissanceAnimal, Animal * pereAnimal, Animal * mereAnimal);
		~Animal();
};

#endif
#include "animal.h"

int main()
{
	Animal::displayNbAnimaux();
	Animal bambie("Bambie","02/02/2001",NULL,NULL);
	bambie.display();
	Animal::displayNbAnimaux();
	Animal pumba("Pumba","18/02/1998",NULL,NULL);
	pumba.display();
	Animal::displayNbAnimaux();

	return 0;
}
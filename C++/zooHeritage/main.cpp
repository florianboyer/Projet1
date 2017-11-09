#include "animal.h"
#include "lion.h"
#include "biche.h"

int main()
{
	Animal::displayNbAnimaux();
	Biche bambie("Bambie","02/02/2001",NULL,NULL,18);
	bambie.display();
	Animal::displayNbAnimaux();
	Lion simba("Simba","18/02/1998",NULL,NULL,25);
	simba.display();
	Animal::displayNbAnimaux();
	return 0;
}
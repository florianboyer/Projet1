#include "person.h" // Rélier la Class au programme main
int main()
{
	Person moi; //Création d'un objet pour la Class
	Person lui ("Lance","Pierre",21);
	moi.display(); //Affichage de lui
	lui.display(); // Affichage de moi

	return 0;
}
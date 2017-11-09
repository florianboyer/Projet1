#include <iostream> 
#include <vector> //Bibiliothèque du vector

using namespace std;

int main()
{
	vector <int> vectQte; //Déclaration du vector nommé vectQte
	vectQte.push_back(6); // Ajout de la première cellule par 6
	vectQte.push_back(12); // Ajout de la deuxième cellule par 12
	vectQte.push_back(24);  // Ajout de la troisième cellule par 24

	for (int indice=0; indice<vectQte.size(); indice++) // boucle pour afficher , celon la taille du tableau
	{
		cout <<"La quantitée indice "<<indice<<" : "<<vectQte[indice]<<"kg"<<" ou "<<vectQte.at(indice)<<"kg."<<endl; //affichage de la cellule celon "indice"
	} 
}
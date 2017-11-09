#include <iostream>
using namespace std;

int main()
{
	int nb1;
	int nb2;
	cout << "Saisir deux nombres " << endl << "Nombre 1 : ";
	cin >> nb1;
	cout << "Nombre 2 : ";
	cin >> nb2;

	int * pLePlusPetit, * pLePlusGrand;
	if (nb1==nb2)
	{
		cout << "Les deux nombres ont la même valeur"<<endl;
	}
	else 
	{
		if (nb1>nb2) 
		{
			pLePlusGrand = &nb1;
			pLePlusPetit = &nb2;
		}
		else
		{
			pLePlusGrand = &nb2;
			pLePlusPetit = &nb1;
		}

	cout << "Du plus petit au plus grand : " << * pLePlusPetit <<" / "<< * pLePlusGrand << endl;
	cout << "L'adresse de nb1 est : " << &nb1 <<" et l'adresse de nb2 est : " << &nb2 << endl;
	}
}
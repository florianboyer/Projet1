#include "application.h"

using namespace std;

void Application::run() //pour faire tourner l'application		
{    
	char sonChoix;
	do {      
		afficherMenu();
		sonChoix=saisieChoix();
		actionChoix(sonChoix);
		}
	while(sonChoix!='q'); 
}

void Application::afficherMenu()
{
	cout<< endl <<"-----------------Bienvenu dans le Menu du gestion de personnes !----------------" << endl << endl;
	cout<<"Liste des commandes :"<< endl;
	cout<<"- a pour Afficher"<< endl;
	cout<<"- j pour aJouter"<< endl;
	cout<<"- r pour Rechercher"<< endl;
	cout<<"- q pour Quitter"<< endl << endl;
}

char Application::saisieChoix()
{	
	char choix;
	do{
		cout << "Choisissez votre action : ";
		cin >> choix;
		cin.ignore(1); //je bouffe le "entrée" qu'il a tapé après!
		cout << endl; 
		if (!(choix=='a' || choix=='j' || choix=='r' || choix=='q'))
		{
		cout<< "Vous n'avez pas rentré une commande valable, veuillez réessayer."<< endl << endl;
		}
	}
	while (!(choix=='a' || choix=='j' || choix=='r' || choix=='q'));

	return choix;
}

void Application::actionChoix(char leChoix)
{
	string saRecherche;
	Person laPersonne;
	switch(leChoix)
	{
		case 'a': cout << "-----Vous avez choisie l'action d'affichage-----"<<endl<<endl;
			afficherPerson(); break;
		case 'j': cout << "-----Vous avez choisie l'action d'ajout-----"<<endl<<endl;
			ajouterPerson(); break;
		case 'r': cout << "-----Vous avez choisie l'action de recherche-----"<<endl<<endl;
			cout << "Entrez votre recherche par nom ou par prénom : ";
			getline(cin,saRecherche);
			laPersonne=rechercherPerson(saRecherche);
			if(laPersonne.getName()=="")
			{
				cout<<endl<<"!!!!!Aucun résultat pour la recherche \""<<saRecherche<<"\" n'a été trouvée!!!!!"<<endl;
			}
			else laPersonne.display();
			break;
		case 'q': cout << "Êtes vous sûr(e) de vouloir quitter l'application? (y/n)"<<endl; 
			char quitter;
			cin >> quitter;
			cin.ignore(1);
			if (quitter=='n') 
			{
				run();
			}
			else 
			{
				leChoix='q';
			}
			break;
	}
}

void Application::afficherPerson()
{
	int nbPerson=vectPerson.size(); //déclaration du nombre de Personne
	for (int noPerson=0; noPerson<nbPerson;noPerson++) //Boucle parcourant le vecteur Personne
	{
		cout <<noPerson+1<<")";
		vectPerson[noPerson].display(); //affiche la Personne celon l'indice noPerson
	}
	if (nbPerson==0) 
	{
		cout<<"Il n'y à personne d'enregistré."<<endl;
	}
}

void Application::ajouterPerson()
{
	Person personAAjouter; //déclaration du nombre de Personne
	personAAjouter.input(); //saisir la personne par l'utilisateur
	vectPerson.push_back(personAAjouter); //ajout de la personne dans le vecteur
}

Person Application::rechercherPerson(string chainRecherche)
{	
	Person laPersonne;

		int nbPerson=vectPerson.size();

		for (int noPerson=0; noPerson<nbPerson;noPerson++) //Boucle parcourant le vecteur Personne
		{
			if(chainRecherche==vectPerson[noPerson].getName() or chainRecherche==vectPerson[noPerson].getSurname())
			{
				return(vectPerson[noPerson]);
			}
			
		}

		return laPersonne;
	
}
<u>Mode de déploiement</u>

- Outil nécéssaires pour faire tourner l'application:

	- Une plateforme de développement Web comportant PHP >=8.0, Apache et MySQL >= 5.7
		=> Exemple: Wamp, Mamp, Xamp
	- composer
	- un invité de ligne de commande en mode console
		=> Ex cmd, terminal, POWERSHELL
	- un accès internet

- Migrer l'application sur son pc en local:

	1 - Cloner le répertoire du git avec la commande la commande:

		git clone https://github.com/jerem988/test-paravent.git
	
	2 - Renommer le fichier .env.example en .env
	
	3 - Dans un invité de commande se positionner à la racine du projet et lancer la commande suivante:
		
		composer install

- Le fichier avec le jeux de données modifiable se trouve dans le répertoire storage/app/data-set-continent

- Pour executer le script lancer la commande:

		php artisan surface-abri:get
	
	
- Pour lancer les tests unitaires:
	
		php artisan test
	
	


## Pré-requis
- Installer Docker version ^23.0.5
- Instaler Node.js v12.22.9
- Installer GNU Make 4.3

## Initialisation du projet
1. Lancer la commande `docker compose build` pour construire le docker
2. Lancer la commande `make init` (lance le docker up / composer install / npm install)
3. Lancer la commande `make database-init` (crée / migrate et charge les fixtures de la bdd)
4. Vous pouvez vous rendre sur l'api :
   - Soit via l'interface Api-Platform Swagger : [http://127.0.0.1:8000/api](http://127.0.0.1:8000/api)
   - Soit via postman en important le fichier qui se trouve à la racine (v2.1): [CinemaAPI.postman_collection.json](CinemaAPI.postman_collection.json)
5. Accès à PhpMyAdmin : [http://127.0.0.1:8080](http://127.0.0.1:8080)
   - User : root
   - Password : [laisser vide]
# Webflix
Voici le projet Laravel.
## Installation
La première étape du projet pour travailler dessus, c'est de cloner le dépôt :
```bash
git clone ...
```
Il faut installer les dépendances :

```bash
composer install
npm install
```

Il faut ensuite copier le fichier `.env.example` :
```bash
# Crée le fichier .env
php -r "file_exists('.env') || copy('.env.example', '.env');"
```
N'oublions pas de générer la clé :
```bash
php artisan key:generate
```

Pour la base de données, on a les migrations :
N'oubliez pas la clé API dans le `.env` :

```bash
php artisan migrate
THEMOVIEDB_API_KEY=???
```

## Outils

Si on veut lister les routes de l'application :
Pour la base de données, on a les migrations :

```bash
php artisan route:list
php artisan migrate
# Pour remplir la base
php artisan migrate:fresh --seed
```

Pour remplir la BDD, on peut faire :
## Workflow

Si vous travaillez sur le front, n'oubliez pas de lancer le serveur de dev :

```bash
# Ajoute les données
php artisan db:seed
# Vide la base
php artisan migrate:fresh --seed
npm run dev
```

N'oubliez pas la clé API dans le `.env` :
## Commandes utiles

Si on veut lister les routes de l'application :

```bash
THEMOVIEDB_API_KEY=???
php artisan route:list
```
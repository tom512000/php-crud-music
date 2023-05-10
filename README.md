# PHP - Crud Music
## Tom Sikora TD3
## Installation / Configuration
- `php -S localhost:8000` : Lancement du serveur interne.

- `php -S localhost:8000 -t public` : Option -t permet de désigner le répertoire comme racine des ressources.

- `php -d display_errors -S localhost:8000` : Retour rapide sur les erreurs d'écriture en PHP.

## Sommaire
- ✔️ 1. Versionnage du projet
- ✖️ 2. Découpage logique du projet
    -  ✔️️ 2.1. Mise en place du projet
    -  ✔️ 2.2. Entités d'accès aux données et tests
    -  ✖️ 2.3. Structure HTML, CSS et tests d'acceptation
    -  ✖️ 2.4. Création, édition et suppression d'entités

## Slyle de codage
1. Télécharger et Placer le fichier de configuration à la racine du projet (.php-cs-fixer.php).
2. Première vérification manuelle avec la commande `vendor/bin/php-cs-fixer fix --dry-run`.
3. Le fichier « src/Mypdo.php » n'est pas valide (option `--dry-run` ou test à blanc demande une exécution normale, mais aucun fichier n'est modifié).
4. Nouvelle vérification manuelle avec la commande `vendor/bin/php-cs-fixer fix --dry-run --diff`.
5. Correction du fichier « src/Mypdo.php » (option `--diff` affiche les différences entre l'original et ce qui est ou serait corrigé).
6. Dernière vérification manuelle avec la commande `vendor/bin/php-cs-fixer fix`.
7. Correction du fichier « src/Mypdo.php ».

## Amélioration de la DX (« Developer eXperience »)
Grâce au script start:linux dans le fichier « composer.json », la commande `php -d display_errors -S localhost:8000 -t public/` est remplacée par la commande `composer start:linux` qui facilite donc son utilisation.

## Configuration de la base de données
Le fichier « .mypdo.ini » est un fichier de configuration qui remplace la ligne `MyPDO::setConfiguration('mysql:host=mysql;dbname=cutron01_music;charset=utf8', 'web', 'web');` du fichier *index.php* qui permet la connexion à Mysql.

## Tests
1. La commande `composer test:crud` remplace la commande `php vendor/bin/codecept run Crud` qui permet de faire les tests Codeception dans le dossier *Crud*.
2. La commande `composer test:codecept` remplace la commande `php vendor/bin/codecept run` qui permet de faire les tests Codeception.
3. La commande `composer test:cs` remplace la commande `php vendor/bin/php-cs-fixer fix --dry-run --diff` qui permet de vérifier les règles de codage de tous les fichiers du projet.
4. La commande `composer test` permet de lancer les 2 tests (codeception et cs) en une seule commande.

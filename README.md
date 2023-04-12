# PHP - Crud Music
## Tom Sikora TD3
## Installation / Configuration
- `php -S localhost:8000` : Lancement du serveur interne.

- `php -S localhost:8000 -t public` : Option -t permet de désigner le répertoire comme racine des ressources.

- `php -d display_errors -S localhost:8000` : Retour rapide sur les erreurs d'écriture en PHP.

## Sommaire
- ✔️ 1. Versionnage du projet
- ✖️ 2. Découpage logique du projet
    -  ✖️ 2.1. Mise en place du projet
    -  ✖️ 2.2. Entités d'accès aux données et tests
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
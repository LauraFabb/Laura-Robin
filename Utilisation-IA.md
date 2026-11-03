# Utilisation de l'IA – FYNJ – FindYourNumericJob

Projet réalisé dans le cadre de nos études à la [HEIG-VD](https://heig-vd.ch) (cours ProgServ2, 2026-2027).

## 1. Outils utilisés

| Outil | Utilisé par | Pour quoi |
| :---- | :---------- | :-------- |
| Claude (pour les aides directes pour le projet) et chatgpt (pour des questions plus globales ou des soucis sur git ou techniques)| Robin | Cahier des charges, modèles de données (MCD, MLD, MPD) |
| [À compléter : outil] | Laura | [À compléter] |

## 2. Ce que l'IA nous a aidé à faire

- **Cahier des charges** : l'IA nous a permis de mettre en page toutes nos idées dans le chaier des charges en lui expliquant ce que nous voulions. Nous lui avons expliqué le but de notre projet et les fonctionnalités que nous voulions et il a rédigé un cahier des charges propres par rapport à nos demandes.
- **MCD** : proposition d'entités, de relations et de cardinalités pour nous permettre de mettre en page sur sraw.io.
- **MLD** : vérification du passage du MCD au modèle logique (clés primaires et étrangères, tables de liaison).
- **MPD** : script SQL (MySQL / MariaDB) pour créer la base dans phpMyAdmin et vérifier que rien n'avait été oublié.
- **Explications** : Nous avons aussi beaucoup dialogué avec l'IA pour être sur que ce qu'on avait prévu étaiit réalisable et comprendre comment tout allait intéragir entre nos différentes tables. Elle nous a aussi permis de créer le fonctionnement de notre quiz pour trouver comment avoir des résultats efficaces par rapport aux réponses qu'allait donner l'utilisateur. 



## 3. Limites et corrections

- L'IA peut se tromper ou proposer des valeurs par défaut qui ne correspondent pas à notre projet (par exemple le nombre de questions du quiz ou le temps de chargement visé). Nous les relisons et les ajustons pour ne pas laisser du code ou des données générales mais uniquement ce qui est nécessaire pour notre projet.

## 4. Nos règles

- Nous ne copions pas du texte ou du code généré sans le comprendre.
- Nous relisons et testons ce que l'IA produit avant de l'ajouter au projet.
- Nous indiquons dans ce fichier tout nouvel usage important de l'IA.


## 5. Déploiement sur Infomaniak (Laura)

**Quand :** mardi 20 octobre 2026, lors de la mise en ligne de l'application
(issue/branche `18-lancer-sur-infomaniak`).

**Outil :** Claude.

**Pourquoi :** je n'avais jamais déployé une application PHP avec une base de
données sur un hébergement réel. J'avais déjà un nom de domaine (fynj.ch) et un
hébergement Infomaniak, mais je ne savais pas dans quel ordre faire les étapes
ni comment adapter notre code pour qu'il fonctionne à la fois en local et en
ligne.

**Comment :** je lui ai donné une présentation du cours sur le déploiement(de l'année passée) et
des captures d'écran du Manager Infomaniak, et il m'a guidée étape par étape.
Les actions dans Infomaniak (création de la base `e96752_fynjbdd`, exécution
du script SQL dans phpMyAdmin, envoi des fichiers avec Web FTP)


## 6. Code source (Laura)

Dans le code, chaque passage plus complexe fait avec l'aide de l'IA est marqué par un commentaire `// Aide avec l'IA (n°X)`. Le numéro renvoie à la liste ci-dessous. L'outil utilisé est Claude. Pour chaque point, j'ai relu le code et vérifié que je le comprenais avant de le garder.

1. **Autoloader** – `src/autoloader.php`
   J'ai utilisé Claude pour écrire l'autoloader avec `spl_autoload_register()`, sur le modèle du cours. Il transforme le namespace d'une classe (par exemple `Categories\CategoriesManager`) en chemin de fichier (`src/classes/Categories/CategoriesManager.php`) grâce à `str_replace()`, puis charge le fichier s'il existe. Cela évite de faire un `require` pour chaque classe. Claude m'a aussi expliqué pourquoi on écrit `use PDO;` et `use Database;` dans les classes qui ont un namespace : sans ça, PHP chercherait ces classes dans le namespace de la classe.

2. **Configuration de PDO** – `src/classes/Database.php`
   J'ai utilisé Claude pour les deux `setAttribute()`. `PDO::ERRMODE_EXCEPTION` fait apparaître une erreur claire quand une requête SQL échoue, au lieu d'échouer en silence. `PDO::FETCH_ASSOC` fait que `fetchAll()` retourne des tableaux avec le nom des colonnes comme clés (`$row['nom']`).

3. **Profil de l'utilisateur** – `ReponsesManager::getProfil()`
   J'ai utilisé Claude pour la requête SQL qui calcule la moyenne des réponses pour chacun des 6 critères. Elle utilise `JOIN` pour relier chaque réponse à sa question (et donc à son critère), `AVG()` pour faire la moyenne et `GROUP BY` pour obtenir une ligne par critère.

4. **Calcul du score de correspondance** – `CategoriesManager::calculerScore()`
   J'ai utilisé Claude pour trouver comment transformer les réponses du quiz en pourcentage. Pour chaque critère, on calcule l'écart entre la moyenne de l'utilisateur et la valeur de la catégorie (de 1 à 5). On additionne les écarts, puis on les compare à l'écart maximum possible (4 par critère). Plus l'écart total est petit, plus le score est proche de 100 %. Si un critère n'a pas de réponse, on prend 3 (neutre).

5. **Tri des catégories par score** – `CategoriesManager::getAllClassees()`
   J'ai utilisé Claude pour trier les catégories avec `usort()`. Cette fonction compare les catégories deux par deux avec une fonction anonyme : `$b->getScore() - $a->getScore()` met la catégorie qui a le plus grand score en premier.

6. **Enregistrement des réponses** – `ReponsesManager::enregistrer()`
   J'ai utilisé Claude pour trouver comment enregistrer les réponses quand l'utilisateur refait le quiz. La table `reponses` n'accepte qu'une réponse par question et par utilisateur. On supprime donc d'abord ses anciennes réponses (`DELETE`), puis on insère les nouvelles avec une seule requête préparée, exécutée dans une boucle pour chaque question.

7. **Réponses du formulaire du quiz** – `src/public/quiz.php`
   J'ai utilisé Claude pour récupérer toutes les réponses du quiz dans un seul tableau. Chaque bouton radio s'appelle `reponses[id_de_la_question]`, donc PHP reçoit `$_POST['reponses']` sous la forme `[id_question => valeur]`. La ligne `$valeurChoisie = (int) ($reponses[$qid] ?? 0);` permet de recocher la réponse déjà enregistrée quand on revient sur le quiz (et 0 si la question n'a pas encore de réponse).

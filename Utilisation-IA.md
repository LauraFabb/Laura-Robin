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

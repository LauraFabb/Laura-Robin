# Cahier des charges – FYNJ – FindYourNumericJob

Projet réalisé dans le cadre de nos études à la [HEIG-VD](https://heig-vd.ch) (cours ProgServ2, 2026-2027).

## 1. Équipe

| Membre | Rôle principal |
| :----- | :------------- |
| Laura Fabbri | à voir |
| Robin Loup | à voir |

## 2. But du projet

Aider les étudiant·es en Bachelor Ingénierie des médias à choisir leur futur métier (et le Master qui y mène) en comparant les débouchés selon plusieurs critères : salaire, niveau de spécialisation, risque lié à l'IA, projets à réaliser pour s'en rapprocher et conseils pour postuler.

**Public cible :** étudiant·es de Bachelor en Ingénierie des médias, sur ordinateur et sur mobile.

## 3. Parcours de l'utilisateur

1. **Accueil (public)** : la page explique le but du site et comment ça marche, puis invite à commencer le quiz.
2. **Connexion / inscription** : pour commencer le quiz, il faut se connecter ou créer un compte.
3. **Quiz d'orientation (privé)** : l'étudiant·e répond à quelques questions sur 5 critères : le salaire visé, le niveau de spécialisation, la créativité, la résistance à l'IA et l'envie de faire un Master. Ses réponses filtrent les métiers.
4. **Catalogue filtré (privé)** : le site affiche les métiers qui correspondent au profil, classés par pertinence.
5. **Fiche métier (privé)** : salaire, niveau de spécialisation, risque IA, Masters accessibles, projets à réaliser, conseils pour postuler.
6. **Favoris et plan d'action (privé)** : l'étudiant·e garde ses métiers préférés et suit une checklist de projets pour s'en rapprocher.

### 3.1 Retour sur le site (sauvegarde des résultats)

- Les réponses et les résultats du quiz sont **enregistrés dans le compte** de l'utilisateur·trice.
- Si l'on quitte le site puis qu'on revient (session encore active ou nouvelle connexion), on arrive directement sur son **catalogue filtré**, sans refaire le test.
- Si le quiz a été quitté en cours de route, les réponses déjà données sont conservées et on reprend là où on s'est arrêté.
- Un bouton **« Refaire le test »** permet de recommencer. Avant d'écraser les anciens résultats, un message de confirmation est affiché.
- Les **favoris** et la **checklist du plan d'action** ne sont pas effacés quand on refait le test.

### 3.2 Règles d'accès

- Une personne non connectée qui essaie d'ouvrir une page privée est redirigée vers la page de connexion, puis renvoyée vers la page demandée après connexion.
- Une personne connectée qui n'a pas encore fait le quiz est invitée à le faire avant d'accéder au catalogue.
- Une personne déjà connectée qui ouvre la page de connexion ou d'inscription est redirigée vers son espace.

## 4. Fonctionnalités principales

### 4.1 Pages

- **Pages publiques** : accueil (avec explication du fonctionnement), connexion, à propos et inscription.
- **Pages privées** : quiz, catalogue filtré, fiche métier, favoris et plan d'action, profil.

### 4.2 Comptes

- Inscription, connexion, déconnexion, session maintenue.
- Modification du profil (nom, e-mail, mot de passe).
- Mots de passe hachés, protection contre les injections SQL.
- Mot de passe oublié (lien de réinitialisation envoyé par e-mail).
- Suppression du compte, avec suppression des données associées.
- Messages d'erreur clairs : e-mail déjà utilisé, mot de passe incorrect, champs manquants, mot de passe trop faible.

### 4.3 Quiz et classement des métiers

- Environ 8 à 12 questions, avec barre de progression et possibilité de revenir à la question précédente.
- Chaque métier a une valeur pour chacun des 5 critères du quiz. Le classement se base sur la proximité entre les réponses et ces valeurs.
- Chaque métier du catalogue affiche un **score de correspondance** (par exemple en %).
- Si aucun métier ne correspond bien, le site propose d'élargir les critères plutôt que d'afficher une page vide.

### 4.4 Catalogue et fiches métier

- Le catalogue peut être filtré et trié manuellement après le quiz (salaire, risque IA, spécialisation).
- Chaque fiche contient : description, salaire indicatif (fourchette), niveau de spécialisation, risque IA, Masters accessibles, projets à réaliser, conseils pour postuler.
- Un bouton **« Ajouter aux favoris »** est présent sur chaque fiche et chaque carte du catalogue.

### 4.5 Favoris et plan d'action

- Ajout et retrait de métiers favoris.
- Pour chaque favori, une checklist de projets à réaliser (cases à cocher) avec un indicateur de progression.
- L'état des cases cochées est sauvegardé dans le compte.

### 4.6 E-mails

- Confirmation d'inscription.
- Envoi du résultat du quiz (liste des métiers recommandés avec lien vers le site).
- Réinitialisation du mot de passe.

## 5. Fonctionnalités optionnelles

- Comparateur de 2 à 3 métiers côte à côte.
- Détail du risque IA : tâches menacées et tâches protégées.
- Export du plan d'action en PDF.
- Témoignages d'alumni.

## 6. Données à stocker

- **Utilisateur·trice** : nom, e-mail, mot de passe haché, date d'inscription.
- **Résultats du quiz**
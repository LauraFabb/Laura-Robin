# Cahier des charges – FYNJ – FindYourNumericJob

Projet réalisé dans le cadre de nos études à la [HEIG-VD](https://heig-vd.ch) (cours ProgServ2, 2026-2027).

## 1. Équipe

| Membre | Rôle principal |
| :----- | :------------- |
| Laura Fabbri | à voir |
| Robin Loup | à voir |

## 2. But du projet

Aider les étudiant·es en Bachelor Ingénierie des médias à choisir leur futur domaine de métiers (et le Master qui y mène) selon leurs centres d'intérêt, puis à comparer les débouchés : métiers possibles, salaire, risque lié à l'IA, projets à réaliser pour s'en rapprocher et conseils pour postuler.

**Public cible :** étudiant·es de Bachelor en Ingénierie des médias, sur ordinateur et sur mobile.

## 3. Parcours de l'utilisateur

1. **Accueil (public)** : la page explique le but du site et comment ça marche, puis invite à commencer le quiz.
2. **Connexion / inscription** : pour commencer le quiz, il faut se connecter ou créer un compte.
3. **Quiz d'orientation (privé)** : l'étudiant·e répond à 12 affirmations (2 par critère) sur une échelle d'accord. Elles portent sur 6 critères liés à ses centres d'intérêt : technique et code, design visuel, compréhension des utilisateurs, business et chiffres, organisation et coordination, leadership et décision.
4. **Catalogue filtré (privé)** : le site affiche les catégories de métiers (par exemple Développement web et mobile, UX/UI Design, E-commerce…) classées par score de correspondance avec le profil.
5. **Fiche catégorie (privé)** : description, salaire, risque IA, liste des métiers de la catégorie, Masters accessibles, conseils pour postuler et projets suggérés.
6. **Favoris et plan d'action (privé)** : l'étudiant·e garde ses catégories préférées et suit une checklist de projets pour s'en rapprocher.

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
- **Pages privées** : quiz, catalogue filtré, fiche catégorie, favoris et plan d'action, profil.

### 4.2 Comptes

- Inscription, connexion, déconnexion, session maintenue.
- Modification du profil (nom, e-mail, mot de passe).
- Mots de passe hachés, protection contre les injections SQL.
- Mot de passe oublié (lien de réinitialisation envoyé par e-mail).
- Suppression du compte, avec suppression des données associées.
- Messages d'erreur clairs : e-mail déjà utilisé, mot de passe incorrect, champs manquants, mot de passe trop faible.

### 4.3 Quiz et classement des catégories

- 12 questions (2 par critère), avec barre de progression et possibilité de revenir à la question précédente.
- Les 6 critères du quiz :

| Critère | Ce qu'il mesure |
| :------ | :-------------- |
| Technique et code | Aimer programmer, comprendre comment les choses fonctionnent et résoudre des problèmes techniques |
| Design visuel | Aimer créer des interfaces et des visuels soignés : mise en page, couleurs, typographie, maquettes |
| Compréhension des utilisateurs | Aimer observer, interroger et tester avec les utilisateur·trices pour comprendre leurs besoins |
| Business et chiffres | S'intéresser à la vente, au marketing et à l'analyse de données pour prendre des décisions |
| Organisation et coordination | Aimer planifier, répartir le travail, suivre les délais et gérer la relation avec un client |
| Leadership et décision | Aimer prendre des décisions, défendre une vision et encadrer une équipe |

- Chaque catégorie a une valeur de 1 à 5 pour chacun des 6 critères. Le classement se base sur la proximité entre les réponses et ces valeurs.
- Chaque catégorie du catalogue affiche un **score de correspondance** (par exemple en %).
- Si aucune catégorie ne correspond bien, le site propose d'élargir les critères plutôt que d'afficher une page vide.

### 4.4 Catalogue et fiches catégorie

- Le catalogue peut être trié manuellement après le quiz (salaire, risque IA).
- Chaque fiche contient : description, salaire indicatif (fourchette), risque IA, liste des métiers de la catégorie, Masters accessibles, conseils pour postuler et projets suggérés.
- Un bouton **« Ajouter aux favoris »** est présent sur chaque fiche et chaque carte du catalogue.

### 4.5 Favoris et plan d'action

- Ajout et retrait de catégories favorites.
- Pour chaque favori, une checklist de projets à réaliser (cases à cocher) avec un indicateur de progression.
- L'état des cases cochées est sauvegardé dans le compte.

### 4.6 E-mails

- Confirmation d'inscription.
- Envoi du résultat du quiz (liste des catégories recommandées avec lien vers le site).
- Réinitialisation du mot de passe.

## 5. Fonctionnalités optionnelles

- Comparateur de 2 à 3 catégories côte à côte.
- Détail du risque IA : tâches menacées et tâches protégées.
- Export du plan d'action en PDF.
- Témoignages d'alumni.

## 6. Données à stocker

- **Utilisateur·trice** : prénom, nom, e-mail, mot de passe haché, rôle, formation, année d'études, langue, date d'inscription.
- **Critères** : nom et description des 6 critères du quiz.
- **Questions** : texte, critère évalué et ordre d'affichage.
- **Réponses** : valeur donnée par l'utilisateur·trice à chaque question (résultats du quiz).
- **Catégories** : nom, description, fourchette de salaire, risque IA.
- **Valeurs des critères** : valeur de chaque catégorie pour chacun des 6 critères.
- **Métiers** : nom et description, rattachés à une catégorie.
- **Masters** : nom et école, liés aux catégories auxquelles ils mènent.
- **Conseils** : titre, texte et projet suggéré pour chaque catégorie.
- **Favoris** : catégories favorites de chaque utilisateur·trice, avec la date d'ajout.
- **Réinitialisations du mot de passe** : token haché, date d'expiration et date d'utilisation.
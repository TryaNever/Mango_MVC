# MVC Template

Bienvenue sur **MVC Template** – un template MVC complet et fonctionnel de A à Z qui intègre Twig pour les templates et des layouts prêts à l'emploi pour démarrer ton projet web en un rien de temps.

> **"Kickstart your project with style and efficiency!"**

---

## 🚀 Caractéristiques

- **Architecture MVC Complète** : Séparation claire entre le modèle, la vue et le contrôleur.
- **Twig Intégré** : Utilisation du moteur de template Twig pour des vues performantes et élégantes.
- **Layouts Modernes** : Des layouts prêts à l'emploi pour t'aider à démarrer rapidement.
- **Routing Basique et Flexible** : Un système de routage simple et extensible pour gérer tes URL.
- **Templates Personnalisables** : Modifie facilement tes layouts et vues pour qu’ils correspondent à ton style.
- **Facile à Étendre** : Un code clair et commenté pour que tu puisses l’adapter à tes besoins.

  les password de base 12345678

---

## ⚙️ Installation

1. **Cloner le repository :**

   ```bash
   git clone https://https://github.com/TryaNever/Mango_MVC.git
   cd Mango_MVC
   ```

2. **Installation des dépendances**

   Assure-toi d'avoir [Composer](https://getcomposer.org/) installé, puis lance :

   ```bash
   composer install
   ```

3. **Configuration**
   - Copie le fichier `.env.example` en `.env` et configure les paramètres de connexion à ta base de données et autres configurations nécessaires.
   - Configure ton serveur web (Apache, Nginx, etc.) pour pointer vers le dossier public.

4. **Lancer le serveur**

   Pour tester rapidement en local, tu peux utiliser le serveur intégré de PHP :

   ```bash
   php -S localhost:8000
   ```

   Puis accède à `http://localhost:8000` dans ton navigateur.

---

## 🛠 Utilisation

Le template te fournit une structure de base pour développer ton application MVC :

- **Modèles (`/src/models`)** : Logique de gestion des données.
- **Contrôleurs (`/src/controllers`)** : Gestion des requêtes et des actions de l’utilisateur.
- **Vues (`/views`)** : Templates Twig pour la présentation et le layout.

Les routes sont définies dans le fichier dédié au routage pour une gestion centralisée des URL. Tu peux créer de nouvelles routes et étendre les fonctionnalités selon tes besoins.

---

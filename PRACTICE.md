# TP2 - Site Le bon coin

Templates à intégrer sur Twig :
- 1 page accueil => Liste des annonces + Catégories
- 1 page détail d'une annonce qui contient
    - détail de l’annonce
    - 1 Formulaire de modification d'annonce
    - 1 bouton de suppression
- 1 page Formulaire de création d'annonce
- 1 header (Menu)
- 1 footer

Nos données :
- User : id, username, password, created_at, updated_at
- Annonce : id, title, description, price, created_at, updated_at
- Categorie : id, title

Les Relations :
- 1 Annonce appartient à 1 User
- 1 Annonce appartient à 1 Categorie
- 1 User peut posséder N Annonces
- 1 Categorie peut posséder N Annonces

Système d'inscription et d'authentification
- NAVBAR (Menu) :
    - Déposer une annonce :
        - Si connecté -> envoi vers formulaire d’ajout
        - Si déconnecté -> envoi vers la page connexion
    - S’inscrire (visible uniquement si déconnecté)
    - Se connecter (visible uniquement si déconnecté)
    - Se déconnecter (visible uniquement si connecté)
    - Le pseudo de la personne connecté (visible uniquement si connecté)
- Page détail - bouton modifier/supprimer (visible uniquement si connecté)

Règles de gestion : Ajouts, modifications et suppression disponibles uniquement que pour les USER
connectés
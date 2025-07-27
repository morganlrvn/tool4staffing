Actions menées pour l'amélioration de la sécurité:
1) Une clé API était stockée dans un fichier JSON dans le répertoire credentials/.
Je me suis donc permis pour de question de sécurité et risque de fuite d'information de 
le mettre dans une .env (qui lui meme est dans le gitignore)

2) On pourrait rajouter une authentification propre au client afin de survoler ses voitures mais pas
celles des autres clients

3) En cas de futur ajout par l'utilisateur de voiture, mettre en place des fonctions évitant toute 
attaques XSS (htmlspecialchars par exemple)


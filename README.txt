Actions menées à l'étape 6 pour l'amélioration de la sécurité:
1) Pour éviter toute duplication de dossier avec clienta/clientb/clientc j'ai tout regroupé dans un 
seul module avec des conditions car la plupart des affichages étaient identiques

2) Une clé API était stockée dans un fichier JSON dans le répertoire credentials/.
Je me suis donc permis pour de question de sécurité et risque de fuite d'information de 
le mettre dans une .env (qui lui meme est dans le gitignore)

3) Le fichier de données est accessible via l'url et on peut donc avoir accès à toutes les données avec:
http://localhost:8000/data/cars.json
ainsi que http://localhost:8000/data/garages.json

Action : j'ai mis le data à la racine et les fichiers du projet dans un /public cela permettra de 
ne pas avoir accès aux json de cars et garages
NB : pour lancer le serveur il faudra maintenant taper : 
=> php -S localhost:8000 -t public

+ j'ai rajouté un config.php avec une constante donnant vers le fichier de données réutilisable dans les
modules

Améliorations à faire :
1) On pourrait rajouter une authentification où son identité est stockée dans $_SESSION['client_id']
afin de survoler uniquement ses voitures

2) En cas de futur ajout de voiture de la part d'un client
    => mettre en place des fonctions évitant toute  attaques XSS (htmlspecialchars par exemple)


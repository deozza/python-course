# Exercice 33

Au lancement du script, créer un fichier `target` et un fichier `lock-<timestamp>`, `<timestamp>` étant le timestamp au moment de la création du fichier.

Le but du script est de permettre la suppression du fichier `target` lorsque la touche `d` est appuyée. Cependant, cette action n'est pas autorisée si le fichier `lock-<timestamp>` date de moins de 10 secondes.

Si on essaye de supprimer le fichier avant ces 10 secondes, afficher un message d'erreur avec le temps restant à attendre.

Si le fichier `target` est supprimé, supprimer également le fichier `lock-<timestamp>`. Puis, quitter le programme.

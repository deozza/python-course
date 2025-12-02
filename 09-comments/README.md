# Commentaires

## Sommaire

<!--toc:start-->
- [Commentaires](#commentaires)
  - [Sommaire](#sommaire)
  - [Définition](#définition)
  - [Comment rajouter un commentaire](#comment-rajouter-un-commentaire)
    - [Les bonnes pratiques](#les-bonnes-pratiques)
<!--toc:end-->

## Définition

Un commentaire du code qui est ignoré par le programme et n'est pas exécuté. Il sert à donner des indications, des informations, sur le code pour soi-même ou d'autres développeur.ses.

## Comment rajouter un commentaire

Si on veut écrire un commentaire sur une ligne, on peut utiliser  `#` :

```python
# Ceci est un commentaire
```

Si on veut écrire un commentaire sur plusieurs lignes, on utilisera, il faudra ajouter `#` au début de chaque ligne :

```python
#
#Tout
#ce texte
#est
#un commentaire
```

On peut également utiliser une chaine de caractère multiligne, même si ce n'est pas leur rôle de base :

```python
"""
ce texte
est
aussi
un commentaire
"""
```

### Les bonnes pratiques

- il n'est pas nécessaire de commenter chaque ligne de son programme
- les commentaires, la plupart du temps, troublent la lecture et la compréhension du code
  - déconcentration, commentaire pas forcément à jour avec le code, explications pas claires
- on considère un commentaire comme étant utile lorsqu'il explique un choix technique qui ne peut pas s'expliquer uniquement par du code


# Séparation du code en plusieurs fichiers

## Sommaire

<!--toc:start-->
- [Séparation du code en plusieurs fichiers](#séparation-du-code-en-plusieurs-fichiers)
  - [Sommaire](#sommaire)
  - [Pourquoi séparer le code](#pourquoi-séparer-le-code)
  - [Les réflexions à avoir](#les-réflexions-à-avoir)
  - [Comment faire](#comment-faire)
    - [Importer depuis le même dossier](#importer-depuis-le-même-dossier)
    - [Importer depuis un dossier](#importer-depuis-un-dossier)
    - [Importer uniquement une fonction](#importer-uniquement-une-fonction)
<!--toc:end-->

## Pourquoi séparer le code

- améliorer la lisibilité
- séparer les domaines fonctionnels
- réutiliser plus facilement les fonctionnalités

## Les réflexions à avoir

- processus : regrouper les familles de fonctionnalités dans un ficher dédié
  - exemple :
    - se demander avec quelle interface interragit la fonction (terminal, base de données, html, fichier, ...)
    - se demander quel type de ressource la fonction manipule (user, blog, contact, ...)

## Comment faire

### Importer depuis le même dossier

```python
# myfile.py
def get_user_age():
    return int(input("Enter your age: "))
```

```python
# main.py

import myfile

try:
    myfile.get_user_age()
except ValueError:
    print("That's not a valid value for your age!")
```

### Importer depuis un dossier

```python
# user_interactions/myfile.py
def get_user_age():
    return int(input("Enter your age: "))
```

```python
# main.py

import user_interactions.myfile

try:
    user_interactions.myfile.get_user_age()
except ValueError:
    print("That's not a valid value for your age!")
```


### Importer uniquement une fonction

```python
# main.py
from user_interactions.myfile import get_user_age

try:
    get_user_age()
except ValueError:
    print("That's not a valid value for your age!")

```

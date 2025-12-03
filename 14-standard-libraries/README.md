# Librairies internes

## Sommaire

<!--toc:start-->
- [Librairies internes](#librairies-internes)
  - [Sommaire](#sommaire)
  - [Définition](#définition)
  - [OS](#os)
  - [Log](#log)
    - [Bonnes pratiques](#bonnes-pratiques)
  - [Date](#date)
  - [JSON](#json)
  - [CSV](#csv)
<!--toc:end-->

## Définition

Certaines fonctionnalités du langage ne sont pas utilisables par défaut. Pour des raisons d'optimisation de performances, seulement les fonctionnalités basiques sont disponibles.

Les fonctionnalités avancées les plus communes sont fournies par le langage mais doivent être `importées`. Elles sont dans des `modules`, des `librairies`.

Pour pouvoir utiliser les fonctionnalités d'une librairie, il faut utiliser le mot clef `import` en haut d'un script :

```python

import random

randomNumber = random.randrange(5,30)
```

## OS

Le module `os` permet d'intéragir avec les fichiers du système sur lequel on exécute nos scripts.

- `os.getcwd()` : obtenir le chemin courant du script
- `os.mkdir()` : pour créer un dossier
- `os.makedirs()` : pour créer un dossier de manière récursive
- `os.remove()` : pour supprimer un fichier
- `os.rmdir()` : pour supprimer un dossier qui est vide
- `os.rename()` : pour renommer un fichier ou un dossier
- `os.path.basename()` : pour obtenir uniquement le nom d'un fichier d'un chemin
- `os.path.dirname()` : pour obtenir le chemin vers un fichier
- `os.path.exists()` : retourne `true` si un fichier existe
    - `os.path.isdir()` : détermine si un chemin correspond à un dossier
    - `os.path.isfile()` : détermine si un chemin correspond à un fichier

## Log

Les logs permettent de mettre en place un système de journalisation. Ceci est surtout utile pour savoir ce qui a pu se passer pendant l'exécution du programme et aider au débuggage.

```python
import logging

logging.basicConfig(filename="sample.log", level=logging.INFO)
```

On configure un système de log par défaut, avec un fichier de destination et un niveau d'alerte. Il existe différents niveaux, par ordre d'importance :

- DEBUG
- INFO
- WARNING
- ERROR
- CRITICAL

```python
import logging

logging.basicConfig(filename="sample.log", level=logging.INFO)
logging.debug('test')
logging.info('test')
logging.warning('test')
logging.error('test')
logging.critical('test')
```

### Bonnes pratiques

```python
import logging

logger = logging.getLogger("exampleApp")
logger.setLevel(logging.INFO)

# create the logging file handler
fh = logging.FileHandler("new_snake.log")

formatter = logging.Formatter('%(asctime)s - %(name)s - %(levelname)s - %(message)s')
fh.setFormatter(formatter)

# add handler to logger object
logger.addHandler(fh)

logger.info("Program started")
logger.info("Done!")
```

```bash
2012-08-02 15:37:40,592 - exampleApp - INFO - Program started
2012-08-02 15:37:40,592 - exampleApp - INFO - Done!
```
Explications :

- on crée une instance nommée d'un logger
- on le configure avec un niveau de log par défaut
- on le configure avec un fichier de log spécifique
- on le configure avec un format de log

Intérêts :

- on a un format de log cohérent avec `loggin.Formatter()`
- on sait quelle partie du programme a créé le log avec `getLogger()`

## Date

```python
import datetime

d = datetime.date(2012, 12, 14)

print(d.year) # 2012
print(d.day) # 14
print(d.month) # 12

datetime.date.today() # date du jour
datetime.datetime.today() # date et heure du jour
datetime.datetime.now() # date et heure du jour
```

https://python101.pythonlibrary.org/chapter22_time.html

## JSON

Un fichier au format JSON est un fichier texte avec un formatage particulier. Ce formatage permet de structurer les données pour pouvoir mieux les manipuler dans un programme.

Pour lire un fichier JSON, il faut récupérer son contenu puis le décoder avec le module `json`. Le résultat sera un dictionnaire :

```python
import json
import os

path = os.getcwd() + '/content.json'
if os.path.isfile(path) == false:
    print('file not found')
else:
    fileHandler = open(path)
    fileContent = fileHandler.read()
    fileContentAsDictionnary = json.reads(fileContent)
```

Pour créer un fichier JSON, on peut utiliser un dictionnaire ou une liste : 

```python
import json

content = ['not', 'a', 'string']
contentAsJson = json.dumps(content)
fileHandler = open('newFile.json', 'r')
fileHandler.write(contentAsJson)
```

## CSV

Un fichier au format CSV est un fichier texte avec un formatage particulier. Ce formatage permet de structurer les données comme un tableur.

Pour lire un csv, il faut d'abord créer un flux vers le fichier source puis utiliser le module `csv`. Le résultat sera un dictionnaire, que l'on pourra lire ligne par ligne :

```python
import os
import csv

path = os.getcwd() + '/content.csv'
if os.path.isfile(path) == false:
    print('file not found')
else:
    fileHandler = open(path)
    csvReader = csv.reader(fileHandler)
    for row in csvReader:
        print(row)
```

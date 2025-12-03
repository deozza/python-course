# Manipulation de fichiers

## Sommaire

<!--toc:start-->
- [Manipulation de fichiers](#manipulation-de-fichiers)
  - [Sommaire](#sommaire)
  - [Définition](#définition)
  - [Manipulation générale](#manipulation-générale)
  - [Les raccourcis](#les-raccourcis)
  - [Rappel sur chemin relatif et chemin absolu](#rappel-sur-chemin-relatif-et-chemin-absolu)
<!--toc:end-->

## Définition

- intéragir avec des fichiers sur le serveur
  - lire, créer, modifier des fichiers
- essentiel pour stocker des données

## Manipulation générale

```python
handle = open('file.txt')
```

La fonction `open` permet de créer un flux vers un fichier, dont le nom est donné en argument. Par défaut, le flux est en lecture seulement. Dans cet exemple, comme un chemin relatif est donné, la fonction va chercher à ouvrir un fichier se trouvant dans le même dossier que le script qui l'exécute.

Si on veut donner un chemin absolu, on préfèrera utiliser cette forme :

```python
handle = open(r'C:\path\to\file.txt')
```

*Rajouter un `r` devant une chaîne de caractère permet de la traiter en `raw` et d'ignorer tout ce qui est interprétable (`\t` par exemple qui rajoute un `tab`).*

`open()` ne lit pas le contenu du fichier. Pour le lire, on peut utiliser `.read()` :

```python
handle = open('/path/to/file')
content = handle.read()
```

Si on souhaite lire le contenu ligne par ligne, on peut utiliser une boucle `for` :

```python
handle = open(r'C:\path\to\file.txt')
for line in handle:
  print(line)
```

On peut également lire `chunks` par `chunks` (morceaux) avec une boucle `while` et `read()`:

```python
handle = open(r'C:\path\to\file.txt')

while True:
  data = handle.read(1024) # lecture d'un kilobyte de données
  if not data: # verification qu'on n'est pas au bout du fichier
    break # sortie de la boucle
  print(data)
```

Pour lire un fichier binaire, il suffit de changer le mode d'ouverture du flux :

```python
handle = open(r'/path/to/file.pdf', 'rb')
content = handle.read()
```

Pour écrire dans un fichier, il faut utiliser la fonction `write()` et `open()` avec un flux en écriture :

```python
handle = open('/path/to/file', 'w')
content = 'hello world'

handle.write(content)
```

Une fois que la manipulation de fichier (en écriture ou en lecture) est finie, il faut fermer le flux avec `close()` :

```python
handle = open('/path/to/file')
content = handle.read()
handle.close()
```

## Rappel sur chemin relatif et chemin absolu

Chemin relatif : chemin qui démarre au niveau du fichier qui exécute l'instruction.

Chemin absolu : chemin complet.

- `file.txt` => chemin relatif
- `./path/to/file.txt` => chemin relatif
- `./../../path/to/file.txt` => chemin relatif
- `/path/to/file.txt` => chemin absolu

# Manipulation de fichiers

## Sommaire

<!--toc:start-->
- [Manipulation de fichiers](#manipulation-de-fichiers)
  - [Sommaire](#sommaire)
  - [Définition](#définition)
  - [Manipulation générale](#manipulation-générale)
  - [Les raccourcis](#les-raccourcis)
  - [Plus de fonctions](#plus-de-fonctions)
  - [Les fichiers JSON](#les-fichiers-json)
  - [Les fichiers CSV](#les-fichiers-csv)
  - [Rappel sur chemin relatif et chemin absolu](#rappel-sur-chemin-relatif-et-chemin-absolu)
<!--toc:end-->

## Définition

- intéragir avec des fichiers sur le serveur
  - lire, créer, modifier des fichiers
- essentiel pour stocker des données

## Manipulation générale

```python
handle = fopen('/path/to/file', 'r')

```

La fonction `fopen()` permet de créer un flux vers une url. Le premier argument est l'url, le lien vers le fichier à manipuler. Le second est le mode du flux.

- `r` => lecture
- `w` => si le fichier n'existe pas, il est créé en écriture, s'il existe déjà son contenu est entièrement supprimé pour en rajouter un nouveau
- `a` => ouvre un fichier en écriture pour rajouter du contenu

`fopen()` ne lit pas le contenu du fichier. Pour le lire, on peut utiliser `fread()`. On passera à la fonction le flux ainsi que la taille du fichier à lire :

```python
handle = fopen('/path/to/file', 'r')
content = fread(handle, filesize('/path/to/file'))

```

Si on souhaite lire le contenu ligne par ligne, on peut utiliser `fgets()` dans une boucle while :

```python
handle = fopen('/path/to/file', 'r')

line = fgets(handle)

while(line !== false) {
  echo line
  line = fgets(handle)
}
```

Explication :

- ouverture d'un flux en lecture vers un fichier avec `fopen()`
- récupération de la première ligne avec `fgets()`
- tant que `fgets()` retourne une ligne, on traite la ligne

Pour écrire dans un fichier, il faut utiliser la fonction `fwrite()` :

```python
handle = fopen('/path/to/file', 'w')
content = 'hello world'

fwrite(handle, content)
```

Une fois que la manipulation de fichier est finie, il faut fermer le flux avec `fclose()` :

```python
handle = fopen('/path/to/file', 'r')
content = fread(handle, filesize('/path/to/file'))
fclose(handle)

```

## Les raccourcis

Les manipulations de fichier avec `fopen()` sont à utiliser dans des cas spécifiques et ne sont pas les méthodes recommandées.

En général, il vaut mieux utiliser `file_get_contents()` et `file_put_contents()` :

```python
content = file_get_contents('/path/to/file')
file_put_contents('/path/to/file', 'new content')
file_put_contents('/path/to/file', 'more content', FILE_APPEND)

```

## Plus de fonctions

- `unlink()` => supprimer un fichier
- `file_exists()` => vérifier si un fichier existe

## Les fichiers JSON

Un fichier au format JSON est un fichier texte avec un formatage particulier. Ce formatage permet de structurer les données pour pouvoir mieux les manipuler dans un programme.

Pour lire un fichier JSON, il faut récupérer son contenu et le décoder :

```python
fileContent = file_get_contents('/path/to/file.json')
contentAsArray = json_decode(fileContent, true)

```

Pour créer un fichier JSON, il faut d'abord s'assurer que le contenu soit un `string` ou castable en `string`. Si ce n'est pas le cas (un tableau par exemple), il faudra encoder le contenu au format json :

```python
content = ['not', 'a', 'string']
contentAsJson = json_encode(content)
file_put_contents('/path/to/file.json', contentAsJson)

```

## Les fichiers CSV

Un fichier au format CSV est un fichier texte avec un formatage particulier. Ce formatage permet de structurer les données comme un tableur.

Pour lire un fichier au format CSV, il vaut mieux utiliser `fopen()` avec une variante de `fgets()`, `fgetcsv()`:

```python
handle = fopen('/path/to/file.csv', 'r')
row = fgetcsv(handle, 1000, ',', '"', '\\')
input = []
while(row !== false) {
    input[] = row
    row = fgetcsv(handle, 1000, ',', '"', '\\')
}
fclose(handle)

```
Pour rajouter du contenu dans un fichier CSV, on utilisera `fopen()` avec une variante de `fputs()`, `fputcsv()` :

```python
list = [
    ['aaa', 'bbb', 'ccc', 'dddd'],
    ['123', '456', '789'],
    ['"aaa"', '"bbb"']
]

handle = fopen('/path/to/file.csv', 'w')

foreach (list as fields) {
     fputcsv(handle, fields, ',', '"', '')
}

fclose(handle)

```

## Rappel sur chemin relatif et chemin absolu

Chemin relatif : chemin qui démarre au niveau du fichier qui exécute l'instruction.

Chemin absolu : chemin complet.

- `file.txt` => chemin relatif
- `./path/to/file.txt` => chemin relatif
- `./../../path/to/file.txt` => chemin relatif
- `/path/to/file.txt` => chemin absolu

Utiliser un chemin relatif peut créer des erreurs selon l'endroit où on exécute les instructions. Pour toujours utiliser un chemin absolu, on peut utiliser la constante `__DIR__` :

```python
//current path : /home/dev/project/index.python

filePath = __DIR__ . './content.csv' // complete path : /home/dev/project/content.csv

```

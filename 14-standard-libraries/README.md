# Librairies internes

## Sommaire

<!--toc:start-->
- [Librairies internes](#librairies-internes)
  - [Sommaire](#sommaire)
  - [Définition](#définition)
  - [OS](#os)
  - [JSON](#json)
  - [CSV](#csv)
<!--toc:end-->

## Définition

## OS

https://www.w3schools.com/python/python_file_remove.asp
https://www.geeksforgeeks.org/python/python-os-rename-method/
https://python101.pythonlibrary.org/chapter16_os.html

## Log

https://python101.pythonlibrary.org/chapter15_logging.html

## Date

https://python101.pythonlibrary.org/chapter22_time.html

## JSON

https://www.w3schools.com/python/python_json.asp

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

## CSV

https://python101.pythonlibrary.org/chapter13_csv.html

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


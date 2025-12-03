# Gestion des erreurs et exceptions

## Sommaire

## Définition

Lorsqu'un comportement imprévisible arrive dans un programme, ce dernier va `lancer` une `erreur` ou une `exception` et arrêter son exécution. Un message d'erreur, très complet et contenant des informations critiques sur le programme et le système l'exécutant, va s'afficher. Pour éviter de stopper l'application de manière non gracieuse et de révéler des informations sensibles aux utilisateur.ices, on utilisera `try except`.

Exemple avec la fonction `open` :

```python
try:
  handle = open('/path/to/unknown/file.txt')
except IOError:
  print('path not found')
```

Analyse ligne par ligne :

@- essayer d'exécuter des instructions
- si une instruction lève une erreur
  - et que l'erreur correspond à `IOError`
- alors faire un traitement alternatif

Si plusieurs exceptions différentes sont attendues, on peut enchainer les `except` :

```python
my_dict = {"a":1, "b":2, "c":3}
try:
    value = my_dict["d"]
except IndexError:
    print("This index does not exist!")
except KeyError:
    print("This key is not in the dictionary!")
```

Si on souhaite capturer n'importe quelle exception, on utilisera :

```python
my_dict = {"a":1, "b":2, "c":3}
try:
    value = my_dict["d"]
except:
    print("Some error occurred!")
```

### Finally

```python
my_dict = {"a":1, "b":2, "c":3}

try:
    value = my_dict["d"]
except KeyError:
    print("A KeyError occurred!")
finally:
    print("The finally statement has executed!")
```

Les instructions contenues dans le `finally` vont s'exécuter quoi qu'il arrive, que l'on passe dans le `try` ou dans le `except`.

### Else

```python
my_dict = {"a":1, "b":2, "c":3}

try:
    value = my_dict["a"]
except KeyError:
    print("A KeyError occurred!")
else:
    print("No error occurred!")
finally:
    print("The finally statement ran!")
```

Les instructions contenues dans le bloc `else` vont s'exécuter si aucune exception n'a été levée et que le programme ne passe jamais dans le bloc `except`.

## Les exceptions communes

- `Exception` : exception générale dont toutes les suivantes dérivent
- `AttributeError` : lorsque l'on souhaite exécuter une fonction ou accéder à une propriété inconnue d'une variable

```python
X = 10

X.append(6) # X n'est pas une liste, `AttributeError` est déclenchée
```
- `IOError` : lorsqu'une action qui nécessite l'écriture ou la lecture de fichier échoue
- `ImportError` : lorsque l'import d'une librairie échoue
- `IndexError` : lorsqu'on accède à un élément d'une liste par une clef invalide
- `KeyError` : lorsqu'on accède à un élément d'un dictionnaire par une clef invalide
- `TypeError` : lorsqu'on fait une opération sur le mauvais type


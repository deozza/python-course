# Les types

## Sommaire

<!--toc:start-->
- [Les types](#les-types)
  - [Sommaire](#sommaire)
  - [Définition](#définition)
  - [Les principaux types en Pyhon](#les-principaux-types-en-pyhon)
    - [Int](#int)
    - [Float](#float)
    - [String](#string)
    - [Boolean](#boolean)
    - [Array](#array)
      - [List](#list)
      - [Tuple](#tuple)
      - [Set](#set)
      - [Dictionnaire](#dictionnaire)
      - [Résumé](#résumé)
  - [Équivalences de type](#équivalences-de-type)
  - [Cast de type](#cast-de-type)
<!--toc:end-->

## Définition

Le type (ou typage) d'une variable permet d'indiquer quelle catégorie de données est en train d'être manipulée. Certaines opérations ne peuvent pas se faire sur certains types.

Python étant un langage abstrait et simple à prendre en main, le typage n'est pas statique. Il est dynamique. C'est-à-dire qu'une même variable peut voir son type changer. Une variable qui contient un nombre peut voir sa valeur être écrasée par une chaîne de caractères.

De plus, lors de l'assignation d'une valeur à une variable, cette variable est automatiquement typée par le langage.

## Les principaux types en Pyhon

### Int

*Nombre entier*

```python
number = 10

```

Il est possible de faire des opérations mathématiques (addition, soustraction, ...) et des conditions de comparaison (supérieur, inférieur ou égal, ...) sur ce type.

### Float

*Nombre à virgule*

```python
number = 10.0

```

Il est possible de faire des opérations mathématiques (addition, soustraction, ...) et des conditions de comparaison (supérieur, inférieur ou égal, ...) sur ce type.

### String

*Chaîne de caractère*

```python
message = 'Hello world'

```

On peut créer une chaîne de caratères avec `''` ou `""`. Il n'y a pas de différences de fonctionnalité entre les deux. Le résultat sera le même, qu'on utilise des single quotes `''` ou des doubles quotes `""`. Cependant, utiliser des `""` permet d'inclure des apostrophes dans notre texte :

```python
message = "Je suis d'accord"
```

### Boolean

*Une valeur qui est soit `true` soit `false`*

```python

/**
* @var boolean
*/
toggle = true

/**
* @var boolean
*/
isPositive = -15 > 0

```
### Array

En Python, il est possible de créer 4 formes différentes de tableau.

#### List

`list` est une structure de données permettant d'enregistrer plusieurs valeurs et de les regrouper dans une variable. Ces valeurs sont rangées dans l'ordre d'ajout, elles ne sont pas triées automatiquement par le langage.

Pour créer une liste, il faut utiliser :

```python
content = list(1, 12, -5)
```

On peut également utiliser la notation simplifiée :

```python
content = [1, 12, -5]
```

On peut enregistrer des valeurs de plusieurs types différents dans une `list` :

```python
content = [1, 'a', 12, -5, 0.5]
```

Il est possible de rajouter des éléments dans une `list` existante :


```python
content = [1, 'a', 12, -5, 0.5]

content.append('new')

print(content) # [1, 'a', 12, -5, 0.5, 'new']
```

***Remarque :***

Il n'y a pas eu besoin de réassigner la valeur de `content`, avec `content = content.append(3)` par exemple. La fonction `append` va directement modifier le contenu de la structure. Ce sera le cas avec toutes les fonctions de modifications de structure du langage. Si on veut en savoir plus, on peut faire :

```python
content = [1, 'a', 12, -5, 0.5]

print(content) # [1, 'a', 12, -5, 0.5]

content = content.append('new')

print(content) # None
```

Pour supprimer un élément d'une `list`, on utilisera :

```python
content = [1, 'a', 12, -5, 0.5]

print(content) # [1, 'a', 12, -5, 0.5]

content.remove('a')

print(content) # [1, 12, -5, 0.5]
```

Si on souhaite supprimer le premier élément d'une `list`, on utilisera :

 
```python
content = [1, 'a', 12, -5, 0.5]

print(content) # [1, 'a', 12, -5, 0.5]

content.pop()

print(content) # ['a', 12, -5, 0.5]
```

Si on souhaite obtenir qu'un morceau d'une `list`, on utilisera :


```python
content = [1, 'a', 12, -5, 0.5]

print(content) # [1, 'a', 12, -5, 0.5]
print(content[0:3]) # [1, 'a', 12]
```

Si on souhaite obtenir un élément précis d'une `list`, on utilisera sa clef:

```python
content = [1, 'a', 12, -5, 0.5]

print(content[2]) # 12
```

*Chaque élément du tableau se voit attribuer une clef, unique, qui commence à 0*

Si on souhaite trier une `list`, on utilisera :

```python
content = [1, 12, -5, 0.5]

print(content) # [1, 'a', 12, -5, 0.5]

content.sort()

print(content) # [-5, 0.5, 1, 12]
```

***Remarque :***

On ne peut trier une `list` que si elle ne contient que des nombres (int ou float) ou que des chaînes de caractères (string). Si les deux sont mélangés, on ne peut pas trier.

#### Tuple

`tuple` est une structure de données permettant d'enregistrer plusieurs valeurs et de les regrouper dans une variable. Ces valeurs sont rangées dans l'ordre d'ajout, elles ne sont pas triées automatiquement par le langage.

Pour créer un `tuple`, il faut utiliser :

```python
content = tuple(1, 12, -5)
```

On peut également utiliser la notation simplifiée :

```python
content = (1, 12, -5)
```

On peut enregistrer des valeurs de plusieurs types différents dans une `tuple` :

```python
content = (1, 'a', 12, -5, 0.5)
```

Un `tuple` est immutable : on ne peut pas modifier (supprimer, ajouter, changer) ses valeurs. Elles ne sont accessibles qu'en lecture :

```python
content = (1, 12, -5)
print(content) # (1, 12 -5)
print(content[1:2]) # (12)
print(content[0]) # 1
```

Pour rendre un `tuple` modifiable, il faut le caster en `list` :


```python
content = (1, 12, -5)

contentAsList = list(content)
```

[En savoir plus sur le cast](#cast-de-type).

#### Set

`set` est une structure de données permettant d'enregistrer plusieurs valeurs et de les regrouper dans une variable. Ces valeurs sont rangées dans l'ordre d'ajout, elles ne sont pas triées automatiquement par le langage. Ces valeurs sont forcément uniques.

Pour créer un `set`, il faut utiliser :

```python
content = set(1, 12, -5)
```

On peut également utiliser la notation simplifiée :

```python
content = {1, 12, -5}
```

On peut enregistrer des valeurs de plusieurs types différents dans un `set` :

```python
content = {1, 'a', 12, -5, 0.5}
```

Si on souhaite rajouter un élément dans un `set`, on utilisera :

```python
content = {1, 'a', 12, -5, 0.5}

content.add('new')

print(content) # {1, 'a', 12, -5, 0.5, 'new'}
```

***Remarque :***

Il n'y a pas eu besoin de réassigner la valeur de `content`, avec `content = content.add(3)` par exemple. La fonction `add` va directement modifier le contenu de la structure. Ce sera le cas avec toutes les fonctions de modifications de structure du langage. Si on veut en savoir plus, on peut faire :

```python
content = {1, 'a', 12, -5, 0.5}

print(content) # {1, 'a', 12, -5, 0.5}

content = content.add('new')

print(content) # None
```

Pour supprimer un élément d'un `set`, on utilisera :

```python
content = {1, 'a', 12, -5, 0.5}

print(content) # {1, 'a', 12, -5, 0.5}

content.remove('a')

print(content) # {1, 12, -5, 0.5}
```

Si on souhaite supprimer le premier élément d'un `set`, on utilisera :

 
```python
content = {1, 'a', 12, -5, 0.5}

print(content) # {1, 'a', 12, -5, 0.5}

content.pop()

print(content) # {'a', 12, -5, 0.5}
```

Si on souhaite obtenir qu'un morceau d'un `set`, on utilisera :

```python
content = {1, 'a', 12, -5, 0.5}

print(content) # {1, 'a', 12, -5, 0.5}
print(content[0:3]) # {1, 'a', 12}
```

Si on souhaite obtenir un élément précis d'un `set`, on utilisera sa clef:

```python
content = {1, 'a', 12, -5, 0.5}

print(content[2]) # 12
```

*Chaque élément du tableau se voit attribuer une clef, unique, qui commence à 0*

Si on souhaite trier un `set`, on a besoin de le caster en `list` d'abord :

```python
content = {1, 'a', 12, -5, 0.5}

print(content) # {1, 'a', 12, -5, 0.5}

contentAsList = list(content)
contentAsList.sort()
print(contentAsList) # [-5, 0.5, 1, 12]
```

On peut également utiliser la fonction `sorted` :

```python
content = {1, 'a', 12, -5, 0.5}

print(content) # {1, 'a', 12, -5, 0.5}

sortedContentAsList = sorted(content)
print(sortedContentAsList) # [-5, 0.5, 1, 12]
```

[En savoir plus sur le cast](#cast-de-type).


***Remarque :***

On ne peut trier une `list` que si elle ne contient que des nombres (int ou float) ou que des chaînes de caractères (string). Si les deux sont mélangés, on ne peut pas trier.

#### Dictionnaire

Un dictionnaire est une structure de données permettant d'enregistrer plusieurs valeurs, de les associer à des clefs, et de les regrouper dans une variable. Ces valeurs sont rangées dans l'ordre d'ajout, elles ne sont pas triées automatiquement par le langage.

Pour créer un dictionnaire, il faut utiliser :

```python
content = {
  'username': 'foo',
  'email': 'foo@gmail.com',
  'age': 12
}
```

On peut également utiliser un `tuple` comme clef :

```python
content = {
  'username': 'foo',
  'email': 'foo@gmail.com',
  'age': 12,
  ('address', 'number'): 12,
  ('address', 'street'): 'rue du pif'
}
```

Il est possible de rajouter des éléments dans un dictionnaire existant :


```python
content = {
  'username': 'foo',
  'email': 'foo@gmail.com',
  'age': 12
}

content['new'] = 'value'

content.update({'another': 'value'})

print(content) # {'username': 'foo', 'email': 'foo@gmail.com', 'age': 12, 'new': 'value', 'another': 'value'}
```

***Remarque :***

Il n'y a pas eu besoin de réassigner la valeur de `content`, avec `content = content.update({'another': 'value'})` par exemple. La fonction `update` va directement modifier le contenu de la structure. Ce sera le cas avec toutes les fonctions de modifications de structure du langage. Si on veut en savoir plus, on peut faire :

```python
content = {
  'username': 'foo',
  'email': 'foo@gmail.com',
  'age': 12
}

content = content.update({'another': 'value'})

print(content) # None
```

Pour supprimer un élément d'un dictionnaire, on utilisera :

```python
content = {
  'username': 'foo',
  'email': 'foo@gmail.com',
  'age': 12
}

print(content) # {'username': 'foo', 'email': 'foo@gmail.com', 'age': 12}

content.pop('email')

print(content) # {'username': 'foo', 'age': 12}

del content['age']

print(content) # {'username': 'foo'}

```

Si on souhaite obtenir un élément précis d'un dictionnaire, on utilisera sa clef:

```python
content = {
  'username': 'foo',
  'email': 'foo@gmail.com',
  'age': 12
}

print(content['username']) # foo
```


#### Résumé

|                      | List                                | Tuple                                | Set                                | Dictionnaire                                                      |
|----------------------|-------------------------------------|--------------------------------------|------------------------------------|-------------------------------------------------------------------|
| Création             | content = list(1, 'a', 12, -5, 0.5) | content = tuple(1, 'a', 12, -5, 0.5) | content = set(1, 'a', 12, -5, 0.5) |                                                                   |
| Raccourci            | content = [1, 'a', 12, -5, 0.5]     | content = (1, 'a', 12, -5, 0.5)      | content = {1, 'a', 12, -5, 0.5}    | content = {'username': 'foo', 'email': 'foo@gmail.com', age: 12}} |
| Valeurs uniques      | Non                                 | Non                                  | Oui                                | clefs uniques                                                     |
| Valeurs triées       | Non                                 | Non                                  | Non                                | Non                                                               |
| Valeurs modifiables  | Oui                                 | Non                                  | Oui                                | Oui                                                               |
| Valeurs de même type | Non                                 | Non                                  | Non                                | Non                                                               |

## Équivalences de type

Python est un langage typé dynamiquement et qui est typé fortement. Il existe très peu d'équivalences de type :

```python
print(0 == 0.0) # True
print(0 == False) # True
print(1 == True) # True
print(0 == '0') # False
print(0 == '') # False
print(0 == []) # False
print(0 == {}) # False
print(0 == ()) # False
print(0 == None) # False
```

## Cast de type

Prenons l'exemple où les données qu'on manipule sont des chiffres, mais typées `string`. On ne peut pas faire d'opérations mathématiques directement. Il faut `caster` ces variables en int :

```python
numberLeft = '10'
numberRight = '2'

print(a + b) # 102
print(int(a) + int(b)) # 12
```

Le cast permet de modifier le type d'une variable vers un autre type, pour pouvoir profiter des caractéristiques et des fonctionnalités de ce nouveau type.

On peut par exemple caster une `list` vers un `set` pour en supprimer les doublons (puisqu'un `set` est constitué de valeurs uniques) :

```python

listContent = [1, 1, 1, 3, 8, 1, 4]

contentWithoutDuplicata = set(listContent)

print(contentWithoutDuplicata) # {1, 3, 8, 4}

```

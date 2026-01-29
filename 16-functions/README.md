# Les fonctions

## Sommaire

<!--toc:start-->
- [Les fonctions](#les-fonctions)
  - [Sommaire](#sommaire)
  - [Définition](#définition)
    - [En savoir plus](#en-savoir-plus)
      - [Une fonction sans argument et sans retour](#une-fonction-sans-argument-et-sans-retour)
      - [Une fonction avec pass](#une-fonction-avec-pass)
      - [Une fonction avec un nombre d'arguments fixe](#une-fonction-avec-un-nombre-darguments-fixe)
      - [Une fonction avec des arguments par défaut](#une-fonction-avec-des-arguments-par-défaut)
      - [Une fonction avec une infinité d'arguments](#une-fonction-avec-une-infinité-darguments)
      - [Une fonction avec un retour](#une-fonction-avec-un-retour)
  - [Fonctions anonymes et expressions lambda](#fonctions-anonymes-et-expressions-lambda)
    - [Quand utiliser les lambda](#quand-utiliser-les-lambda)
  - [Fonctions intégrées de haut niveau](#fonctions-intégrées-de-haut-niveau)
<!--toc:end-->

## Définition

Une fonction est un morceau de code pouvant être réutilisé plusieurs fois, à plusieurs endroits, dans une application.

Elle est définie par un nom, une liste d'arguments. Elle peut retourner un résultat ou ne rien retourner.

Format :

```python
def function_name(argument: type) -> type:
  # do something
```
Le nom de la fonction doit être suffisamment explicite pour que n'importe qui puisse comprendre son but. On ne doit pas être obligé de lire le contenu de la fonction pour savoir comment l'utiliser. C'est le même raisonnement que pour les noms de variable.

Typer les arguments et le retour d'une fonction permet 2 choses :

- sécuriser son code
  - ne pas laisser passer n'importe quel genre de variable dans la fonction, ce qui pourrait introduire des effets indésirés voir des bugs
- améliorer la lecture et la compréhension du code
  - en connaissant les types d'arguments et de retour, on sait quels genres d'inputs on doit fournir et comment ils vont être manipulés pour générer l'output

### En savoir plus

#### Une fonction sans argument et sans retour

```python
def empty_function():
```

#### Une fonction avec pass

```python
def empty_function():
  pass
```

Lorsque `pass` est exécuté, rien ne se passe

#### Une fonction avec un nombre d'arguments fixe

```python
def argument_function(leftArg, rightArg):
  print(leftArg + rightArg)

argument_function(33, 9) # 42
```
Il est également possible de passer les arguments dans l'ordre qu'on veut :

```python
def argument_function(leftArg, rightArg):
  print(leftArg - rightArg)

argument_function(33, 9) # 24
argument_function(rightArg = 33, leftArg = 9) # -24
```

#### Une fonction avec des arguments par défaut

```python
def default_argument_function(leftArg=1, rightArg=2):
  print(leftArg + rightArg)

default_argument_function() # 3
default_argument_function(33, 9) # 42
```

#### Une fonction avec une infinité d'arguments

```python
def many(*args, **kwargs):
  print(args)
  print(kwargs)


many(1, 2, 3, name="Mike", job="programmer")
# (1, 2, 3)
# {'job': 'programme', 'name': 'Mike'}

```

#### Une fonction avec un retour

- le mot clef return permet de renvoyer le résultat d'une fonction à l'instruction qui a appelé cette fonction
- il termine également l'exécution de la fonction
  - tout ce qui vient après un return n'est pas lu par le programme

```python
def sum(int leftArg, int rightArg) -> int:
  return leftArg + rightArg


sumResult = sum(1, 2)
print(sumResult) # 3
```

## Fonctions anonymes et expressions lambda

Format :

```python
lambda parameters: expression
```

- définit par le mot-clef `lambda`
- contient une liste d'arguments de fonction
- expression contenant une fonctionnalité qui retourne un résultat

Exemple :

```python
square = lambda a : a*a

print(square(4)) # 16
```

- on definit une fonction lambda qui prend un argument `a` et retourne `a*a`
- on stocke cette fonction dans une variable
- on y fait appel en utilisant le nom de la variable

On peut également exécuter une fonction lambda directement après l'avoir déclarée :

```python
print((lambda a : a*a)(4)) # 16
```

### Quand utiliser les lambda

Principalement pour des fonctions courtes, qui tiennent sur une ligne, et qui seront utilisées très peu de fois dans le code.

**Pour faciliter les conditions de comparaison :**

```python
evenOrOdd = lambda x: "Even" if x % 2 == 0 else "Odd"
print(evenOrOdd(4)) # Even
print(evenOrOdd(7)) # Odd
```

```python
n = [1, 2, 3, 4, 5, 6]
even = filter(lambda x: x % 2 == 0, n)
print(list(even)) # [2, 4, 6]
```

**Pour retourner plusieurs résultats :**

```python
calc = lambda x, y: (x + y, x * y)
res = calc(3, 4)
print(res) # (7, 12)
```


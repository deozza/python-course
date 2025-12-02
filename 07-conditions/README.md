# Conditions

## Sommaire

<!--toc:start-->
- [Conditions](#conditions)
  - [Sommaire](#sommaire)
  - [Opérateurs de comparaison](#opérateurs-de-comparaison)
    - [La yoda condition](#la-yoda-condition)
  - [If](#if)
  - [Switch](#switch)
  - [Opérateur ternaire](#opérateur-ternaire)
<!--toc:end-->

## Opérateurs de comparaison

- `>` : strictement supérieur à
- `<` : strictement inférieur à
- `>=` : supérieur ou égal à
- `<=` : inférieur ou égal à
- `==` : égal en valeur à
- `!=` : différent en valeur de

Exemples :

```python
print(10 > 10)
print(10 < 10)
print(10 >= 10)
print(10 <= 10)
print(10 == 10)
print(10 != 10)
```

Exemple avec des variables :

```python
maxHealth = 20
currentHealth = 17
healingPotion = 5

print(currentHealth + healingPotion > maxHealth)
```

Une condition retourne tout le temps `True` ou `False`. On peut stocker cette valeur dans une variable :

```python
maxHealth = 20

maxHealth = 20
currentHealth = 17
healingPotion = 5

currentHealth += healingPotion

isFullHealth = currentHealth >= maxHealth
```

### La yoda condition

Lorsqu'on veut vérifier l'égalité entre une variable et une valeur, on a tendance à faire :

```python
target = 70

print(target == 12)
```

Il peut arriver de faire une erreur et de ne pas écrire le second `=`, de faire : `print(target = 12`. Cela cause 2 problèmes :)

- on écrase la valeur contenue dans la variable `target` par `12`, ce qui faussera les prochaines instructions du programme
- au lieu d'afficher le résultat d'une condition (vrai ou faux), on affiche le résultat d'une assignation de valeur et qui est toujours vraie

Ceci n'est pas considéré comme une erreur par le langage, et le programme s'exécutera.

Pour éviter ce problème, on peut utiliser la *yoda condition*. On inverse l'ordre entre la variable et la valeur à comparer :

```python
target = 70

print(12 == target)
```

Ainsi, si on fait l'erreur de ne pas mettre le second `=`, une erreur sera levée : on essaie d'assigner une variable à une donnée, ce qui est impossible.

C'est une sécurité supplémentaire contre les fautes de frappes, qui fera s'arrêter le programme au lieu de le laisser continuer avec une erreur.

## If

Pouvoir gérer plusieurs embranchements possibles selon l'état du programme.

```python
target = 70

actualValue = 10

if(actualValue < target):
  print('error')
else:
  print('success')
```

*Si* la condition est remplie, *alors* exécuter les instructions qui suivent. *Sinon* exécuter ces instructions.

Le bloc `else` est facultatif.

Si on veut tester plusieurs conditions qui s'excluent mutuellement, on peut utiliser `else if` :

```python
actualValue = 12

if(actualValue < 20):
  print('Not even close')
elif(actualValue < 40):
  print('Still far')
elif(actualValue < 60):
  print('Nearly there')
elif(actualValue < 70):
  print('A last effort')
else:
  print('success')
```

## Switch

Pour éviter d'enchainer plusieurs `if elif` qui mettent des conditions sur la même variable, on peut utiliser l'expression `switch` :

```python
actualValue = 12

match actualValue:
  case actualValue < 20 :
    print('Not even close')
  case actualValue < 40 :
    print('Still far')
  case actualValue < 60 :
    print('Nearly there')
  case actualValue < 70 :
    print('A last effort')
  case _:
    print('success')
```

Chaque `case` est un `if`. Le `default` correspond au `else` final, le comportement par *défaut* si aucune condition n'est remplie.

## Opérateur ternaire

Prenons le cas où on fait un `if` pour assigner une valeur à une variable :

```python
actualValue = 12

if actualValue >= 0:
  message = 'le chiffre est positif'
else:
  message = 'le chiffre est négatif'
```
On peut utiliser l'opérateur ternaire à la place pour gagner de la place :

```python
actualValue = 12
message = actualValue >= 0 ? 'le chiffre est positif' : 'le chiffre est impair'
```

Il se lit :

- si la condition est respectée alors (`?`)
- sinon (`:`)



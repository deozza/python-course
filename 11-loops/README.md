# Les boucles

## Sommaire

- [Définition](#définition)
- [For](#for)
- [While](#while)
- [Do while](#do-while)
- [Foreach](#foreach)

## Définition

Une boucle permet de *boucler*, exécuter une liste d'instructions, tant qu'une condition est respectée.

## For

*Pour un compteur démarrant à x (par défaut 0), qui s'incrémente de y (par défaut 1) à chaque itérations, jusqu'à atteindre z*

```python
for i in range(5):
   print(i) # 0, 1, 2, 3, 4


for i in range(10, 15):
   print(i) # 10, 11, 12, 13, 14
  
for i in range(5, 0, -1):
   print(i) # 5, 4, 3, 2, 1

```

À utiliser lorsqu'on connaît la limite de la boucle.

On peut également l'utiliser pour boucler sur les éléments d'un ensemble :

```python

names = ['Alice', 'Bob', 'Charline']

for name in names:
  print(name)
```

## While

*Tant que la condition est respectée, exécuter les instructions*

```python
i = 0

while i < 20:
  print(i)
  i++


```

À utiliser lorsque la fin de la boucle dépend du traitement des instructions.

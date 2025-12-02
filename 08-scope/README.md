# Scope d'une variable

## Définition

Le `scope`, ou *portée*, d'une variable, correspond à sa durée de vie, est-ce qu'une variable est accessible ou non, si elle est manipulable.

Une variable *existe* uniquement dans le bloc, et ses sous-blocs, dans lequel elle a été créée.

Dans l'exemple ci-dessous, `message` est accessible dans tout le script puisqu'elle a été créée au premier niveau. Contrairement à `name`, qui a été créé dans un bloc `if`, et est donc accessible que dans ce bloc. Pas en dehors.

```python
message = 'hello world'
print(message)

if message != '': 
  name = 'Henry'


print(name) # va lancer une erreur
```

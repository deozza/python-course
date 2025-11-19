# Opérations

## Sommaire

<!--toc:start-->
- [Opérations](#opérations)
  - [Sommaire](#sommaire)
  - [Opérations mathématiques](#opérations-mathématiques)
    - [Additions](#additions)
    - [Soustractions](#soustractions)
    - [Multiplications](#multiplications)
    - [Divisions](#divisions)
    - [Modulo](#modulo)
  - [Opérations sur chaînes de caractères](#opérations-sur-chaînes-de-caractères)
    - [Concaténation](#concaténation)
<!--toc:end-->

## Opérations mathématiques

### Additions

```python
print(2+3)
```

Additionner 2 variables :

```python
numberLeft = 2
numberRight = 3

sum = numberLeft + numberRight

print(sum)
```

Rajouter une valeur à une variable :

```python
counter = 0

counter += 1

print(counter)
```

**Le raccourci pour incrémenter `++` n'existe pas en python**

### Soustractions

```python
print(3-2)
```

Soustraire 2 variables :

```python
numberLeft = 3
numberRight = 2

sub = numberLeft + numberRight

print(sub)
```

Soustraire une valeur à une variable :

```python
countdown = 10

countdown -= 1

print(countdown)
```

**Le raccourci pour décrémenter `--` n'existe pas en python**

### Multiplications

```python
print(3*2
```

Diviser 2 variables :

```python
numberLeft = 3
numberRight = 2

mult = numberLeft * numberRight

print(mult)
```

Multiplier une variable par une valeur :

```python
number = 10

number *= 2

print(number)
```

### Divisions


```python
print(3/2)
```

Diviser 2 variables :

```python
numberLeft = 3
numberRight = 2

div = numberLeft / numberRight

print(div)
```

Diviser une variable par une valeur :

```python
number = 10

number /= 2

print(number)
```


### Modulo

Le modulo est un opérateur permettant de connaître le reste d'une division euclidienne. Exemple : 5 divisé par 2, il reste 1. Donc 5 modulo 2 = 1.

```python
print(3%2)
```

Connaître le modulo de 2 variables :

```python
numberLeft = 3
numberRight = 2

mod = numberLeft % numberRight

print(mod)
```

## Opérations sur chaînes de caractères

### Concaténation

Le fait de *coller* deux chaînes de caractères ensemble est ce que l'on appelle une concaténation.

```python
print('Hello' + ' ' + 'world !')
```

Concaténer 2 variables ensemble :

```python
leftString = 'Hello '
rightString = 'world !'

fullSentence = leftString + rightString

print(fullSentence)
```

Raccourci pour éditer une variable en la concaténant avec une autre chaîne de caractère :

```python
fullSentence = 'Hello '
name = 'Alice !'

fullSentence += name

print(fullSentence)

```

Il n'est pas possible de concaténer un chiffre avec une chaîne de caractères.

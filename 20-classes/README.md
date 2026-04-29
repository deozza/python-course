# Classes

## Sommaire

<!--toc:start-->
- [Classes](#classes)
  - [Sommaire](#sommaire)
  - [Créer une classe](#créer-une-classe)
  - [Ajouter des propriétés](#ajouter-des-propriétés)
    - [Propriété d'instance - via constructeur](#propriété-dinstance-via-constructeur)
    - [Propriété de classe](#propriété-de-classe)
  - [Modifier les valeurs des propriétés](#modifier-les-valeurs-des-propriétés)
    - [Propriété d'instance - via constructeur](#propriété-dinstance-via-constructeur-1)
    - [Propriété de classe](#propriété-de-classe-1)
  - [Ajouter des méthodes](#ajouter-des-méthodes)
  - [Les méthodes d'accès](#les-méthodes-daccès)
<!--toc:end-->

## Créer une classe

```python
class Car:
  pass

my_car = Car()
```

## Ajouter des propriétés

### Propriété d'instance - via constructeur

```python
class Car:
  def __init__(self, color):
      self.color = color

my_car = Car("red")
print(my_car.color) # red

other_car = Car("blue")
print(other_car.color) # blue
```

### Propriété de classe

```python
class Car:
  color = "red"

my_car = Car()
print(my_car.color) # red

other_car = Car()
print(other_car.color) # red
```

## Modifier les valeurs des propriétés

### Propriété d'instance - via constructeur

```python
class Car:
  def __init__(self, color):
      self.color = color

my_car = Car("red")
print(my_car.color) # red

other_car = Car("blue")
print(other_car.color) # blue

my_car.color = "yellow"
print(my_car.color) # yellow
print(other_car.color) # blue
```

### Propriété de classe

```python
class Car:
  color = "red"

my_car = Car()
print(my_car.color) # red

other_car = Car()
print(other_car.color) # red


Car.color = "green"
print(my_car.color) # green
print(other_car.color) # green
```

**Si une propriété de classe a le même nom qu'une propriété d'instance :**


```python
class Car:
  color = "red"

  def __init__(self, color):
    self.color = color

my_car = Car("Blue")
other_car = Car("Yelllow")

Car.color = "Green"

print(my_car.color) # Blue
print(other_car.color) # Yellow
```

> la propriété d'instance est prioritaire

## Ajouter des méthodes

```python
class Person:
  def __init__(self, name):
    self.name = name

  def greet(self):
    print("Hello, my name is " + self.name)

p1 = Person("Emil")
p1.greet() # Hello, my nae is Emil
```

```python
class Calculator:
  def add(self, a, b):
    return a + b

  def multiply(self, a, b):
    return a * b

calc = Calculator()
print(calc.add(5, 3)) # 8
print(calc.multiply(4, 7)) # 28
```

## Les méthodes d'accès

```python
class Person:
  def __init__(self, name, age):
    self.name = name
    self.__age = age # Private property

p1 = Person("Emil", 25)
print(p1.name)
print(p1.__age) # This will cause an error
```


```python
class Calculator:
  def __init__(self):
    self.result = 0

  def __validate(self, num):
    if not isinstance(num, (int, float)):
      return False
    return True

  def add(self, num):
    if self.__validate(num):
      self.result += num
    else:
      print("Invalid number")

calc = Calculator()
calc.add(10)
calc.add(5)
print(calc.result)
# calc.__validate(5) # This would cause an error
```

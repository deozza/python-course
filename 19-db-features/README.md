# Connection à une base de données

## Sommaire

<!--toc:start-->
- [Connection à une base de données](#connection-à-une-base-de-données)
  - [Sommaire](#sommaire)
  - [Installation de mysql-connector-python](#installation-de-mysql-connector-python)
  - [Utilisations](#utilisations)
    - [Se connecter](#se-connecter)
    - [Exécution d'instructions MySQL](#exécution-dinstructions-mysql)
      - [Créer une base de données](#créer-une-base-de-données)
      - [Ajouter des tables](#ajouter-des-tables)
      - [Insérer des données](#insérer-des-données)
      - [Faire une requête](#faire-une-requête)
<!--toc:end-->

## Installation de mysql-connector-python

Prérequis : avoir installé `pip` sur son environnement de travail

```bash
pip install mysql-connector-python 
```

## Utilisations

### Se connecter

```python
import mysql.connector

cnx = mysql.connector.connect(user='username', password='password', host='host-url', database='dbname')

# features ...

cnx.close()
```

- `close()` permet de fermer la connexion et éviter des pertes de performances ou des accès concurrents à la base de données
  - elle est à ajouter lorsqu'il n'est plus nécessaire de conserver la connexion
    - comme avec le traitement de fichiers
- il est aussi possible de se connecter en utilisant un dictionnaire :

```python
import mysql.connector

config = {
  'user': 'username',
  'password': 'password',
  'host': 'host-url',
  'database': 'dbname'
}

cnx = mysql.connector.connect(**config)

# features ...

cnx.close()
```

- pour vérifier la connexion, on utilisera :

```python
import mysql.connector

cnx = mysql.connector.connect(user='username', password='password', host='host-url', database='dbname')

cnx.is_connected() # returns True or False
```

### Exécution d'instructions MySQL

- pour faciliter l'automatisation des tâches et éviter de passer par la console MySQL, on peut manipuler une base de données directement avec Python
- pour exécuter une instruction MySQL avec Python après avoir créé une connexion, il faut créer un `cursor`
  - équivalent du `handler` pour le traitement de fichiers
- les instructions seront lancées avec la fonction `execute()`
- lorsque les instructions sont terminées, il faut fermer détruire le `cursor` avec `close()`

#### Créer une base de données

```python
import mysql.connector

DB_NAME = 'employees'

cnx = mysql.connector.connect(user='username', password='password', host='host-url', database='dbname')

cursor = cnx.cursor()

cursor.execute("CREATE DATABASE {} DEFAULT CHARACTER SET 'utf8'".format(DB_NAME))

cursor.close()
cnx.close()
```

#### Ajouter des tables

```python
import mysql.connector

DB_NAME = 'employees'

TABLES = {}
TABLES['employees'] = (
    "CREATE TABLE `employees` ("
    "  `emp_no` int(11) NOT NULL AUTO_INCREMENT,"
    "  `birth_date` date NOT NULL,"
    "  `first_name` varchar(14) NOT NULL,"
    "  `last_name` varchar(16) NOT NULL,"
    "  `gender` enum('M','F') NOT NULL,"
    "  `hire_date` date NOT NULL,"
    "  PRIMARY KEY (`emp_no`)"
    ") ENGINE=InnoDB")
    
TABLES['titles'] = (
    "CREATE TABLE `titles` ("
    "  `emp_no` int(11) NOT NULL,"
    "  `title` varchar(50) NOT NULL,"
    "  `from_date` date NOT NULL,"
    "  `to_date` date DEFAULT NULL,"
    "  PRIMARY KEY (`emp_no`,`title`,`from_date`), KEY `emp_no` (`emp_no`),"
    "  CONSTRAINT `titles_ibfk_1` FOREIGN KEY (`emp_no`)"
    "     REFERENCES `employees` (`emp_no`) ON DELETE CASCADE"
    ") ENGINE=InnoDB")

cnx = mysql.connector.connect(user='username', password='password', host='host-url', database='dbname')

cursor = cnx.cursor()

cursor.execute("USE {}".format(DB_NAME))

for table_name in TABLES:
    table_description = TABLES[table_name]
    cursor.execute(table_description)

cursor.close()
cnx.close()
```

#### Insérer des données

- `execute()` seul ne va pas insérer les données
  - pour confirmer l'insertion, il faut utiliser en plus `commit()`
- il vaut mieux séparer le statement et les données à insérer dans 2 variables différentes
  - pour éviter les problèmes d'injection SQL

```python
from datetime import date, datetime, timedelta
import mysql.connector

add_employee = ("INSERT INTO employees "
               "(first_name, last_name, hire_date, gender, birth_date) "
               "VALUES (%s, %s, %s, %s, %s)")

tomorrow = datetime.now().date() + timedelta(days=1)
data_employee = ('Geert', 'Vanderkelen', tomorrow, 'M', date(1977, 6, 14))

cnx = mysql.connector.connect(user='username', password='password', host='host-url', database='dbname')

cursor = cnx.cursor()

cursor.execute(add_employee, data_employee)

cnx.commit()

cursor.close()
cnx.close()
```

- on peut aussi utiliser un dictionnaire pour insérer des données
  - il faudra alors adapter le statement de la requête

```python
add_salary = ("INSERT INTO salaries "
              "(emp_no, salary, from_date, to_date) "
              "VALUES (%(emp_no)s, %(salary)s, %(from_date)s, %(to_date)s)")

data_salary = {
  'emp_no': emp_no,
  'salary': 50000,
  'from_date': tomorrow,
  'to_date': date(9999, 1, 1),
}
cursor.execute(add_salary, data_salary)
```

#### Faire une requête

- la logique de séparation du statement et des données de la requête est la même


```python
import mysql.connector
import datetime

cnx = mysql.connector.connect(user='username', password='password', host='host-url', database='dbname')

cursor = cnx.cursor()

query = ("SELECT first_name, last_name, hire_date FROM employees "
         "WHERE hire_date BETWEEN %s AND %s")

hire_start = datetime.date(1999, 1, 1)
hire_end = datetime.date(1999, 12, 31)

cursor.execute(query, (hire_start, hire_end))

for (first_name, last_name, hire_date) in cursor:
  print("{}, {} was hired on {:%d %b %Y}".format(
    last_name, first_name, hire_date))

cursor.close()
cnx.close()
```

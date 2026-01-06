# Intéragir avec le terminal

## Sommaire

<!--toc:start-->
- [Intéragir avec le terminal](#intéragir-avec-le-terminal)
  - [Sommaire](#sommaire)
  - [Récupérer avec input](#récupérer-avec-input)
  - [Récupérer avec sys.argv](#récupérer-avec-sysargv)
    - [Traitement avec getopt.getopt](#traitement-avec-getoptgetopt)
  - [Récupérer avec argparse](#récupérer-avec-argparse)
<!--toc:end-->

## Récupérer avec input

- affiche un message dans la console, ouvre un stream d'écoute et stocke l'input utilisateur dans une variable
- on peut en enchainer plusieurs

```python
import sys

inputFromTerminal = input('Are you sure you want to do this ? ')

if inputFromTerminal != 'yes':
    print('aborting...')
    sys.exit()
    

print('Thank you, continuing...')

username = input('What is your name ? ')

print('Hello ' + username)
```

## Récupérer avec sys.argv

- récupère dans un tableau tous les paramètres envoyés
  - dont le nom du fichier exécuté

```python
import sys

print(sys.argv)
```

```bash
python main.py arg1 arg2 arg3
```

```bash
['main.py', 'arg1', 'arg2', 'arg2']
```

### Traitement avec getopt.getopt

- permet d'organiser le retour de `sys.argv` avec un tableau d'options
  - les options ont un mode court (`-`) et un mode long (`--`)

```python
import getopt, sys

args = sys.argv[1:]
options = "hmo:"
long_options = ["Help", "My_file", "Output="]

try:
    arguments, values = getopt.getopt(args, options, long_options)
    for currentArg, currentVal in arguments:
        if currentArg in ("-h", "--Help"):
            print("Showing Help")
        elif currentArg in ("-m", "--My_file"):
            print("File name:", sys.argv[0])
        elif currentArg in ("-o", "--Output"):
            print("Output mode:", currentVal)
except getopt.error as err:
    print(str(err))
```

## Récupérer avec argparse

- permet de définir des arguments optionnels pour le script en cours grâce à la fonction `add_argument()`
  - les arguments ont un mode court (`-`) et un mode long (`--`)
  - les arguments ont également une option `help`, qui permet d'afficher une description de l'option lorsque le script est lancé avec `-h` ou `--help`
- la fonction `parse_args` permet de récupérer les options passées lors de l'exécution
  - elle organise les valeurs passées en fonction du nom de l'option correspondante

```python
import argparse

parser = argparse.ArgumentParser()
parser.add_argument("-o", "--Output", help="Show output message")
args = parser.parse_args()

if args.Output: #si l'option -o ou --Output est passée, alors args aura une propriété Output, du nom mode long de l'option correspondante
    print("Output:", args.Output)
```

```bash
python main.py -h
```

```bash
usage: main.py [-h] [-o OUTPUT]

options:
  -h, --help           show this help message and exit
  -o, --Output OUTPUT  Show output message
```

```bash
python main.py -o oui
```

```bash
Output: oui
```

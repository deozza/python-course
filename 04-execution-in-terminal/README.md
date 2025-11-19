# Exécution depuis le terminal

## Sommaire

<!--toc:start-->
- [Exécution depuis le terminal](#exécution-depuis-le-terminal)
  - [Sommaire](#sommaire)
  - [Shell intéractif](#shell-intéractif)
    - [Exécution d'un fichier](#exécution-dun-fichier)
<!--toc:end-->

## Shell intéractif

Utiliser la commande :

```bash
python
```

Pour rentrer dans le shell intéractif de python. Ici, on peut exécuter des instructions directement depuis le terminal.

Utiliser la commande `exit` pour sortir du shell intéractif et revenir dans votre terminal.

### Exécution d'un fichier

Utiliser la commande :

```bash
python file.py
```

Pour rendre un fichier exécutable sans avoir besoin de passer par `python`, il y a 2 solutions :

- utiliser `chmodx +x file.py` depuis le terminal
- ajouter `#!/usr/bin/env python` en première ligne du fichier python à exécuter

On pourra alors lancer le script en écrivant :

```bash
./file.py
```

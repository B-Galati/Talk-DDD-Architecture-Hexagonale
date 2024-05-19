> [!WARNING]
> Ce projet contient du pseudocode qui ne fonctionne pas.
>
> Il est seulement présent pour illustrer les propos de la conférence qui a eu lieu le 24 mai
> pour l'AFUP Day 2024.

Il y a 3 branches qui présentent chacune le même projet avec une approche différente en utilisant le framework Symfony.

Pour naviguer aisément dans ces 3 branches, copier/coller le script suivant dans un terminal avec Bash
et lisez le README à chaque étape pour avoir des explications détaillées.

Le but du talk est de montrer : 
- la différence entre une archi hexa et un domain model DDD
- la synergie possible entre archi hexa et un domain model DDD

```bash
echo;echo;echo;echo '1. Un domain model seul'
git checkout ddd-only; echo "Press a key to continue..."; read

echo;echo;echo;echo '2. Une archi hexagonal avec un domain model anémique'
git checkout archi-hexa-only; echo "Press a key to continue..."; read

echo;echo;echo;echo '3. Un domain model avec une archi hexagonale'
git checkout ddd-and-archi-hexa
```

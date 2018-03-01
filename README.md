# SiteBdeUtt
Site Vitrine du BDE + quelques fonctionnalités à bouger. J'ai (galliotl) pas beaucoup de connaissances dans le domaine du dev.
J'apprends alors n'hesitez pas à modifier des trucs. On m'a dit de regarder du côté du framework Laravel alors je le regarderais 
pendant les vacances. J'ai ajouté certaines fonctionnalités que je sais ne pas être sécurisé ni optimisé. Je m'y connais pas assez 
pour les intégrer bien comme il faut mais je les ai ajoutées dans le but de mieux vous montrer ce que je veux : une sorte de maquette
en quelque sorte. 
Si jamais vous avez du temps pour m'aider : 

# A faire :
- Espace cotisation du site actuel à mettre dans un sous dossier de la racine afin que l'on puisse avoir le site vitrine sur le domaine
bde.utt.fr puis l'espace cotisations sur bde.utt.fr/cotisations
- Espace log à mettre à part aussi ? Questionnement sur l'intérêt de l'avoir directement intégré au site internet vitrine ?
On pourrait alors envisager une série d'autres services qui pourraient alors se greffer au site par des sous dossiers du style 
bde.utt.fr/serviceX 

# Ma vision de l'espace log : 
Je sais qu'une app log à été entmamée par Cecile je n'ai pas encore eu l'occasion de me pencher dessus réellement étant donné que 
je ne suis pas en mesure d'avoir les connaissances suffisantes pour avoir un regard critique dessus. J'y travaille.
IDEALEMENT : le site log permettrait à un cotisant BDE de pouvoir effectuer une demande log en ligne sur un objet en particulier.
Cette demande se charge de vérifier la possibilité de cet emprunt en regardant si l'objet demandé est effectivement dispo (normal).
Une fois effectué, cet emprunt marque la date dans la BDD de début d'emprunt à partir du moment de la demande.
Le lendemain, l'étudiant peut alors passer au BDE qui aura juste à vérifier que la demande a été bel et bien faite sur le site
puis lui donne son objet. Cela à deux gros avantages : simplification du travail de la commission log et réduction du délai de 
demande de log pour l'étudiant : si jamais l'item est dispo, l'étudiant peut le commander et le récupérer dans la seconde. 
Pour les retours, une procédure stockée ou autre en fct de ce que vous préférez permet de marquer le timestamp de fin de location
lorsque le membre logistique réceptionne l'item. Cela implique une difficulté : un accès "admin" pour les membres de la log qui
leur donne accès à cette fonctionnalité de retour.

Merci beaucoup d'avance de votre temps, aide et bienveillance ;)

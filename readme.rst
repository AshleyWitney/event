Web4Event
Ashley Witney KONATE,
08 Décembre 2021
Web4Event : Musique et culture africaine
Nom du template : grand-free
URL de la dernière version de l’application
hébergée sur le serveur de production : https://obiwan2.univbrest.fr/licence/lic71/v2/CodeIgniter/index.php/accueil/afficher
Url de la dernière version de sauvegarde :
https://gitlab-deptinfo.univ-brest.fr/dashboard/activity
Descriptif de la version en ligne:
Il s’agit de la version V2.1 demandé, et respectant tout les besoin du client (les
user story).
Base de données : Maria DB
Pour tester le compte invité :
Identifiant : burna Mot de passe : 1234
Compte d’un administrateur
Identifiant : organisateur Mot de passe : org21**TNEVE
Autre Compte administrateur
Identifiant : org1 Mot de passe : 1234 #Descriptif de la version en ligne: la
version en ligne est la version v2.1 #Nom de la base de donnée : MariaDB
d’obiwan2 effectuée : https://obiwan2.univ-brest.fr/adminbdd/index.php
1
Procédures Fonction, Trigger et vue
vue qui affiche toute les actualités**** DROP VIEW IF EXISTS LISTE_actualite; CREATE VIEW LISTE_actualite AS SELECT
act_titre,act_contenu FROM t_actualite_act;
SELECT * FROM LISTE_actualite ;
fonction qui visualise le statut d’un utilisateur DELIMITER $$ CREATE
DEFINER=zkonateas@% FUNCTION visualiser_statut_utilisateur(stat
varchar (500)) RETURNS varchar(500) CHARSET utf8 BEGIN DECLARE res
varchar(500); SELECT cpt_statut INTO @res FROM t_compte_cpt WHERE
cpt_pseudo = stat ; RETURN @res; END$$ DELIMITER ; appelle : SELECT
visualiser_statut_utilisateur(’burna’);
trigger qui supprimer une actualite concernant une animation de la table de programmation qui a été supprimée DROP TRIGGER IF EXISTS
dele_ani_actu; DELIMITER // CREATE TRIGGER dele_ani_actu BEFORE
DELETE ON t_programmation_pro FOR EACH ROW BEGIN DECLARE libelle varchar(100); SELECT ani_libelle into libelle from t_animation_ani LEFT
JOIN t_programmation_pro USING(ani_id) WHERE ani_id = old.ani_id;
DELETE from t_actualite_act where act_contenu LIKE concat(’%’,libelle,’%’);
END ; // DELIMITER ;
**********trigger qui creer une nouvelle actualité a chaque nouveau post
********** DROP TRIGGER IF EXISTS post; DELIMITER // CREATE
TRIGGER post AFTER INSERT ON t_post_pos FOR EACH ROW BEGIN
INSERT INTO t_actualite_act(act_id,act_titre,act_contenu,act_date,act_etat,org_id)VALUES
( null, ’NOUVEAU POST!’, concat(’\n Nom membre du staff : ’,new.pas_id,’
’,’\n Post : ’,new.pos_texte,’ ’,’\n Date : ’,’ ’,new.pos_date), now(), ’A’, 1);
END ; // DELIMITER ;
Procédure qui supprime une animation dans le dbmodel*************
BEGIN DELETE FROM t_programmation_pro WHERE ani_id = id;
DELETE FROM t_animation_ani WHERE ani_id = id; END
Améliorations à apporter:
La gestion des espaces et des caractères.
2
Installation de l’application
Il vous faudra :
Un serveur Web/HTTP Apache 2.4.39 (Navigateur Web ouvert sur l’application « Web4Event
»)
Un SGBD MariaDB 10.3.9 (Navigateur Web ouvert sur « phpMyAdmin »)
Un PHP PHP 7.2.9 (Navigateur Web ouvert sur
l’application « Web4Event »)
UN FTP VsFTPd 3.0.3 (une application FTP
comme FileZilla)
Et enfin pour vos sauvegardes SSH OpenSSH
7.8p1 (Console Linux Commande SSH) Vous pouvez téléchargé putty et utiliserer git.
Si vous n’êtes pas de L’UBO
L’installation est très simple, Installez OpenVpn Connect puis créez une
licence et importez la afin de pouvoir vous connecter au réseau. Une
fois le VPN installé,activez le puis allez sur le site :https://obiwan2.univbrest.fr/licence/lic71/v2/CodeIgniter/index.php/accueil/afficher et visulisez le
site.
Installez FilZilla afin de pouvoir mettre à jour les
fichiers au besoin
Entrez vos identifiants filzilla Une fois le fichier dézippé, transférer le dossier sur
fileZilla et enregistrez à chaque modification.
3
Pour la base de données pour pouvez opter pour
phpMyadmin ou Wamp ou Xamp si vous voulez
travailler en local

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 jan. 2025 à 15:55
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rotten_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20241113121603', '2024-12-13 11:58:23', 87),
('DoctrineMigrations\\Version20241213104618', '2024-12-13 11:58:23', 80),
('DoctrineMigrations\\Version20241213150516', '2024-12-13 16:05:27', 21),
('DoctrineMigrations\\Version20241215161157', '2024-12-15 16:12:00', 185);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `note_generale` double NOT NULL,
  `studio_film` varchar(255) NOT NULL,
  `bio` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `image`, `nom`, `duree`, `description`, `note_generale`, `studio_film`, `bio`) VALUES
(1, 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/72/34/14/19476654.jpg', 'Inception', '2h28', 'Un voleur qui infiltre les rêves des gens pour dérober leurs secrets doit accomplir une mission impossible.', 8.8, 'Warner Bros', 'Inception est un thriller de science-fiction réalisé par Christopher Nolan. Le film suit Dom Cobb, un voleur spécialisé dans l\'extraction d\'idées à l\'intérieur des rêves. Avec son équipe, il entreprend une mission impossible : implanter une idée dans l\'esprit d\'un héritier d\'entreprise. L\'histoire explore des thèmes complexes comme la réalité, les rêves et la perception du temps. Les effets visuels révolutionnaires, combinés à une narration profonde, font d\'Inception un chef-d\'œuvre intemporel.'),
(2, 'https://fr.web.img4.acsta.net/c_310_420/medias/04/34/49/043449_af.jpg', 'The Matrix', '2h16', 'Un programmeur découvre la vérité sur son monde et son rôle dans une guerre contre ses créateurs.', 8.7, 'Warner Bros', 'The Matrix est un film culte de science-fiction réalisé par les Wachowski. L\'intrigue suit Neo, un programmeur qui découvre que la réalité est une simulation contrôlée par des machines. Guidé par Morpheus et Trinity, il devient l\'Élu, destiné à libérer l\'humanité. Le film mêle philosophie, action spectaculaire et effets visuels révolutionnaires. The Matrix a redéfini le genre et reste un incontournable du cinéma moderne.'),
(3, 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/63/97/89/18949761.jpg', 'The Dark Knight', '2h32', 'Batman affronte le Joker, un génie du crime qui menace Gotham City.', 9, 'DC Entertainment', 'The Dark Knight, réalisé par Christopher Nolan, est une œuvre magistrale sur le conflit entre le bien et le mal. Batman, interprété par Christian Bale, affronte le Joker, un criminel anarchiste incarné par Heath Ledger. Le film explore des thèmes de moralité, de sacrifice et de chaos. Avec une narration intense et des performances inoubliables, The Dark Knight est considéré comme l\'un des meilleurs films de super-héros de tous les temps.'),
(4, 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/63/30/68/18686447.jpg', 'The Shawshank Redemption', '2h22', 'L’histoire de deux hommes dans une prison et leur quête de liberté.', 9.3, 'Castle Rock Entertainment', 'The Shawshank Redemption est une histoire poignante d\'espoir et d\'amitié. Andy Dufresne, un banquier accusé à tort de meurtre, est envoyé à la prison de Shawshank. Là, il forge une amitié profonde avec Red, un détenu expérimenté. Le film explore la résilience humaine et le pouvoir de l\'espoir, avec une fin émouvante qui a marqué l\'histoire du cinéma.'),
(5, 'https://fr.web.img2.acsta.net/c_310_420/medias/nmedia/18/36/02/52/18846059.jpg', 'Pulp Fiction', '2h34', 'Des histoires entrecroisées de criminels à Los Angeles.', 8.9, 'Miramax', 'Pulp Fiction, réalisé par Quentin Tarantino, est un film emblématique du cinéma indépendant. Il entrelace plusieurs histoires de gangsters, de boxeurs et de criminels dans un style narratif non linéaire. Avec des dialogues percutants, des personnages mémorables et une bande-son iconique, Pulp Fiction redéfinit les conventions du genre et reste une œuvre révolutionnaire du cinéma contemporain.');

-- --------------------------------------------------------

--
-- Structure de la table `joue`
--

CREATE TABLE `joue` (
  `personnages_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `joue`
--

INSERT INTO `joue` (`personnages_id`, `film_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 4),
(2, 5),
(3, 1),
(3, 4),
(4, 5),
(5, 2),
(5, 4),
(6, 2),
(6, 4),
(6, 5),
(7, 4),
(7, 5),
(8, 3),
(8, 4),
(9, 1),
(9, 2),
(10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `film_id`) VALUES
(17, 9, 4),
(27, 12, 3);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image_personnage` varchar(255) NOT NULL,
  `bio` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `prenom`, `image_personnage`, `bio`) VALUES
(1, 'Stark', 'Tony', 'https://i.pinimg.com/736x/bc/ed/41/bced415261251e8b6c776415005e3468.jpg', 'Tony Stark est un génie milliardaire, playboy et philanthrope, connu comme Iron Man. Il hérite de Stark Industries, une entreprise spécialisée dans la technologie et l\'armement. Après un incident en Afghanistan, il crée une armure pour échapper à ses ravisseurs. Cette expérience le pousse à transformer sa vie et à devenir un héros. Son armure est dotée de multiples fonctionnalités, dont des armes avancées et la capacité de voler. Stark est également l\'un des fondateurs des Avengers. Son humour sarcastique et son intelligence le rendent unique dans l\'équipe. Malgré son arrogance, il se soucie profondément de protéger le monde. Sa relation complexe avec Pepper Potts apporte une dimension humaine à son personnage. Son sacrifice ultime dans la bataille contre Thanos marque son héroïsme éternel.'),
(2, 'Rogers', 'Steve', 'https://i.redd.it/chris-evans-as-steve-rogers-captain-america-is-top-tier-for-v0-nqg5wx9q0hyd1.jpg?width=500&format=pjpg&auto=webp&s=c3fe5ad69e3bbc6b990d3131aaf29661e6bbb5d8', 'Steve Rogers est un jeune homme faible, mais courageux, originaire de Brooklyn. Rejeté par l’armée à cause de sa condition physique, il ne perd jamais espoir. Il devient Captain America grâce au sérum du super-soldat. Portant un bouclier en vibranium, il devient un symbole d’espoir et de justice. Il combat les nazis et HYDRA pendant la Seconde Guerre mondiale. Après s’être sacrifié pour sauver le monde, il est congelé pendant près de 70 ans. Il se réveille dans un monde moderne qu’il doit apprendre à comprendre. Son sens du devoir et sa loyauté envers ses amis sont inégalés. Steve est le chef des Avengers, menant toujours par l\'exemple. Son voyage se termine lorsqu’il choisit une vie paisible avec Peggy Carter.'),
(3, 'Romanoff', 'Natasha', 'https://leparisien.fr/resizer/LZaEvYEbSktUDw9Dhpy2v62btqw=/1200x675/cloudfront-eu-central-1.images.arcpublishing.com/leparisien/KKGKJ2SD7K65MFH73PSJ354A3Y.jpg', 'Natasha Romanoff, alias Black Widow, est une espionne russe d\'élite. Elle est formée au \'Red Room\', un programme brutal de l\'Union soviétique. Ses compétences incluent le combat au corps-à-corps, l’espionnage et le piratage. Elle rejoint le SHIELD pour expier son passé sombre. Natasha devient une alliée clé et une amie proche des Avengers. Son relation avec Clint Barton (Hawkeye) est particulièrement profonde. Malgré ses secrets, elle montre un immense courage et une loyauté indéfectible. Elle joue un rôle crucial dans les batailles contre Loki, Ultron et Thanos. Son sacrifice pour récupérer la Pierre de l\'Âme est un acte d’héroïsme ultime. Elle laisse un héritage durable en tant qu’héroïne complexe et inspirante.'),
(4, 'Thor', 'Hemsworth', 'https://www.ecranlarge.com/content/uploads/2017/03/thor-ragnarok-photo-chris-hemsworth-979421-scaled.jpg', 'Thor est le dieu du tonnerre et prince d’Asgard. Il est connu pour son marteau enchanté, Mjolnir, qui lui confère un grand pouvoir. Initialement arrogant, Thor apprend l\'humilité grâce à ses aventures sur Terre. Il devient un héros qui se bat pour protéger les Neuf Royaumes. Sa relation avec son frère adoptif, Loki, est complexe et émotive. Thor est un membre clé des Avengers, utilisant sa force divine pour combattre le mal. Après la destruction d\'Asgard, il devient le roi des survivants asgardiens. Son humour et son charisme en font un personnage attachant et populaire. Il lutte contre son propre doute après son échec face à Thanos. Finalement, il trouve un nouveau but en rejoignant les Gardiens de la Galaxie.'),
(5, 'Banner', 'Bruce', 'https://a1cf74336522e87f135f-2f21ace9a6cf0052456644b80fa06d4f.ssl.cf2.rackcdn.com/images/characters/large/800/Bruce-Banner.The-Incredible-Hulk.webp', 'Bruce Banner est un scientifique brillant spécialisé en radiations gamma. Une expérience qui tourne mal le transforme en Hulk, un monstre surpuissant. Hulk représente la rage intérieure incontrôlable de Banner. Malgré son apparence terrifiante, Hulk est un héros qui veut protéger les innocents. Bruce passe une grande partie de sa vie à chercher un remède à sa condition. Il devient un membre indispensable des Avengers grâce à sa force incroyable. Banner trouve finalement un équilibre entre son esprit et Hulk. Il crée la version \"Professor Hulk\", combinant intelligence et puissance. Sa relation avec Black Widow révèle une facette plus sensible de lui. Hulk est un personnage tragique qui incarne la dualité de la nature humaine.'),
(6, 'Parker', 'Peter', 'https://eliascosmetics.com/wp-content/uploads/2022/11/Depositphotos_606913150_L-1024x682.jpg', 'Peter Parker est un adolescent brillant mordu par une araignée radioactive. Il devient Spider-Man, un héros agile et rusé avec un grand sens de l’humour. Son mantra \'Un grand pouvoir implique de grandes responsabilités\' guide ses actions. Peter jongle entre sa vie de lycéen et son rôle de protecteur de New York. Tony Stark devient son mentor, lui offrant un costume technologique avancé. Il combat des méchants comme le Vautour, Mystério et les sbires de Thanos. Peter est un héros qui se bat pour protéger ceux qu’il aime, souvent à ses dépens. Sa relation avec MJ et sa tante May le rend profondément humain. Il fait preuve d’un immense courage dans la bataille finale contre Thanos. Spider-Man incarne l’espoir, la jeunesse et le dévouement des héros modernes.'),
(7, 'Strange', 'Stephen', 'https://www.jacketsjunction.com/wp-content/uploads/2022/03/Doctor-Strange-Dr.-Stephen-Strange-Coat.jpg', 'Stephen Strange est un neurochirurgien talentueux, mais arrogant, avec un ego démesuré.\nSa vie change radicalement après un accident de voiture qui endommage gravement ses mains.\nEn quête de guérison, il voyage jusqu’à Kamar-Taj et rencontre l’Ancien, un maître mystique.\nStephen découvre un univers de magie et de dimensions multiples, surpassant son scepticisme initial.\nIl devient le Sorcier Suprême, chargé de protéger la Terre contre les menaces mystiques.\nSon intelligence, combinée à sa maîtrise des arts mystiques, en fait un protecteur redoutable.\nDoctor Strange manipule le temps et l’espace grâce à l’Œil d’Agamotto, contenant la Pierre du Temps.\nIl joue un rôle central dans la bataille contre Thanos, en explorant les millions de possibilités de victoire.\nMalgré son sarcasme et son attitude distante, il montre un grand dévouement pour sauver l’univers.\nStrange est un héros complexe qui équilibre son passé d’homme brisé avec son rôle de gardien de la réalité.'),
(8, 'Danvers', 'Carol', 'https://i.pinimg.com/736x/82/51/c4/8251c4852251efe4df97ebbd02dccf54.jpg', 'Carol Danvers est une ancienne pilote de l’armée de l’air américaine. Elle acquiert des pouvoirs cosmiques après un accident impliquant l’énergie Tesseract. Captain Marvel est l’une des héroïnes les plus puissantes de l’univers Marvel. Elle découvre son passé après avoir été manipulée par les Kree. Carol est une guerrière déterminée qui lutte pour la liberté des peuples opprimés. Sa relation avec Nick Fury est essentielle dans la formation du SHIELD. Elle joue un rôle clé dans la défaite de Thanos en retournant sur Terre. Son énergie photonique lui permet de traverser l’espace et de détruire des vaisseaux. Elle est un modèle de force, d’indépendance et de leadership. Captain Marvel symbolise le pouvoir féminin dans un univers dominé par les hommes.'),
(9, 'Lang', 'Scott', 'https://m.media-amazon.com/images/S/amzn-author-media-prod/edhqjtpgf4gg8mhlc93c8bqu2._SY600_.jpg', 'Scott Lang est un ancien ingénieur en électronique devenu voleur pour subvenir aux besoins de sa fille, Cassie.\nAprès sa libération de prison, il tente de se racheter et de devenir un bon père.\nIl est recruté par Hank Pym, l’inventeur des particules Pym, pour devenir Ant-Man.\nGrâce à un costume spécial, Scott peut rétrécir à la taille d’un insecte ou grandir en Giant-Man.\nIl combine ses compétences d’ingénieur et son humour sarcastique pour accomplir des missions héroïques.\nMalgré son passé criminel, il prouve qu’il a un grand cœur et de nobles intentions.\nScott joue un rôle crucial dans la bataille contre Thanos grâce à son accès au Royaume Quantique.\nSa relation avec Hope van Dyne, alias Wasp, devient un pilier de son évolution personnelle.\nIl équilibre son rôle de héros avec sa vie de père, essayant de protéger Cassie à tout prix.\nScott est un héros atypique qui démontre que la rédemption est toujours possible.'),
(10, 'Potts', 'Pepper', 'https://preview.redd.it/paaxdxfdx8j11.jpg?auto=webp&s=5bd18d28f47ebcc62e24c76b25821cdb7afd68cf', 'Pepper Potts commence sa carrière comme assistante personnelle de Tony Stark chez Stark Industries.\nIntelligente, organisée et pragmatique, elle est le pilier du succès de Stark Industries.\nElle finit par devenir PDG de l’entreprise, apportant une vision et une stabilité essentielles.\nPepper partage une relation complexe mais profonde avec Tony Stark, qu’elle finit par épouser.\nElle joue un rôle clé dans le soutien émotionnel et moral de Tony, notamment dans ses moments de doute.\nLors de la bataille finale contre Thanos, elle revêt une armure conçue par Tony, devenant Rescue.\nSon courage et sa résilience la rendent indispensable, même sans super-pouvoirs.\nElle est également une mère aimante pour leur fille, Morgan, après la retraite de Tony.\nPepper symbolise la force, l’équilibre et la persévérance dans un monde rempli de chaos.\nAprès la mort de Tony, elle continue de gérer son héritage et de protéger leur famille.\n\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `email`, `password`) VALUES
(2, 'Kherbouche', 'Ilian', 'yrge!', 'ilian.kherbouche734@gmail.com', '$2y$13$CF5pg9DvDucLmDkvTn/ApOkF23o1hrfsEw872N3q8fyPjqQSPYWeK'),
(8, 'Kherbouche', 'Ilian', 'yrg', 'ilian.khrerbouche73477@gmail.com', '$2y$13$7HecymJYRXBf/DMTOsJPneJuZQLa0E4RMIvouDY88f0dDEkgAZU8K'),
(9, 'Lynda', 'oula', 'Lylou💪💪', 'lylou@gmail.com', '$2y$13$vSnArB3RYXX5ZyTbPkzJ6uQW9ximReINv2BfXmMW5DspyqAjQZ8um'),
(10, 'Lucas', 'huile', 'louiiss', 'louis@gmail.com', '$2y$13$aQDymZh2tjius7hq6Ri0KOH97FoQet7XEe/Dr8Npj4qX4wQFzVMhS'),
(11, 'Bissor', 'Melvin', 'Bisousou', 'Melvin@gmail.com', '$2y$13$q694XoIFCABZNTWlesTmc.hZgsW2b8sijRz1XK8Sc3wL3xJ46kDki'),
(12, 'florant', 'pani', 'floflo', 'florantpani@gmail.com', '$2y$13$uEuQbyUi1PjjbR2KKUoVA..vgLEIzhsOjTv.ZVdXoTazG4BqOOFJ6');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joue`
--
ALTER TABLE `joue`
  ADD PRIMARY KEY (`personnages_id`,`film_id`),
  ADD KEY `IDX_59C45C027FFDACCA` (`personnages_id`),
  ADD KEY `IDX_59C45C02567F5183` (`film_id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AC6340B3A76ED395` (`user_id`),
  ADD KEY `IDX_AC6340B3567F5183` (`film_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E986CC499D` (`pseudo`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joue`
--
ALTER TABLE `joue`
  ADD CONSTRAINT `FK_59C45C02567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_59C45C027FFDACCA` FOREIGN KEY (`personnages_id`) REFERENCES `personnages` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_AC6340B3567F5183` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `FK_AC6340B3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

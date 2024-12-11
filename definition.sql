CREATE TABLE `ad` (
    `id` {{mysql}}int(11) AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL, {{mysql}}PRIMARY KEY (`id`),{{/mysql}}
    `title` varchar(255) DEFAULT NULL,
    `description` varchar(255) DEFAULT NULL,
    `url` varchar(255) DEFAULT NULL,
    `action` varchar(50) DEFAULT NULL,
    `timeCreated` int(10) DEFAULT NULL,
    `status` int(11) DEFAULT NULL,
    `image` varchar(255) DEFAULT NULL,
    `groupKey` varchar(255) DEFAULT NULL
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `content` (
    `id` {{mysql}}int(10) AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `userId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `user_id` (`userId`),{{/mysql}}
    `title` varchar(255) DEFAULT '',
    `slug` varchar(255) DEFAULT NULL,
    `html` longtext,
    `type` varchar(50) NOT NULL DEFAULT '',
    `timePublished` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL DEFAULT '0',
    `status` int(11) DEFAULT '0'
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

-- CREATE TABLE `contentMeta`
-- CREATE TABLE `log`
-- CREATE TABLE `logAdminUnseen`
-- CREATE TABLE `mail`
-- CREATE TABLE `media`
-- CREATE TABLE `menu`

CREATE TABLE `options` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `name` varchar(255) NOT NULL DEFAULT '',
    `value` varchar(255) NOT NULL DEFAULT ''
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `tennisDivision` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `yearId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `yearId` (`yearId`),{{/mysql}}
    `name` varchar(20) DEFAULT NULL
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `tennisEncounter` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `yearId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `yearId` (`yearId`),{{/mysql}}
    `playerIdLeft` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL, {{mysql}}KEY `playerIdLeft` (`playerIdLeft`),{{/mysql}}
    `playerIdRight` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL, {{mysql}}KEY `playerIdRight` (`playerIdRight`),{{/mysql}}
    `scoreLeft` tinyint(3) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL,
    `scoreRight` tinyint(3) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL,
    `playerRankChangeLeft` tinyint(4) DEFAULT NULL,
    `playerRankChangeRight` tinyint(4) DEFAULT NULL,
    `fixtureId` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL, {{mysql}}KEY `fixtureId` (`fixtureId`),{{/mysql}}
    `status` varchar(20) DEFAULT NULL
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `tennisFixture` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `yearId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `yearId` (`yearId`),{{/mysql}}
    `teamIdLeft` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `teamIdLeft` (`teamIdLeft`),{{/mysql}}
    `teamIdRight` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `teamIdRight` (`teamIdRight`),{{/mysql}}
    `timeFulfilled` int(11) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `tennisPlayer` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `yearId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `yearId` (`yearId`),{{/mysql}}
    `teamId` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL, {{mysql}}KEY `teamId` (`teamId`),{{/mysql}}
    `nameFirst` varchar(75) DEFAULT '',
    `nameLast` varchar(75) DEFAULT '',
    `slug` varchar(255) DEFAULT NULL,
    `rank` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL,
    `phoneLandline` varchar(30) DEFAULT '',
    `phoneMobile` varchar(30) DEFAULT '',
    `ettaLicenseNumber` varchar(10) DEFAULT ''
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `tennisTeam` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `yearId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `yearId` (`yearId`),{{/mysql}}
    `secretaryId` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL, {{mysql}}KEY `secretaryId` (`secretaryId`),{{/mysql}}
    `venueId` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL, {{mysql}}KEY `venueId` (`venueId`),{{/mysql}}
    `divisionId` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL, {{mysql}}KEY `divisionId` (`divisionId`),{{/mysql}}
    `name` varchar(75) DEFAULT NULL,
    `slug` varchar(255) DEFAULT NULL,
    `homeWeekday` tinyint(1) DEFAULT NULL
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `tennisVenue` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `yearId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `yearId` (`yearId`),{{/mysql}}
    `name` varchar(75) DEFAULT NULL,
    `slug` varchar(255) DEFAULT NULL,
    `location` varchar(200) DEFAULT NULL
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `tennisYear` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `name` varchar(10) NOT NULL,
    `value` longtext NOT NULL -- can be very large as older archives are just html constructs
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `user` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `email` varchar(50) NOT NULL DEFAULT '',
    `password` varchar(255) NOT NULL DEFAULT '',
    `timeRegistered` int(10) {{mysql}}UNSIGNED{{/mysql}} DEFAULT NULL,
    `level` tinyint(1) {{mysql}}UNSIGNED{{/mysql}} NOT NULL DEFAULT '1',
    `nameFirst` varchar(75) NOT NULL DEFAULT '',
    `nameLast` varchar(75) NOT NULL DEFAULT ''
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

CREATE TABLE `userPermission` (
    `id` {{mysql}}int(10) UNSIGNED AUTO_INCREMENT{{/mysql}}{{sqllite}}INTEGER PRIMARY KEY{{/sqllite}} NOT NULL,{{mysql}} PRIMARY KEY (`id`),{{/mysql}}
    `userId` int(10) {{mysql}}UNSIGNED{{/mysql}} NOT NULL, {{mysql}}KEY `user_id` (`userId`),{{/mysql}}
    `name` varchar(50) NOT NULL,
    `ability` varchar(50) NOT NULL
){{mysql}} ENGINE=InnoDB CHARSET=utf8{{/mysql}};

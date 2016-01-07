-- database :
-- test
use privastreet;

-- User Table structure
DROP TABLE IF EXISTS t_USER;

CREATE TABLE t_USER(
	ID_USER        INT(11) NOT NULL AUTO_INCREMENT,
	FIRST_NAME     VARCHAR(50)  NOT NULL,
	LAST_NAME      VARCHAR(50)  NOT NULL,
	MAIL           VARCHAR(50)  NOT NULL,
	PSEUDO         VARCHAR(50)  NOT NULL,
	PASSWORD       VARCHAR(255) NOT NULL,
	COUNTRY        VARCHAR(50),
	IS_ADMIN       TINYINT(1),
	ACTIVE         VARCHAR(255),
	RESET_TOKEN    VARCHAR(255),
	LAST_CONNEXION DATETIME,
	LAST_ACTIVITY  DATETIME,
	IPADRESS	   VARCHAR(50),
	PRIMARY KEY (ID_USER),
	UNIQUE KEY uk_MAIL   (MAIL),
	UNIQUE KEY uk_PSEUDO (PSEUDO)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- News Table structure
-- DROP TABLE IF EXISTS t_NEWS;
-- id
-- titre
-- description
-- image
-- content
-- dateCreation
-- dateUPDATE
-- ID_AUTHOR

-- table comment
-- ID
-- ID_NEWS
-- ID_AUTHOR
-- COMMENT
-- dateCreation

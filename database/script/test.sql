-- GRANT USAGE ON *.* TO test123@localhost IDENTIFIED BY 'test123';

-- DELIMITER $$
-- BEGIN
-- 	DECLARE nbuser BIGINT DEFAULT 0 ;

-- 	SELECT COUNT(*) INTO nbuser 
-- 	FROM mysql.user
-- 	WHERE  User = 'test123' 
-- 	  AND  Host = 'localhost';
	   
-- 	IF nbuser > 0 THEN
-- 	     DROP USER 'test123'@'localhost' ;
-- 	END IF;
-- END ;$$
-- DELIMITER ;

-- GRANT USAGE ON *.* TO test123@localhost IDENTIFIED BY 'test123';


-- SELECT IF(COUNT(*) > 0, DROP USER 'test123'@'localhost', 'ok')
-- FROM mysql.user
-- WHERE  User = 'test123' 
--   AND  Host = 'localhost';

-- DROP USER 'test123'@'localhost' IF EXISTS 0;

BEGIN
DECLARE vSite VARCHAR(40);
END;
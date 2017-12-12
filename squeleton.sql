CREATE DATABASE IF NOT EXISTS `mpwar_php_exam`;

USE mpwar_php_exam;

CREATE TABLE IF NOT EXISTS `articles`

(

                `id` INT(10) PRIMARY KEY AUTO_INCREMENT,

                `title` VARCHAR(255) NOT NULL,

                `author` VARCHAR(255) NOT NULL,

                `content` TEXT NOT NULL,

                `tags` VARCHAR(255),

                `created_at` INT(10) NOT NULL

);



#Selecting all posts, orderer by date

SELECT * FROM articles ORDER BY created_at DESC



#Selecting a single post

SELECT * FROM articles WHERE id = 1



# Inserting an article

INSERT INTO articles

                ( title, author, content, tags, created_at )

VALUES

                ( 'Nice title', 'jose@armesto.net', 'Awesome content', 'sports, football, barcelona', 123456789 );



# Updating an article

UPDATE articles

SET

                title = 'Nice title',

                author = 'jose@armesto.net',

                content = 'Awesome content',

                tags = 'sports, football, barcelona',

                created_at = 123456789

WHERE

                id = 1;

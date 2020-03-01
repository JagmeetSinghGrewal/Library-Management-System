DROP DATABASE IF EXISTS books195070;
DROP DATABASE IF EXISTS books197090;
DROP DATABASE IF EXISTS books19902019;

CREATE DATABASE books195070;
CREATE DATABASE books197090;
CREATE DATABASE books19902019;

CREATE USER 'jsgrewal'@'%' IDENTIFIED BY 'Waheguru1!';

GRANT SELECT, INSERT, UPDATE ON books195070.* TO 'jsgrewal'@'%';
GRANT SELECT, INSERT, UPDATE ON books197090.* TO 'jsgrewal'@'%';
GRANT SELECT, INSERT, UPDATE ON books19902019.* TO 'jsgrewal'@'%';

USE books195070;

DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS borrow;

CREATE TABLE `books` (
  `name` text,
  `author` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `books` VALUES ('The Lion, The Witch and The Wardrobe','C.S Lewis'),
						   ('Prince Caspian, the Return to Narnia','C.S Lewis'),
						   ('The Voyage of the Dawn Treader','C.S Lewis'),
						   ('The Silver Chair','C.S Lewis'),
						   ('The Horse and His Boy','C.S Lewis'),
						   ('The Magician\'s Nurse','C.S Lewis'),
						   ('The Last Battle','C.S Lewis'),
						   ('To Kill a Mockingbird','Harper Lee'),
						   ('A Wrinkle in Time','Madeleine L\'Engle'),
						   ('Catch 22','Joseph Heller'),
						   ('Charlie and the Chocolate Factory','Roald Dahl'),
						   ('Stranger in a Strange Land','Robert Heinlein'),
						   ('James and the Giant Peach','Roald Dahl'),
						   ('Lamb to the Slaughter','Roald Dahl'),
						   ('The Godfather','Mario Puzo');
						   
CREATE TABLE `borrow` (
  `book` text,
  `availability` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `borrow` VALUES ('The Lion, The Witch and The Wardrobe',NULL),
						    ('Prince Caspian, the Return to Narnia',NULL),
							('The Voyage of the Dawn Treader',NULL),
							('The Silver Chair',NULL),
							('The Horse and His Boy',NULL),
							('The Magician\'s Nurse',NULL),
							('The Last Battle',NULL),
							('To Kill a Mockingbird',NULL),
							('A Wrinkle in Time',NULL),
							('Catch 22',NULL),
							('Charlie and the Chocolate Factory','geen@utas.edu.au'),
							('Stranger in a Strange Land',NULL),
							('James and the Giant Peach','jsgrewal@utas.edu.au'),
							('Lamb to the Slaughter','jsgrewal@utas.edu.au'),
							('The Godfather','jsgrewal@utas.edu.au');

CREATE TABLE `users` (
  `Name` text,
  `Username` text,
  `Age` int(3) DEFAULT NULL,
  `Address` text,
  `password` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES ('Kes Haywood','kesh',23,'23 Fort Court','Waheguru1!','kesh@gmail.com'),
						   ('Justin Johnson','johnson',24,'276 Liverpool Street','Waheguru1!','jjohnson@gmail.com'),
						   ('Riley Newland','rnew',35,'68 rich street','Waheguru1!','rnew@gmail.com'),
						   ('Google Will','wsutton',24,'1 The Moon','123','wsutton@gmail.com'),
						   ('Justin','justin',20,'123 that place','1234','justin@gmail.com');
						   
						   
USE books197090;

DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS borrow;

CREATE TABLE `books` (
  `name` text,
  `author` text,
  `publisher` text,
  `genre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `books` VALUES ('The Crystal Cave','Mary Stewart','Hodder & Stoughton','Fantasy'),
						   ('The Hollow Hills','Mary Stewart','Hodder & Stoughton','Fantasy'),
						   ('El Ultimo Encantamiento','Mary Stewart','Hodder & Stoughton','Fantasy'),
						   ('Bury My Heart Wounded Knee','Dee Brown','Sterling Publishing','Non-Fiction'),
						   ('The Bluest Eye','Toni Morrison','Holt McDougal','Fiction'),
						   ('In the Night Kitchen','Maurice Sendak','Harper & Row','Fantasy'),
						   ('Future Shock','Alvin Toffler','Penguin Random House','Science Fiction'),
						   ('The Bourne Identity','Robert Ludlum','Richard Marek','Thriller'),
						   ('Housekeeping','Marilynne Robinson','Straus and Giroux','Domestic Fiction'),
						   ('The Third Wave','Avlin Toffler','Bantam Books','Futurology'),
						   ('The Shadow of the Torturer','Gene Wolfe','Simon & Schuster','Science Fantasy'),
						   ('Unfinished Tales','J. R. R. Tolkien','Allen & Unwin','Fantasy Fiction'),
						   ('Looking for Rachel Wallace','Robert B. Parker','Dell Publishing','Mystery'),
						   ('The Lords of Discipline','Pat Conroy','Houghton Miffin','Literary Fiction'),
						   ('Fantastic Mr Fox','Roald Dahl','Alfre Knopf','Fiction');

CREATE TABLE `borrow` (
  `book` text,
  `availability` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `borrow` VALUES ('The Crystal Cave','jsgrewal@utas.edu.au'),
							('The Hollow Hills',NULL), 
							('El Ultimo Encantamiento',NULL),
							('Bury My Heart Wounded Knee',NULL),
							('The Bluest Eye',NULL),
							('In the Night Kitchen',NULL),
							('Future Shock',NULL),
							('The Bourne Identity',NULL),
							('Housekeeping',NULL),
							('The Third Wave',NULL),
							('The Shadow of the Torturer',NULL),
							('Unfinished Tales',NULL),
							('Looking for Rachel Wallace',NULL),
							('The Lords of Discipline',NULL),
							('Fantastic Mr Fox',NULL);
							
CREATE TABLE `users` (
  `Name` text,
  `Username` text,
  `Age` int(3) DEFAULT NULL,
  `Address` text,
  `password` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` VALUES ('Seth OBoi','sboi',12,'34 lame avenue','Waheguru1!','sboi@yahoo.com'),
						   ('Commando','commando',23,'34 commando street','Waheguru1!','commando@yahoo.com.au'),
						   ('Wil Sutton','wsutton',95,'34 shit lane','Waheguru1!','wsutton@yahoo.com.au');

						   
USE books19902019;

DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS borrow;

CREATE TABLE `books` (
  `name` text,
  `author` text,
  `publisher` text,
  `genre` text,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `books` VALUES ('A Game of Thrones','George R. R. Martin','HarperCollins','High Fantasy','https://www.goodreads.com/book/show/13496.A_Game_of_Thrones?from_search=true'),
						   ('A Clash of Kings','George R. R. Martin','HarperCollins','High Fantasy','https://www.goodreads.com/book/show/10572.A_Clash_of_Kings?from_search=true'),
						   ('A Storm Of Swords','George R. R. Martin','HarperCollins','High Fantasy','https://www.goodreads.com/book/show/62291.A_Storm_of_Swords?from_search=true'),
						   ('A Feast for Crows','George R. R. Martin','HarperCollins','High Fantasy','https://www.goodreads.com/book/show/13497.A_Feast_for_Crows?from_search=true'),
						   ('A Dance with Dragons','George R. R. Martin','HarperCollins','High Fantasy','https://www.goodreads.com/book/show/10664113-a-dance-with-dragons?from_search=true'),
						   ('Fire & Blood','George R. R. Martin','HarperCollins','High Fantasy','https://www.goodreads.com/book/show/39943621-fire-blood'),
						   ('Harry Potter and the Philosopher\'s Stone','J. K. Rowling','Bloomsbury Publishing','Fantasy Drama Adult Fiction','https://www.goodreads.com/book/show/3.Harry_Potter_and_the_Sorcerer_s_Stone'),
						   ('Harry Potter and the Chamber of Secrets','J. K. Rowling','Bloomsbury Publishing','Fantasy Drama Adult Fiction','https://www.goodreads.com/book/show/15881.Harry_Potter_and_the_Chamber_of_Secrets'),
						   ('Harry Potter and the Prisoner of Azkaban','J. K. Rowling','Bloomsbury Publishing','Fantasy Drama Adult Fiction','https://www.goodreads.com/book/show/5.Harry_Potter_and_the_Prisoner_of_Azkaban'),
						   ('Harry Potter and the Goblet of Fire','J. K. Rowling','Bloomsbury Publishing','Fantasy Drama Adult Fiction','https://www.goodreads.com/book/show/6.Harry_Potter_and_the_Goblet_of_Fire'),
						   ('Harry Potter and the Order of the Phoenix','J. K. Rowling','Bloomsbury Publishing','Fantasy Drama Adult Fiction','https://www.goodreads.com/book/show/2.Harry_Potter_and_the_Order_of_the_Phoenix'),
						   ('Harry Potter and the Half-Blood Prince','J. K. Rowling','Bloomsbury Publishing','Fantasy Drama Adult Fiction','https://www.goodreads.com/book/show/1.Harry_Potter_and_the_Half_Blood_Prince'),
						   ('Harry Potter and the Deathly Hallows','J. K. Rowling','Bloomsbury Publishing','Fantasy Drama Adult Fiction','https://www.goodreads.com/book/show/136251.Harry_Potter_and_the_Deathly_Hallows'),
						   ('Becoming','Michelle Obama','Crown Publishing Group','Biography','https://www.goodreads.com/book/show/38746485-becoming'),
						   ('Gone Girl','Gillian Flynn','Crown Publishing Group','Mystery Thriller Fiction','https://www.goodreads.com/book/show/19288043-gone-girl');

CREATE TABLE `borrow` (
  `book` text,
  `availability` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `borrow` VALUES ('A Game of Thrones',NULL),
							('A Clash of Kings',NULL),
							('A Storm Of Swords',NULL),
							('A Feast for Crows',NULL),
							('A Dance with Dragons',NULL),
							('Fire & Blood',NULL),
							('Harry Potter and the Philosopher\'s Stone',NULL),
							('Harry Potter and the Chamber of Secrets',NULL),
							('Harry Potter and the Prisoner of Azkaban',NULL),
							('Harry Potter and the Goblet of Fire',NULL),
							('Harry Potter and the Order of the Phoenix',NULL),
							('Harry Potter and the Half-Blood Prince',NULL),
							('Harry Potter and the Deathly Hallows',NULL),
							('Becoming',NULL),('Gone Girl',NULL);

CREATE TABLE `users` (
  `Name` text,
  `Username` text,
  `Age` int(3) DEFAULT NULL,
  `Address` text,
  `password` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES ('Jagmeet','jsgrewal',19,'50 Lincoln Street','Waheguru1!','jsgrewal@utas.edu.au'),
						   ('Gurleen','geen',29,'90 Lamp Court','Waheguru1!','geen@utas.edu.au'),
						   ('harkirat','hsgrewal',14,'50 lin street','Waheguru1!','hsgrewal@utas.edu.au'),
						   ('Justin Johnson','justinj0',20,'1225 Midlands Highway, Mangalore','1234','justinj0@utas.edu.au'),
						   ('Will','wsutton',69,'1 The Moon','123','wsutton@utas.edu.au');
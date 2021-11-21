CREATE TABLE `Thematics` (
  `ID` INT,
  `Label` VARCHAR(125),
  `Article_count` INT,
  `Slug` VARCHAR(255),
  `Description` TINYTEXT,
  PRIMARY KEY (`ID`)
);

CREATE TABLE `Article_Tags` (
  `ID` INT,
  `Article_Id` INT,
  `Tag_Id` INT,
  PRIMARY KEY (`ID`)
);

CREATE TABLE `Comment` (
  ` ID` INT,
  `Content` MEDIUMTEXT,
  `Approuved` BOOLEAN,
  `Created` DATETIME,
  `Modified` DATETIME,
  `Modified_Date` DATETIME,
  KEY `PFK` (` ID`)
);

CREATE TABLE `Article_Comments` (
  `Article_id` INT,
  `Comment_Id` INT,
  `ID` INT,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`Comment_Id`) REFERENCES `Comment`(` ID`)
);

CREATE TABLE `Privilèges` (
  `ID` TINYINT,
  `Action` VARCHAR(125),
  `Value` boolean,
  PRIMARY KEY (`ID`)
);

CREATE TABLE `Role_privilège` (
  `ID` INT,
  `Role_Id` INT,
  `Privileges_Id` INT,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`Privileges_Id`) REFERENCES `Privilèges`(`ID`)
);

CREATE TABLE `Login` (
  `ID` INT,
  `User_UUID` VARCHAR(36),
  `Mail` VARCHAR(125),
  `Password` VARCHAR(60),
  PRIMARY KEY (`ID`)
);

CREATE TABLE `User_Comments` (
  `ID` INT,
  `User_UUID` VARCHAR(36),
  `Comment_Id` INT,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`Comment_Id`) REFERENCES `Comment`(` ID`)
);

CREATE TABLE `User` (
  ` ID` INT,
  `UUID` VARCHAR(36),
  `Name` VARCHAR(125),
  `ForName` VARCHAR(125),
  `Birthday` DATETIME,
  `LastLogin` DATETIME,
  `Avatar` VARCHAR(255),
  `Role` TINYINT,
  `DisplayName` VARCHAR(125),
  `Last_activity` DATETIME,
  `Login_Satuts` VARCHAR(50),
  `Created` DATETIME,
  `Modified` DATETIME,
  PRIMARY KEY (` ID`, `UUID`),
  FOREIGN KEY (`UUID`) REFERENCES `User_Comments`(`User_UUID`)
);

CREATE TABLE `Tag` (
  `ID` INT,
  `Label` VARCHAR(125),
  `Article_count` INT,
  `Slug` VARCHAR(255),
  PRIMARY KEY (`ID`)
);

CREATE TABLE `Role` (
  `ID` TINYINT,
  `Label` VARCHAR(125),
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`ID`) REFERENCES `User`(`Role`),
  FOREIGN KEY (`ID`) REFERENCES `Role_privilège`(`ID`)
);

CREATE TABLE `Author` (
  `Article_Id` INT,
  `User_UUID` VARCHAR(36),
  `ID` INT,
  PRIMARY KEY (`ID`)
);

CREATE TABLE `Article` (
  ` ID` INT,
  `Title` TINYTEXT,
  `Exercpt` TINYTEXT,
  `Content` LONGTEXT,
  `Featured_image` VARCHAR(255),
  `Reading_Time` TINYINT,
  `Slug` VARCHAR(255),
  `Status` INT,
  `Comment_count` INT,
  `View_count` INT,
  `Created` DATETIME,
  `Modified` DATETIME,
  `Thematics_id` INT,
  PRIMARY KEY (` ID`),
  FOREIGN KEY (` ID`) REFERENCES `Article_Comments`(`Article_id`),
  FOREIGN KEY (`Thematics_id`) REFERENCES `Thematics`(`ID`)
);

CREATE TABLE `Status` (
  `ID` INT,
  `Label` VARCHAR(125),
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`ID`) REFERENCES `Article`(`Status`)
);

CREATE TABLE `Session` (
  `ID` INT,
  `Token` VARCHAR(255),
  `User_UUID` VARCHAR(36),
  PRIMARY KEY (`ID`)
);


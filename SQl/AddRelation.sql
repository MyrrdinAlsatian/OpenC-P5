ALTER TABLE `user_comments` ADD CONSTRAINT `User_UUID_Comment_fk` FOREIGN KEY (`User_UUID`) REFERENCES `user`(`UUID`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `user_comments` ADD CONSTRAINT `Comment_id_Comment_fk` FOREIGN KEY (`Comment_Id`) REFERENCES `comment`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `login` ADD CONSTRAINT `Login_User_fk` FOREIGN KEY (`User_UUID`) REFERENCES `user`(`UUID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `role_privilège` ADD CONSTRAINT `Role_Privi_Role_fk` FOREIGN KEY (`Role_Id`) REFERENCES `role`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `role_privilège` ADD CONSTRAINT `Role_Privi_Privi_fk` FOREIGN KEY (`Privileges_Id`) REFERENCES `privilèges`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `user` ADD CONSTRAINT `User_Role_fk` FOREIGN KEY (`Role`) REFERENCES `role`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `user_comments` ADD CONSTRAINT `User_UUID_User_Comment_fk` FOREIGN KEY (`User_UUID`) REFERENCES `User`(`UUID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `user_comments` ADD CONSTRAINT `Comment_id_User_Comment_fk` FOREIGN KEY (`Comment_Id`) REFERENCES `comment`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `author` ADD CONSTRAINT `Article_Id_Author_fk` FOREIGN KEY (`Article_Id`) REFERENCES `Article`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `author` ADD CONSTRAINT `User_UUID_Author_fk` FOREIGN KEY (`User_UUID`) REFERENCES `user`(`UUID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `article_tags` ADD CONSTRAINT `Article_id_Article_Tags_fk` FOREIGN KEY (`Article_Id`) REFERENCES `Article`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `article_tags` ADD CONSTRAINT `Tag_Article_Tags_fk` FOREIGN KEY (`Tag_Id`) REFERENCES `Tag`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `article` ADD CONSTRAINT `Status_article_fk` FOREIGN KEY (`Status`) REFERENCES `Status`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `article` ADD CONSTRAINT `Thematic_Article_fk` FOREIGN KEY (`Thematics_id`) REFERENCES `Thematics`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `article_comments` ADD CONSTRAINT `Article_Id_Article_comment_fk` FOREIGN KEY (`Article_id`) REFERENCES `Article`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `article_comments` ADD CONSTRAINT `Commennt_id_Article_comment_fk` FOREIGN KEY (`Comment_Id`) REFERENCES `Comment`(`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
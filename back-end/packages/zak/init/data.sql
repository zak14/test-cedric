INSERT IGNORE INTO `zak_group` (`id`,`state` , `name`) VALUES (1,'instance' , 'coding2');
INSERT IGNORE INTO `zak_group` (`id`,`state` , `name`) VALUES (2,'instance' , 'coding9');
INSERT IGNORE INTO `zak_group` (`id`,`state` , `name`) VALUES (3, 'instance' , 'coding11');

INSERT IGNORE INTO `zak_user` (`id`, `state` , `name`, `age`, `role` , `name_group`) VALUES (1, 'instance' , 'zak', 29 , 'dev' , "coding2");
INSERT IGNORE INTO `zak_user` (`id`, `state` , `name`, `age`, `role` , `name_group`) VALUES (2, 'instance' , 'sami', 28 , "admin" , "coding2");
INSERT IGNORE INTO `zak_user` (`id`, `state` , `name`, `age`, `role` , `name_group`) VALUES (3, 'instance' , 'albi', 23 , "coach" , "coding9");
INSERT IGNORE INTO `zak_user` (`id`, `state` , `name`, `age`, `role` , `name_group`) VALUES (4, 'instance' , 'amelia', 29 , "designer" , "coding11");
INSERT IGNORE INTO `zak_user` (`id`, `state` , `name`, `age`, `role` , `name_group`) VALUES (5, 'instance' , 'dalanda', 25 , "marketing" , "coding11");



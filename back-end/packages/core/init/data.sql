INSERT IGNORE INTO `core_user` (`id`, `created`, `modified`, `creator`, `modifier`, `state`, `deleted`, `login`, `password`, `firstname`, `lastname`, `language`, `validated`) VALUES (1, '2012-08-18 15:06:43', '2012-08-18 15:06:43', 1, 1, 'instance', 0, 'admin', '$2y$10$Qv76QHk7/2eA7GWYGC7hdOAw0nZwI/p52qDovs.UgmftkOhHGY/jS', 'root', '@system', 'en', 1);
INSERT IGNORE INTO `core_user` (`id`, `created`, `modified`, `creator`, `modifier`, `state`, `deleted`, `login`, `password`, `firstname`, `lastname`, `language`, `validated`) VALUES (2, '2012-08-18 15:06:43', '2014-09-04 12:21:34', 1, 1, 'instance', 0, 'cedric@equal.run', '$2y$10$Qv76QHk7/2eA7GWYGC7hdOAw0nZwI/p52qDovs.UgmftkOhHGY/jS', 'Cédric', 'FRANÇOYS', 'fr', 1);
INSERT IGNORE INTO `core_group` (`id`, `created`, `modified`, `creator`, `modifier`, `state`, `deleted`, `name`) VALUES (1, '2012-05-30 20:45:20', '2012-05-30 20:45:20', 2, 2, '', 0, 'root');
INSERT IGNORE INTO `core_group` (`id`, `created`, `modified`, `creator`, `modifier`, `state`, `deleted`, `name`) VALUES (2, '2012-05-30 20:45:20', '2012-05-30 20:45:20', 2, 2, '', 0, 'default');
INSERT IGNORE INTO `core_rel_group_user` (`group_id`, `user_id`) VALUES (1, 1);
INSERT IGNORE INTO `core_rel_group_user` (`group_id`, `user_id`) VALUES (2, 1);
INSERT IGNORE INTO `core_rel_group_user` (`group_id`, `user_id`) VALUES (2, 2);

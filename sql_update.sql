-- 删除用户配对表的用户1,2,红娘的姓名,只保留ID就好了
ALTER TABLE pahl_userpd DROP COLUMN user1name;
ALTER TABLE pahl_userpd DROP COLUMN user2name;

DROP TABLE IF EXISTS pahl_admininfo;

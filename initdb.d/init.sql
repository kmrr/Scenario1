DROP DATABASE IF EXISTS TEST;
CREATE DATABASE TEST;
USE TEST;
DROP TABLE IF EXISTS store_info;
create table IF NOT EXISTS store_info(id int, name varchar(20), store_count int, PRIMARY KEY (id));
insert into store_info(id, name, store_count) values(1, 'Hokkaido', 4);
insert into store_info(id, name, store_count) values(2, 'Aomori', 12);
insert into store_info(id, name, store_count) values(3, 'Iwate', 5);
insert into store_info(id, name, store_count) values(4, 'Yamagata', 21);
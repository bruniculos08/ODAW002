create database petshop;
use petshop;
create table dogs (id INT PRIMARY KEY, name VARCHAR(100));
insert into dogs (id, name) values (1, 'Snoop');
alter table dogs add breeds varchar(100);
insert into dogs (id, name, breeds) values (2, 'Scooby-Doo', 'Great Dane');
update dogs set breeds = 'Spotted White Beagle' where name = 'Snoop';
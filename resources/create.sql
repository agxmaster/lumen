create table items (
id int not null primary key auto_increment,
pname varchar(255) not null default '' comment 'Ж·По',
deleted int not null default 0 
);

create table store(
id int not null primary key auto_increment,
itemsid int not null default 0,
type int not null default 0,
num int not null default 0,
company varchar(255) not null default '',
reason varchar(255) not null default '',
note varchar(255) not null default '',
ddate datetime not null default '0000-00-00 00:00:00'
);
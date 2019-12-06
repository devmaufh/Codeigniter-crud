create database info;

create table companies(id integer auto_increment primary key, name varchar(60), address varchar(80), phone char(10), description varchar(150), visits integer not null);

create table users(user_id integer auto_increment primary key, username varchar(15), name varchar(40), password varchar(200));

/*INSERT user
username = admin
password = admin
 */
insert into users(username, password) values('admin','21232f297a57a5a743894a0e4a801fc3');
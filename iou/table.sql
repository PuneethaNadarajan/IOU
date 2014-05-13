
use software;
create table participant(group_code varchar(13),name varchar(30),email varchar(30),dob date,sex char(7));
create table group_info (group_code varchar(13),purpose text,password varchar(15));
create table expense(group_code varchar(13),purpose text,amount int,name varchar(30),email varchar(30));
create table balance(group_code varchar(13),name varchar(30),email varchar(30),amount int);
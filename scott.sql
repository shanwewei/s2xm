drop database if exists itany;
create database itany default character set utf8;
use itany;
create table t_user(
	id int primary key auto_increment,
	uname varchar(20) not null,
	upassword int(20) not null,
	ugender varchar(1) not null,
	uphone varchar(11) not null
);
create table t_sell(
	sid int primary key auto_increment,
	title varchar(40) not null,
	subtitle varchar(40) not null,
	cond varchar(10)  not null,
	curr varchar(6),
	price float  not null,
	payment varchar(50),
	s_des text,
	pub_date datetime,
	uid int ,
	constraint s_uid foreign key(uid) references t_user(id)
);
create table t_image(
	imgid int primary key auto_increment,
	imgtype varchar(10),
	imgcontent mediumblob,
	s_img_id int,
	water int,
	constraint sell_img foreign key(s_img_id) references t_sell(sid)
);

create table t_watch(
	wid int primary key auto_increment,
	w_user_id int not null,
	w_sell_id int not null,
 	constraint w_uid foreign key(w_user_id) references t_user(id),
  	constraint w_sid foreign key(w_sell_id) references t_sell(sid)
)

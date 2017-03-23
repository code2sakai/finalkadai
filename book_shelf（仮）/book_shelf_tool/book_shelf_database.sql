CREATE TABLE book_shelf_master (
  book_id int(11) NOT NULL AUTO_INCREMENT,
  book_title varchar(100) NOT NULL,
  book_author varchar(100) NOT NULL,
  book_price int(11) NOT NULL,
  img varchar(100) NOT NULL,
  status int(2) NOT NULL,
  create_datetime datetime not null default current_timestamp,
  update_datetime datetime not null default current_timestamp on update current_timestamp,
  primary key(book_id)
);
CREATE TABLE book_shelf_stock (
  book_id int(11) NOT NULL,
  book_stock int(11) NOT NULL,
  create_datetime datetime not null default current_timestamp,
  update_datetime datetime not null default current_timestamp on update current_timestamp,
  primary key(book_id)
);

CREATE TABLE users (
   user_id int(11) NOT NULL AUTO_INCREMENT,
   name varchar(20) NOT NULL,
   email varchar(30) NOT NULL,
   password varchar(20) NOT NULL
);

CREATE TABLE `admin` (
   id  int(11) NOT NULL AUTO_INCREMENT,
   Name varchar(20) NOT NULL,
   Email varchar(30) NOT NULL,
   Password varchar(20) NOT NULL
);


CREATE TABLE foods(
    id INT(10) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    location VARCHAR(255),
    price int(20),
    PRIMARY KEY(id)
);

CREATE TABLE orders(
    order_id INT(10) NOT NULL AUTO_INCREMENT,
    orderDate timestamp NOT NULL DEFAULT current_timestamp(),
    food_id INT(10),
    quantity INT(10) NOT NULL,
    client_id INT(10) NOT NULL,
    PRIMARY KEY(order_id),
    FOREIGN KEY(food_id) REFERENCES foods(id),
    FOREIGN KEY(client_id) REFERENCES users(user_id)
);


SELECT orders.orderDate, foods.name, foods.price*orders.quantity AS bill, 
users.username FROM orders 
INNER JOIN users ON orders.client_id = users.user_id 
INNER JOIN foods ON orders.food_id = foods.id


select orders.orderDate, foods.name, orders.quantity, foods.price*orders.quantity AS bill
 from orders
 INNER JOIN foods ON orders.food_id = foods.id
 WHERE orders.client_id ='.'"'.$userId.'";
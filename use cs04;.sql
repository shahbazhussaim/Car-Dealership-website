use cs04;
create table customers(
    name varchar(50),
    id int not null primary KEY
    );
CREATE TABLE empl(
    empl_id int,
    e_name varchar(50),
    FOREIGN KEY (empl_id) REFERENCES customers(id)
    );
CREATE TABLE products(
    p_id int ,
    p_name varchar(50),
    FOREIGN KEY (p_id) REFERENCES customers(id)
    );
    
    insert into customers
    VALUES("ali",1),("wahab",2),("moiz",3),("maha",4),("shahbaz",5);
    insert into empl
    VALUES(1,"basit"),(2,"laiba"),(3,"aisha"),(4,"tooba"),(5,"alina");
    insert INTO products
    values(1,"glass"),(2.,"vape"),(3,"usb"),(4,"cards"),(5,"mob");



    use cs04;
SELECT *from empl;
select customers .id,customers.name,products.p_id,products.p_name FROM customers
LEFT JOIN products
ON customers.id= products.p_id;



SELECT * FROM customers where (customers.name IN("wahab","maha"))
and (customers.name  like "%a%");




select * from empl WHERE empl_id between 2 and 5;




select * from empl
UNION
SELECT * FROM products;



CREATE VIEW mor AS
SELECT customers.name,customers.id
FROM customers
WHERE customers.id between 1 and 3;


SELECT products.p_id, products.p_name
FROM products
INNER JOIN empl ON products.p_id=empl.empl_id;



SELECT*from customers
where id IN(  select p_id from products);
/*The web system allows customers to place orders for products. 
The orders are stored in a database table called "orders." 
Each order has a unique identifier (ID), a customer ID, a product ID, a quantity, a price.  

Solution using Display:*/
SELECT *
FROM orders
WHERE customer_id = <customer_id>


/*The System allows customers to place orders for products. The orders are stored in a database table called "orders." 
Each order has a unique identifier (ID), a customer ID, a product ID, a quantity, a price, and a status. 
A new product is added to the system, and a customer wants to place an order for that product. 
However, the product ID is not yet listed in the system's database, and the customer cannot place the order.

Solution using Insert:*/
INSERT INTO orders (customer_id, product_id, quantity, price, status)
VALUES (<customer_id>, <product_id>, <quantity>, <price>)

/*The web system allows customers to place orders for products. 
The orders are stored in a database table called "orders." Each order has a unique identifier (ID), a customer ID, a product ID, a quantity,
 a price, and a status. Customer realizes that they made a mistake in the quantity of a product they ordered and wants to correct it. 

Solution using Update:*/
UPDATE orders
SET quantity = <new_quantity>,
    price = (<new_quantity> * price / quantity)
WHERE id = <order_id>


/*Suppose our web system allows users to create and save notes. 
The notes are stored in a database table called "notes." Each note has a unique identifier (ID), a title, and a content. 
Then a user wants to delete a note, but user don't know how to do it. 

Solution using Delete:*/
DELETE FROM notes
WHERE id = <note_id>




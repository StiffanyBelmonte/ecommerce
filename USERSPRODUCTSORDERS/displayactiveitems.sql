/* Display active items ordered by all active users and has been ordered for the year 2023 or after Dec. 31, 2022 and stilll pending*/

SELECT p.item_id, p.item_name, p.item_price, o.item_qty, o.date_ordered, o.order_status 
FROM orders o
JOIN users u
ON o.user_id = u.user_id
JOIN products p
ON o.item_id = p.item_id
WHERE p.item_status ='A'
AND user_status = 'A'
AND o.date_ordered >= '2023/01/01'
AND o.order_status = 'P'
GROUP BY u.username;
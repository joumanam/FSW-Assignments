SELECT CONCAT(customer.first_name, " ", customer.last_name) as "CUSTOMER NAME", CONCAT(actor.first_name, " ", actor.last_name) AS "ACTOR NAME"
FROM customer, actor
WHERE customer.first_name = (SELECT first_name FROM actor WHERE actor_id = 8) AND actor.first_name = (SELECT actor.first_name FROM actor WHERE actor_id = 8) AND actor_id != 8
GROUP BY customer.last_name, actor.last_name;

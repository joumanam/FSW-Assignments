SELECT SUM(payment.amount) AS TOTAL, AVG(SUM(payment.amount)) AS AVERAGE, EXTRACT(MONTH FROM rental.rental_date) as MONTH, EXTRACT(YEAR FROM rental.rental_date) AS YEAR, customer.store_id AS STORE
FROM rental, payment, customer
WHERE payment.rental_id = rental.rental_id AND payment.customer_id = customer.customer_id 
GROUP BY MONTH, YEAR, STORE
HAVING payment.customer_id = rental.customer_id = customer.customer_id

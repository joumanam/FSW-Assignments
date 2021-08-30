SELECT customer.first_name, customer.last_name, COUNT(rental.customer_id)
FROM customer, rental
WHERE customer.customer_id = rental.customer_id AND YEAR(rental.rental_date) = "2005"
GROUP BY rental.customer_id
ORDER BY COUNT(rental.customer_id) DESC
LIMIT 3
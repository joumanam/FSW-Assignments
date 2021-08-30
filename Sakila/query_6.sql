SELECT category.name, COUNT(film_category.category_id)
FROM category, film_category
WHERE film_category.category_id = category.category_id 
GROUP BY film_category.category_id
HAVING COUNT(film_category.film_id) < 65 AND COUNT(film_category.film_id) > 55
ORDER BY COUNT(film_category.category_id) DESC;
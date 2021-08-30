SELECT actor.first_name, actor.last_name, film.title, film.release_year
FROM actor, film, film_actor
WHERE film.description LIKE '%CROCODILE%' AND film.description LIKE '%SHARK%' AND film_actor.actor_id = actor.actor_id AND film_actor.film_id = film.film_id
ORDER BY actor.last_name;
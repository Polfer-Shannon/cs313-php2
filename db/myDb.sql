CREATE TABLE users (
id SERIAL PRIMARY KEY,
username VARCHAR(100) NOT NULL UNIQUE,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
password VARCHAR(15) NOT NULL
);

CREATE TABLE recipes (
id SERIAL PRIMARY KEY,
name VARCHAR(20) NOT NULL,
rank SMALLINT NOT NULL,
date DATE NOT NULL,
user_id INT NOT NULL REFERENCES users(id),
directions TEXT NOT NULL
);

CREATE TABLE ingredients (
id SERIAL PRIMARY KEY,
food VARCHAR(50) NOT NULL,
category VARCHAR(7) NOT NULL,
on_hand BOOLEAN NOT NULL,
recipe_id INT NOT NULL REFERENCES recipes(id)
);

INSERT INTO users (username, first_name, last_name, password)
VALUES ('morgock', 'Morgan', 'Polfer', 'littleFace');

INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('White Bean Chili', 2, '2019-04-28', 1, 'Cook the chicken...');

INSERT INTO ingredients (food, category, on_hand, recipe_id)
VALUES ('Chicken', 'Meat', TRUE, 1),
('White Beans', 'Canned', FALSE, 1);

SELECT ingredients.food, recipes.name, users.first_name, users.last_name, recipes.rank 
FROM ingredients
LEFT JOIN recipes ON ingredients.recipe_id = recipes.id
LEFT JOIN users ON recipes.user_id = users.id
WHERE ingredients.on_hand = FALSE;

SELECT ingredients.food, ingredients.on_hand, recipes.name, users.first_name, users.last_name, recipes.rank, recipes.date
FROM ingredients
LEFT JOIN recipes ON ingredients.recipe_id = recipes.id
LEFT JOIN users ON recipes.user_id = users.id;

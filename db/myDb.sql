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

CREATE TYPE f_cat AS ENUM ('canned', 'dairy', 'dry', 'meat', 'produce', 'spices');

CREATE TABLE ingredients (
id SERIAL PRIMARY KEY,
food VARCHAR(50) NOT NULL,
category f_cat NOT NULL,
on_hand BOOLEAN NOT NULL,
recipe_id INT NOT NULL REFERENCES recipes(id)
);

INSERT INTO users (username, first_name, last_name, password)
VALUES ('morgock', 'Morgan', 'Polfer', 'littleFace');

INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('White Bean Chili', 2, '2019-04-28', 1, 'Cook the chicken...');

INSERT INTO ingredients (food, category, on_hand, recipe_id)
VALUES ('Chicken', 'meat', TRUE, 2),
('White Beans', 'canned', FALSE, 2),
('Heavy Whipping Cream', 'dairy', FALSE, 2);

SELECT ingredients.food, recipes.name, users.first_name, users.last_name, recipes.rank 
FROM ingredients
LEFT JOIN recipes ON ingredients.recipe_id = recipes.id
LEFT JOIN users ON recipes.user_id = users.id
WHERE ingredients.on_hand = FALSE;

SELECT ingredients.food, ingredients.on_hand, recipes.name, users.first_name, users.last_name, recipes.rank, recipes.date
FROM ingredients
LEFT JOIN recipes ON ingredients.recipe_id = recipes.id
LEFT JOIN users ON recipes.user_id = users.id;

SELECT recipes.directions FROM recipes
LEFT JOIN ingredients ON ingredients.on_hand = TRUE;

UPDATE recipes
SET directions = 'Saute onions and garlic in olive oil. Place all ingredients in pot.'
Where recipes.name = 'White Bean Chili';

CREATE TABLE recipes (
id SERIAL PRIMARY KEY,
name VARCHAR(20) NOT NULL,
rank SMALLINT CHECK (rank > 0 AND rank < 6) NOT NULL,
date DATE NOT NULL,
user_id INT NOT NULL REFERENCES users(id),
directions TEXT NOT NULL
);

DELETE FROM ingredients
WHERE id = 1;

CREATE VIEW myview AS
    SELECT name, on_hand
        FROM recipes, ingredients
        WHERE on_hand = FALSE;

SELECT * FROM myview;

SELECT food AS Grocery_list
FROM ingredients
WHERE on_hand = FALSE;
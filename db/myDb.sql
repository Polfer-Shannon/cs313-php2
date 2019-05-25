CREATE TABLE users (
id SERIAL PRIMARY KEY,
username VARCHAR(100) NOT NULL UNIQUE,
first_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
password VARCHAR(15) NOT NULL
);

CREATE TABLE recipes (
id SERIAL PRIMARY KEY,
name VARCHAR(50) NOT NULL,
rank SMALLINT CHECK (rank > 0 AND rank < 6) NOT NULL,
date DATE NOT NULL,
user_id INT NOT NULL REFERENCES users(id),
directions TEXT NOT NULL
);

CREATE TYPE f_cat AS ENUM ('canned', 'dairy', 'dry', 'meat', 'produce', 'spices');

CREATE TABLE ingredients (
id SERIAL PRIMARY KEY,
food VARCHAR(50) NOT NULL,
category f_cat NOT NULL,
on_hand BOOLEAN NOT NULL
);

CREATE TABLE menu (
id SERIAL PRIMARY KEY,
ingredients_id INT NOT NULL REFERENCES ingredients(id),
recipes_id INT NOT NULL REFERENCES recipes(id)
);

INSERT INTO users (username, first_name, last_name, password)
VALUES ('morgock', 'Morgan', 'Polfer', 'littleFace'),
('stevinie', 'Stevie', 'Neff', 'pooBear'),
('billiam', 'Bill', 'Polfer', 'Billfallo');

INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('White Bean Chili', 2, '2019-04-28', 1, 'Saute onions and garlic in olive oil. Place all ingredients in pot.');

INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('Dijon Salmon', 1, '2019-03-27', 1, 'Defrost salmon filets...'),
('Chicken Enchiladas', 5, '2019-02-07', 2, 'Boil chicken in boulion...'),
('Steak Diane', 2, '2019-05-15', 3, 'Cook onions in butter...'),
('Chicken Salad', 4, '2019-05-20', 1, 'Dice cooked chicken...');

INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('Spaghetti', 3, '2018-03-27', 2, 'Brown the hamburger meat...'),
('Chicken Pot Pie', 1, '2018-06-07', 3, 'Boil chicken in boulion...'),
('Biscuits and Gravy', 2, '2019-04-20', 3, 'Brown the ground sausage...'),
('ACA Salad', 4, '2018-12-20', 2, 'Dice cooked chicken...');

INSERT INTO ingredients (food, category, on_hand)
VALUES ('Chicken', 'meat', TRUE),
('White Beans', 'canned', FALSE),
('Heavy Whipping Cream', 'dairy', FALSE);

INSERT INTO ingredients (food, category, on_hand)
VALUES ('Ground Beef', 'meat', FALSE),
('Chilis', 'canned', TRUE),
('White Onion', 'produce', FALSE),
('Cream Cheese', 'dairy', TRUE),
('Chili Powder', 'spices', TRUE);

INSERT INTO ingredients (food, category, on_hand)
VALUES ('Cream Cheese', 'dairy', TRUE),
('Noodles', 'dry', TRUE),
('Tomato Sauce', 'canned', TRUE),
('Milk', 'dairy', TRUE);

INSERT INTO menu (ingredients_id, recipes_id)
VALUES (1, 1),
(2, 1),
(3, 1),
(4, 6),
(5, 1),
(6, 1),
(6, 6),
(1, 3),
(7, 1),
(10, 6),
(11, 6),
(12, 8);

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

-- Selects all ingredients and all recipes
SELECT ingredients.food AS ingredients, recipes.name AS recipes
FROM ingredients, recipes, menu
WHERE ingredients.id = menu.ingredients_id
AND recipes.id = menu.recipes_id;


--These are two different ways of selecting the ingredient list from one recipe
SELECT ingredients.food, recipes.name
FROM ingredients, recipes, menu
WHERE ingredients.id = menu.ingredients_id
AND recipes.id = menu.recipes_id
AND recipes.id = 6;

SELECT ingredients.food
FROM ingredients
INNER JOIN (recipes INNER JOIN menu ON recipes.id = menu.recipes_id)
ON ingredients.id = menu.ingredients_id
WHERE recipes.id = 1;


SELECT recipes.id, recipes.name 
FROM recipes, users
WHERE recipes.user_id = users.id
AND users.username = 'morgock';

SELECT recipes.id, recipes.name 
FROM recipes, users 
WHERE recipes.user_id = users.id 
AND users.username=:user

SELECT ingredients.food
FROM ingredients
JOIN (recipes JOIN menu ON recipes.id = menu.recipes_id)
ON ingredients.id = menu.ingredients_id
WHERE recipes.id = 1;

SELECT ingredients.food
FROM ingredients
JOIN (recipes JOIN menu ON recipes.id = menu.recipes_id)
ON ingredients.id = menu.ingredients_id
WHERE ingredients.food =:id;
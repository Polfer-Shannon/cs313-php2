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
rank SMALLINT CHECK (rank > 0 AND rank < 6),
date DATE,
user_id INT NOT NULL REFERENCES users(id),
directions TEXT NOT NULL
);

CREATE TYPE f_cat AS ENUM ('canned', 'dairy', 'dry', 'meat', 'produce', 'spices');

CREATE TABLE ingredients (
id SERIAL PRIMARY KEY,
food VARCHAR(50) NOT NULL,
category f_cat,
on_hand BOOLEAN
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
VALUES ('Dijon Salmon', 1, '2019-03-27', 1, 'Defrost salmon filets...'),
('Chicken Enchiladas', 5, '2019-02-07', 2, 'Boil chicken in boulion...'),
('Steak Diane', 2, '2019-05-15', 3, 'Cook onions in butter...'),
('Chicken Salad', 4, '2019-05-20', 1, 'Dice cooked chicken...');

INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('Spaghetti', 3, '2018-03-27', 2, 'Brown the hamburger meat...'),
('Chicken Pot Pie', 1, '2018-06-07', 3, 'Boil chicken in boulion...'),
('Biscuits and Gravy', 2, '2019-04-20', 3, 'Brown the ground sausage...'),
('ACA Salad', 4, '2018-12-20', 2, 'Dice cooked chicken...');

INSERT INTO recipes(name, rank, date, user_id, directions)
VALUES ('White Bean Chili', 1, '2019-05-30', 1, 'Boil the chicken tenders');

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
VALUES (1,16),
(1,18),
(1,20),
(1,22),
(2,23),
(3,23),
(4,19),
(5,16),
(5,23),
(6,23),
(6,20),
(6,16),
(7,23),
(8,23),
(10,19),
(11,19),
(12,21);

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
 
SELECT * FROM users LEFT JOIN recipes ON users.id = recipes.user_id WHERE username = 'morgock'; 

SELECT id FROM users WHERE username = 'morgock';


SELECT ingredients.food
FROM ingredients
INNER JOIN (recipes INNER JOIN menu ON recipes.id = menu.recipes_id)
ON ingredients.id = menu.ingredients_id
WHERE recipes.user_id = 1;

SELECT ingredients.food FROM ingredients LEFT JOIN menu ON menu.ingredients_id = ingredients.id WHERE menu.recipes_id =:recipes_id ORDER BY ingredients.food

SELECT ingredients.food
FROM ingredients
INNER JOIN (recipes INNER JOIN menu ON recipes.id = menu.recipes_id)
ON ingredients.id = menu.ingredients_id
WHERE recipes.user_id = :user_id ORDER BY ingredients.food


UPDATE song SET orig_artist=:orig_artist, release_date=:release_date WHERE id=:id

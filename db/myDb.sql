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


INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('Dijon Salmon', 1, '2019-03-27', 1, 'Defrost salmon filets...'),
('Chicken Enchiladas', 5, '2019-02-07', 1, 'Boil chicken in boulion...'),
('Steak Diane', 2, '2019-05-15', 1, 'Cook onions in butter...'),
('Chicken Salad', 4, '2019-05-20', 1, 'Dice cooked chicken...');

INSERT INTO recipes (name, rank, date, user_id, directions)
VALUES ('Speghetti', 3, '2018-03-27', 1, 'Brown the hamburger meat...'),
('Chicken Pot Pie', 1, '2018-06-07', 1, 'Boil chicken in boulion...'),
('Biscuits and Gravy', 2, '2019-04-20', 1, 'Brown the ground sausage...'),
('ACA Salad', 4, '2018-12-20', 1, 'Dice cooked chicken...');

INSERT INTO ingredients (food, category, on_hand, recipe_id)
VALUES ('Ground Beef', 'meat', FALSE, 7),
('Chilis', 'canned', TRUE, 2),
('White Onion', 'produce', FALSE, 2)
('Cream Cheese', 'dairy', TRUE, 2),
('Chili Powder', 'spices', TRUE, 2);

INSERT INTO ingredients (food, category, on_hand, recipe_id)
VALUES ('Cream Cheese', 'dairy', TRUE, 2),
('Chili Powder', 'spices', TRUE, 2);
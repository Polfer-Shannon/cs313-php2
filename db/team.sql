CREATE TABLE speaker (
id SERIAL PRIMARY KEY,
name VARCHAR(30)
);

CREATE TABLE conference (
id SERIAL PRIMARY KEY,
month VARCHAR(7) NOT NULL,
year INT NOT NULL,
session VARCHAR(20)
);

CREATE TABLE username (
id SERIAL PRIMARY KEY,
name VARCHAR(50) NOT NULL
);

CREATE TABLE talk (
id SERIAL PRIMARY KEY,
talk VARCHAR(50) NOT NULL,
speaker_id INT NOT NULL REFERENCES speaker(id),
conference_id INT NOT NULL REFERENCES conference(id)
);

CREATE TABLE note (
id SERIAL PRIMARY KEY,
content TEXT NOT NULL,
username_id INT NOT NULL REFERENCES username(id),
talk_id INT NOT NULL REFERENCES talk(id)
);

INSERT INTO speaker (name)
VALUES ('Ballard'),
('Uchtdorf'),
('Bingham');

INSERT INTO conference (month, year, session)
VALUES ('April', 2019, 'Sunday Morning'),
('April', 2018, 'Sunday Afternoon'),
('April', 2018, 'Sunday Afternoon');

INSERT INTO username (name)
VALUES ('Bill'),
('Morgan'),
('Stevie');

INSERT INTO talk (talk, speaker_id, conference_id)
VALUES ('Behold the Lamb of God', 1,1),
('Believe, love do', 2,2),
('Ministering as the Savior Does', 3,3);

INSERT INTO note (content, username_id, talk_id)
Values ('I loved this talk!', 1,1),
('He is awesome!', 2,2),
('This helped me!', 3,3);

INSERT INTO note (content, username_id, talk_id)
Values ('Really great advise!', 1,1),
('Keeping nots!', 2,1),
('This helped me!', 3,1);

SELECT note.content, talk.talk, speaker.name, username.name 
FROM note 
LEFT JOIN talk ON note.talk_id = talk.id
LEFT JOIN speaker ON talk.speaker_id = speaker.id
LEFT JOIN username ON note.username_id = username.id
WHERE talk.id = 1;







INSERT INTO users(id, first_name, last_name) 
VALUES (100, 'Shannon', 'Polfer');

INSERT INTO users(first_name, last_name) 
VALUES ('Wendi', 'Van Sickle');

INSERT INTO conference(id, month, year) 
VALUES (200, 'April', 2019);

INSERT INTO speaker(name, talk, conference_id) 
VALUES ('Jeffery R Holland', 'Behold the Lamb of God', 200);

INSERT INTO note(users_id, content, speaker_id) 
VALUES (1, 'This is a great talk.', 1);

SELECT n.content FROM note n 
JOIN speaker s ON n.speaker_id = s.id
WHERE n.users_id = 1;

DELETE FROM note WHERE users_id = 100;

DELETE FROM users WHERE id = 100;

CREATE TABLE scriptures (
id SERIAL PRIMARY KEY,
book VARCHAR(50) NOT NULL,
chapter SMALLINT NOT NULL,
verse SMALLINT NOT NULL,
content TEXT NOT NULL
);

CREATE TABLE topic (
id SERIAL,
name VARCHAR(20)
);

INSERT INTO scriptures (book, chapter, verse, content)
VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.'),
('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
('Doctrine and Covenents', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'),
('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');


INSERT INTO scriptures (book, chapter, verse, content)
VALUES ('John', 5, 8, 'Jesus saith unto him, aRise, take up thy bed, and walk.'),
('Mark', 3, 25, 'And if a house be divided against itself, that house cannot stand.'),
('Mosiah', 14, 1, 'Yea, even doth not Isaiah say: Who hath abelieved our report, and to whom is the arm of the Lord revealed?'),
('Mark', 13, 5, 'And Jesus answering them began to say, Take heed lest any man deceive you:');

CREATE TABLE scrip_top (
id SERIAL PRIMARY KEY,
scriptures_id INT NOT NULL REFERENCES scriptures(id),
topic_id INT NOT NULL REFERENCES topic(id)
);

INSERT INTO topic (name)
VALUES ('Faith'),
('Scrifice'),
('Charity');

ALTER TABLE topic
ADD PRIMARY KEY (id);

INSERT INTO scriptures (book, chapter, verse, content)
VALUES ('2 Nephi'),
(10),
(4),
('For should the mighty amiracles be wrought among other nations they would repent, and know that he be their God.'),
WHERE
DELETE FROM product;
ALTER TABLE product AUTO_INCREMENT = 1;

INSERT INTO product (name, description, price)
VALUES
('Pomme', 'Mmm les pommes', 8),
('Poire', 'Je fais le poirieerrr', 15),
('Patate', 'Pomme de terre. Vraiment', 12),
('Serpent', 'Ssssss serpent à sonnette', 20),
('Crocodile', 'Lacoste TN dans le lac', 5),
('Miel', 'Miel pops miam miam miam. Ah non on est sur une ruche ici.', 10),
('Coco pops', 'Ca pops dans le bouche.', 8),
('Confiture', 'Confiture bien sucré', 7),
('Café de qualité', 'Je préfère le chocolat chaud.', 18),
('Tarte', 'Tartare ? Ah non mauvais produit', 25);

DELETE FROM user;
ALTER TABLE user AUTO_INCREMENT = 1;

INSERT INTO user (login, password)
VALUES
('username', '$2y$10$N3CpjSkD8k29F8y0.aqR2OLzDtsi9c7ug1PdUS68Q9AGwC81y3NOe'),
-- login : username / password : password
('choco', '$2y$10$kO5mHrsOxOX.go.xFc0exeTmXhONJgNpGAbyV71apgk8n5xKyaW0C'),
-- login : choco / password : mielpops
('test', '$2y$10$EVQozN5QGq6mMJ7gIiGwLO1mXHnESnAcuOUaePwWeQDFJMDYFkMH.');
-- login : test / password : appPhp


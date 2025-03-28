USE mon_site;

-- Ajout de quelques utilisateurs
INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES
('Paul Tardivel', 'paul@example.com', 'motdepasse123'),
('Alice Dupont', 'alice@example.com', 'password456');

-- Ajout de quelques articles
INSERT INTO articles (titre, contenu, utilisateur_id) VALUES
('Mon premier article', 'Ceci est le contenu de mon premier article.', 1),
('Un autre article', 'Ceci est un autre article de test.', 2);

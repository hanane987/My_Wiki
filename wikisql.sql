
CREATE Database wiki1;

CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Author') DEFAULT 'Author',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS tags (
    tag_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS wikis (
    wiki_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    user_id INT,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_archived BOOLEAN DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);


CREATE TABLE IF NOT EXISTS wiki_tags (
    wiki_id INT,
    tag_id INT,
    PRIMARY KEY (wiki_id, tag_id),
    FOREIGN KEY (wiki_id) REFERENCES wikis(wiki_id),
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);

INSERT INTO users (username, email, password_hash, role, created_at)
VALUES
    ('admin', 'admin@example.com', 'hashed_password_admin', 'Admin', NOW()),
    ('author1', 'author1@example.com', 'hashed_password_author1', 'Author', NOW()),
    ('author2', 'author2@example.com', 'hashed_password_author2', 'Author', NOW());


INSERT INTO categories (name, created_at)
VALUES
    ('Category1', NOW()),
    ('Category2', NOW()),
    ('Category3', NOW());

INSERT INTO app_tags (name, created_at)
VALUES
    ('Tag1', NOW()),
    ('Tag2', NOW()),
    ('Tag3', NOW());


INSERT INTO app_wikis (title, content, user_id, category_id, created_at, is_archived)
VALUES
    ('Wiki1', 'Content for Wiki1', 1, 1, NOW(), 0),
    ('Wiki2', 'Content for Wiki2', 2, 2, NOW(), 1),
    ('Wiki3', 'Content for Wiki3', 3, 3, NOW(), 0);


INSERT INTO wiki_tags (wiki_id, tag_id)
VALUES
    (1, 1),
    (1, 2),
    (2, 2),
    (3, 3);



















-- -- Table pour les catégories
-- CREATE TABLE categories (
--     category_id INT AUTO_INCREMENT PRIMARY KEY,
--     category_name VARCHAR(255) NOT NULL
-- );

-- -- Table pour les auteurs
-- CREATE TABLE authors (
--     author_id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     email VARCHAR(255) NOT NULL,
--     password VARCHAR(255) NOT NULL
-- );

-- -- Table pour les tags
-- CREATE TABLE tags (
--     tag_id INT AUTO_INCREMENT PRIMARY KEY,
--     tag_name VARCHAR(255) NOT NULL
-- );

-- -- Table pour les wikis
-- CREATE TABLE wikis (
--     wiki_id INT AUTO_INCREMENT PRIMARY KEY,
--     title VARCHAR(255) NOT NULL,
--     content TEXT NOT NULL,
--     category_id INT NOT NULL,
--     author_id INT NOT NULL,
--     FOREIGN KEY (category_id) REFERENCES categories(category_id),
--     FOREIGN KEY (author_id) REFERENCES authors(author_id)
-- );

-- -- Table de liaison entre les wikis et les tags
-- CREATE TABLE wiki_tags (
--     wiki_id INT,
--     tag_id INT,
--     PRIMARY KEY (wiki_id, tag_id),
--     FOREIGN KEY (wiki_id) REFERENCES wikis(wiki_id),
--     FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
-- );




-- -- Insert values into 'categories' table
-- INSERT INTO categories (category_name) VALUES
--     ('Programming'),
--     ('Science'),
--     ('History'),
--     ('Technology');

-- -- Insert values into 'authors' table
-- INSERT INTO authors (name, email, password) VALUES
--     ('John Doe', 'john.doe@example.com', 'password123'),
--     ('Jane Smith', 'jane.smith@example.com', 'securepass'),
--     ('Bob Johnson', 'bob.johnson@example.com', 'pass123');

-- -- Insert values into 'tags' table
-- INSERT INTO tags (tag_name) VALUES
--     ('PHP'),
--     ('Database'),
--     ('Science Fiction'),
--     ('Web Development');

-- -- Insert values into 'wikis' table
-- INSERT INTO wikis (title, content, category_id, author_id) VALUES
--     ('Introduction to PHP', 'PHP is a server-side scripting language.', 1, 1),
--     ('History of Science', 'A brief overview of scientific advancements.', 2, 2),
--     ('Database Design Basics', 'Understanding the fundamentals of database design.', 1, 3),
--     ('Web Development with PHP', 'Creating dynamic websites using PHP.', 1, 1);

-- -- Insert values into 'wiki_tags' table
-- INSERT INTO wiki_tags (wiki_id, tag_id) VALUES
--     (1, 1), -- PHP tag for Introduction to PHP
--     (3, 2), -- Database tag for Database Design Basics
--     (4, 1), -- PHP tag for Web Development with PHP
--     (2, 3); -- Science Fiction tag for History of Science

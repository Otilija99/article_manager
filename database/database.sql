CREATE TABLE articles (
                          id INTEGER PRIMARY KEY AUTOINCREMENT,
                          title TEXT NOT NULL,
                          content TEXT NOT NULL,
                          likes INTEGER DEFAULT 0
);

CREATE TABLE comments (
                          id INTEGER PRIMARY KEY AUTOINCREMENT,
                          article_id INTEGER,
                          content TEXT NOT NULL,
                          likes INTEGER DEFAULT 0,
                          FOREIGN KEY (article_id) REFERENCES articles(id)
);

DROP TABLE IF EXISTS notes;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id    INT          NOT NULL AUTO_INCREMENT,
    name  VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY  email (email)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE notes (
    id      INT          NOT NULL AUTO_INCREMENT,
    body    VARCHAR(255) NOT NULL,
    user_id INT          NOT NULL,
            PRIMARY KEY (id),
            KEY         fk_user_id (user_id),
            CONSTRAINT  fk_user_id
            FOREIGN KEY (user_id)
                        REFERENCES users (id)
                        ON DELETE CASCADE
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_0900_ai_ci;

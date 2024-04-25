DROP DATABASE IF EXISTS noto;
CREATE DATABASE noto;

USE noto;

CREATE TABLE user (
    id          INT             NOT NULL    AUTO_INCREMENT,
    email       VARCHAR(256)    NOT NULL    UNIQUE,
    password    TEXT            NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE note (
    id          INT             NOT NULL   AUTO_INCREMENT,
    title       TEXT            NOT NULL,
    content     TEXT            NOT NULL,
    color       VARCHAR(16)     NOT NULL,
    user_id     INT             NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user (id)
);
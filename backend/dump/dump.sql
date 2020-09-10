CREATE DATABASE IF NOT EXISTS telzir;

use telzir;

CREATE TABLE IF NOT EXISTS area_code
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    code       VARCHAR(255)                       NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
    updated_at DATETIME                           NULL,
    deleted_at DATETIME                           NULL
);

CREATE TABLE IF NOT EXISTS service_plan
(
    id         INT AUTO_INCREMENT
        PRIMARY KEY,
    name       VARCHAR(255)                       NOT NULL,
    duration  INT                                NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
    updated_at DATETIME                           NULL,
    deleted_at DATETIME                           NULL
);

CREATE TABLE IF NOT EXISTS call_cost
(
    id         INT AUTO_INCREMENT
        PRIMARY KEY,
    `from`       INT                      NOT NULL,
    `to`  INT                             NOT NULL,
    rate  DOUBLE(10,2)                    NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NULL,
    updated_at DATETIME                           NULL,
    deleted_at DATETIME                           NULL,
    CONSTRAINT call_cost_from_fk
        FOREIGN KEY (`from`) REFERENCES area_code (id),
    CONSTRAINT call_cost_to_fk
        FOREIGN KEY (`to`) REFERENCES area_code (id)
);

INSERT INTO telzir.area_code (id, code, created_at, updated_at, deleted_at) VALUES (1, '011', '2020-09-10 13:10:55', null, null);
INSERT INTO telzir.area_code (id, code, created_at, updated_at, deleted_at) VALUES (2, '016', '2020-09-10 13:10:55', null, null);
INSERT INTO telzir.area_code (id, code, created_at, updated_at, deleted_at) VALUES (3, '017', '2020-09-10 13:10:55', null, null);
INSERT INTO telzir.area_code (id, code, created_at, updated_at, deleted_at) VALUES (4, '018', '2020-09-10 13:10:55', null, null);

INSERT INTO telzir.call_cost (id, `from`, `to`, rate, created_at, updated_at, deleted_at) VALUES (1, 1, 2, 1.9, '2020-09-10 13:18:44', null, null);
INSERT INTO telzir.call_cost (id, `from`, `to`, rate, created_at, updated_at, deleted_at) VALUES (2, 2, 1, 2.9, '2020-09-10 13:18:44', null, null);
INSERT INTO telzir.call_cost (id, `from`, `to`, rate, created_at, updated_at, deleted_at) VALUES (3, 1, 3, 1.7, '2020-09-10 13:18:44', null, null);
INSERT INTO telzir.call_cost (id, `from`, `to`, rate, created_at, updated_at, deleted_at) VALUES (4, 3, 1, 2.7, '2020-09-10 13:18:44', null, null);
INSERT INTO telzir.call_cost (id, `from`, `to`, rate, created_at, updated_at, deleted_at) VALUES (5, 1, 4, 0.9, '2020-09-10 13:18:44', null, null);
INSERT INTO telzir.call_cost (id, `from`, `to`, rate, created_at, updated_at, deleted_at) VALUES (6, 4, 1, 1.9, '2020-09-10 13:18:44', null, null);

INSERT INTO telzir.service_plan (id, name, duration, created_at, updated_at, deleted_at) VALUES (1, 'FaleMais 30', 30, '2020-09-10 13:27:59', null, null);
INSERT INTO telzir.service_plan (id, name, duration, created_at, updated_at, deleted_at) VALUES (2, 'FaleMais 60', 60, '2020-09-10 13:27:59', null, null);
INSERT INTO telzir.service_plan (id, name, duration, created_at, updated_at, deleted_at) VALUES (3, 'FaleMais 120', 120, '2020-09-10 13:27:59', null, null);
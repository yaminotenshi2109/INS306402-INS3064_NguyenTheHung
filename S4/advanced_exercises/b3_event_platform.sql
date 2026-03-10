-- B3: Event Platform - JSON for the Unknown
-- Design an events table using JSON for flexible metadata.

CREATE DATABASE IF NOT EXISTS event_platform_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE event_platform_db;

CREATE TABLE IF NOT EXISTS events (
    id             INT          NOT NULL AUTO_INCREMENT,
    title          VARCHAR(255) NOT NULL,
    description    TEXT,
    location       VARCHAR(255),
    start_time     DATETIME     NOT NULL,          -- DATETIME stores date + time (no timezone)
    end_time       DATETIME     NOT NULL,          -- DATETIME stores date + time (no timezone)
    event_details  JSON,                           -- flexible metadata: speakers, tags, capacity, etc.
    created_at     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT chk_end_after_start CHECK (end_time > start_time)
);

-- Example of how event_details JSON might look:
-- {
--   "capacity": 200,
--   "tags": ["tech", "AI", "workshop"],
--   "speakers": [
--     { "name": "Jane Doe", "bio": "AI researcher" }
--   ],
--   "is_online": false,
--   "registration_url": "https://events.example.com/register/42"
-- }

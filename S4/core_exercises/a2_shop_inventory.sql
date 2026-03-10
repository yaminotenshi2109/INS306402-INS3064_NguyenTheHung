-- A2: Shop Inventory - Constraints as Business Rules
-- Design products table so the database rejects invalid business data.

USE student_management_db;

CREATE TABLE IF NOT EXISTS products (
    id             INT            NOT NULL AUTO_INCREMENT,
    product_name   VARCHAR(255)   NOT NULL,
    sku            VARCHAR(100)   NOT NULL UNIQUE,
    price          DECIMAL(10, 2) NOT NULL,
    stock_quantity INT            NOT NULL DEFAULT 0,
    is_active      BOOLEAN        NOT NULL DEFAULT TRUE,
    created_at     DATETIME       NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT chk_price_positive CHECK (price > 0)
);

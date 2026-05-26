### 1. JOIN Distinction
The primary difference lies in how they handle non-matching rows:
* **INNER JOIN:** Only returns rows where there is a match in *both* tables. If a record in the left table has no matching record in the right table, it is completely excluded from the result set.
* **LEFT JOIN:** Returns *all* rows from the left table, regardless of whether there is a match in the right table. If a record in the left table has no match in the right table, the row is still included in the result set, but the columns from the right table will contain `NULL` values.

### 2. Aggregation Logic
The **HAVING** clause is specifically designed to filter records *after* they have been grouped and aggregated. 

You cannot use the **WHERE** clause for this because of the order in which SQL processes a query. The `WHERE` clause filters individual rows *before* any grouping occurs. Because aggregate functions like `SUM()` or `COUNT()` calculate values based on groups of rows, the `WHERE` clause cannot evaluate them—those groups simply don't exist yet when `WHERE` is doing its job.

### 3. PDO Definition
**PDO** stands for **PHP Data Objects**.

Two major advantages of using PDO over the older `mysqli` extension are:
1. **Multiple Database Support:** PDO provides a consistent interface for interacting with many different types of databases (MySQL, PostgreSQL, SQLite, etc.). `mysqli` only works with MySQL databases. If you ever need to switch databases, PDO makes the transition much easier.
2. **Named Parameters:** PDO supports named parameters (e.g., `:username`, `:password`) in prepared statements, which makes complex queries with many variables much easier to read and maintain than the positional placeholders (`?`) primarily used in `mysqli`.

### 4. Security
**Prepared Statements** protect against SQL injection by strictly separating the SQL code structure from the user-provided data.

**The Mechanism:** When you use a prepared statement, the database engine parses, compiles, and optimizes the SQL query template *before* any data is inserted. Later, when the user inputs are bound to the parameters, the database treats them entirely as literal string or integer values, not as executable SQL commands. Because the query's structure is already locked in, a malicious user cannot alter the query's logic by injecting code like `' OR 1=1; --`.

### 5. Execution Flow
In a SQL query containing WHERE, GROUP BY, and HAVING, the database engine typically evaluates these clauses in the following order:
1. **WHERE:** Filters the raw, individual rows first.
2. **GROUP BY:** Takes the filtered rows and groups them together based on specified columns, calculating any aggregates.
3. **HAVING:** Finally, filters the resulting grouped and aggregated data.


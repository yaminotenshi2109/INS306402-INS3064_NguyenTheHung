<?php
require_once 'Database.php';

// Get the PDO connection
$db = Database::getInstance()->getConnection();

// --- 1. Fetch Categories for the Dropdown ---
// We need this to populate the <select> element before we handle the main product query
$cat_stmt = $db->query("SELECT id, category_name FROM categories ORDER BY category_name");
$categories = $cat_stmt->fetchAll();

// --- 2. Handle User Input (GET requests) ---
// We use the Null Coalescing Operator (??) to set a default empty string if the user hasn't searched yet
$search_name = $_GET['search_name'] ?? '';
$category_id = $_GET['category_id'] ?? '';

// --- 3. Build the Dynamic SQL Query ---
// We use 'WHERE 1=1' as a neat trick. It's always true, which makes appending 
// additional 'AND' clauses programmatically much easier.
$sql = "SELECT 
            p.id, 
            p.name, 
            p.price, 
            c.category_name, 
            p.stock 
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE 1=1"; 

$params = []; // This array will securely hold our user inputs

// Dynamic Search: If the user typed a name, append the LIKE clause
if (!empty($search_name)) {
    $sql .= " AND p.name LIKE :search_name";
    // We add the % wildcards here, NOT in the SQL string, for strict PDO integrity
    $params[':search_name'] = "%" . $search_name . "%"; 
}

// Category Filter: If the user selected a category, append the exact match clause
if (!empty($category_id)) {
    $sql .= " AND p.category_id = :category_id";
    $params[':category_id'] = $category_id;
}

// Finally, order the results so they look neat
$sql .= " ORDER BY p.id ASC";

// --- 4. Prepare and Execute ---
$stmt = $db->prepare($sql);
// Execute passing the parameter array safely locks out SQL Injection
$stmt->execute($params);
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; color: #333; }
        .dashboard-header { margin-bottom: 20px; }
        
        /* Form Styling */
        .filter-form { background: #f8f9fa; padding: 15px; border: 1px solid #ddd; border-radius: 5px; margin-bottom: 20px; }
        .filter-form input, .filter-form select, .filter-form button { padding: 8px; margin-right: 10px; }
        .clear-btn { text-decoration: none; color: #d9534f; font-weight: bold; }

        /* Table Styling */
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #e9ecef; }
        
        /* Visual Alert Styling */
        .low-stock { background-color: #ffe6e6; }
        .low-stock td { color: #cc0000; font-weight: bold; }
    </style>
</head>
<body>

    <div class="dashboard-header">
        <h1>Product Administration Dashboard</h1>
    </div>

    <div class="filter-form">
        <form method="GET" action="index.php">
            
            <label for="search_name">Search Product:</label>
            <input type="text" id="search_name" name="search_name" value="<?php echo htmlspecialchars($search_name); ?>" placeholder="e.g., Laptop">
            
            <label for="category_id">Filter by Category:</label>
            <select id="category_id" name="category_id">
                <option value="">-- All Categories --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo htmlspecialchars($cat['id']); ?>" <?php echo ($category_id == $cat['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($cat['category_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Apply Filters</button>
            <a href="index.php" class="clear-btn">Clear</a>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock Level</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <?php 
                    // Visual Alert Logic: Set a specific CSS class if stock is under 10
                    $row_class = ($product['stock'] < 10) ? 'low-stock' : ''; 
                    ?>
                    <tr class="<?php echo $row_class; ?>">
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo htmlspecialchars($product['category_name'] ?? 'Uncategorized'); ?></td>
                        <td>$<?php echo number_format($product['price'], 2); ?></td>
                        <td><?php echo htmlspecialchars($product['stock']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">No products found matching your criteria.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
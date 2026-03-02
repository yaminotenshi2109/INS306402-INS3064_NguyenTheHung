<?php
$showForm = true;
$error = "";

$fullname = "";
$email = "";
$phone = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        !isset($_POST["fullname"]) ||
        !isset($_POST["email"]) ||
        !isset($_POST["phone"]) ||
        !isset($_POST["message"])
    ) {
        $error = "Missing Data";
    } else {

        $fullname = trim($_POST["fullname"]);
        $email    = trim($_POST["email"]);
        $phone    = trim($_POST["phone"]);
        $message  = trim($_POST["message"]);

        if (
            $fullname === "" ||
            $email === "" ||
            $phone === "" ||
            $message === ""
        ) {
            $error = "Please fill in all required fields.";
        } else {
            $showForm = false;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* 1. General Page Styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        /* 2. Container Card */
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        /* 3. Typography */
        h2, h3 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        /* 4. Form Elements */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding doesn't widen the element */
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        textarea {
            resize: vertical; /* Allows user to resize height only */
            min-height: 100px;
        }

        /* 5. Button Styling */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* 6. Feedback Messages */
        .error-msg {
            background-color: #ffe6e6;
            color: #d8000c;
            border: 1px solid #d8000c;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success-box {
            background-color: #e7f9ed;
            border: 1px solid #28a745;
            padding: 20px;
            border-radius: 4px;
        }

        .success-box ul {
            list-style: none;
            padding: 0;
        }

        .success-box li {
            padding: 8px 0;
            border-bottom: 1px solid #ceeadd;
            color: #333;
        }

        .success-box li:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

<div class="container">

    <?php if ($showForm) { ?>

        <h2>Contact Us</h2>

        <?php if ($error !== "") { ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php } ?>

        <form method="post" action="">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" placeholder="Your name..">

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Your email..">

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="Your phone number..">

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Write something.."><?php echo htmlspecialchars($message); ?></textarea>

            <input type="submit" value="Send Message">
        </form>

    <?php } else { ?>

        <div class="success-box">
            <h3>Thank You!</h3>
            <p style="text-align: center;">Your message has been received.</p>

            <ul>
                <li><strong>Full Name:</strong> <?php echo htmlspecialchars($fullname); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
                <li><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></li>
                <li><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($message)); ?></li>
            </ul>
            
            <p style="text-align:center; margin-top:20px;">
                <a href="" style="color: #007BFF; text-decoration: none;">Send another message</a>
            </p>
        </div>

    <?php } ?>

</div>

</body>
</html>
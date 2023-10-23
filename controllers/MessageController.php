<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["send"])) {
        $title = $_POST["title"];
        $recipient = $_POST["recipient"];
        $message = $_POST["message"];
        $user_file = $_FILES["user_file"];

        $target_directory = "../uploads/";
        $file_name = $user_file["name"];
        $random_id = uniqid();
        $file_name = "$random_id - $file_name";

        if ($user_file["size"] > 25000000) {
            echo "File is too big!";
        } else {
            if (
                move_uploaded_file(
                    $user_file["tmp_name"],
                    $target_directory . $file_name
                )
            ) {
                echo "success";
            } else {
                echo "asdsadadewasdasda";
            }
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_GET["title"];
    $message = $_GET["message"];
    $query = "SELECT * FROM communications WHERE title = '$title'  AND message = '$message';";
    $result = $conn->query($query);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row["title"];
            $message = $row["message"];
            echo "<div class='card'>";
            echo "<header class='card-header'>$title</header>";
            echo "<div class='card-content'>";
            echo "<div class='inner'>$message</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Tidak ada pesan yang ditemukan.";
    }
}
?>  
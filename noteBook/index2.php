<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('location: index.php');
    exit();
}

?>


<html dir="auto">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./jquery/jquery.js"></script>
    <script src="./jquery/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="./sass/root.css">
    <link rel="icon" href="./img/favicon.ico" type="image/png">
    <title>Note Book</title>
</head>

<body class="index2">
    <!-- ToolsBar Article -->
    <article class="toolsBar">

        <!-- Add Note Section -->
        <section class="addNote">
            <button id="newBtn" class="newBtn">New Note</button>
            <img id="settingsBtn" src="./img/icons8-settings-100.png" alt="settings">
        </section>

        <!-- Configuration Section -->
        <section id="configuration" class="configuration">
            <!-- Add new note Form -->
            <form id="newNoteForm" action="./handler.php" method="POST">
                <h1>New Note</h1>
                <textarea dir="auto" form="newNoteForm" name="title" id="getTitle" rows="1" placeholder="Title"></textarea><br>
                <textarea dir="auto" form="newNoteForm" name="note" id="getNote" rows="5" placeholder="Your Note"></textarea><br>
                <button name="storeBtn" type="submit" id="addBtn">Add</button>
            </form>
        </section>

        <!-- Settings Section -->
        <section id="settings" class="settings">
            <a class="logout" href="./logout.php">Log Out</a>
        </section>

        <!-- Notes Container -->
        <section id="notesContainer" class="notesContainer"></section>

    </article>

    

    <!-- Import Javascript -->
    <script src="./js/script.js"></script>
    <?php
    if ($_SESSION['username'] == "muhhl") {
        echo '
        <script type="text/JavaScript">
            $("#settings").append(`
            <a class="clearLog" target="_blank" href="./log.txt">View Log</a>
            <a id="clearLog" class="clearLog">Clear Log</a>
            `);
        </script>
        ';
    }
    ?>
</body>
</html>
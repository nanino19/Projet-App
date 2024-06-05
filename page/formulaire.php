
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum de discussion</title>
</head>
<body>
    <h1>Forum de discussion</h1>

    <form method="post" action="traitement.php">
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" required><br><br>
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Envoyer">
    </form>
</body>


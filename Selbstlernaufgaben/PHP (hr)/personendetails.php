<table border="1">
        <tr>
            <td>Vorname</td>
            <td>Nachname</td>
            <td>Geburtstag</td>
            <td>Geschlecht</td>
        </tr>
        <?php foreach ($array as $person): ?>
        <tr>
            <td><?php echo htmlspecialchars($person[0]); ?></td>
            <td><?php echo htmlspecialchars($person[1]); ?></td>
            <td><?php echo htmlspecialchars($person[2]); ?></td>
            <td><?php echo getGenderSymbol(htmlspecialchars($person[3])); ?></td>
        </tr>
        
        <?php endforeach; ?>

</table>
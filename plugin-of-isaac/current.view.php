<div class="lst">
<h3>Equipe Bleu</h3>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Champion</th>
            <th colspan="2">Sorts d'invocateur</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tracker->getGame() as $player) {
            if ($player['team'] == 100) {
                echo "<tr>";
                echo "<td>".$player['name']."</td>";
                echo "<td>".$player['champion']."</td>";
                echo "<td>".$player['spell1']."</td>";
                echo "<td>".$player['spell2']."</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</div>
<div class="lst">
<h3>Equipe Violet</h3>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Champion</th>
            <th colspan="2">Sorts d'invocateur</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tracker->getGame() as $player) {
            if ($player['team'] == 200) {
                echo "<tr>";
                echo "<td>".$player['name']."</td>";
                echo "<td>".$player['champion']."</td>";
                echo "<td>".$player['spell1']."</td>";
                echo "<td>".$player['spell2']."</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
</div>

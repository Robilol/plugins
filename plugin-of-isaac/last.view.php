<h2>Dernières parties :</h2>

<div class="lst">
<table>
    <thead>
        <tr>
            <th>Equipe</th>
            <th colspan="2">Sorts d'invocateur</th>
            <th>Champion</th>
            <th>Niveau</th>
            <th>Gold</th>
            <th>Kill</th>
            <th>Assist</th>
            <th>Death</th>
            <th>Dégat infligés</th>
            <th>Dégat reçus</th>
            <th>Nombre de Ward</th>
            <th>Durée de la partie</th>
            <th>Résultat</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($tracker->getLastGames() as $game) {
            echo "<tr>";
            if ($game['team'] == 100) {
                echo "<td>Bleue</td>";
            }elseif ($game['team'] == 200) {
                echo "<td>Violette</td>";
            }
            echo "<td>".$game['spell1']."</td>";
            echo "<td>".$game['spell2']."</td>";
            echo "<td>".$game['champion']."</td>";
            echo "<td>".$game['level']."</td>";
            echo "<td>".$game['gold']."</td>";
            echo "<td>".$game['kill']."</td>";
            echo "<td>".$game['assist']."</td>";
            echo "<td>".$game['death']."</td>";
            echo "<td>".$game['damageGive']."</td>";
            echo "<td>".$game['damageTake']."</td>";
            echo "<td>".$game['ward']."</td>";
            echo "<td>".$game['timePlayed']."</td>";
            if ($game['win'] == 0) {
                echo "<td>Défaite</td>";
            }elseif ($game['win'] == 1) {
                echo "<td>Victoire</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
</div>
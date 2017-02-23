<?php
require("plugin.php");
$stats = new LolStatsTracker("Dokor", "euw");
$player = $stats->getcurrentGame();
?>

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
        $y = 0;
        while ($y < 10) {
            if ($player[$y]["team"] == 100){
                echo "<tr>
                    <td>".$player[$y]["name"]."</td>
                    <td>".$player[$y]["champion"]."</td>
                    <td>".$player[$y]["spell1"]."</td>
                    <td>".$player[$y]["spell2"]."</td>
                </tr>";
            }
            $y++;
        }
        ?>
    </tbody>
    <tfoot>
        
    </tfoot>
</table>

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
        $y = 0;
        while ($y < 10) {
            if ($player[$y]["team"] == 200){
                echo "<tr>
                    <td>".$player[$y]["name"]."</td>
                    <td>".$player[$y]["champion"]."</td>
                    <td>".$player[$y]["spell1"]."</td>
                    <td>".$player[$y]["spell2"]."</td>
                </tr>";
            }
            $y++;
        }
        ?>
    </tbody>
    <tfoot>
        
    </tfoot>
</table>
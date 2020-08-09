<?php
        echo "<center><img src=$imgUrl width=550 height=350 id=\"imgBorder\" class=\"responsive-img\"></img></center>";
        echo "<center><h4 id=\"FontFace\">There are a total of <b id=\"standOut\">".  $countFace . "</b> faces detected</h4></center><br>";
         echo "<center><h4 id=\"FontFace\" >Results after analysis</h4></center>"."<br>";
                echo "
                <table id=\"TableFont\" class=\"highlight centered responsive-table\">
                        <thead>
                                <tr>
                                        <th>Male</th>
                                        <th>Female</th>
                                        <th>Beard</th>
                                        <th>Spectacles</th>
                                        <th>Open mouth</th>
                                        <th>Eyes open</th>
                                        <th>Smile</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>$male</td>
                                        <td>$female</td>
                                        <td>$beard</td>
                                        <td>$specs</td>
                                        <td>$mouth</td>
                                        <td>$eyes</td>
                                        <td>$smile</td>
                                </tr>
                        </tbody>
                </table><br>
                ";

?>

<main class="transition">
    <section>
        <a class='infoAdd' href="infoAdd">Envoyé Une Info !</a><br>
        <?php 
        for ($i = 0; $i < count($info) ; $i++) {
            print("<div class='news'><h2>".$info[$i]['title']."</h2><br>
                <img src='".$info[$i]['img']."'><br>
                <p>".$info[$i]['content']."</p>
                <p><a href='infoEdit.php?id=".$info[$i]['infoId']."'>Modifier</a> - <a href='php/infoRemoveExe.php?id=".$info[$i]['infoId']."'>Supprimer</a></p>
                </div>");
        }
        ?>
        <div class='pagination'>
        <?php 
        if($page > 2){
        echo '<a href="news.php?page=1">1</a>';
        };
        if($page > 1){
        echo '<a href="news.php?page='.($page-1).'">'.($page-1).'</a>';
        };
        ?>
        ...
        <a href="news.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a>
        </div>
    </section>
</main>
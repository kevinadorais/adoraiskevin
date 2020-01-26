<main>
    <section>
        <fieldset>
            <form method="post" action="php/infoEditExe">
                <input type="hidden" name="infoId" value="<?= $info[0]['infoId'] ?>">
                <label for="title">Titre de l'Info :</label><br>
                <input type="text" name="title" size="100" value="<?= $info[0]['title'] ?>"/><br><br>
                <label for="img">Url d'une Image :</label><br>
                <input type="url" name="img" size="100" value="<?= $info[0]['img'] ?>"/><br><br>
                <label for="content">Texte de l'Info :</label><br>
                <textarea name="content" rows="20" cols="150"><?= $info[0]['content'] ?></textarea><br><br>
                <input type="submit" name="Envoyer" value="Mettre A Jour" class='sendButton'>
            </form>
        </fieldset>
    </section>
</main>
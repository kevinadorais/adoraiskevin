<main>
    <section>
        <fieldset>
            <form method="post" action="php/infoAddExe">
                <label for="title">Titre de l'Info :</label><br>
                <input type="text" name="title" size="100"/><br><br>
                <label for="img">Url d'une Image :</label><br>
                <input type="url" name="img" size="100"/><br><br>
                <label for="content">Texte de l'Info :</label><br>
                <textarea name="content" rows="20" cols="150"></textarea><br><br>
                <input type="submit" name="Envoyer" class='sendButton'>
            </form>
        </fieldset>
    </section>
</main>
<br><br>

<h1>WYSIWYG example</h1>

<form action="" method="post">
    <textarea id="trumbowyg" placeholder="Napište něco"></textarea>

    <input type="submit" value="Odeslat">
</form>

<script type="text/javascript">
    $('textarea').trumbowyg({
        lang: 'cs'
    });
    $('#trumbowyg').trumbowyg();
</script>
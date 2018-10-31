<footer>
    <div class="full-width-wrapper">
        <div class="flex-wrap">
            <section>
                <h4>About me</h4>
                <ul>
                    <li><a href="#">Work with me</a></li>
                    <li><a href="#">References</a></li>
                    <li><a href="#">Contact me</a></li>
                    <li><a href="#">Authors</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </section>

            <!-- Blog. -->
            <section>
                <h4>Blog news</h4>
                <ol>
                    <li><a href="#">New article #1</a></li>
                    <li><a href="#">New article #2</a></li>
                    <li><a href="#">New article #3</a></li>
                    <li><a href="#">New article #4</a></li>
                </ol>
            </section>

            <section>
                <h4>Contact</h4>
                <address>
                    Honzovo, s. r. o. <br>
                    2354 Pacific Coast Highway <br>
                    USA <br>
                    +420 123 456 <br>
                    Email: <a href="mailto:honza@iwww.cz">honza@iwww.cz</a> <br>
                </address>
            </section>

            <section id="footer-newsletter">
                <h4>Newsletter</h4>

                <form method="post" action="<?= CURRENT_URL; ?>">
                    <div>
                        <label>Enter your email address:</label>
                    </div>
                    <div>
                        <input type="text" name="email">
                    </div>
                    <div>
                        <input type="submit" name="newsletter" value="Subscribe">
                    </div>
                </form>
            </section>

            <section>
                <p>Copyleft
                    2017 – <?= date("Y") ?>
                    <a href="https://github.com/st52530">st52530</a>
                </p>
            </section>
        </div>
    </div>
</footer>
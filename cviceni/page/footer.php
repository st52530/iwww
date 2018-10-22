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

                <?php
                $message = "";
                if (isset($_POST['newsletter'])) {
                    if (!empty($_POST['email'])) {

                        if (preg_match('/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD', $_POST['email'])) {
                            try {
                                $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // prepare sql and bind parameters
                                $statement = $conn->prepare("INSERT INTO newsletter (email) VALUES (:email)");
                                $statement->bindParam(':email', $_POST['email']);
                                $statement->execute();

                                $message = "You are subscribed";
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        } else {
                            $message = "Bad formatted email address";
                        }
                    } else {
                        $message = "Email is needed.";
                    }
                }

                echo "<i>" . $message . "</i>";
                $message = "";
                ?>

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
                    <a href="https://github.com/st52530">Honza</a>
                </p>
            </section>
        </div>
    </div>
</footer>
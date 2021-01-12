<footer id="footer">
    <div class="inner">
        <section>
            <form method="post" action="#">

                @csrf
                
                <div class="fields">

                    <div class="field half">
                        <input type="text" name="nama" id="field-2" placeholder="Name">
                    </div>

                    <div class="field half">
                        <input type="text" name="email" id="field-3" placeholder="Email">
                    </div>

                    <div class="field half">
                        <input type="text" name="telepon" id="field-4" placeholder="Phone">
                    </div>

                    <div class="field half">
                        <input type="text" name="alamat" id="field-5" placeholder="Address">
                    </div>

                    <div class="field half">
                        <input type="text" name="kota" id="field-7" placeholder="City">
                    </div>

                    <div class="field half">
                        <input type="text" name="provinsi" id="field-8" placeholder="State">
                    </div>

                    <div class="field">
                        <div>
                            <input type="checkbox" id="checkbox-4">

                            <label for="checkbox-4">
                                I agree with the <a href="terms.html" target="_blank">Terms &amp; Conditions</a>
                            </label>
                        </div>
                    </div>


                    <div class="field half text-right">
                        <ul class="actions">
                            <li><input type="submit" value="Finish" class="primary"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </section>
        <section>
            <h2>Contact Info</h2>

            <ul class="alt">
                <li><span class="fa fa-envelope-o"></span> <a href="#">contact@company.com</a></li>
                <li><span class="fa fa-phone"></span> +1 333 4040 5566 </li>
                <li><span class="fa fa-map-pin"></span> 212 Barrington Court New York, ABC 10001 United States of America</li>
            </ul>

            <h2>Follow Us</h2>

            <ul class="icons">
                <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
            </ul>
        </section>

        <ul class="copyright">
            <li>Copyright © 2020 Company Name </li>
            <li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>
        </ul>
    </div>
</footer>

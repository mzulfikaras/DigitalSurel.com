<footer id="footer">
    <div class="inner">
        <section>
            <h2>Contact Us</h2>
            <form method="post" action="{{route('user.getContactHome')}}">
                
                @csrf

                <div class="fields">
                    <div class="field half">
                        <input type="text" name="nama" class="@error('nama') is-invalid @enderror" placeholder="Nama" />

                        @error('nama')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field half">
                        <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror" placeholder="Email" />
                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <input type="text" name="subject" class="@error('subject') is-invalid @enderror" id="subject" placeholder="Subject" />
                        @error('subject')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <textarea name="notes" class="@error('notes') is-invalid @enderror"  id="notes" rows="3" placeholder="Notes"></textarea>
                        @error('notes')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="field text-right">
                        <label>&nbsp;</label>

                        <ul class="actions">
                            <li><input type="submit" value="Send Message" class="primary" /></li>
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
            <li>Copyright © 2021 DigitalSurel.com </li>
        </ul>
    </div>
</footer>
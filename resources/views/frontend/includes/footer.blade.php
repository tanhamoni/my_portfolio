<footer id="footer" class="footer dark-background">

    <div class="container">

        <div class="copyright text-center">
            <p>
                © <span>Copyright</span>
                <strong class="px-1 sitename">Tanha</strong>
                <span>All Rights Reserved</span>
            </p>
        </div>

        <div class="social-links d-flex justify-content-center">

            <!-- X / Twitter -->
            <a href="https://x.com/tanha_web" target="_blank">
                <i class="bi bi-twitter-x"></i>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/people/Tanha-Moni/61591658647462/" target="_blank">
                <i class="bi bi-facebook"></i>
            </a>

            <!-- GitHub -->
            <a href="https://github.com/tanhamoni" target="_blank">
                <i class="bi bi-github"></i>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/tanha-moni-085541422/" target="_blank">
                <i class="bi bi-linkedin"></i>
            </a>
            
<!-- WhatsApp -->
@if ($setting->whatsapp)
    <a href="{{ $setting->whatsapp }}" target="_blank" rel="noopener">
        <i class="bi bi-whatsapp"></i>
    </a>
@endif

        </div>

     

    </div>

</footer>
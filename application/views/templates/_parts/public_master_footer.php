	<footer class="footer">
        <div class="footer__copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p>&copy;2016 Best company</p>
              </div>
              <div class="col-md-6">
                <p class="credit pull-right">Code by <a href="https://bootstrapious.com/landing-pages" class="external">Bootstrapious</a></p>
               <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
              </div>
            </div>
          </div>
        </div>
      </footer>
	<!--<footer>
	  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</footer>-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?= site_url('assets/admin/js/bootstrap.min.js') ?>"></script>
<!-- Javascript files-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="<?= site_url('assets/admin/public_master/js/jquery.cookie.js') ?>"> </script>
<script src="<?= site_url('assets/admin/public_master/js/ekko-lightbox.js') ?>"></script>
<script src="<?= site_url('assets/admin/public_master/js/jquery.simple-text-rotator.min.js') ?>"></script>
<script src="<?= site_url('assets/admin/public_master/js/jquery.scrollTo.min.js') ?>"></script>
<script src="<?= site_url('assets/admin/public_master/js/owl.carousel.min.js') ?>"></script>
<script src="<?= site_url('assets/admin/public_master/js/front.js') ?>"></script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
<!---->
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
<?= $body_link ?>
</body>

</html>
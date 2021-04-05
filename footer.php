</main>
<footer id="footer">
    <div class="footer-contacts footer-section left">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'pieds_page',
                'menu_class'     => 'footer',
                'depth'          => 1,
            )
        );
        ?>
        <div class="contacts-info">
            <ul>
                <li class="contact-email"><label for="user-email"><?php pll_e("Courriel"); ?> : </label> <a href="mailto:<?= get_userdata(3)->user_email ?>"><?= get_userdata(3)->user_email ?></a></li>
                <li class="contact-phone"><label for="user-phone"><?php pll_e("Téléphone"); ?> : </label> <a href="tel:<?= get_userdata(3)->ext_phone ?>"><?= get_userdata(3)->ext_phone ?></a></li>
            </ul>
        </div>


    </div>
    <div class="footer-section center">
        <small class="copyright">&copy; <?php pll_e("Copyright"); ?> <?= date("Y"); ?>, <?php pll_e("ARRIVIE"); ?>. <?php pll_e("All Rights Reserved"); ?></small>

    </div>
    <div class="footer-section right">
        <?php echo do_shortcode('[qr-code id="303"]'); ?>
        <!-- <img class="qr" src="/wp-content/themes/irhi-theme/assets/img/qr.png" /> -->
        <a href="#main"><?php pll_e("Aller vers le haut"); ?></a>
    </div>
</footer>
<?php
wp_footer();
?>
</body>

</html>

		</div><!-- .site-content -->

		<footer class="site-footer">
            <div class="container">
                <div class="site-footer__inner flex flex--wrap">
                    <div class="site-footer__contacts">
                        <div class="site-footer__heading">Contacts</div>
                        <ul>
                            <?php echo (get_theme_mod( 'main_address' ) ? '<li>' . get_theme_mod( 'main_address' ) . '</li>' : ''); ?>
                            <?php echo (get_theme_mod( 'main_email' ) ? '<li>E-mail: <a href="mailto:' . get_theme_mod( 'main_email' ) . '">' . get_theme_mod( 'main_email' ) . '</a></li>' : ''); ?>
                            <?php echo (get_theme_mod( 'main_phone_1' ) ? '<li>Phone: <a href="tel:' . str_replace( ' ',"", get_theme_mod( 'main_phone_1' ) ) . '">' . get_theme_mod( 'main_phone_1' ) . '</a></li>' : ''); ?>
                            <?php echo (get_theme_mod( 'main_phone_2' ) ? '<li>Phone: <a href="tel:' . str_replace( ' ',"", get_theme_mod( 'main_phone_2' ) ) . '">' . get_theme_mod( 'main_phone_2' ) . '</a></li>' : ''); ?>
                        </ul>
                    </div>
                    <div class="site-footer__additional">
                        <div class="site-footer__heading">Additional links</div>
                        <?php
                            if ( has_nav_menu( 'additional' ) ) :
                                wp_nav_menu( array(
                                    'menu_class'     => 'site-additional',
                                    'theme_location' => 'additional'
                                ) );
                            endif;
                        ?>
                    </div>
                    <div class="site-footer__social">
                        <?php if ( has_nav_menu( 'social' ) ) : ?>
                            <nav class="site-social">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'social'
                                ) );
                                ?>
                            </nav><!-- .site-social -->
                        <?php endif; ?>
                    </div>
                    <?php echo (get_theme_mod( 'main_copyright' ) ? '<p class="site-copyright">' . get_theme_mod( 'main_copyright' ) . '</p>' : ''); ?>
                </div>
            </div>
		</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>

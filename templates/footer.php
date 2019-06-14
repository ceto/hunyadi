<footer class="content-info pagesection pagesection--narrow" role="contentinfo">
    <div class="row">
        <div class="columns medium-10 medium-centered"><span class="footer__copy">&copy; <?= date(Y) ?> HUNYADI Kft.
                &middot; <?php _e('Minden jog fenntartva.', 'hunyadi') ?> &middot; <a
                    href="<?= get_the_permalink(464) ?>"><?php _e('Adatvédelem', 'hunyadi') ?></a> </span> <span
                class="footer__madeby">by <a href="http://hydrogene.hu" target="_blank">Hydrogene</a></span></div>
        <?php //dynamic_sidebar('sidebar-footer'); ?>
    </div>
</footer>
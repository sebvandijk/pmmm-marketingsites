<?php
get_header();

?>
    <article class="page">
        <section class="content">
            <h2 class="medium-heading"><?php the_title() ?></h2>
            <div class="page_content">
				<?php the_content() ?>
            </div>
        </section>
    </article>
<?php

get_footer();
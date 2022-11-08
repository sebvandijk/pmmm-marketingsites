<div class="newsletter">
    <div class="newsletter__inner newsletter__inner--initial">

        <h5 class="small-heading">
			<?= __( 'Schrijf je in voor de nieuwsbrief.', 'pmmm-marketing' ); ?>
        </h5>
        <p><!-- hier subtext invoeren --></p>
        <form class="newsletter__form form" action="index.html" method="post" novalidate>
            <div class="form__input-container">
                <input class="form__input" type="text" name="" value="" id="firstname"
                       placeholder="<?= __( 'Voornaam', 'pmmm-marketing' ); ?>" required>
                <p class="form__error form__error--firstname small-body required xsmall">
					<?= __( 'We willen graag je voornaam weten', 'pmmm-marketing' ); ?>
                </p>
            </div>
            <div class="form__input-container">
                <input class="form__input" type="email" name="" value="" id="email"
                       placeholder="<?= __( 'E-mailadres', 'pmmm-marketing' ); ?>" required>
                <p class="form__error form__error--email small-body invalid xsmall">
					<?= __( 'Vul een geldig e-mailadres in', 'pmmm-marketing' ); ?>
                </p>
                <p class="form__error form__error--email small-body required xsmall">
					<?= __( 'We hebben je e-mailadres nodig', 'pmmm-marketing' ); ?>
                </p>
            </div>
			<?php
			$button = array(
				'title' => __( 'Schrijf je nu in', 'pmmm-marketing' ),
				'type'  => 'submit'
			);
			?>
			<?= get_template_part( 'template-elements/button', '', $button ) ?>
        </form>
    </div>
    <div class="newsletter__inner newsletter__inner--success">
        <h3 class="small-heading">
			<?= __( 'Gelukt! Je bent nu ingeschreven voor onze nieuwsbrief', 'pmmm-marketing' ); ?>
        </h3>
    </div>
</div>
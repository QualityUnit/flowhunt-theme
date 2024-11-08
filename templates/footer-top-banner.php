<?php
?>
<div class="Footer__TopBanner">
  <div class="Footer__TopBanner__wrapper">
    <div class="Footer__TopBanner__content">
      <h2 class="Footer__TopBanner__title"><?php _e( 'Ready to build your own AI?', 'flowhunt' ); ?></h2>
      <p class="Footer__TopBanner__subtitle"><?php _e( 'Smart Chatbots and AI tools under one roof. Connect intuitive blocks to turn your ideas into automated Flows.', 'flowhunt' ); ?></p>
      <div class="Footer__TopBanner__buttons">
        <a class="Button Button--white Button--white--highlight Button--medium" href="<?php _e( 'https://app.flowhunt.io/sign-in', 'flowhunt' ); ?>" target="_blank">
          <span><?php _e( 'Try it out', 'flowhunt' ); ?></span>
        </a>
        <a class="Button Button--outline--white Button--outline--full Button--medium" href="<?php _e( 'https://calendly.com/liveagentsession/flowhunt-chatbot-demo', 'flowhunt' ); ?>" target="_blank">
          <span><?php _e( 'Book a demo', 'flowhunt' ); ?></span>
        </a>
      </div>
    </div>
    <div class="Footer__TopBanner__banner">
      <a class="Footer__TopBanner__banner--Logo" href="<?= esc_url( home_url( '/' ) ); ?>">
        <img alt="URLsLab" loading="lazy" width="139" height="34" src="<?= esc_url( get_template_directory_uri() . '/assets/images/flowhunt-logo_white.svg' ); ?>" />
      </a>
      <div class="Footer__TopBanner__banner--content">
        <h3 class="Footer__TopBanner__banner--title"><?php _e( 'Build AI the easy way', 'flowhunt' ); ?></h3>
        <p class="Footer__TopBanner__banner--subtitle"><?php _e( 'Connect intuitive blocks to turn your ideas and needs into automated Flows', 'flowhunt' ); ?></p>
      </div>
      <div class="Footer__TopBanner__banner--social">
        <a href="<?php the_author_meta( 'instagram' ); ?>" target="_blank" itemprop="sameAs">
          <svg class="icon icon-social-instagram">
            <use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg#social-instagram' ); ?>"></use>
          </svg>
        </a>
        <a href="<?php the_author_meta( 'facebook' ); ?>" target="_blank" itemprop="sameAs">
          <svg class="icon icon-social-facebook">
            <use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg#social-facebook' ); ?>"></use>
          </svg>
        </a>
        <a href="https://twitter.com/<?php the_author_meta( 'twitter' ); ?>" target="_blank" itemprop="sameAs">
          <svg class="icon icon-social-twitter">
            <use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg#social-twitter' ); ?>"></use>
          </svg>
        </a>
        <a href="<?php the_author_meta( 'linkedin' ); ?>" target="_blank" itemprop="sameAs">
          <svg class="icon icon-social-linkedin">
            <use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg#social-linkedin' ); ?>"></use>
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>

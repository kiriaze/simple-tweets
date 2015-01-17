(function($) {

    $(document).ready(function() {


        // Twitter
        $('#social_twitter_app').on('click', function() {
         $('#section-social_twitter_oauth_token, #section-social_twitter_oauth_token_secret, #section-social_twitter_consumer_key, #section-social_twitter_consumer_secret, #section-social_twitter_username, #section-social_twitter_cache, #section-social_twitter_count').slideToggle(400);
        });

        if ( $('#social_twitter_app:checked').val() !== undefined ) {
         $('#section-social_twitter_oauth_token, #section-social_twitter_oauth_token_secret, #section-social_twitter_consumer_key, #section-social_twitter_consumer_secret, #section-social_twitter_username, #section-social_twitter_cache, #section-social_twitter_count').show();
        }

    });

})(jQuery);
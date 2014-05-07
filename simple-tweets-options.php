<?php

add_filter('of_options', function($options) {

	// Pull all the pages into an array
	$plugin_pages = array();
	$plugin_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$plugin_pages[''] = 'Select a page:';
	foreach ($plugin_pages_obj as $page) {
		$plugin_pages[$page->ID] = $page->post_title;
	}

	// 	Needed for customizer since customizer is front end
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	if ( is_plugin_active('simple-tweets/simple-tweets.php') ) :

		// Info Break
		$options[] = array(
			'name' 	=> __('Simple Tweets', SIMPLE_THEME_SLUG),
			'desc' 	=> __('This is just some example information you can put in the panel.', SIMPLE_THEME_SLUG),
			'type' 	=> 'info'
		);

			// Twitter App
			$options['social_twitter_app'] = array(
				'name' 	=> __('Twitter App', SIMPLE_THEME_SLUG),
				'desc' 	=> __('Enable twitter credentials for app use.', SIMPLE_THEME_SLUG),
				'id' 	=> 'social_twitter_app',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);

				// Twitter OAUTH Token
				$options['social_twitter_oauth_token'] = array(
					'name' 	=> __('OAUTH Token', SIMPLE_THEME_SLUG),
					'desc' 	=> __('Your Twitter oauth token.', SIMPLE_THEME_SLUG),
					'id' 	=> 'social_twitter_oauth_token',
					'std' 	=> '',
					'type' 	=> 'text',
					'class'	=> 'hidden'
				);

				// Twitter OAUTH Token Secret
				$options['social_twitter_oauth_token_secret'] = array(
					'name' 	=> __('OAUTH Token Secret', SIMPLE_THEME_SLUG),
					'desc' 	=> __('Your Twitter oauth token secret.', SIMPLE_THEME_SLUG),
					'id' 	=> 'social_twitter_oauth_token_secret',
					'std' 	=> '',
					'type' 	=> 'text',
					'class'	=> 'hidden'
				);

				// Twitter Consumer Key
				$options['social_twitter_consumer_key'] = array(
					'name' 	=> __('Consumer Key', SIMPLE_THEME_SLUG),
					'desc' 	=> __('Your Twitter consumer key.', SIMPLE_THEME_SLUG),
					'id' 	=> 'social_twitter_consumer_key',
					'std' 	=> '',
					'type' 	=> 'text',
					'class'	=> 'hidden'
				);

				// Twitter Consumer Secret
				$options['social_twitter_consumer_secret'] = array(
					'name' 	=> __('Consumer Secret', SIMPLE_THEME_SLUG),
					'desc' 	=> __('Your Twitter consumer secret.', SIMPLE_THEME_SLUG),
					'id' 	=> 'social_twitter_consumer_secret',
					'std' 	=> '',
					'type' 	=> 'text',
					'class'	=> 'hidden'
				);

				// Twitter Username
				$options['social_twitter_username'] = array(
					'name' 	=> __('Username', SIMPLE_THEME_SLUG),
					'desc' 	=> __('Your Twitter username.', SIMPLE_THEME_SLUG),
					'id' 	=> 'social_twitter_username',
					'std' 	=> '',
					'type' 	=> 'text',
					'class'	=> 'hidden'
				);

				// Twitter Count
				$options['social_twitter_count'] = array(
					'name' 	=> __('Count', SIMPLE_THEME_SLUG),
					'desc' 	=> __('Number of tweets to show, defaults to 3.', SIMPLE_THEME_SLUG),
					'id' 	=> 'social_twitter_count',
					'std' 	=> '',
					'type' 	=> 'text',
					'class'	=> 'hidden'
				);

				// Twitter Cache
				$options['social_twitter_cache'] = array(
					'name' 	=> __('Cache', SIMPLE_THEME_SLUG),
					'desc' 	=> __('Number of minutes, defaults to 15min.', SIMPLE_THEME_SLUG),
					'id' 	=> 'social_twitter_cache',
					'std' 	=> '',
					'type' 	=> 'text',
					'class'	=> 'hidden'
				);

		    // Tweets Default Styles
	        $options['simple_tweets_default_styles'] = array(
	            'name'  => __('Enable Tweets Default Styles', SIMPLE_THEME_SLUG),
	            'desc'  => __('Enables tweets default styles, defaults to true.', SIMPLE_THEME_SLUG),
	            'id'    => 'simple_tweets_default_styles',
	            'std'   => '1',
	            'type'  => 'checkbox'
	        );

	endif;

	return $options;

});
# Twitter integration plugin

This plugin adds Twitter integration features to the [OctoberCMS](http://octobercms.com).

## Configuring

Twitter uses the OAuth security. In order to use the plugin you need create a Twitter API application.

1. Go to the [Twitter Developers website](https://apps.twitter.com/) to create a new application. You must me signed into Twitter in order to access the page.
2. Click the Create New App button.
3. Enter any application name, for example October Twitter Integration.
4. Provide a description for the application.
5. Enter the website URL where the Twitter integration is going to be used.
6. Read and agree to the "Rules of the Road"
7. After the application is created, navigate to the API Keys tab and click the "Create my access token" button. Generating the access token could take some time. Refresh the page until you see the "Your access token" section with the token and token secret strings.
8. Return to the October back-end and navigate to the Settings page. 
9. Click Twitter icon. Enter the API access information from the Twitter application page to the Twitter settings page in October.
10. Save the settings.

## Displaying favorite Twitter messages

The plugin includes a component Favorites that lets you to output your favorite twitter messages on a page. Add the component to your page render it with the component tag:

You can manage the number of favorite messages with the component settings.

```php
    {% component 'twitterFavorites' %}
```

If you don't like the default favorite messages markup, you can use your custom markup:

```php
    {% for favorite in twitterFavorites.favoriteList %}
        <blockquote>“{{ favorite.text_processed|raw }}”</blockquote>

        <p class="author">
            <img src="{{ favorite.user.profile_image_url_https }}"/>
            <span>{{ favorite.user.name }}</span>
            <a href="#" rel="author"><a href="{{ 'http://twitter.com/'~favorite.user.screen_name }}">@{{ favorite.user.screen_name }}</a></a>
        </p>
    {% endfor %}
```

See [Twitter favorites API documentation](https://dev.twitter.com/docs/api/1.1/get/favorites/list) for the information about available fields.
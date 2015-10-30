# Facebook Identifier

With this script you can identify which Facebook Page did the ticket come from. It will update a custom field with the page name so you can easily integrate your Facebook Pages in your Business Rules.

## Recipe

- One custom field.
- Edit the fb-config.php
- One URL target.
- One trigger.
- Server that can run a php script

### One custom field

![custom_field.png](http://i.imgur.com/MPRdILJ.png)

### Edit the fb-config.php

**ZD_SUBDOMAIN**

This is the subdomain of your Zendesk account. If your account is https://test.zendesk.com the value should be `test`.

If you are using hostmapping in your account you have to use the unmapped version.

```
support.mydomain.com -> test.zendesk.com
```

The value should be `test`. 

**ZD_EMAIL**

Your Zendesk user email.

**ZD_TOKEN**

This is the API token for your Zendesk account. You can get one by going to **Admin** > **Channels** > **API**

**PHP_AUTH_USER**

This is going to be the user on your script credentials. You have to put here whatever you want but make sure that the username in your target is the same as this one.

**PHP_AUTH_PW**

This is going to be the token on your script. You have to put here whatever you want but make sure that the password in your target is the same as this one.

**CUSTOM_FIELD_ID**

This is the ID of the custom field you have created.

**$facebook_pages**

```
$facebook_pages = array(
		PAGEID1 => "page_tag1",
		PAGEID2 => "page_tag2"
	);
```

PAGEID is the ID for your facebook page. You can find your facebook page Id in Facebook by:

1. Go to your page
2. Click "Settings"
3. Click "Page Info"
4. You can see there the "Facebook Page ID" option

PAGETAG is the tag that you added in your custom field for that specific page.

### One URL target

![url_target.png](http://i.imgur.com/cBXglMx.png)

### One trigger

![trigger.png](http://i.imgur.com/eNXpnlY.png)

### Credits & Extra info

Pull requests are welcome. :)
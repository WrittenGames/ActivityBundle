Written Games ActivityBundle
============================

## Step 1: Install with composer

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/WrittenGames/OpenIdUserBundle"
        }
    ],
    "require": {
        "writtengames/activity-bundle": "*"
    }
}
```

## Step 2: Enable the bundle

```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new FOS\UserBundle\FOSUserBundle(),
    );
}
```

## Step 3: Create your Activity class

The bundle provides base classes which are already mapped for most fields to make it easier
to create your entity. Here is how you use them:

1. Extend the base Activity class of your choice (the class to use depends of your storage)
2. Map the id field. It must be protected as it is inherited from the parent class.

## Step 4: Import WGActivityBundle routing files
```
# app/config/routing.yml
wg_activity_bundle:
    resource: "@WGActivityBundle/Resources/config/routing/routing.yml"
```

## Step 5: Update your database schema

For ORM run the following command:

```
php app/console doctrine:schema:update --force
```

For MongoDB users you can run the following command to create the indexes.

```
php app/console doctrine:mongodb:schema:create --index
```

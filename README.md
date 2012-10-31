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

## Step 3: Extend and map your entities

You will need to extend and map the following entities:

1. Activity
2. Work
3 ...

The bundle provides base classes which are already mapped for most fields to make
it easier to create your entity. Here is how you use them:

1. Extend the base class of your choice (the class to use depends of your storage)
2. Map the id and the user field.

## Step 4: Configure the bundle to use your entities

```
# app/config/config.yml
wg_activity:
    model:
        activity: MyProject\MyBundle\Entity\Activity
        work: MyProject\MyBundle\Entity\Work
```

## Step 5: Import WGActivityBundle routing files
```
# app/config/routing.yml
wg_activity_bundle:
    resource: "@WGActivityBundle/Resources/config/routing/routing.yml"
```

## Step 6: Update your database schema

For ORM run the following command:

```
php app/console doctrine:schema:update --force
```

For MongoDB users you can run the following command to create the indexes.

```
php app/console doctrine:mongodb:schema:create --index
```

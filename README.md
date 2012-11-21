Written Games ActivityBundle
============================

## Step 1: Install with composer

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/WrittenGames/ActivityBundle"
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
        new CiscoSystems\ActivityBundle\CiscoSystemsActivityBundle(),
    );
}
```

## Step 3: Implement the bundle's UserInterface

In order for the bundle to work your User entity will need to implement
CiscoSystems\ActivityBundle\Model\UserInterface which declares two methods, getId()
and getUsername(). Then you need to set it as a target entity in Doctrine's
configuration (see step 4 below).

## Step 4: Configure the bundle (example for Doctrine ORM)

```
# app/config/config.yml

doctrine:
    orm:
        resolve_target_entities:
            CiscoSystems\ActivityBundle\Model\UserInterface: WrittenGames\UserBundle\Entity\User

cisco_activity:
    db_driver: orm
```

## Step 5: Import CiscoSystemsActivityBundle routing files
```
# app/config/routing.yml
cisco_activity_bundle:
    resource: "@CiscoSystemsActivityBundle/Resources/config/routing/routing.yml"
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

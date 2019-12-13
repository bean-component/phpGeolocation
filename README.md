- For Upgrade and Dev Guideline or Workflow, check Documentation of phpThing Component.
- After following the guideline above from phpThing Component, add this code to doctrine.yaml
```
            Bean\Thing\Doctrine:
                is_bundle: false
                type: annotation
                dir: '%kernel.project_dir%/vendor/bean-component/php-thing/doctrine/Orm'
                prefix: 'Bean\Thing\Doctrine\Orm'
                alias: Bean\Thing\Doctrine
```
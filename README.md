### Demo of Symfony DI bug for singly implemented interfaces whose implementation has no constructor arguments

#### Run

- Run `composer install` followed by `php index.php`.
- Expected output is "Dump with following die inside factory - execution should reach here and stop." due to the dump and
die within `\App\SingleImplementationFactory::create`.
- Actual output is "Execution should never reach here due to the dump and die within \App\SingleImplementationFactory::create."
because `\App\SingleImplementationFactory::create` never appears to be called and so the dump at the end of `index.php` is reached.

#### Other Scenarios

- Adding a constructor argument to `\App\SingleImplementation` makes the desired behaviour happen (factory is called).
- Adding a second (unused) class that implements the interface `\App\SinglyImplementedInterface` also makes the desired
behaviour happen.

#### Confirmed Versions

- Have tested with 4.4 and 5.0 and confirmed the same behaviour occurs in both.
- 4.3.8 doesn't have the issue.

#### Linked Issues

- The nature of the bug makes it seem likely it is connected to https://github.com/symfony/symfony/issues/34361 based
on the commit message that addressed that bug https://github.com/symfony/symfony/commit/afdb89fe3c16f965bf194007bb409da9b4b255b8.

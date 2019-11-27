<?php declare(strict_types=1);

require_once('vendor/autoload.php');

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$loader->load('services.yaml');
$containerBuilder->compile();

/** @var App\PublicService $publicService */
$publicService = $containerBuilder->get(\App\PublicService::class);
$singlyImplementedInterface = $publicService->getSinglyImplemented();

var_dump('Execution should never reach here due to the dump and die within \App\SingleImplementationFactory::create.');

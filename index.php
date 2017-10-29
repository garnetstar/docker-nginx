<?php

require 'vendor/autoload.php';

$config['displayErrorDetails'] = true;

$app = new Slim\App(["settings" => $config]);



$container = $app->getContainer();

/** @var \Monolog\Logger Description */
$container['logger'] = function ($c) {
	$logger = new \Monolog\Logger("my-logger");
	$fileHandler = new \Monolog\Handler\StreamHandler('./logs/app.log');
	$logger->pushHandler($fileHandler);
	return $logger;
};

$app->get('/hello/{name}', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {

	$name = $request->getAttribute('name');

//	$response->getBody()->write("Hello $name");
	

$domDoc = new DOMDocument;
$rootElt = $domDoc->createElement('root');
$rootNode = $domDoc->appendChild($rootElt);

$subElt = $domDoc->createElement('foo');
$attr = $domDoc->createAttribute('ah');
$attrVal = $domDoc->createTextNode('OK');
$ns = $domDoc->createElementNS('http://www.example.com/XFoo', 'xfoo:test', 'This is the root element!');
$attr->appendChild($attrVal);
$subElt->appendChild($attr);
$subNode = $rootNode->appendChild($subElt);
$rootNode->appendChild($ns);

$textNode = $domDoc->createTextNode('Wow, it works!');
$subNode->appendChild($textNode);



	$this['logger']->info("Name: $name");

	/* @var $logger \Monolog\Logger */
//	$logger = $this->logger;
//
//	$logger->error("sssss", ["ffff" => "yyy"]);
	
	$response->getBody()->write($domDoc->saveXML());
	
	
	return $response->withHeader('Content-type', 'application/xml');
});

$app->run();

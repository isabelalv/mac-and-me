<?php

//Include autoload, as it’s a necessary component
include('vendor/autoload.php');

//Create your private_key and public_key objects
$private_key = new \Bitpay\PrivateKey(‘./api.key');
$public_key = new \Bitpay\PublicKey(‘./api.pub');

// Assign a value to the private_key object
$private_key->generate();
// Associate private_key with public_key, and then assign a
 value to the public_key object
$public_key->setPrivateKey($private_key);
$public_key->generate();

// Use the key manager to persist keys
$manager = new \Bitpay\KeyManager(new \Bitpay\Storage\
 FilesystemStorage());
$manager->persist($private_key);
$manager->persist($public_key);

?>
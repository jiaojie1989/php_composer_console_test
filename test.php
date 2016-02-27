<?php

/*
 * Copyright (C) 2016 SINA Corporation
 *  
 *  
 * 
 * This script is firstly created at 2016-02-27.
 * 
 * To see more infomation,
 *    visit our official website http://finance.sina.com.cn/.
 */

require "vendor/autoload.php";

/*
  use Symfony\Component\Console\Application;
  use Symfony\Component\Console\Input\InputInterface;
  use Symfony\Component\Console\Input\InputArgument;
  use Symfony\Component\Console\Input\InputOption;
  use Symfony\Component\Console\Output\OutputInterface;

  $app = new Application();
  $app->register('ls')
  ->setDefinition(array(
  new InputArgument('dir', InputArgument::REQUIRED, 'Directory name'),
  ))
  ->setDescription('Displays the files in the given directory')
  ->setCode(function (InputInterface $input, OutputInterface $output) {
  $dir = $input->getArgument('dir');
  $output->writeln(sprintf('Dir listing for <info>%s</info>', $dir));
  })
  ;
  $app->run();
 */

$loop = React\EventLoop\Factory::create();

$socket = new React\Socket\Server($loop);
$socket->on('connection', function ($conn) {
    $conn->write("Hello there!\n");
    $conn->write("Welcome to this amazing server!\n");
    $conn->write("Here's a tip: don't say anything.\n");

    $conn->on('data', function ($data) use ($conn) {
        var_dump($data);
        $conn->close();
    });
});
$socket->listen(1337);

$loop->run();

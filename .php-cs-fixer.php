<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->files()
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
// php-cs-fixer 3.95.x parses PHP syntax only up to 8.5 and refuses to run on 8.6.
// This package must be style-checked on both 8.5 and 8.6, so allow the unsupported
// runtime explicitly (official Config option; env var PHP_CS_FIXER_IGNORE_ENV=1 is equivalent).
// Remove this once php-cs-fixer supports PHP 8.6.
return $config->setRiskyAllowed(true)
    ->setUnsupportedPhpVersionAllowed(true)
    ->setRules(array(
        '@PSR2'                     => true,
        '@PHPUnit60Migration:risky' => true,
        'binary_operator_spaces'    => array('operators' => array('=' => 'align', '=>' => 'align')),
        'single_quote'              => true,
        'array_syntax'              => array('syntax' => 'long'),
        'concat_space'              => array('spacing' => 'one'),
        'psr_autoloading'           => array('dir' => 'src'),
        'short_scalar_cast'         => true,
    ))
    ->setUsingCache(true)
    ->setFinder($finder);
;

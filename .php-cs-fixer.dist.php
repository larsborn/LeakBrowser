<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var')
;


return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        '@PHPUnit60Migration:risky' => true,
        '@PHP70Migration:risky' => true,
        '@PHP71Migration:risky' => true,
        'declare_strict_types' => true,
        'single_blank_line_before_namespace' => true,
        'array_syntax' => ['syntax' => 'short'],
        'is_null' => true,
        'no_unused_imports' => true,
        'trailing_comma_in_multiline' => true,
        'no_empty_phpdoc' => true,
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
            'allow_unused_params' => false,
            'remove_inheritdoc' => true,
        ],
        'compact_nullable_typehint' => true,
        'no_alternative_syntax' => true,
        'no_empty_statement' => true,
        'modernize_types_casting' => true,
        'ordered_imports' => [
            'imports_order' => ["const", "class", "function"],
        ],
        'native_function_type_declaration_casing' => true,
        'yoda_style' => [
            'always_move_variable' => false,
            'equal' => false,
            'identical' => false,
            'less_and_greater' => false,
        ],
        'return_type_declaration' => [
            'space_before' => 'none',
        ],
        'global_namespace_import' => [
            'import_classes' => true,
            'import_functions' => true,
            'import_constants' => true,
        ],
    ])
    ->setFinder($finder);

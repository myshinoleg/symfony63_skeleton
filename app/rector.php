<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;
use Rector\PHPUnit\Set\PHPUnitSetList;

return static function (RectorConfig $rectorConfig): void {
    // Указываем пути для правок
    $rectorConfig->paths([
        __DIR__ . '/module',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    // Пропускаем пути и лишние правила
    $rectorConfig->skip([
        __DIR__ . '/*/DependencyInjection/*',
        __DIR__ . '/*/DependencyInjection/*',

        \Rector\Naming\Rector\Class_\RenamePropertyToMatchTypeRector::class,
        \Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector::class,
        \Rector\Naming\Rector\Foreach_\RenameForeachValueVariableToMatchMethodCallReturnTypeRector::class,
        \Rector\CodeQuality\Rector\NotEqual\CommonNotEqualRector::class,
        \Rector\CodeQuality\Rector\If_\ShortenElseIfRector::class,
        \Rector\CodeQuality\Rector\Array_\CallableThisArrayToAnonymousFunctionRector::class,
        \Rector\CodingStyle\Rector\If_\NullableCompareToNullRector::class,
        \Rector\CodingStyle\Rector\ClassConst\SplitGroupedClassConstantsRector::class,
        \Rector\CodingStyle\Rector\ClassConst\VarConstantCommentRector::class,
        \Rector\EarlyReturn\Rector\If_\ChangeOrIfReturnToEarlyReturnRector::class,
        \Rector\EarlyReturn\Rector\Return_\ReturnBinaryAndToEarlyReturnRector::class,
        \Rector\EarlyReturn\Rector\If_\ChangeAndIfToEarlyReturnRector::class,
        \Rector\EarlyReturn\Rector\If_\ChangeOrIfContinueToMultiContinueRector::class,
    ]);

    // Указываем наборы правил, по которым хотим провести проверку
    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::NAMING,
        SetList::CODING_STYLE,
        SetList::TYPE_DECLARATION,
        SetList::EARLY_RETURN,
        SymfonySetList::SYMFONY_CODE_QUALITY,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
    ]);

    $rectorConfig->importShortClasses(false);
};
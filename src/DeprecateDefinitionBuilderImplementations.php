<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use Cspray\ArchitecturalDecision\DecisionStatus;
use Cspray\ArchitecturalDecision\DocBlockArchitecturalDecision;
use DateTimeImmutable;
use DOMElement;

/**
 * # Deprecate Definition Builder implementations
 *
 * ## Context
 *
 *
 *
 * ## Decision
 */
final class DeprecateDefinitionBuilderImplementations extends DocBlockArchitecturalDecision {

    public function date() : DateTimeImmutable {
        return new DateTimeImmutable('2024-12-14', new \DateTimeZone('America/New_York'));
    }

    public function status() : string|DecisionStatus {
        return DecisionStatus::Accepted;
    }

    public function addMetaData(DOMElement $meta) : void {
        AddAuthorMetadata::add(Author::charlesSprayberry(), $meta);
        AddDeprecationMetadata::add('2.4.0', '3.0.0', $meta);
    }
}
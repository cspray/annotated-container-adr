<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use Attribute;
use Cspray\ArchitecturalDecision\DecisionStatus;
use Cspray\ArchitecturalDecision\DocBlockArchitecturalDecision;
use DateTimeImmutable;
use DateTimeZone;
use DOMElement;

/**
 *  # Deprecate Definition Builder implementations
 *
 *  ## Context
 *
 *  Starting with the initial versions of Annotated Container most Definitions that make up a ContainerDefinition are
 *  created through a series of "builder" objects using a fluent API. Ultimately, even the functional API utilizes the
 *  builder API when you aren't using attributes to declare your ContainerDefinition. The intent of these builder objects
 *  is to provide a singular, correct method for creating implementations for the interfaces that make up a
 *  ContainerDefinition. In practice, these objects proved to be more difficult to use than expected, and led to an
 *  increase in maintenance requirements.
 *
 *  ## Decision
 *
 *  The fluent API for creating definitions proved to be clunky to use, hard to test properly, and created lots of
 *  static analysis issues. In v3, these issues started to exacerbate when we needed to make changes to the underlying
 *  Definition interfaces and their corresponding builders. Instead of continuing with this subpar system, it was
 *  removed in v3 in favor of a concrete Factory class that ensures resultant Definitions are valid and proper without
 *  having to rely on a chain of fluent API calls.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class DeprecateDefinitionBuilderImplementations extends DocBlockArchitecturalDecision {

    public function date() : DateTimeImmutable {
        return new DateTimeImmutable('2025-05-15', new DateTimeZone('America/New_York'));
    }

    public function status() : string|DecisionStatus {
        return DecisionStatus::Accepted;
    }

    public function addMetaData(DOMElement $meta) : void {
        AddAuthorMetadata::add(Author::charlesSprayberry(), $meta);
        AddDeprecationMetadata::add('2.4.0', '3.0.0', $meta);
    }
}

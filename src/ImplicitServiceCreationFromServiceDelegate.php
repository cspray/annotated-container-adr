<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use Attribute;
use Cspray\ArchitecturalDecision\DecisionStatus;
use Cspray\ArchitecturalDecision\DocBlockArchitecturalDecision;
use DateTimeImmutable;
use DateTimeZone;

/**
 * # ServiceDelegate Implicitly Creates ServiceDefinition if necessary
 *
 * ## Context
 *
 * In versions 2.2.0 and below, if a ServiceDelegateAttribute was defined the type it creates MUST be defined as a
 * Service; either with the Attribute API or using low-level functions in a DefinitionProvider. The thought process
 * behind this decision was to make you be explicit about what services you define. However, there are valid designs
 * where this limitation leads to unnecessary boilerplate.
 *
 * ## Decision
 *
 * In versions 2.3.0 and higher, if a ServiceDelegateAttribute is defined to create a type that is not already a
 * Service definition it will be added to the ContainerDefinition instead of an exception being thrown. This is
 * to make sure we're still doing all the other stuff we might do with services in the ContainerFactory and other
 * analysis tools that are expecting these values to be present. This will allow for a more varied usage of
 * Annotated Container instead of forcing down a more opinionated path.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class ImplicitServiceCreationFromServiceDelegate extends DocBlockArchitecturalDecision {

    public function __construct() {
        parent::__construct(
            new DateTimeImmutable('2024-05-09', new DateTimeZone('America/New_York')),
            DecisionStatus::accepted(),
            [Author::charlesSprayberry()],
        );
    }

}

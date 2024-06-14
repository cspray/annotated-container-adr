<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use Cspray\ArchitecturalDecision\DecisionStatus;
use Cspray\ArchitecturalDecision\DocBlockArchitecturalDecision;
use DateTimeImmutable;
use DateTimeZone;
use DOMElement;

/**
 * # Deprecate ActiveProfiles for Concrete Value Object
 *
 * ## Context
 *
 * Profiles play a critically important role in Annotated Container. They define what services and parameters might
 * get injected and allows for a great amount of flexibility when wiring your services for a variety of environments
 * and runtimes. It might be important to programmatically know which profiles are active at any given time. As of 2.3.0,
 * that is handled by the Cspray\AnnotatedContainer\Profiles\ActiveProfiles interface.
 *
 * This interface has been somewhat problematic from the get-go. Because of various bootstrapping concerns the ActiveProfiles
 * implementation is actually created a few times in duplication. This duplication extends into each ContainerFactory.
 * In addition, having a separate implementation for parsing profiles from a string leads to a general feeling of the
 * ActiveProfiles design being over-engineered.
 *
 * ## Decision
 *
 * To simplify the amount of code being duplicated and to make profiles easier to reason about in internal code, the
 * existing implementations in the Cspray\AnnotatedContainer\Profiles namespace have been deprecated. They will be
 * replaced with a value object that has static constructors for creating a set of profiles in a variety of standardized
 * ways. This value object will also continue to provide the same functionality as the ActiveProfiles interface.
 *
 * The deprecation of these implementations in 2.3 is meant to serve as a warning they will be removed in 3.0. For the
 * most part, transitioning from ActiveProfiles to Profiles in your code should be straightforward. You should only need
 * to adjust the type declaration to be the new type.
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
final class DeprecateActiveProfilesInFavorOfConcreteValueObject extends DocBlockArchitecturalDecision {

    public function date() : DateTimeImmutable {
        return new DateTimeImmutable('2025-05-21', new DateTimeZone('America/New_York'));
    }

    public function status() : string|DecisionStatus {
        return DecisionStatus::Accepted;
    }

    public function addMetaData(DOMElement $meta) : void {
        AddAuthorMetadata::add(Author::charlesSprayberry(), $meta);
        AddDeprecationMetadata::add('2.3.0', '3.0.0', $meta);
    }
}

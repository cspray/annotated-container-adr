<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use Attribute;
use Cspray\ArchitecturalDecision\DecisionMetaData;
use Cspray\ArchitecturalDecision\DecisionMetaDataProperty;
use Cspray\ArchitecturalDecision\DecisionStatus;
use Cspray\ArchitecturalDecision\DocBlockArchitecturalDecision;
use DateTimeImmutable;
use DateTimeZone;

/**
 * # Deprecate Observers for Events
 *
 * ## Context
 *
 * In 2.0 the Bootstrap Observer system was added. This system allows your integrating library or application to
 * perform some actions when a limited set of events occur within Annotated Container's provided bootstrapping. The
 * design was primarily geared toward providing the functionality found in
 * Cspray\AnnotatedContainer\Bootstrap\ServiceWiringObserver.
 *
 * As part of Annotated Container 3.0 improvements, it was decided that the way logging is handled should be made
 * more test friendly and easier for you to be explicit about enabling that logging without being overly burdensome. It
 * would be ideal to put logging into an Observer implementation, however the limited amount of Observers available is
 * not sufficient to replace the existing logging output.
 *
 * ## Decision
 *
 * A comprehensive, granular event system will be implemented as part of Annotated Container 3.0 that will resolve the
 * hurdles with using the existing Observer system. The existing Observer system will become obsolete and no longer
 * necessary. The deprecation of this system in 2.3 is meant to act as a warning that in 3.0 you'll need to update
 * your Observer implementations to use the corresponding Event. In practice this should be a relatively straight-forward
 * operation requiring implementation of a new interface, renaming a method, and perhaps adjusting a method signature.
 * All the data made available through the Observer system will also be made available through the Event system.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class DeprecateObserversInFavorOfEventSystem extends DocBlockArchitecturalDecision {

    public function __construct() {
        parent::__construct(
            new DateTimeImmutable('2024-05-15', new DateTimeZone('America/New_York')),
            DecisionStatus::accepted(),
            [Author::charlesSprayberry()],
            [
                DecisionMetaData::keyValueWithProperties('deprecation', true, [
                    DecisionMetaDataProperty::keyValue('since', '2.3.0'),
                    DecisionMetaDataProperty::keyValue('scheduledForRemoval', '3.0.0'),
                ])
            ]
        );
    }

}

<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use Attribute;
use Cspray\ArchitecturalDecision\DecisionStatus;
use Cspray\ArchitecturalDecision\DocBlockArchitecturalDecision;
use DateTimeImmutable;
use DOMElement;

/**
 * # ConfigurationAttribute is Deprecated
 *
 * ## Context
 *
 * When Annotated Container launched it was decided to have a ConfigurationAttribute that could act as a type-safe,
 * container-managed way to handle app configs. Shared services attributed with a ConfigurationAttribute follow
 * slightly different rules than a ServiceAttribute. Specifically, they are not allowed to be assigned profiles,
 * cannot be marked primary, and can have values injected into a property without a constructor.
 *
 * ## Decision
 *
 * In practice the limitations around ConfigurationAttribute were hard to work with. Of important note is the desire to
 * have a default configuration provided by a library and the app easily overriding it. This is possible with the
 * ServiceAttribute out-of-the-box. Additionally, the opinion that Configuration should not have profiles was arbitrary
 * in nature and only put limitations on the use of the Configuration without providing any real value. On top of all
 * that, the idea that Configuration would be the only type of services to injecting values directly onto a property
 * was made obsolete with constructor property promotion.
 *
 * We could simply add these pieces of the ConfigurationAttribute but at that point we're effectively duplicating the
 * ServiceAttribute. Instead of that, we should discourage the use of the ConfigurationAttribute. If you require similar
 * functionality, you should implement your own custom ServiceAttribute.
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class DeprecateConfigurationInFavorOfCustomServiceAttribute extends DocBlockArchitecturalDecision {

    public function date() : DateTimeImmutable {
        return new DateTimeImmutable('2023-05-14', new \DateTimeZone('America/New_York'));
    }

    public function status() : DecisionStatus {
        return DecisionStatus::Accepted;
    }

    public function addMetaData(DOMElement $meta) : void {
        AddAuthorMetadata::add(Author::charlesSprayberry(), $meta);
        AddDeprecationMetadata::add('2.1.0', '3.0.0', $meta);
    }
}
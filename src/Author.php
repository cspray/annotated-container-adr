<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use Cspray\ArchitecturalDecision\DecisionAuthor;

final class Author {

    public static function charlesSprayberry() : DecisionAuthor {
        return DecisionAuthor::fromName('Charles Sprayberry');
    }

}

<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

final class Author {

    private function __construct(
        public readonly string $name,
        public readonly string $website,
        public readonly string $githubProfile
    ) {}

    public static function charlesSprayberry() : Author {
        return new Author('Charles Sprayberry', 'https://cspray.io', 'https://github.com/cspray');
    }

}

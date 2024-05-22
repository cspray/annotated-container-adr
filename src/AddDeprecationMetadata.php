<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

use DOMElement;

final class AddDeprecationMetadata {

    private function __construct() {}

    public static function add(string $since, string $scheduledRemoval, DOMElement $meta) : void {
        $dom = $meta->ownerDocument;

        $deprecationNode = $dom->createElement('deprecation');
        $sinceNode = $dom->createElement('since', $since);
        $removeNode = $dom ->createElement('scheduledForRemoval', $scheduledRemoval);

        $deprecationNode->append($sinceNode, $removeNode);

        $meta->append($deprecationNode);
    }

}
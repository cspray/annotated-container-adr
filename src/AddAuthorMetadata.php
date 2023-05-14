<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainer\ArchitecturalDecisionRecords;

final class AddAuthorMetadata {

    private function __construct() {}

    public static function add(Author $author, \DOMElement $meta) : void {
        $dom = $meta->ownerDocument;

        $authorNode = $dom->createElement('author');
        $authorNameNode = $dom->createElement('name', $author->name);
        $authorUrlNode = $dom->createElement('website', $author->website);
        $githubProfileNode = $dom->createElement('githubProfile', $author->githubProfile);

        $authorNode->append($authorNameNode, $authorUrlNode, $githubProfileNode);

        $meta->append($authorNode);
    }
}
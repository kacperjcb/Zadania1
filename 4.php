<?php
class Thesaurus {
    private $thesaurusData;

    public function __construct($thesaurusData) {
        $this->thesaurusData = $thesaurusData;
    }

    public function getSynonyms($word) {
        if (isset($this->thesaurusData[$word])) {
            $synonyms = $this->thesaurusData[$word];
        } else {
            $synonyms = [];
        }

        $result = [
            'word' => $word,
            'synonyms' => $synonyms
        ];

        return json_encode($result);
    }
}

$thesaurusData = [
    "market" => ["trade"],
    "small" => ["little", "compact"]
];

$thesaurus = new Thesaurus($thesaurusData);
echo $thesaurus->getSynonyms("small");
// Wyświetli: {"word":"small","synonyms":["little","compact"]}

echo $thesaurus->getSynonyms("asleast");
// Wyświetli: {"word":"asleast","synonyms":[]}

<?php

namespace App;

class Company
{
    private static $companies = [
        1 =>
            [
                'id'    => 1,
                'name'  => 'Johannes Kepler Universität Linz',
                'phone' => ' + 43 732 2468',
                'email' => 'admission@jku.at',

                'description' => 'Die Welt ändert sich immer rascher . An der Johannes Kepler Universität Linz arbeiten wir täglich an den Technologien
                    und Ideen von morgen . Und zugleich bereiten wir rund 21.000 junge Menschen auf die Anforderungen des modernen
                    Arbeitsmarkts vor . Kurz: Wir sind Oberösterreichs größte Bildungs - und Forschungseinrichtung . Interesse, an Österreichs
                    wohl schönster Campusuniversität die Zukunft mitzugestalten?'
            ],
        2 =>
            [
                'id'          => 2,
                'name'        => 'Österreichische HochschülerInnenschaft an der JKU',
                'phone'       => '+43 732 2468 5950',
                'email'       => 'oeh@oeh.jku.at',
                'description' => 'Als Studierendenvertretung an der JKU ist die ÖH dein ersten Ansprechpartner bei Fragen und Problemen vor und während deines Studiums.
                    Weiters vertreten dich unsere MitarbeiterInnen in den Gremien und Kommissionen der Universität und versuchen, deine Studienbedingungen kontinuierlich zu verbessern.
                    Darüber hinaus laden wir regelmeäßig zu kulturellen und akademischen Veranstaltunge wie Mensafesten, Podiumsdiskussionen, Spieleevents, aber auch Firmenbesuchen und Informationsveranstaltungen.
                    Möchtest auch du ein aktiver Teil davon sein?'
            ]
    ];

    public static function getAll()
    {
        return self::$companies;
    }

    public static function getCompany($id)
    {
        if (is_null($id) || empty($id) || !array_key_exists($id, self::$companies)) {
            return false;
        }
        return self::$companies[$id];
    }
}

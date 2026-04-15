<?php

class SeoService {

    public static function listSEO() {
        return [
            "title" => "Recettes sans gluten faciles et gourmandes",
            "description" => "Découvrez les meilleures recettes sans gluten : gâteaux, desserts et plaisirs sains."
        ];
    }

    public static function categorySEO($type) {
        return [
            "title" => "Recettes sans gluten : ".$type,
            "description" => "Découvrez nos recettes sans gluten de type ".$type." faciles et savoureuses."
        ];
    }

    public static function detailSEO($recipe) {
        return [
            "title" => $recipe->title->rendered,
            "description" => substr(strip_tags($recipe->excerpt->rendered),0,150)
        ];
    }

    public static function schemaList($recipes) {

        $items = [];

        foreach($recipes as $i => $r) {
            $items[] = [
                "@type" => "ListItem",
                "position" => $i+1,
                "url" => $r->link
            ];
        }

        return json_encode([
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "itemListElement" => $items
        ]);
    }

    public static function schemaRecipe($recipe) {

        return json_encode([
            "@context" => "https://schema.org",
            "@type" => "Recipe",
            "name" => $recipe->title->rendered,
            "description" => strip_tags($recipe->excerpt->rendered),
            "author" => [
                "@type" => "Organization",
                "name" => "PetitPatissier"
            ]
        ]);
    }
}

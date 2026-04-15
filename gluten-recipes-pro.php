<?php
/*
Plugin Name: Gluten Recipes PRO SEO
Description: Générateur SEO de recettes sans gluten avec backlinks optimisés
Version: 2.0
Author: Philippe
*/

if (!defined('CLAW')) die('No direct access');

class GlutenRecipesPro {

    public function __construct() {
        $this->routes();
    }

    private function routes() {

        Router::add('/recettes-sans-gluten', function() {
            require_once __DIR__.'/controllers/RecipesController.php';
            (new RecipesController())->index();
        });

        Router::add('/recettes-sans-gluten/categorie/{type}', function($type) {
            require_once __DIR__.'/controllers/RecipesController.php';
            (new RecipesController())->category($type);
        });

        Router::add('/recettes-sans-gluten/{slug}', function($slug) {
            require_once __DIR__.'/controllers/RecipesController.php';
            (new RecipesController())->show($slug);
        });
    }
}

new GlutenRecipesPro();

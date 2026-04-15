<?php

require_once __DIR__.'/../services/SeoService.php';

class RecipesController {

    private $api = "https://petitpatissier.com/wp-json/wp/v2/posts?per_page=20";

    
    private function fetch() {

    	$cache = __DIR__.'/../cache/data.json';

    	// fallback si fichier absent
    	if (!file_exists($cache)) {
        	file_put_contents($cache, json_encode([]));
    	}

    	if (time() - filemtime($cache) < 3600) {
        	return json_decode(file_get_contents($cache));
    	}

    	$data = @file_get_contents($this->api);

    	if ($data === false) {
        	return json_decode(file_get_contents($cache));
    	}

    	$decoded = json_decode($data);

    	if ($decoded) {
        	file_put_contents($cache, json_encode($decoded));
    	}

    	return $decoded ?: [];
    }

    public function index() {

        $recipes = $this->fetch();

        $seo = SeoService::listSEO();

        include __DIR__.'/../views/list.php';
    }

    public function category($type) {

        $recipes = $this->fetch();

        $filtered = array_filter($recipes, function($r) use ($type) {
            return stripos($r->title->rendered, $type) !== false;
        });

        $seo = SeoService::categorySEO($type);

        include __DIR__.'/../views/category.php';
    }

    public function show($slug) {

        $data = json_decode(file_get_contents("https://petitpatissier.com/wp-json/wp/v2/posts?slug=".$slug));

        if (!$data) return;

        $recipe = $data[0];

        $seo = SeoService::detailSEO($recipe);

        include __DIR__.'/../views/detail.php';
    }
}

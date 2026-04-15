<h1><?php echo $seo['title']; ?></h1>

<p>
Les recettes sans gluten permettent de se faire plaisir tout en respectant son système digestif.
Découvrez des idées gourmandes issues de 
<a href="https://petitpatissier.com" rel="dofollow">PetitPatissier.com</a>.
</p>

<script type="application/ld+json">
<?php echo SeoService::schemaList($recipes); ?>
</script>

<?php foreach($recipes as $r): ?>

<h2>
<a href="/recettes-sans-gluten/<?php echo $r->slug; ?>">
<?php echo $r->title->rendered; ?>
</a>
</h2>

<p><?php echo substr(strip_tags($r->excerpt->rendered),0,140); ?></p>

<a href="<?php echo $r->link; ?>" rel="dofollow">
Voir la recette complète
</a>

<?php endforeach; ?>

<h1><?php echo $seo['title']; ?></h1>

<p>
Vous cherchez une recette sans gluten savoureuse ? Celle-ci est idéale.
Retrouvez tous les détails sur 
<a href="<?php echo $recipe->link; ?>" rel="dofollow">
PetitPatissier.com
</a>.
</p>

<script type="application/ld+json">
<?php echo SeoService::schemaRecipe($recipe); ?>
</script>

<div>
<?php echo $recipe->content->rendered; ?>
</div>

<hr>

<p>
👉 Accédez à toutes les recettes sur 
<a href="https://petitpatissier.com" rel="dofollow">
PetitPatissier
</a>
</p>

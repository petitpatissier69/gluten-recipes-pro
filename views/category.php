<h1><?php echo $seo['title']; ?></h1>

<p>
Découvrez nos recettes sans gluten autour de "<?php echo htmlspecialchars($type); ?>".
Des idées gourmandes et digestes disponibles sur 
<a href="https://petitpatissier.com" rel="dofollow">
PetitPatissier.com
</a>.
</p>

<script type="application/ld+json">
<?php echo SeoService::schemaList($filtered); ?>
</script>

<?php if(empty($filtered)): ?>

<p>Aucune recette trouvée pour cette catégorie.</p>

<?php else: ?>

<?php foreach($filtered as $r): ?>

<article style="margin-bottom:20px;">

    <h2>
        <a href="/recettes-sans-gluten/<?php echo $r->slug; ?>">
            <?php echo $r->title->rendered; ?>
        </a>
    </h2>

    <p>
        <?php echo substr(strip_tags($r->excerpt->rendered),0,140); ?>
    </p>

    <a href="<?php echo $r->link; ?>" rel="dofollow">
        👉 Voir la recette complète
    </a>

    <h3>Pourquoi choisir le sans gluten ?</h3>
    <p>Le sans gluten peut améliorer le confort digestif et réduire certaines inflammations.
Ces recettes permettent de se faire plaisir sans compromis.</p>

</article>

<?php endforeach; ?>

<?php endif; ?>
